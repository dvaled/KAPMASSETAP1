<?php

use App\Http\Controllers\API\AssetController;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\HistoryController;
use App\Http\Controllers\API\LogController;
use App\Http\Controllers\API\MaintenanceController;
use App\Http\Controllers\API\SoftwareController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\HardwareController;
use App\Http\Controllers\API\MasterController;
use App\Http\Controllers\API\TrnAssetController;
use Illuminate\Support\Facades\Route;

//Authentication
Route::get('/login', [AuthController::class, 'loginForm'])->name('login'); //view login page
Route::post('/login/check', [AuthController::class, 'loginCheck'])->name('login.check'); //authenticate user before going to the dashboard
Route::get('/dashboard', [AuthController::class, 'showDashboard'])->name('dashboard'); //return view to dashboard if login success

//Dashboard
Route::get('/dashboard', [AssetController::class, 'index'])->name('dashboard'); //view dashboard and retrieve all asset list using index func
Route::get('/dashboard', [AssetController::class, 'create'])->name('dashboard'); //view dashboard and retrieve all asset list using index func

//Master
Route::prefix('master')->name('master.')->group(function() {
    Route::get('/', [MasterController::class, 'index'])->name('index');//return master view with all of the master data
    Route::get('/create', [MasterController::class, 'create'])->name('create');//return master view with all of the master data
    Route::post('/store', [MasterController::class, 'store'])->name('store');//send a post request to the API for master_gcm table
});


//View Details
Route::get('/detailAssetL', [TrnAssetController::class, 'index'])-> name('detailAsset.laptop');


//Route::view('/detailAssetL', 'detailAsset.laptop');
Route::view('/detailAssetM', 'detailAsset.mobile');
Route::view('/detailAssetP', 'detailAsset.others');

//Hardware 
Route::get('hardware/store', [HardwareController::class, 'store']); // Get a specific hardware















//Route::get('/detailAsset', [MasterController::class, 'index'])->name('detailAsset.laptop');