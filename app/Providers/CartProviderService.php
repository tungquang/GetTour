<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\CartServiceInterface;
use App\Services\Cart\CartService;

class CartProviderService extends ServiceProvider
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
          CartServiceInterface::class,
          CartService::class
        );
    }
}
