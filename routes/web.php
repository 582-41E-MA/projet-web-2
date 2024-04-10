<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SetLocaleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');
