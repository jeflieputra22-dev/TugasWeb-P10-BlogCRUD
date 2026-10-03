<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Halaman utama langsung diarahkan ke daftar post
Route::redirect('/', '/posts');

// 1 baris = 7 route CRUD (posts.index, create, store, show, edit, update, destroy)
Route::resource('posts', PostController::class);
