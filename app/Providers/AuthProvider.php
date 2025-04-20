<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AuthProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Register the AuthServiceInterface with its implementation
        $this->app->bind(
            'App\Services\AuthServiceInterface',
            'App\Services\ServiceImpl\AuthServiceImpl'
        );

        // Register the AuthController
        $this->app->bind(
            'App\Http\Controllers\AuthController',
            'App\Http\Controllers\AuthController'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
