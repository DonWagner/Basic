<?php

namespace App\Http\Controllers\Backbone;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Backbone\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        return Role::all();
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|unique:roles,name']);
        return Role::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
    }

    public function show(Role $role)
    {
        return $role;
    }

    public function update(Request $request, Role $role)
    {
        $request->validate(['name' => 'required|string|unique:roles,name,' . $role->id]);
        $role->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return $role;
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return response()->noContent();
    }
}
