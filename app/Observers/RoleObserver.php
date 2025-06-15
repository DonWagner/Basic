<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Backbone\Role;

class RoleObserver
{

    public function creating(Role $role): void
    {
        $role->slug = Str::slug($role->name);
    }

    public function updating(Role $role): void
    {
        $role->slug = Str::slug($role->name);
    }

    public function deleted(Role $role): void
    {
        //
    }

    public function restored(Role $role): void
    {
        //
    }

    public function forceDeleted(Role $role): void
    {
        //
    }
}
