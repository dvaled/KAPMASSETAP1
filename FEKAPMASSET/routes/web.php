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
use App\Http\Controllers\API\TrnDtlPictureController;

//Authentication
Route::get('/login', [AuthController::class, 'loginForm'])->name('login'); //view login page
Route::post('/login/check', [AuthController::class, 'loginCheck'])->name('login.check'); //authenticate user before going to the dashboard
Route::get('/dashboard', [AuthController::class, 'showDashboard'])->name('dashboard'); //return view to dashboard if login success

//Dashboard
// Route::get('/dashboard', [AssetController::class, 'index'])->name('dashboard'); //view dashboard and retrieve all asset list using index func
Route::get('/dashboard', [AssetController::class, 'create'])->name('dashboard'); //view dashboard and retrieve all asset list using index func

//Master
Route::prefix('master')->name('master.')->group(function() {
    Route::get('/', [MasterController::class, 'index'])->name('index');//return master view with all of the master data
    Route::get('/create/{condition}', [MasterController::class, 'create'])->name('create'); // return master view with all of the master data
    Route::post('/store/{condition}', [MasterController::class, 'store'])->name('store');//send a post request to the API for master_gcm table
    Route::get('/show/{condition}', [MasterController::class, 'show'])->name('show');//return master view with all of the master data

    Route::put('/update/{masterid}', [MasterController::class, 'update'])->name('update');//send a post request to the API for master_gcm table
    Route::put('destroy/{masterid}', [MasterController::class, 'destroy'])->name('destroy'); // make flag active -> N
    Route::get('/log', [LogController::class, 'index'])->name('log.index');//return log view with all of the log data
});

//Transaction
Route::prefix('transaction')->name('transaction.')->group(function(){
    // Route::get('/asset', [TrnAssetController::class, 'index'])->name('view'); //return view with all of the data.
    Route::get('/detailAssetL/{assetcode}', [TrnAssetController::class, 'show'])-> name('detailAsset.laptop');
    Route::get('/asset', [TrnAssetController::class, 'msttrnasset'])-> name('asset'); //View
    Route::get('/trnlaptop/{assetcategory}/{assetcode}', [TrnAssetSpecController::class, 'msttrnassetspec'])-> name('laptop'); //Retrieve transaction.create view along with all the data 
    Route::Post('/storespec/{assetcode}', [TrnAssetSpecController::class, 'store'])-> name('storespec');
    Route::Post('/store', [TrnAssetController::class, 'store'])-> name('store');
    Route::Put('/unassign/{assetcode}', [TrnAssetController::class, 'unassignAsset'])->name('unassign');
    // Route::get('/asset/assign', [TrnAssetController::class, 'AssignView'])-> name('transaction.assign'); //Retrieve transaction.assing view along with all the data
    // Route::Post('/asset/assign   /store', [TrnAssetController::class, 'assign'])-> name('assign');
});

//Log
Route::prefix('Log')->name('Log.')->group(function(){
    Route::get('/', [LogController::class, 'index'])->name('index');
});

//Detail Asset
Route::prefix('detailAsset')->name('detailAsset.')->group(function(){
    Route::get('/Laptop/{assetcode}', [TrnAssetController::class, 'show'])->name('laptop');
    Route::get('/mobile/{assetcode}', [TrnAssetController::class, 'show'])->name('mobile');
    Route::get('/others/{assetcode}', [TrnAssetController::class, 'show'])->name('others');
    // Route::get('Laptop/{assetcode}', [MaintenanceController::class, 'sidebar'])->name('laptop'); //return view with all of the data.
 
    //Post Image 
    Route::get('/Laptop/{assetcode}/Image', [TrnDtlPictureController::class, 'index'])->name('image'); //get image form
    Route::get('/Laptop/{assetcode}/Image/Update', [TrnDtlPictureController::class, 'indexUpdate'])->name('update.image'); //get image form
    Route::post('Laptop/Image/store', [TrnDtlPictureController::class, 'store'])->name('image.store'); //submit image data 
    Route::put('Laptop/Image/update/{assetcode}', [TrnDtlPictureController::class, 'update'])->name('image.update'); //submit image data 

    //Post Software
    Route::get('/Laptop/{assetcode}/Software', [SoftwareController::class, 'create'])->name('software');
    Route::post('/Laptop/{assetcode}/Software', [SoftwareController::class, 'store'])->name('software.store');

});

//Maintenance
Route::prefix('maintenance')->name('maintenance.')->group(function(){
    Route::get('/', [MaintenanceController::class, 'indexz'])->name('index');
    Route::get('/create/{assetcode}', [MaintenanceController::class, 'index'])->name('create');
    Route::post('/store/{assetcode}', [MaintenanceController::class, 'store'])->name('store');
});

Route::prefix('software')->name('software.')->group(function(){
    Route::get('/', [SoftwareController::class, 'index'])->name('index');
    Route::get('/store', [SoftwareController::class, 'create'])->name('create');
    Route::put('/{id}', [SoftwareController::class, 'delete'])->name('delete');

});

Route::get('/software/create', [SoftwareController::class, 'store'])->name('software.create');

//Hardware
Route::get('hardware/', [HardwareController::class, 'store']); // Get a specific hardware