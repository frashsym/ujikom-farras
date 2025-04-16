<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SppController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ProfileController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    // User
    Route::prefix('/user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/', [UserController::class, 'store'])->name('users.store');
        Route::get('/{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::patch('/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    // Kelas
    Route::prefix('/kelas')->group(function () {
        Route::get('/', [KelasController::class, 'index'])->name('kelas.index');
        Route::get('/create', [KelasController::class, 'create'])->name('kelas.create');
        Route::post('/', [KelasController::class, 'store'])->name('kelas.store');
        Route::get('//{id}', [KelasController::class, 'show'])->name('kelas.show');
        Route::get('/{id}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
        Route::patch('/{id}', [KelasController::class, 'update'])->name('kelas.update');
        Route::delete('/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');
    });

    // Spp
    Route::prefix('/spp')->group(function () {
        Route::get('/', [SppController::class, 'index'])->name('spp.index');
        Route::get('/create', [SppController::class, 'create'])->name('spp.create');
        Route::post('/', [SppController::class, 'store'])->name('spp.store');
        Route::get('/{id}', [SppController::class, 'show'])->name('spp.show');
        Route::get('/{id}/edit', [SppController::class, 'edit'])->name('spp.edit');
        Route::patch('/{id}', [SppController::class, 'update'])->name('spp.update');
        Route::delete('/{id}', [SppController::class, 'destroy'])->name('spp.destroy');
    });

    // Siswa
    Route::prefix('/siswa')->group(function () {
        Route::get('/', [SiswaController::class, 'index'])->name('siswa.index');
        Route::get('/create', [SiswaController::class, 'create'])->name('siswa.create');
        Route::post('/', [SiswaController::class, 'store'])->name('siswa.store');
        Route::get('/{id}', [SiswaController::class, 'show'])->name('siswa.show');
        Route::get('/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
        Route::patch('/{id}', [SiswaController::class, 'update'])->name('siswa.update');
        Route::delete('/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    });

    // Pembayaran
    Route::prefix('/pembayaran')->group(callback: function () {
        Route::get('/', [PembayaranController::class, 'index'])->name('pembayaran.index');
        Route::get('/create', [PembayaranController::class, 'create'])->name('pembayaran.create');
        Route::post('/', [PembayaranController::class, 'store'])->name('pembayaran.store');
        Route::get('/{id}', [PembayaranController::class, 'show'])->name('pembayaran.show');
        Route::get('/{id}/edit', [PembayaranController::class, 'edit'])->name('pembayaran.edit');
        Route::patch('/{id}', [PembayaranController::class, 'update'])->name('pembayaran.update');
        Route::delete('/{id}', [PembayaranController::class, 'destroy'])->name('pembayaran.destroy');
        Route::get('/', [PembayaranController::class, 'index'])->name('pembayaran.index');
    });

});

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
