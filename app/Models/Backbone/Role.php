<?php

namespace App\Models\Backbone;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'slug'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($role) {
            $role->slug = Str::slug($role->name);
        });
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}

