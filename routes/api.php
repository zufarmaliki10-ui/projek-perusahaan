<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\DashboardController as ApiDashboardController;

Route::get('/dashboard', [ApiDashboardController::class, 'index'])->name('api.dashboard');
