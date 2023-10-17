<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReplyController;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/blog/{slug}', [PostController::class, 'show'])->name('blog.single-blog');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/404', function () { return view('errors.404'); });

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [UserController::class, 'loginForm'])->name('auth.login');
    Route::post('/login', [UserController::class, 'login'])->name('auth.login');
    Route::get('/register', [UserController::class, 'registerForm'])->name('auth.register');
    Route::post('/register', [UserController::class, 'register'])->name('auth.register');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dash'])->name('auth.dash.dashboard');

    Route::get('/dashboard/posts', [PostController::class, 'index'])->name('auth.posts.index');
    Route::get('/dashboard/posts/create', [PostController::class, 'create'])->name('auth.posts.create');
    Route::post('/dashboard/posts/create', [PostController::class, 'store'])->name('auth.posts.create');
    Route::get('/dashboard/posts/{id}/edit', [PostController::class, 'edit'])->name('auth.posts.edit');
    Route::delete('/dashboard/posts/{id}/delete', [PostController::class, 'destroy'])->name('auth.posts.destroy');
    Route::put('/dashboard/posts/{id}/update', [PostController::class, 'update'])->name('auth.posts.update');

    Route::get('/dashboard/comments', [CommentController::class, 'index'])->name('auth.cmts.comments');
    Route::patch('/dashboard/comments/{comment}/approve', [CommentController::class, 'update'])->name('auth.cmts.comments.approve');
    Route::patch('/dashboard/comments/{comment}/unapprove', [CommentController::class, 'unapprove'])->name('auth.cmts.comments.unapprove');
    Route::delete('/dashboard/comments/{id}/destroy', [CommentController::class, 'destroy'])->name('auth.cmts.comments.destroy');

    Route::post('/comments/{commentId}/replies', [ReplyController::class, 'store'])->name('replies.store');
    Route::delete('/comments/{commentId}/replies/{replyId}', [ReplyController::class, 'destroy'])->name('replies.destroy');

    Route::get('/dashboard/messages', [ContactController::class, 'msgViews'])->name('auth.msgs.messages');
    Route::get('/dashboard/messages/{id}', [ContactController::class, 'show'])->name('auth.msgs.message-details');
    Route::delete('/dashboard/messages/{id}', [ContactController::class, 'delete'])->name('auth.msgs.message-details.delete');


    Route::get('/dashboard/profile/{username}', [UserController::class, 'profile'])->name('auth.users.profile');
    Route::get('/dashboard/profile/{username}/edit', [UserController::class, 'edit'])->name('auth.users.edit');
    Route::put('/dashboard/profile/{username}/update', [UserController::class, 'update'])->name('auth.users.update');
    Route::get('/dashboard/profile/{username}/change-password', [UserController::class, 'changePasswordForm'])->name('auth.users.change-password');
    Route::post('/dashboard/profile/{username}/change-password', [UserController::class, 'changePassword'])->name('auth.users.change-password.update');

    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});
