<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormConfirmation;
use App\Mail\ContactFormMail;
use App\Services\ChatService;
use Illuminate\Http\Request;
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

    public function contact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email:dns|max:150',
            'message' => 'required|string|min:30|max:500',
        ], [
            'name.required' => 'error.name_required',
            'name.string' => 'error.name_string',
            'name.max' => 'error.name_max',
            'email.required' => 'error.email_required',
            'email.email' => 'error.email_email',
            'email.max' => 'error.email_max',
            'message.required' => 'error.message_required',
            'message.string' => 'error.message_string',
            'message.min' => 'error.message_min',
            'message.max' => 'error.message_max',
        ]);

        Mail::to(config('mail.from.address'))
            ->send(new ContactFormMail($validated));

        Mail::to($validated['email'])
            ->send(new ContactFormConfirmation($validated));

        return redirect()->back();
    }

    public function chat(Request $request, ChatService $chatService)
    {
        $validated = $request->validate([
            'question' => 'required|string|min:10|max:500',
        ], [
            'question.required' => 'error.question_required',
            'question.string' => 'error.question_string',
            'question.min' => 'error.question_min',
            'question.max' => 'error.question_max',
        ]);
        Log::info('AI Chat request made', [
            'question' => $validated['question'],
        ]);

        $question = $chatService->addJobVacanciesData($validated['question']);
        try {
            $answer = $chatService->getGeminiAnswer($question);
            Log::info('AI Chat response generated', [
                'answer_length' => strlen($answer),
            ]);

        } catch (\Exception $e) {
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
