<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\HotelServiceInterface;
use App\Services\HotelService;

class HotelServiceProvider extends ServiceProvider
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
          HotelServiceInterface::class,
          HotelService::class
        );
    }
}
