<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReceptionController;
use Illuminate\Support\Facades\Route;

Route::resource('/products', ProductController::class);
Route::resource('/receptions', ReceptionController::class);
