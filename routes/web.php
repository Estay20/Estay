<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GroupController;







Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/profile', [AuthController::class, 'profile'])->middleware('auth')->name('profile');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/profile', [AuthController::class, 'profile'])->name('profile');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');

});
Route::delete('/messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');

Route::middleware(['auth'])->group(function () {
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
});

Route::get('posts', [PostController::class, 'index'])->name('posts.index');


Route::middleware(['auth'])->group(function () {
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
    Route::post('posts/{post}/like', [PostController::class, 'storeLike'])->name('posts.like');
    Route::post('posts/{post}/comment', [PostController::class, 'storeComment'])->name('posts.comment.store');
    Route::delete('comments/{comment}', [PostController::class, 'destroyComment'])->name('posts.comment.destroy');
});

Route::get('/group/{id}', [GroupController::class, 'show'])->name('group.show');


Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::post('/comments/{comment}/like', [PostController::class, 'likeComment'])->name('comments.like');


Route::get('/group/{id}', [GroupController::class, 'show'])->name('group.show');

Route::post('/group/{id}/subscribe', [GroupController::class, 'subscribe'])->name('group.subscribe');
Route::post('/group/{id}/unsubscribe', [GroupController::class, 'unsubscribe'])->name('group.unsubscribe');

