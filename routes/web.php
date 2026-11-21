<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/welcome', [PostController::class, 'welcome'])->name('welcome');


Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/about', [PostController::class, 'about'])->name('about');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
