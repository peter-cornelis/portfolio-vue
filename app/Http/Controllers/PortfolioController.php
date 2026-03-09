<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Controller;

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
}
