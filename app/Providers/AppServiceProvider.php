<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use Override;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    #[Override]
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
