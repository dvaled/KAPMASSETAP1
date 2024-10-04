<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\SoftwareController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HardwareController;
use App\Http\Controllers\Api\MasterController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

// Master routes
Route::get('/master', [MasterController::class, 'getMaster'])->name('master.index');
Route::get('/master/{id}', [MasterController::class, 'show'])->name('master.show');
Route::post('/master', [MasterController::class, 'store'])->name('master.create');
Route::put('/master/{id}', [MasterController::class, 'update'])->name('master.update');
Route::delete('/master/{id}', [MasterController::class, 'destroy'])->name('master.destroy');

// Software routes
Route::get('/software', [SoftwareController::class, 'index'])->name('software.index');
Route::get('/software/{id}', [SoftwareController::class, 'show'])->name('software.show');
Route::post('/software', [SoftwareController::class, 'store'])->name('software.store');
Route::put('/software/{id}', [SoftwareController::class, 'update'])->name('software.update');
Route::delete('/software/{id}', [SoftwareController::class, 'destroy'])->name('software.destroy');

// Maintenance routes
Route::get('/maintenance', [MaintenanceController::class, 'index'])->name('maintenance.index');
Route::get('/maintenance/{id}', [MaintenanceController::class, 'show'])->name('maintenance.show');
Route::post('/maintenance', [MaintenanceController::class, 'store'])->name('maintenance.store');
Route::put('/maintenance/{id}', [MaintenanceController::class, 'update'])->name('maintenance.update');
Route::delete('/maintenance/{id}', [MaintenanceController::class, 'destroy'])->name('maintenance.destroy');

// History routes
Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
Route::get('/history/{id}', [HistoryController::class, 'show'])->name('history.show');
Route::post('/history', [HistoryController::class, 'store'])->name('history.create');
Route::put('/history/{id}', [HistoryController::class, 'update'])->name('history.update');
Route::delete('/history/{id}', [HistoryController::class, 'destroy'])->name('history.destroy');

// Log routes
Route::get('/log', [LogController::class, 'index'])->name('log.index');
Route::get('/log/{id}', [LogController::class, 'show'])->name('log.show');
Route::post('/log', [LogController::class, 'store'])->name('log.store');
Route::put('/log/{id}', [LogController::class, 'update'])->name('log.update');
Route::delete('/log/{id}', [LogController::class, 'destroy'])->name('log.destroy');

// Employee routes
Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employee/{id}', [EmployeeController::class, 'show'])->name('employee.show');
Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store');
Route::put('/employee/{id}', [EmployeeController::class, 'update'])->name('employee.update');
Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');

// Auth routes
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

//Hardware routes
Route::get('/hardware', [HardwareController::class, 'index'])->name('hardware.index');
Route::get('/hardware/{id}', [HardwareController::class, 'show'])->name('hardware.show');
Route::post('hardware', [HardwareController::class, 'store'])->name('hardware.store');
Route::put('/hardware/{id}', [HardwareController::class, 'update'])->name('hardware.update');
Route::delete('/hardware/{id}', [HardwareController::class, 'destroy'])->name('hardware.destroy');