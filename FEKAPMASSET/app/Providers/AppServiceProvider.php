<?php

namespace App\Providers;

use App\Models\Master;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;

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
    public function boot()
    {
        View::composer('layouts.sections.sidebar', function ($view) {
            $client = new Client();
            $response = $client->request('GET', 'http://localhost:5252/api/Master');
            $body = $response->getBody();
            $content = $body->getContents();
            $data = json_decode($content, true);

            // Share the master data with the sidebar
            $view->with('masterData', $data);
        });
    }
}