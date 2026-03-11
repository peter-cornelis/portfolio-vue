<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use App\Mail\ContactFormConfirmation;
use Illuminate\Support\Facades\Mail;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('app');
    }

    public function toggleLanguage(string $locale)
    {
        if (in_array($locale, ['en', 'nl'])) {
            Cookie::queue('language', $locale, 525600);
        }
        return redirect()->back();
    }

    public function contact(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email:dns|max:150',
            'message' => 'required|string|min:30|max:500'
        ],[
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
}
