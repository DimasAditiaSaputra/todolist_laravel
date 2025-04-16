<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UserServiceInterface;
use App\Services\ServiceImpl\UserServiceImpl;

class UserProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserServiceInterface::class, UserServiceImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
