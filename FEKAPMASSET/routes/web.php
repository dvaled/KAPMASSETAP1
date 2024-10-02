<?php

use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

Route::resource('types', TypeController::class);