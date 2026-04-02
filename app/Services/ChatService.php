<?php

declare(strict_types=1);

namespace App\Services;

use Exception;
use Gemini\Data\Content;
use Gemini\Laravel\Facades\Gemini;
use Illuminate\Support\Facades\Log;
use MillerPHP\LaravelBrowserless\Facades\Browserless;
use Throwable;

class ChatService
{
    public function getAnswer(string $question): string
    {
        Log::info('AI Chat request made', ['question' => $question]);

        $vacancyData = '';

        if (str_contains($question, 'https://')) {
            $vacancyData = $this->resolveVacancyData($question);
        } elseif (session()->has('vacancyData')) {
            $vacancyData = session('vacancyData');
        }

        try {
            $answer = $this->getGeminiAnswer($question, $vacancyData);
            Log::info('AI Chat response generated', ['answer_length' => strlen($answer)]);
        } catch (Exception $e) {
            Log::error('AI Chat failed', ['question' => $question, 'error' => $e->getMessage()]);
            $answer = __('messages.chat.failed');
        }

        return $answer;
    }

    private function resolveVacancyData(string $question): string
    {
        preg_match('/https?:\/\/[^\s"]+/i', $question, $match);
        $url = $match[0] ?? null;

        if ($url === null) {
            return '';
        }

        $vacancyData = $this->scrapeVacancyPage($url);
        session(['vacancyData' => $vacancyData]); // Store vacancy data for possible follow-up questions

        return $vacancyData;
    }

    private function scrapeVacancyPage(string $url): string
    {
        try {
            $result = Browserless::scrape()
                ->url($url)
                ->waitForTimeout(5000)
                ->element('main', ['text' => true])
                ->send();

            $content = $result->results('main');
            $text = collect($content)->pluck('text')->implode("\n");

            return trim(substr($text, 0, 5000));
        } catch (Throwable $e) {
            Log::warning('Browserless scrape failed', ['url' => $url, 'error' => $e->getMessage()]);

            return 'failed to collect job vacancy data for this url';
        }
    }

    private function getGeminiAnswer(string $question, string $vacancyData): string
    {
        $instructions = str_replace('{vacancyData}', $vacancyData, config('gemini.system_instructions'));
        $answer = Gemini::generativeModel(model: 'gemini-2.5-flash')
            ->withSystemInstruction(Content::parse($instructions))
            ->generateContent($question)
            ->text();

        $answer = htmlspecialchars($answer, ENT_QUOTES, 'UTF-8');

        return preg_replace(
            '@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\.]*(\?\S+)?)?)?)@',
            '<a href="$1" target="_blank" rel="noopener noreferrer" class="underline">$1</a>',
            $answer
        );
    }
}
