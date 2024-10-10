<?php

namespace App\Providers;

use App\Models\Master;
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
        View::composer('sections.sidebar', function ($view) {
            $masterData = Master::all();
            $view->with('masterData', $masterData);
        });
    }
}