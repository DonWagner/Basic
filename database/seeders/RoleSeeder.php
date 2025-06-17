<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backbone\Role;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = ['Guest', 'User', 'Moderator', 'Admin', 'Super Admin'];

        foreach ($roles as $roleName) {
            Role::firstOrCreate(
                ['slug' => Str::slug($roleName)],
                ['name' => $roleName]
            );
        }
    }
}
