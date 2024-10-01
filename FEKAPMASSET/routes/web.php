<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TypeController;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\HardwareController;
use App\Http\Controllers\API\HistoryController;
use App\Http\Controllers\API\LogController;
use App\Http\Controllers\API\MaintenanceController;
use App\Http\Controllers\API\SoftwareController;

Route::middleware('api')->group(function () {
    Route::get('types', [TypeController::class, 'index']); // Get all types
    Route::get('types/{id}', [TypeController::class, 'show']); // Get a specific type
    Route::post('types', [TypeController::class, 'store']); // Create a new type
    Route::put('types/{id}', [TypeController::class, 'update']); // Update a type
    Route::delete('types/{id}', [TypeController::class, 'destroy']); // Delete a type
});


Route::middleware('api')->group(function () {
    Route::get('employees', [EmployeeController::class, 'index']); // Get all employees
    Route::get('employees/{id}', [EmployeeController::class, 'show']); // Get a specific employee
    Route::post('employees', [EmployeeController::class, 'store']); // Create a new employee
    Route::put('employees/{id}', [EmployeeController::class, 'update']); // Update an employee
    Route::delete('employees/{id}', [EmployeeController::class, 'destroy']); // Delete an employee
});

Route::middleware('api')->group(function () {
    Route::get('hardware', [HardwareController::class, 'index']); // Get all hardware
    Route::get('hardware/{id}', [HardwareController::class, 'show']); // Get a specific hardware
    Route::post('hardware', [HardwareController::class, 'store']); // Create a new hardware
    Route::put('hardware/{id}', [HardwareController::class, 'update']); // Update hardware details
    Route::delete('hardware/{id}', [HardwareController::class, 'destroy']); // Delete hardware
});

Route::middleware('api')->group(function () {
    Route::get('history', [HistoryController::class, 'index']); // Get all history records
    Route::get('history/{id}', [HistoryController::class, 'show']); // Get a specific history record
    Route::post('history', [HistoryController::class, 'store']); // Create a new history record
    Route::put('history/{id}', [HistoryController::class, 'update']); // Update history record details
    Route::delete('history/{id}', [HistoryController::class, 'destroy']); // Delete history record
});

Route::middleware('api')->group(function () {
    Route::get('logs', [LogController::class, 'index']); // Get all log records
    Route::get('logs/{id}', [LogController::class, 'show']); // Get a specific log record
    Route::post('logs', [LogController::class, 'store']); // Create a new log record
    Route::put('logs/{id}', [LogController::class, 'update']); // Update log record details
    Route::delete('logs/{id}', [LogController::class, 'destroy']); // Delete log record
});


Route::middleware('api')->group(function () {
    Route::get('maintenances', [MaintenanceController::class, 'index']); // Get all maintenance records
    Route::get('maintenances/{id}', [MaintenanceController::class, 'show']); // Get a specific maintenance record
    Route::post('maintenances', [MaintenanceController::class, 'store']); // Create a new maintenance record
    Route::put('maintenances/{id}', [MaintenanceController::class, 'update']); // Update maintenance record details
    Route::delete('maintenances/{id}', [MaintenanceController::class, 'destroy']); // Delete maintenance record
});


Route::middleware('api')->group(function () {
    Route::get('softwares', [SoftwareController::class, 'index']); // Get all software records
    Route::get('softwares/{id}', [SoftwareController::class, 'show']); // Get a specific software record
    Route::post('softwares', [SoftwareController::class, 'store']); // Create a new software record
    Route::put('softwares/{id}', [SoftwareController::class, 'update']); // Update software record details
    Route::delete('softwares/{id}', [SoftwareController::class, 'destroy']); // Delete software record
});


Route::get('/', function () {
    return view('welcome');
});