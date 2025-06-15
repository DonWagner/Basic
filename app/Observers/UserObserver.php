<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Str;

class UserObserver
{
    public function creating(User $user): void
    {
        $baseSlug = Str::slug($user->name);
        $slug = $baseSlug;
        $counter = 1;

        while (User::withTrashed()->where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter++;
        }

        $user->slug = $slug;
    }

    public function updating(User $user): void
    {
        if ($user->isDirty('name')) {
            $baseSlug = Str::slug($user->name);
            $slug = $baseSlug;
            $counter = 1;

            while (User::withTrashed()->where('slug', $slug)->where('id', '!=', $user->id)->exists()) {
                $slug = $baseSlug . '-' . $counter++;
            }

            $user->slug = $slug;
        }
    }

    public function deleted(User $user): void
    {
        // Eksempel: Log at brugeren blev soft deleted
    }

    public function restored(User $user): void
    {
        // Eksempel: Send notifikation om gendannelse
    }

    public function forceDeleted(User $user): void
    {
        // Eksempel: Slet profilbillede permanent
    }
}
