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
Route::put('/teachers/{id}', [TeacherController::class, 'update'])->name('teachers.update');
Route::delete('/teachers/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');

// Apprentices
Route::get('/apprentices', [ApprenticeController::class, 'index'])->name('apprentices.index');
Route::get('/apprentices/create', [ApprenticeController::class, 'create'])->name('apprentices.create');
Route::post('/apprentices', [ApprenticeController::class, 'store'])->name('apprentices.store');
Route::put('/apprentices/{id}', [ApprenticeController::class, 'update'])->name('apprentices.update');
Route::delete('/apprentices/{id}', [ApprenticeController::class, 'destroy'])->name('apprentices.destroy');

// Areas
Route::get('/areas', [AreaController::class, 'index'])->name('areas.index');
Route::get('/areas/create', [AreaController::class, 'create'])->name('areas.create');
Route::post('/areas', [AreaController::class, 'store'])->name('areas.store');
Route::put('/areas/{id}', [AreaController::class, 'update'])->name('areas.update');
Route::delete('/areas/{id}', [AreaController::class, 'destroy'])->name('areas.destroy');


// Training Centers
Route::get('/training_centers', [TrainingCenterController::class, 'index'])->name('training_centers.index');
Route::get('/training_centers/create', [TrainingCenterController::class, 'create'])->name('training_centers.create');
Route::post('/training_centers', [TrainingCenterController::class, 'store'])->name('training_centers.store');
Route::put('/training_centers/{id}', [TrainingCenterController::class, 'update'])->name('training_centers.update');
Route::delete('/training_centers/{id}', [TrainingCenterController::class, 'destroy'])->name('training_centers.destroy');

// Computers
Route::get('/computers', [ComputerController::class, 'index'])->name('computers.index');
Route::get('/computers/create', [ComputerController::class, 'create'])->name('computers.create');
Route::post('/computers', [ComputerController::class, 'store'])->name('computers.store');
Route::put('/computers/{id}', [ComputerController::class, 'update'])->name('computers.update');
Route::delete('/computers/{id}', [ComputerController::class, 'destroy'])->name('computers.destroy');

// Courses
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');
