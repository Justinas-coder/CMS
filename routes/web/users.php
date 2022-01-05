<?php

use Illuminate\Support\Facades\Route;
 
Route::put('/users/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.profile.update');


Route::middleware('role:admin')->group(function(){

    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::put('/users/{user}/attach', [App\Http\Controllers\UserController::class, 'attach'])->name('user.role.attach');
    Route::put('/users/{user}/detach', [App\Http\Controllers\UserController::class, 'detach'])->name('user.role.detach');
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    Route::delete('/users/{user}/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/media', [App\Http\Controllers\MediaController::class, 'index'])->name('media.index');
    Route::get('/media/create', [App\Http\Controllers\MediaController::class, 'create'])->name('media.create');
    Route::post('/media/store', [App\Http\Controllers\MediaController::class, 'store'])->name('media.store');
    Route::delete('/media/destroy', [App\Http\Controllers\MediaController::class, 'destroy'])->name('media.destroy');
    Route::resource('/comments', App\Http\Controllers\PostCommentsController::class);
    Route::resource('/comment/replies', App\Http\Controllers\CommentRepliesController::class);
    Route::put('/comments/update/{id}', [App\Http\Controllers\PostCommentsController::class, 'update'])->name('comment.update');
    Route::delete('/comments/destroy/{id}', [App\Http\Controllers\PostCommentsController::class, 'destroy'])->name('comment.destroy');
    Route::get('/comments/{id}', [App\Http\Controllers\PostCommentsController::class, 'show'])->name('comments.show');




});

Route::middleware(['can:view,user'])->group(function(){

    Route::get('/users/{user}/profile', [App\Http\Controllers\UserController::class, 'show'])->name('user.profile.show');

});
