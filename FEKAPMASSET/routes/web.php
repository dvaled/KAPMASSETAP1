<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\API\TypeController;

Route::middleware('api')->group(function () {
    Route::get('types', [TypeController::class, 'index']); // Get all types
    Route::get('types/{id}', [TypeController::class, 'show']); // Get a specific type
    Route::post('types', [TypeController::class, 'store']); // Create a new type
    Route::put('types/{id}', [TypeController::class, 'update']); // Update a type
    Route::delete('types/{id}', [TypeController::class, 'destroy']); // Delete a type
});


Route::get('/', function () {
    return view('welcome');
});