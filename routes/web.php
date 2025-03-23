<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingsController;

Route::get('/', function () {
    return view('landing.main');
});

Auth::routes([
    'verify' => true
]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [ HomeController::class, 'home' ])->name('home');
    Route::get('/avatar', [ HomeController::class, 'renderMyAvatar' ])->name('avatar');
    Route::get('/settings', [ HomeController::class, 'settings' ])->name('settings');
});
