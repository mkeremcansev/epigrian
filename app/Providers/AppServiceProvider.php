<?php

namespace App\Providers;

use App\Console\Commands\Data\Contracts\DataCheckInterface;
use App\Console\Commands\Data\Repositories\DataCheckRepository;
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
        //
    }
}
