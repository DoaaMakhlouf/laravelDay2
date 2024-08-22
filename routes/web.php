<?php

use Illuminate\Support\Facades\Route;

// lab3
// use App\Http\Controllers\postscontroller;

// lab2
use App\Http\Controllers\dbpostscontroller;

/* lab1
use App\Http\Controllers\postscontroller;
*/

// Default
Route::get('/', function () {
    return view('welcome');
});

// Index posts
// Route::get('/posts', [dbpostscontroller::class, 'getposts'])->name('getposts');

Route::get('/posts', function () { dd("Test");});

// Create post
Route::get('/createpost', [dbpostscontroller::class, 'createpost'])->name('createpost');

// Store post
Route::post('/savepost', [dbpostscontroller::class, 'savepost'])->name('savepost');

// Show post by id
// Route::get('/posts/{id}', [dbpostscontroller::class, 'showpost'])
//     ->name('showpost')->where('id', '[0-9]+');

// Edit post by id
Route::get('/posts/{id}/edit', [dbpostscontroller::class, 'editpost'])
    ->name('editpost')->where('id', '[0-9]+');

// Update post by id
Route::post('/posts/{id}/update', [dbpostscontroller::class, 'updatepost'])
    ->name('updatepost')->where('id', '[0-9]+');

// Delete post by id
Route::get('/posts/{id}/delete', [dbpostscontroller::class, 'deletepost'])
    ->name('deletepost')->where('id', '[0-9]+');

// lab3
// Route::resource('posts', postscontroller::class);