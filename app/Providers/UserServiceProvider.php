<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\UserServiceInterface;
use App\Interfaces\RoleServiceInterface;
use App\Interfaces\PermissionServiceInterface;
use App\Services\UserService;
use App\Services\RoleService;
use App\Services\PermissionService;

class UserServiceProvider extends ServiceProvider
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
        UserServiceInterface::class,
        UserService::class
      );
      $this->app->singleton(
        RoleServiceInterface::class,
        RoleService::class
      );
      $this->app->singleton(
        PermissionServiceInterface::class,
        PermissionService::class
      );
    }
}
