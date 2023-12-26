<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::prefix('pos')->group(function () {
    Route::view('pos', 'page.pos.pos-page')->name('pos');
})->middleware(['auth', 'verified']);

// Route Produit
Route::prefix('produit')->group(function () {
    Route::view('listeProduits', 'page.produits.liste')->name('listeProduits');
    Route::view('createProduits', 'page.produits.create')->name('createProduits');
})->middleware(['auth', 'verified']);

// Route Commande
require __DIR__ . '/auth.php';
