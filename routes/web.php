<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ProjectAdminController;
use App\Http\Controllers\Admin\PostAdminController;
use App\Http\Controllers\Admin\MessageAdminController;

// Public routes
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/a-propos', [HomeController::class, 'about'])->name('about');

Route::get('/projets', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projets/{project}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/categorie/{category}', [BlogController::class, 'byCategory'])->name('blog.category');
Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Auth routes
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('logout');

// Admin routes (protected by auth middleware)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('projects', ProjectAdminController::class);
    Route::resource('posts', PostAdminController::class);
    Route::resource('messages', MessageAdminController::class, ['only' => ['index', 'show', 'destroy']]);
});

// Fallback 404
Route::fallback(function () {
    return view('errors.404');
});
