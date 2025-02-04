<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SmartphoneController;

Route::get('/', [SmartphoneController::class, 'index']);

Route::resource('smartphones', SmartphoneController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/smartphones/{id}', [SmartphoneController::class, 'show']); // Détails accessibles à tous les utilisateurs
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('smartphones', SmartphoneController::class)->except(['index', 'show']); // Admin seulement
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
