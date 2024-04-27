<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\CommandeController;
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
Route::get('/voiture/{voiture}', [VoitureController::class, 'show'])->name('voiture.show');

Route::get('/panier/{panier}', [PanierController::class, 'show'])->name('panier.show');

Route::get('/commande/{commande}', [CommandeController::class, 'show'])->name('commande.show');

Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');

Route::get('/{any}', function () {
    return view('404'); 
})->where('any', '.*')->name('404');
