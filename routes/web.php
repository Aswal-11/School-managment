<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('welcome'); // Show Welcome Page Content in Dashboard
})->middleware(['auth'])->name('dashboard'); // Add .name('dashboard')


Route::middleware('auth')->group(function () {
    Route::get('/', function () { return view('welcome'); });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Teacher Related routes
    Route::get('/teachers/index', [TeacherController::class, 'index'])->name('teachers.index');
    Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
    Route::post('/teachers/store', [TeacherController::class, 'store'])->name('teachers.store');
    Route::get('/teachers/{teacher}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
    Route::patch('/teachers/{teacher}/update', [TeacherController::class, 'update'])->name('teachers.update');
    Route::delete('/teachers/{id}/delete', [TeacherController::class, 'destroy'])->name('teachers.destroy');

    //Students Related routes
    Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create');
    Route::post('/students/store', [StudentsController::class, 'store'])->name('students.store');
    Route::get('/students/index', [StudentsController::class, 'index'])->name('students.index');
    Route::get('/students/{student}/edit', [StudentsController::class, 'edit'])->name('students.edit');
    Route::patch('/students/{student}/update', [StudentsController::class, 'update'])->name('students.update');
    Route::delete('/students/delete/{id}', [StudentsController::class, 'destroy'])->name('students.destroy');

});

require __DIR__ . '/auth.php';
