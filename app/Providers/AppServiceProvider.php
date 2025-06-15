<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Backbone\Role;
use App\Observers\RoleObserver;
use App\Observers\UserObserver;
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
        Role::observe(RoleObserver::class);
        User::observe(UserObserver::class);
    }
}
