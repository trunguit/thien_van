<?php

namespace App\Providers;

use App\Repositories\Contracts\BlogRepositoryInterface;
use App\Repositories\Eloquent\BlogRepository;
use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            BlogRepositoryInterface::class,
            BlogRepository::class
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
