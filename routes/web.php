<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\CarrosserieController;
use App\Http\Controllers\TransmissionController;
use App\Http\Controllers\TractionController;
use App\Http\Controllers\CarburantController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\SetLocaleController;
use App\Http\Controllers\PhotoController;


Route::get('/', [VoitureController::class, 'index'])->name('voiture.index');

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::get('/voitures', [VoitureController::class, 'index'])->name('voiture.index');
Route::get('/voiture/{voiture}', [VoitureController::class, 'show'])->name('voiture.show');
Route::get('/voitures/select', [VoitureController::class, 'select'])->name('voitures.select');

Route::post('/panier/inscription', [CommandeController::class, 'inscriptionPanier'])->name('commande.inscriptionPanier');
Route::get('/commande/user/{user}', [CommandeController::class, 'show'])->name('commande.show');
Route::get('/panier/{user}', [CommandeController::class, 'showPanier'])->name('commande.showPanier');
Route::post('/create/guest', [UserController::class, 'storeGuest'])->name('user.storeGuest');
Route::get('/panier/voiture/{voiture}', [CommandeController::class, 'panier'])->name('commande.panier');

Route::post('/commande/user/{user}', [CommandeController::class, 'paiement'])->name('commande.paiement');
Route::get('/commande/reservation/{user}', [CommandeController::class, 'reservation'])->name('commande.reservation');
Route::delete('/delete/{voiture}', [CommandeController::class, 'deleteVoiturePanier'])->name('commande.deleteVoiturePanier');
Route::get('/checkout/{commande}', [CommandeController::class, 'checkout'])->name('commande.checkout');
Route::get('/success/{commande}', [CommandeController::class, 'success'])->name('commande.success');
Route::get('/commande-pdf/{commande}', [CommandeController::class, 'pdfConfirmation'])->name('commande.pdf');


Route::middleware(['privilege'])->group(function() 
{
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/clients', [UserController::class, 'indexClient'])->name('user.indexClient');
    Route::get('/create/user', [UserController::class, 'create'])->name('user.create');
    Route::get('/create/client', [UserController::class, 'createClient'])->name('user.createClient');
    Route::post('/create/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/edit/user/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/edit/client/{user}', [UserController::class, 'editClient'])->name('user.editClient');
    Route::put('/edit/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.delete');

    Route::get('/parametres', [VoitureController::class, 'parametres'])->name('voiture.parametres');

    Route::get('/create/marque', [MarqueController::class, 'create'])->name('marque.create');
    Route::post('/create/marque', [MarqueController::class, 'store'])->name('marque.store');
    Route::get('/edit/marque/{marque}', [MarqueController::class, 'edit'])->name('marque.edit');
    Route::put('/edit/marque/{marque}', [MarqueController::class, 'update'])->name('marque.update');
    Route::delete('/marque/{marque}', [MarqueController::class, 'destroy'])->name('marque.delete');
    
    Route::get('/create/modele', [ModeleController::class, 'create'])->name('modele.create');
    Route::post('/create/modele', [ModeleController::class, 'store'])->name('modele.store');
    Route::get('/edit/modele/{modele}', [ModeleController::class, 'edit'])->name('modele.edit');
    Route::put('/edit/modele/{modele}', [ModeleController::class, 'update'])->name('modele.update');
    Route::delete('/modele/{modele}', [ModeleController::class, 'destroy'])->name('modele.delete');
    
    Route::get('/create/carrosserie', [CarrosserieController::class, 'create'])->name('carrosserie.create');
    Route::post('/create/carrosserie', [CarrosserieController::class, 'store'])->name('carrosserie.store');
    Route::get('/edit/carrosserie/{carrosserie}', [CarrosserieController::class, 'edit'])->name('carrosserie.edit');
    Route::put('/edit/carrosserie/{carrosserie}', [CarrosserieController::class, 'update'])->name('carrosserie.update');
    Route::delete('/carrosserie/{carrosserie}', [CarrosserieController::class, 'destroy'])->name('carrosserie.delete');
    
    Route::get('/create/transmission', [TransmissionController::class, 'create'])->name('transmission.create');
    Route::post('/create/transmission', [TransmissionController::class, 'store'])->name('transmission.store');
    Route::get('/edit/transmission/{transmission}', [TransmissionController::class, 'edit'])->name('transmission.edit');
    Route::put('/edit/transmission/{transmission}', [TransmissionController::class, 'update'])->name('transmission.update');
    Route::delete('/transmission/{transmission}', [TransmissionController::class, 'destroy'])->name('transmission.delete');
    
    Route::get('/create/traction', [TractionController::class, 'create'])->name('traction.create');
    Route::post('/create/traction', [TractionController::class, 'store'])->name('traction.store');
    Route::get('/edit/traction/{traction}', [TractionController::class, 'edit'])->name('traction.edit');
    Route::put('/edit/traction/{traction}', [TractionController::class, 'update'])->name('traction.update');
    Route::delete('/traction/{traction}', [TractionController::class, 'destroy'])->name('traction.delete');
    
    Route::get('/create/carburant', [CarburantController::class, 'create'])->name('carburant.create');
    Route::post('/create/carburant', [CarburantController::class, 'store'])->name('carburant.store');
    Route::get('/edit/carburant/{carburant}', [CarburantController::class, 'edit'])->name('carburant.edit');
    Route::put('/edit/carburant/{carburant}', [CarburantController::class, 'update'])->name('carburant.update');
    Route::delete('/carburant/{carburant}', [CarburantController::class, 'destroy'])->name('carburant.delete');
    
    Route::get('/photos/{voiture}', [PhotoController::class, 'voiture'])->name('photo.voiture');
    Route::get('/create/photo/{voiture}', [PhotoController::class, 'create'])->name('photo.create');
    Route::post('/create/photo/{voiture}', [PhotoController::class, 'store'])->name('photo.store');
    Route::delete('/photo/{photo}', [PhotoController::class, 'destroy'])->name('photo.delete');
    Route::put('/photo/{photo}', [PhotoController::class, 'principal'])->name('photo.principal');

    Route::get('/create/voiture', [VoitureController::class, 'create'])->name('voiture.create');
    Route::post('/create/voiture', [VoitureController::class, 'store'])->name('voiture.store');
    Route::get('/edit/voiture/{voiture}', [VoitureController::class, 'edit'])->name('voiture.edit');
    Route::put('/edit/voiture/{voiture}', [VoitureController::class, 'update'])->name('voiture.update');
    Route::delete('/voiture/{voiture}', [VoitureController::class, 'destroy'])->name('voiture.delete');
});


Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');

