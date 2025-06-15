<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backbone\RoleController;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});



Route::middleware(['auth'])->prefix('backbone')->group(function () {
    Route::resource('roles', RoleController::class);
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
