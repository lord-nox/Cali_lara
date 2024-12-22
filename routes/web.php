<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AnswerController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserIsAdmin;

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

    // News page (viewable by all authenticated users)
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
});

// Admin-only routes
Route::middleware(['auth', EnsureUserIsAdmin::class])->group(function () {
    // User management
    Route::resource('users', UserController::class)->except(['show']);

    // Admin-only news routes
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
});

// FAQ page routes (visible to everyone)
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index'); // Public access

// Authenticated users can ask questions and answer FAQs
Route::middleware(['auth'])->group(function () {
    Route::get('/faq/create', [FaqController::class, 'create'])->name('faq.create');
    Route::post('/faq', [FaqController::class, 'store'])->name('faq.store');
    Route::post('/faq/{faq}/answer', [AnswerController::class, 'store'])->name('answer.store');
});

// Admin-only FAQ management routes
Route::middleware(['auth', EnsureUserIsAdmin::class])->group(function () {
    Route::get('/faq/{faq}/edit', [FaqController::class, 'edit'])->name('faq.edit');
    Route::put('/faq/{faq}', [FaqController::class, 'update'])->name('faq.update');
    Route::delete('/faq/{faq}', [FaqController::class, 'destroy'])->name('faq.destroy');
});

// Authentication routes
require __DIR__ . '/auth.php';
