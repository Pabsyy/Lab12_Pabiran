<?php
use App\Http\Controllers\PostController;

// This will route the root URL to the posts index.
Route::get('/', [PostController::class, 'index']);

// Existing resource route.
Route::resource('posts', PostController::class);