<?php

use App\Http\Controllers\karyawan\DashboardController as KaryawanDashboardController;
use App\Http\Controllers\karyawan\AbsenController as KaryawanAbsenController;
use App\Http\Controllers\karyawan\CutiController as KaryawanCutiController;
use App\Http\Controllers\karyawan\GajiController as KaryawanGajiController;
use App\Http\Controllers\hrd\DashboardController as HRDDashboardController;
use App\Http\Controllers\hrd\KaryawanController as HRDKaryawanController;
use App\Http\Controllers\hrd\DepartemenController as HRDDepartemenController;
use App\Http\Controllers\hrd\JabatanController as HRDJabatanController;
use App\Http\Controllers\hrd\AbsensiController as HRDAbsensiController;
use App\Http\Controllers\hrd\CutiController as HRDCutiController;
use App\Http\Controllers\hrd\GajiController as HRDGajiController;
use App\Http\Controllers\manajer\DashboardController as ManajerDashboardController;
use App\Http\Controllers\manajer\AbsensiController as ManajerAbsensiController;
use App\Http\Controllers\manajer\CutiController as ManajerCutiController;
use App\Http\Controllers\manajer\GajiController as ManajerGajiController;
use Illuminate\Support\Facades\Route;

// Login Page
Route::get('/', function () {
    return view('login');
})->name('login');

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
    Route::prefix('karyawan')->group(function () {
        Route::get('/', [HRDKaryawanController::class, 'index'])->name('karyawan');
        Route::get('/create', [HRDKaryawanController::class, 'create'])->name('karyawan.create');
        Route::get('/jabatan/{departemen}', [HRDKaryawanController::class, 'getJabatan'])->name('karyawan.jabatan');
        Route::post('/create', [HRDKaryawanController::class, 'store'])->name('karyawan.store');
    });
    Route::prefix('departemen')->group(function () {
        Route::get('/', [HRDDepartemenController::class, 'index'])->name('departemen');
        Route::get('/create', [HRDDepartemenController::class, 'create'])->name('departemen.create');
        Route::post('/create', [HRDDepartemenController::class, 'store'])->name('departemen.store');
        Route::get('/update/{id}', [HRDDepartemenController::class, 'edit'])->name('departemen.edit');
        Route::put('/update/{departemen}', [HRDDepartemenController::class, 'update'])->name('departemen.update');

        Route::delete('/delete/{departemen}', [HRDDepartemenController::class, 'destroy'])->name('departemen.destroy');

        Route::prefix('jabatan')->group(function () {
            Route::get('/{departemen}', [HRDJabatanController::class, 'index'])->name('jabatan');
            Route::get('/{departemen}/create', [HRDJabatanController::class, 'create'])->name('jabatan.create');
            Route::post('/{departemen}/create', [HRDJabatanController::class, 'store'])->name('jabatan.store');
            Route::get('/{departemen}/update/{jabatan}', [HRDJabatanController::class, 'edit'])->name('jabatan.edit');
            Route::put('/{departemen}/update/{jabatan}', [HRDJabatanController::class, 'update'])->name('jabatan.update');

            Route::delete('/{departemen}/delete/{jabatan}', [HRDJabatanController::class, 'destroy'])->name('jabatan.destroy');
        });
    });
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
