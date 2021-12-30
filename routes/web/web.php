<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/{id}', [App\Http\Controllers\PostController::class, 'post'])->name('home.post');


Route::middleware('auth')->group(function(){

    Route::get('/admin', [App\Http\Controllers\AdminsController::class, 'index'])->name('admin.index');
    Route::post('/comment/store', [App\Http\Controllers\PostCommentsController::class, 'store'])->name('comment.store');

   

});

  
