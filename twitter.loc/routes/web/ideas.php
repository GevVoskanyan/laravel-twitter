<?php

use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IdeaLikeController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/ideas', 'as' => 'ideas.', 'middleware' => ['auth']], function () {
    Route::get('/{idea}', [IdeaController::class, 'show'])->name('show')->withoutMiddleware(['auth']);
    Route::post('/', [IdeaController::class, 'store'])->name('store')->withoutMiddleware(['auth']);
    Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');
    Route::put('/{idea}', [IdeaController::class, 'update'])->name('update');
    Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy');

    Route::post('/{idea}/like', [IdeaLikeController::class, 'like'])->name('like');
    Route::post('/{idea}/unlike', [IdeaLikeController::class, 'unlike'])->name('unlike');
});
