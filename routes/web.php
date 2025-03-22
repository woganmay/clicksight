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
    Route::get('/dashboard', [ HomeController::class, 'dashboard' ])->name('dashboard');
    Route::get('/avatar', [ HomeController::class, 'renderMyAvatar' ])->name('avatar');
});


