<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get("lang/{lang}", function ($lang) {
    App::setLocale($lang);
    session()->put("locale", $lang);
    return redirect()->route("dashboard");
})->name('lang');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/feed', FeedController::class)->middleware('auth')->name('feed');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');
