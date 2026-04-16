<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MotoController;
use App\Http\Controllers\AccessoireController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MotoController::class, 'home'])->name('home');
Route::get('/locations', [MotoController::class, 'locations'])->name('locations');

Route::get('/boutique', function () {
    return "Page Boutique Accessoires";
})->name('accessoires.user');

Route::get('/moto/{id}', [MotoController::class, 'show'])->name('moto.show');

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/panier', function () {
        return "Votre Panier";
    })->name('panier');

    Route::get('/mon-profil', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/admin/motos', [MotoController::class, 'adminIndex'])->name('admin.motos');
    Route::post('/admin/motos', [MotoController::class, 'store'])->name('motos.store');
    Route::put('/admin/motos/{id}', [MotoController::class, 'update'])->name('motos.update');
    Route::delete('/admin/motos/{moto}', [MotoController::class, 'destroy'])->name('motos.destroy');


    Route::get('/admin/commandes', function () {
        return "Gestion Commandes";
    })->name('commandes');
    Route::get('/admin/users', function () {
        return "Gestion Users";
    })->name('users.admin');
});

Route::get('/boutique', [AccessoireController::class, 'index'])->name('accessoires.user');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/accessoires', [AccessoireController::class, 'adminIndex'])->name('accessoires');
    Route::post('/accessoires', [AccessoireController::class, 'store'])->name('accessoires.store');
    Route::get('/accessoires/{id}', [AccessoireController::class, 'show'])->name('accessoires.show');
    Route::put('/accessoires/{id}', [AccessoireController::class, 'update'])->name('accessoires.update');
    Route::delete('/accessoires/{id}', [AccessoireController::class, 'destroy'])->name('accessoires.destroy');

    Route::get('/reservations', [LocationController::class, 'index'])->name('admin.reservations');
});

Route::middleware('auth')->group(function () {
    Route::post('/reserver', [LocationController::class, 'store'])->name('locations.store');
});
