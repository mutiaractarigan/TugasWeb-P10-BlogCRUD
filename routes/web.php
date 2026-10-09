<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('posts.index');
});

// 7 route CRUD sekaligus: posts.index, posts.create, posts.store,
// posts.show, posts.edit, posts.update, posts.destroy
Route::resource('posts', PostController::class);
