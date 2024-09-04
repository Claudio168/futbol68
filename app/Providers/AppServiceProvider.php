<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\YearRangeService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(YearRangeService::class, function ($app) {
            return new YearRangeService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
