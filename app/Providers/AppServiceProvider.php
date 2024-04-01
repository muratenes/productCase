<?php

namespace App\Providers;

use App\Repository\Concrete\Eloquent\ElProductRepository;
use App\Repository\Interface\IProductRepository;
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
        $this->app->bind(IProductRepository::class, ElProductRepository::class);
    }
}
