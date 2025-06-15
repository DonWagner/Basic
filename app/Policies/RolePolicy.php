<?php
namespace App\Policies;

use App\Models\User;
use App\Models\Backbone\Role;

class RolePolicy
{
    public function viewAny(User $user) {
        return $user->hasRole('admin');
    }

    public function create(User $user) {
        return $user->hasRole('admin');
    }

    public function update(User $user, Role $role) {
        return $user->hasRole('admin');
    }

    public function delete(User $user, Role $role) {
        return $user->hasRole('admin');
    }
}
