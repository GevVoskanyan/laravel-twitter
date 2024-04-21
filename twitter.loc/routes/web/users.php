<?php

use App\Http\Controllers\FollowerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/users', 'as' => 'users.', 'middleware' => ['auth']], function () {

    Route::get('/{user}', [UserController::class, 'show'])->name('show')->withoutMiddleware('auth');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/{user}/update', [UserController::class, 'update'])->name('update');

    Route::post('/{user}/follow', [FollowerController::class, 'follow'])->name('follow');
    Route::post('/{user}/unfollow', [FollowerController::class, 'unfollow'])->name('unfollow');
});

Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');
