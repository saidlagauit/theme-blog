<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/blog/{slug}', [PostController::class, 'show'])->name('blog.single-blog');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/404', function () {
    return view('errors.404');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [UserController::class, 'loginForm'])->name('auth.login');
    Route::post('/login', [UserController::class, 'login'])->name('auth.login');
    Route::get('/register', [UserController::class, 'registerForm'])->name('auth.register');
    Route::post('/register', [UserController::class, 'register'])->name('auth.register');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('auth.posts.index');
    Route::get('/comments', [CommentController::class, 'index'])->name('auth.posts.comments');
    Route::patch('/comments/{comment}/approve', [CommentController::class, 'update'])->name('auth.posts.comments.approve');
    Route::patch('/comments/{comment}/unapprove', [CommentController::class, 'unapprove'])->name('auth.posts.comments.unapprove');
    Route::delete('/comments', [CommentController::class, 'destroy'])->name('auth.posts.comments.destroy');

    Route::get('/create', [PostController::class, 'create'])->name('auth.posts.create');
    Route::post('/create', [PostController::class, 'store'])->name('auth.posts.create');

    Route::get('/edit/{id}', [PostController::class, 'edit'])->name('auth.posts.edit');
    Route::delete('/delete/{id}', [PostController::class, 'destroy'])->name('auth.posts.destroy');
    Route::put('/update/{id}', [PostController::class, 'update'])->name('auth.posts.update');

    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});
