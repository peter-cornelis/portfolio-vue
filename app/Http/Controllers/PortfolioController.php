<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ChatFormRequest;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactFormConfirmation;
use App\Mail\ContactFormMail;
use App\Services\ChatService;
use Exception;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use Spatie\Browsershot\Browsershot;

class PortfolioController extends Controller
{
    public function index()
    {
        return Inertia::render('Home');
    }

    public function toggleLanguage(string $locale)
    {
        if (in_array($locale, ['en', 'nl'])) {
            Cookie::queue('language', $locale, 525600);
        }

        return redirect()->back();
    }

    public function contact(ContactFormRequest $request)
    {
        $validated = $request->validated();

        Mail::to(config('mail.from.address'))
            ->send(new ContactFormMail($validated));

        Mail::to($validated['email'])
            ->send(new ContactFormConfirmation($validated));

        return redirect()->back();
    }

    public function chat(ChatFormRequest $request, ChatService $chatService)
    {
        $validated = $request->validated();
        Log::info('AI Chat request made', [
            'question' => $validated['question'],
        ]);

        $question = $chatService->addJobVacanciesData($validated['question']);
        try {
            $answer = $chatService->getGeminiAnswer($question);
            Log::info('AI Chat response generated', [
                'answer_length' => strlen($answer),
            ]);
        } catch (Exception $e) {
            Log::error('AI Chat failed', [
                'question' => $question,
                'error' => $e->getMessage(),
            ]);

            $answer = __('messages.chat.failed');
        }

        return redirect()->back()->with('answer', $answer);
    }

    public function downloadPdf()
    {
        if (app()->environment('local')) {

            $pdf = Browsershot::url(route('home'))
                ->useCookies(['language' => app()->getLocale()])
                ->setBasePath(public_path())
                ->emulateMedia('print')
                ->waitUntilNetworkIdle()
                ->format('A4')
                ->margins(10, 10, 10, 10)
                ->pdf();

            return response($pdf, 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="CV_Peter_Cornelis.pdf"',
            ]);
        }

        return response()->file(public_path('assets/cv_'.app()->getLocale().'.pdf'), [
            'Vary' => 'Cookie',
            'Content-Disposition' => 'inline; filename="cv_peter_cornelis.pdf"',
        ]);
    }
}
