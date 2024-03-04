<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\View;
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
        // footer controller
        View::composer('layouts.users.footer', function($view){
            $siteSettings = SiteSetting::first();
            $view->with('siteSettings', $siteSettings);
        });

        // about us page controller
        View::composer('about', function($view){
            $siteSettings = SiteSetting::first();
            $view->with('siteSettings', $siteSettings);
        });
    }
}
