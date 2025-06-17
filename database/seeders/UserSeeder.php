<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Backbone\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Guest', 'email' => 'guest@guest.dk', 'role' => 'guest'],
            ['name' => 'User', 'email' => 'user@user.dk', 'role' => 'user'],
            ['name' => 'Moderator', 'email' => 'mod@mod.dk', 'role' => 'moderator'],
            ['name' => 'Admin', 'email' => 'admin@admin.dk', 'role' => 'admin'],
            ['name' => 'Super Admin', 'email' => 'super@super.dk', 'role' => 'super-admin'],
        ];

        foreach ($users as $data) {
            $slugBase = Str::slug($data['name']);
            $slug = $slugBase;
            $counter = 1;

            while (User::withTrashed()->where('slug', $slug)->exists()) {
                $slug = $slugBase . '-' . $counter++;
            }

            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'slug' => $slug,
                    'password' => Hash::make('Skoven05'),
                ]
            );

            $role = Role::where('slug', $data['role'])->first();

            if ($role) {
                $user->roles()->syncWithoutDetaching([$role->id]);
            }
        }
    }
}
