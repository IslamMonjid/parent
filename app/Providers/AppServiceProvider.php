<?php

namespace App\Providers;
use App\Services\Interfaces\DataProviderServiceInterface;
use App\Services\DataProviderService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(DataProviderServiceInterface::class, DataProviderService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
