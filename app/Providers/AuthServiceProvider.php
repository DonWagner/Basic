<?php

namespace App\Providers;

use App\Policies\RolePolicy;
use App\Models\Backbone\Role;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Role::class => RolePolicy::class,
    ];

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        //
    }
}
