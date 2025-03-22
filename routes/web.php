<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('landing.main');
});

Auth::routes([
    'verify' => true
]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [ HomeController::class, 'home' ])->name('home');
    Route::get('/avatar', [ HomeController::class, 'renderMyAvatar' ])->name('avatar');
});
