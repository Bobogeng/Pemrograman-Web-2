<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\ParamedikController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\UnitKerjaController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/pasien', [PasienController::class, 'show'])->name('pasien');
Route::get('/pasien/create', [PasienController::class, 'create'])->name('pasien.create');
Route::post('/pasien/store', [PasienController::class, 'store'])->name('pasien.store');
Route::get('/pasien/{id}/edit', [PasienController::class, 'edit'])->name('pasien.edit');
Route::put('/pasien/{id}/update', [PasienController::class, 'update'])->name('pasien.update');
Route::delete('/pasien/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');
Route::get('/pasien/{id}', [PasienController::class, 'view'])->name('pasien.view');

Route::get('/kategori', [KategoriController::class, 'show'])->name('kategori');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id}/update', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
Route::get('/kategori/{id}', [KategoriController::class, 'view'])->name('kategori.view');

Route::get('/kelurahan', [KelurahanController::class, 'show'])->name('kelurahan');
Route::get('/kelurahan/create', [KelurahanController::class, 'create'])->name('kelurahan.create');
Route::post('/kelurahan/store', [KelurahanController::class, 'store'])->name('kelurahan.store');
Route::get('/kelurahan/{id}/edit', [KelurahanController::class, 'edit'])->name('kelurahan.edit');
Route::put('/kelurahan/{id}/update', [KelurahanController::class, 'update'])->name('kelurahan.update');
Route::delete('/kelurahan/{id}', [KelurahanController::class, 'destroy'])->name('kelurahan.destroy');
Route::get('/kelurahan/{id}', [KelurahanController::class, 'view'])->name('kelurahan.view');

Route::get('/paramedik', [ParamedikController::class, 'show'])->name('paramedik');
Route::get('/paramedik/create', [ParamedikController::class, 'create'])->name('paramedik.create');
Route::post('/paramedik/store', [ParamedikController::class, 'store'])->name('paramedik.store');
Route::get('/paramedik/{id}/edit', [ParamedikController::class, 'edit'])->name('paramedik.edit');
Route::put('/paramedik/{id}/update', [ParamedikController::class, 'update'])->name('paramedik.update');
Route::delete('/paramedik/{id}', [ParamedikController::class, 'destroy'])->name('paramedik.destroy');
Route::get('/paramedik/{id}', [ParamedikController::class, 'view'])->name('paramedik.view');

Route::get('/periksa', [PeriksaController::class, 'show'])->name('periksa');
Route::get('/periksa/create', [PeriksaController::class, 'create'])->name('periksa.create');
Route::post('/periksa/store', [PeriksaController::class, 'store'])->name('periksa.store');
Route::get('/periksa/{id}/edit', [PeriksaController::class, 'edit'])->name('periksa.edit');
Route::put('/periksa/{id}/update', [PeriksaController::class, 'update'])->name('periksa.update');
Route::delete('/periksa/{id}', [PeriksaController::class, 'destroy'])->name('periksa.destroy');
Route::get('/periksa/{id}', [PeriksaController::class, 'view'])->name('periksa.view');

Route::get('/unitkerja', [UnitKerjaController::class, 'show'])->name('unitkerja');
Route::get('/unitkerja/create', [UnitKerjaController::class, 'create'])->name('unitkerja.create');
Route::post('/unitkerja/store', [UnitKerjaController::class, 'store'])->name('unitkerja.store');
Route::get('/unitkerja/{id}/edit', [UnitKerjaController::class, 'edit'])->name('unitkerja.edit');
Route::put('/unitkerja/{id}/update', [UnitKerjaController::class, 'update'])->name('unitkerja.update');
Route::delete('/unitkerja/{id}', [UnitKerjaController::class, 'destroy'])->name('unitkerja.destroy');
Route::get('/unitkerja/{id}', [UnitKerjaController::class, 'view'])->name('unitkerja.view');
