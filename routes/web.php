<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('landing.main');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ HomeController::class, 'dashboard' ])->name('dashboard');
});


