<?php

use App\Http\Controllers\api\CourseController;
use Illuminate\Support\Facades\Route;


Route::get('/courses', [CourseController::class, 'index']);
Route::post('/courses', [CourseController::class, 'store']);
Route::get('/courses/{id}', [CourseController::class, 'show']);
Route::delete('/courses/{id}', [CourseController::class, 'delete']);


