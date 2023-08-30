<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SessionController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// // Routes for Courses
// Route::get('/courses', [CourseController::class, 'index']);
// Route::get('/courses/{id}', [CourseController::class, 'show']);
// Route::post('/courses', [CourseController::class, 'store']);
// Route::put('/courses/{id}', [CourseController::class, 'update']);
// Route::delete('/courses/{id}', [CourseController::class, 'destroy']);

// // Routes for Teachers
// Route::post('/teachers', [TeacherController::class, 'store']);
// Route::put('/teachers/{id}', [TeacherController::class, 'update']);
// Route::delete('/teachers/{id}', [TeacherController::class, 'destroy']);

// // Routes for Sessions
// Route::post('/sessions', [SessionController::class, 'store']);
// Route::put('/sessions/{id}', [SessionController::class, 'update']);
// Route::delete('/sessions/{id}', [SessionController::class, 'destroy']);
