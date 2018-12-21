<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\CustomerServiceInterface;
use App\Services\CustomerService;
use App\Interfaces\TourServiceInterface;
use App\Services\TourService;
use App\Interfaces\SearchServiceInterface;
use App\Services\SearchService;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
          CustomerServiceInterface::class,
          CustomerService::class
        );

        $this->app->singleton(
          TourServiceInterface::class,
          TourService::class
        );
        $this->app->singleton(
          SearchServiceInterface::class,
          SearchService::class

        );

    }
}
