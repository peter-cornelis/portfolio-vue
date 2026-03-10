<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home', [
        'appName' => config('app.name'),
    ]);
});

Route::get('/language/{locale}', [PortfolioController::class, 'toggleLanguage']);

Route::post('/contact', [PortfolioController::class, 'contact']);
