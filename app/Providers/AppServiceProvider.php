<?php

namespace App\Providers;

use App\Http\View\Composers\KeywordComposer;
use App\Http\View\Composers\SettingComposer;
use App\Models\Keyword;
use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Eloquent\ProductRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer(['frontend.layouts.footer'], SettingComposer::class);
        view()->composer(['frontend.layouts.footer'], KeywordComposer::class);
    }
}
