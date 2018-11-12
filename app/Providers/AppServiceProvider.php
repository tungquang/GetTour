<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\CustomerInterface;
use App\Responstories\toDoCustomer;

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
          CustomerInterface::class,
          toDoCustomer::class
        );
    }
}
