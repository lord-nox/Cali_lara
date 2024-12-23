<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Controllers\CommentController;

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

    // Admin contact management
    Route::get('/admin/contact', [AdminContactController::class, 'index'])->name('admin.contact.index');
    Route::post('/admin/contact/{id}/respond', [AdminContactController::class, 'respond'])->name('admin.contact.respond');
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


// Contact routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

//Comment on newspostsss
Route::post('/news/{news}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');


// Authentication routes
require __DIR__ . '/auth.php';
