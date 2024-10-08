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
use App\Http\Controllers\API\TrnAssetSpecController;

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
    Route::get('/create', [MasterController::class, 'sidebar'])->name('create');//return master view with all of the master data
    Route::post('/store', [MasterController::class, 'store'])->name('store');//send a post request to the API for master_gcm table
    Route::get('/log', [LogController::class, 'index'])->name('log.index');//return log view with all of the log data
});


//View Details
Route::get('/detailAssetL/{assetcode}', [TrnAssetController::class, 'show'])->name('detailAsset.laptop.show'); //view detail asset laptop
// Route::get('/detailAssetL/{assetcode}', [SoftwareController::class, 'index'])->name('detailAsset.laptop.index');
// Route::get('/detailAssetL/{assetcode}', [TrnDtlPictureController::class, 'index'])->name('detailAsset.laptop.index');
// Route::get('/detailAssetL/{assetcode}', [MaintenanceController::class, 'index'])->name('detailAsset.laptop.index');
// Route::get('/detailAssetL/{assetcode}', [HistoryController::class, 'index'])->name('detailAsset.laptop.index');
// Route::get('/detailAssetL/{assetcode}', [TrnAssetController::class, 'index'])->name('detailAsset.laptop.index');


//Route::view('/detailAssetL', 'detailAsset.laptop');
Route::view('/detailAssetM', 'detailAsset.mobile');
Route::view('/detailAssetP', 'detailAsset.others');

//Hardware 
Route::get('hardware/store', [HardwareController::class, 'store']); // Get a specific hardware

// //Master
// Route::get('/master', [MasterController::class, 'index'])->name('master.index'); //display the master tables

// //Sidebar Master
// Route::get('/', [MasterController::class, 'sidebar'])->name('sidebar');

//Employee