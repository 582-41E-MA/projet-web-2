<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
<<<<<<< HEAD
use App\Http\Controllers\VoitureController;
=======
>>>>>>> a3199dd (Rebaser inscription au header)
use App\Http\Controllers\SetLocaleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registration', [UserController::class, 'create'])->name('user.create');
Route::post('/registration', [UserController::class, 'store'])->name('user.store');

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');


Route::get('/voitures', [VoitureController::class, 'index'])->name('voiture.index');


Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');

