<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\CourseController;

Route::get('/', function () {
    return view('dashboard');
});

// Teachers
Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');

// Apprentices
Route::get('/apprentices', [ApprenticeController::class, 'index'])->name('apprentices.index');
Route::get('/apprentices/create', [ApprenticeController::class, 'create'])->name('apprentices.create');
Route::post('/apprentices', [ApprenticeController::class, 'store'])->name('apprentices.store');

// Areas
Route::get('/areas', [AreaController::class, 'index'])->name('areas.index');
Route::get('/areas/create', [AreaController::class, 'create'])->name('areas.create');
Route::post('/areas', [AreaController::class, 'store'])->name('areas.store');

// Training Centers
Route::get('/training_centers', [TrainingCenterController::class, 'index'])->name('training_centers.index');
Route::get('/training_centers/create', [TrainingCenterController::class, 'create'])->name('training_centers.create');
Route::post('/training_centers', [TrainingCenterController::class, 'store'])->name('training_centers.store');

// Computers
Route::get('/computers', [ComputerController::class, 'index'])->name('computers.index');
Route::get('/computers/create', [ComputerController::class, 'create'])->name('computers.create');
Route::post('/computers', [ComputerController::class, 'store'])->name('computers.store');

// Courses
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
