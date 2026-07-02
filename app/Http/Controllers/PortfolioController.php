<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ChatFormRequest;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactFormConfirmation;
use App\Mail\ContactFormMail;
use App\Services\ChatService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;
use Spatie\Browsershot\Browsershot;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PortfolioController extends Controller
{
    public function index(): InertiaResponse
    {
        return Inertia::render('Home');
    }

    public function toggleLanguage(string $locale): RedirectResponse
    {
        if (in_array($locale, ['en', 'nl'])) {
            Cookie::queue('language', $locale, 525600);
        }

        return redirect()->back();
    }

    public function contact(ContactFormRequest $request): RedirectResponse
    {
        /** @var array<string, string> $validated */
        $validated = $request->validated();

        Mail::to(config('mail.from.address'))
            ->send(new ContactFormMail($validated));

        Mail::to($validated['email'])
            ->send(new ContactFormConfirmation($validated));

        return redirect()->back();
    }

    public function chat(ChatFormRequest $request, ChatService $chatService): RedirectResponse
    {
        /** @var string $validatedQuestion */
        $validatedQuestion = $request->validated('question');

        $answer = $chatService->getAnswer($validatedQuestion);

        return redirect()->back()->with('answer', $answer);
    }

    public function downloadPdf(string $locale): Response|BinaryFileResponse
    {
        if (app()->environment('local')) {

            $pdf = Browsershot::url(route('home'))
                ->useCookies(['language' => $locale])
                ->emulateMedia('print')
                ->format('A4')
                ->margins(10, 10, 10, 10)
                ->pdf();

            return response($pdf, 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="CV_Peter_Cornelis.pdf"',
            ]);
        }

        return response()->file(public_path('assets/cv_'.$locale.'.pdf'), [
            'Vary' => 'Cookie',
            'Content-Disposition' => 'inline; filename="cv_peter_cornelis.pdf"',
        ]);
    }
}
