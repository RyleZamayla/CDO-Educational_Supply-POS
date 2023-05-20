<?php

namespace App\Providers;

use App\Repository\adminRepository;
use App\Repository\iAdminRepository;
use App\Repository\iProductRepository;
use App\Repository\productRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(iProductRepository::class, productRepository::class);
        $this->app->bind(iAdminRepository::class, adminRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
