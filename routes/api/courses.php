<?php

use App\Http\Controllers\api\CourseController;
use Illuminate\Support\Facades\Route;


Route::get('/courses', [CourseController::class, 'index']);
