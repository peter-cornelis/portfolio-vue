<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Inertia::share([
            'locale' => fn () => app()->getLocale(),
            'translations' => fn () => [
                app()->getLocale() => trans('messages'),
                app()->getLocale() === 'en' ? 'nl' : 'en' => trans('messages', [], app()->getLocale() === 'en' ? 'nl' : 'en'),
            ],
            'contact' => fn () => config('app.contact'),
        ]);
    }
}
