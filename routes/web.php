<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioController::class, 'index']);
Route::get('/language/{locale}', [PortfolioController::class, 'toggleLanguage']);
Route::post('/contact', [PortfolioController::class, 'contact'])->middleware('throttle:5,1');
Route::post('/chat', [PortfolioController::class, 'chat'])->middleware('throttle:5,1');
