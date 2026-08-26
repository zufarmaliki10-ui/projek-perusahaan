<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\DashboardController as ApiDashboardController;
use App\Http\Controllers\api\GajiController as ApiGajiController;

Route::get('/dashboard', [ApiDashboardController::class, 'index'])->name('api.dashboard');
Route::get('/gaji', [ApiGajiController::class, 'index'])->name('api.gaji');
