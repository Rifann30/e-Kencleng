<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
        \Blade::directive('activeMenu', function ($route) {
            return "{{ Route::is($route) ? 'active' : ''}}";
        });
        Paginator::useBootstrapFive();
        Carbon::setLocale('id');
    }
}
