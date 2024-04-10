<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SetLocaleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registration', [UserController::class, 'create'])->name('user.create');
Route::post('/registration', [UserController::class, 'store'])->name('user.store');

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');

