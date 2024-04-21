<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::post('/ideas/{idea}/comments', [CommentController::class, 'store'])
    ->name('ideas.comments.store')->middleware('auth');
