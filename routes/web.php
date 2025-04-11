<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TalkController;
use App\Http\Controllers\SyncController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Jetstream Dashboard (default)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// HomeController route to redirect based on user role
Route::get('/home', HomeController::class)->middleware(['auth', 'verified']);

// Admin and Student Dashboards
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');

});

// Student CRUD routes
Route::middleware(['auth'])->group(function () {
    Route::get('/student', [StudentController::class, 'index'])->name('student.index');
    Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
    Route::post('/student', [StudentController::class, 'store'])->name('student.store');
    Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
});

// Talk Routes
Route::get('/talks', [TalkController::class, 'index'])->name('talk.index');
Route::get('/talks/create', [TalkController::class, 'create'])->name('talk.create');
Route::post('/talks', [TalkController::class, 'store'])->name('talk.store');
Route::get('/talks/{id}/edit', [TalkController::class, 'edit'])->name('talk.edit');
Route::put('/talks/{id}', [TalkController::class, 'update'])->name('talk.update');
Route::delete('/talks/{id}', [TalkController::class, 'destroy'])->name('talk.destroy');

// web.php
Route::get('/admin/students', [StudentController::class, 'index'])->name('student.index');

Route::post('/sync-main-to-local', [SyncController::class, 'getFromMainDB'])->name('sync.main');

Route::get('/check-mysql2', function () {
    try {
        DB::connection('mysql2')->getPdo(); // Attempt to get PDO connection
        return "✅ Connected to mysql2 successfully.";
    } catch (\Exception $e) {
        return "❌ Could not connect to mysql2: " . $e->getMessage();
    }
});

Route::get('/check-main-data', function () {
    $students = DB::connection('mysql2')->table('master_student')->get();
    return $students->count() . " records found.";
});
