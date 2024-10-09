<?php

use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\HistoryController;
use App\Http\Controllers\API\LogController;
use App\Http\Controllers\API\MaintenanceController;
use App\Http\Controllers\API\SoftwareController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\HardwareController;
use App\Http\Controllers\API\MasterController;
use Illuminate\Support\Facades\Route;

//Route::view('/', 'auth.login');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login/check', [AuthController::class, 'loginCheck'])->name('login.check');
Route::get('/dashboard', [AuthController::class, 'showDashboard'])->name('dashboard');

//View Dashboard
Route::view('/dashboard', 'dashboard');

//View Details
Route::view('/detailAssetL', 'detailAsset.laptop');
Route::view('/detailAssetM', 'detailAsset.mobile');
Route::view('/detailAssetP', 'detailAsset.others');

//Hardware 
Route::get('hardware/store', [HardwareController::class, 'store']); // Get a specific hardware

//Master
// Route::('')
















//Route::get('/detailAsset', [MasterController::class, 'index'])->name('detailAsset.laptop');