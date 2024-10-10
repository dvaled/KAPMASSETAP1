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
Route::get('/master', [MasterController::class, 'index'])->name('master.index'); //display the master tables

//Sidebar Master
Route::get('/', [MasterController::class, 'sidebar'])->name('sidebar');


// Route::('')





Route::prefix('master')->group(function () {
    Route::get('/Detail-Asset-Laptop', function () {
        // Matches The "/admin/users" URL
    });


    
    Route::get('/Detail-Asset-Mobile', function () {
        // Matches The "/admin/users" URL
    });
    Route::get('/Detail-Asset-Others', function () {
        // Matches The "/admin/users" URL
    });
    Route::get('/Detail-Asset-Employee', function () {
        // Matches The "/admin/users" URL
    });
    Route::get('/Detail-Asset-User', function () {
        // Matches The "/admin/users" URL
    });
});










//Route::get('/detailAsset', [MasterController::class, 'index'])->name('detailAsset.laptop');