<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SessionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layout');
});

// Routes for Courses
Route::get('/co/{id}/s', [SessionController::class, 'showCourseSessions']);

Route::get('/', [CourseController::class, 'index']);
Route::get('/co/{id}', [CourseController::class, 'show']);
Route::get('/co/{id}/std', [CourseController::class, 'showCourseStudents']);


//Route::get('/courses/{id}/nt', [CourseController::class, 'Tshow']);
Route::get('/courses/{id}/se', [CourseController::class, 'getSessionsForCourseId']);

Route::post('/courses', [CourseController::class, 'store']);
Route::put('/courses/{id}/up', [CourseController::class, 'update']);
Route::delete('/courses/{id}/de', [CourseController::class, 'destroy']);

// Routes for Teachers
Route::get('/teachers', [TeacherController::class, 'index']);
Route::get('/teachers/{id}', [TeacherController::class, 'show']);
Route::delete('/teachers/{id}', [TeacherController::class, 'destroy']);

// Routes for Sessions
Route::post('/sessions', [SessionController::class, 'store']);
Route::put('/sessions/{id}', [SessionController::class, 'update']);
Route::delete('/sessions/{id}', [SessionController::class, 'destroy']);