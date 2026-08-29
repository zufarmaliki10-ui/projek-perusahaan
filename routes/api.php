<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\DashboardController as ApiDashboardController;
use App\Http\Controllers\api\GajiController as ApiGajiController;
use App\Http\Controllers\api\AuthController as ApiAuthController;
use App\Http\Controllers\api\AbsenController as ApiAbsenController;
use Laravel\Sanctum\HasApiTokens;

Route::post('/login', [ApiAuthController::class, 'authenticate'])->name('api.login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dashboard', [ApiDashboardController::class, 'index'])->name('api.dashboard');
    Route::get('/gaji', [ApiGajiController::class, 'index'])->name('api.gaji');
    Route::post('/absen', [ApiAbsenController::class, 'store'])->name('api.absen');
    Route::post('/logout', [ApiAuthController::class, 'logout'])->name('api.logout');
});
