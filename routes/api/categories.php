<?php

use App\Http\Controllers\api\CategoryController;
use Illuminate\Support\Facades\Route;


Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);