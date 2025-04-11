<?php

namespace App\Providers;

use App\Repositories\Contracts\BannerRepositoryInterface;
use App\Repositories\Eloquent\BannerRepository;
use Illuminate\Support\ServiceProvider;

class BannerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            BannerRepositoryInterface::class,
            BannerRepository::class
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
