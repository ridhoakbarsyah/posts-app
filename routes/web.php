<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Redirect root URL ke dashboard (posts index)
Route::get('/', function () {
    return redirect()->route('posts.index');
});

// Resource routes untuk Post
Route::resource('posts', PostController::class);

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

