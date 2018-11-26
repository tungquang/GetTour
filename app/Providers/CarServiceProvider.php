<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CarService;
use App\Interfaces\CarServiceInterface;

class CarServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
          CarServiceInterface::class,
          CarService::class
        );
    }
}
