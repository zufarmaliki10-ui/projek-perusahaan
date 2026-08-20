<?php

use App\Http\Controllers\karyawan\DashboardController as KaryawanDashboardController;
use App\Http\Controllers\karyawan\AbsenController as KaryawanAbsenController;
use App\Http\Controllers\karyawan\CutiController as KaryawanCutiController;
use App\Http\Controllers\karyawan\GajiController as KaryawanGajiController;
use App\Http\Controllers\hrd\DashboardController as HRDDashboardController;
use App\Http\Controllers\hrd\KaryawanController as HRDKaryawanController;
use App\Http\Controllers\hrd\DepartemenController as HRDDepartemenController;
use App\Http\Controllers\hrd\AbsensiController as HRDAbsensiController;
use App\Http\Controllers\hrd\CutiController as HRDCutiController;
use App\Http\Controllers\hrd\GajiController as HRDGajiController;
use App\Http\Controllers\manajer\DashboardController as ManajerDashboardController;
use App\Http\Controllers\manajer\AbsensiController as ManajerAbsensiController;
use App\Http\Controllers\manajer\CutiController as ManajerCutiController;
use App\Http\Controllers\manajer\GajiController as ManajerGajiController;
use Illuminate\Support\Facades\Route;

// Karyawan
Route::prefix('karyawan')->as('karyawan.')->group(function () {
    Route::get('/', [KaryawanDashboardController::class, 'index'])->name('dashboard');
    Route::get('/absensi', [KaryawanAbsenController::class, 'index'])->name('absensi');
    Route::get('/cuti', [KaryawanCutiController::class, 'index'])->name('cuti');
    Route::get('/gaji', [KaryawanGajiController::class, 'index'])->name('gaji');
});

// HRD
Route::prefix('HRD')->as('HRD.')->group(function () {
    Route::get('/', [HRDDashboardController::class, 'index'])->name('dashboard');
    Route::get('/karyawan', [HRDKaryawanController::class, 'index'])->name('karyawan');
    Route::get('/departemen', [HRDDepartemenController::class, 'index'])->name('departemen');
    Route::get('/absensi', [HRDAbsensiController::class, 'index'])->name('absensi');
    Route::prefix('cuti')->group(function () {
        Route::get('/', [HRDCutiController::class, 'index'])->name('cuti');
        Route::get('/show', [HRDCutiController::class, 'show'])->name('cuti.show');
    });
    Route::prefix('gaji')->group(function () {
        Route::get('/', [HRDGajiController::class, 'index'])->name('gaji');
        Route::get('/input', [HRDGajiController::class, 'input'])->name('gaji.input');
        Route::get('/create', [HRDGajiController::class, 'create'])->name('gaji.create');
        Route::get('/show', [HRDGajiController::class, 'show'])->name('gaji.show');
    });
});

// Manajer
Route::prefix('manajer')->as('manajer.')->group(function () {
    Route::get('/', [ManajerDashboardController::class, 'index'])->name('dashboard');
    Route::get('/absensi', [ManajerAbsensiController::class, 'index'])->name('absensi');
    Route::prefix('cuti')->group(function () {
        Route::get('/', [ManajerCutiController::class, 'index'])->name('cuti');
        Route::get('/show', [ManajerCutiController::class, 'show'])->name('cuti.show');
    });
    Route::get('/gaji', [ManajerGajiController::class, 'index'])->name('gaji');
});
