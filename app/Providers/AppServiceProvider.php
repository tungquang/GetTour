<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\CustomerServiceInterface;
use App\Services\Customer\CustomerService;
use App\Interfaces\TourServiceInterface;
use App\Services\Tour\TourService;
use App\Interfaces\SearchServiceInterface;
use App\Services\SearchService;
use App\Interfaces\TopicServiceInterface;
use App\Services\Topic\TopicService;


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

        $this->app->singleton(
          TopicServiceInterface::class,
          TopicService::class
        );


    }
}
