<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/welcome', [PostController::class, 'welcome'])->name('welcome');


Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/about', [PostController::class, 'about'])->name('about');
// post routes
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
// post show route
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
// post edit routes
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
// post delete route
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');