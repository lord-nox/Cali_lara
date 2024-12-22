<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Controllers\NewsController;

Route::get('/', function () {
    return view('welcome');
})->name('home'); // Public access

// Routes for all authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin-only routes
Route::middleware(['auth', EnsureUserIsAdmin::class])->group(function () {
    Route::resource('users', UserController::class)->except(['show']);
});

Route::middleware('auth')->group(function () {
    Route::get('/news', [NewsController::class, 'index'])->name('news.index'); // All users can view news
});

// Admin-only routes
Route::middleware(['auth', EnsureUserIsAdmin::class])->group(function () {
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
});

// Authentication routes
require __DIR__ . '/auth.php';
