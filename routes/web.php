<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [UserController::class, 'registerHome'])->name('register.home');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('login', [UserController::class, 'loginHome'])->name('login.home');
Route::post('login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::post('/store', [UserController::class, 'register'])->name('store');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
    });
    Route::group(['prefix' => 'subject', 'as' => 'subject.'], function () {
        Route::post('/store', [SubjectController::class, 'store'])->name('store');
        Route::get('/get/subject/from/student/{id}', [SubjectController::class,'getSubjectsFromUser'])->name('getSubjectsFromUser');
        Route::get('/get/not/subject/from/student/{id}', [SubjectController::class,'getNotSubjectsFromUser'])->name('getNotSubjectsFromUser');
        // Route::put('/subject/{id}', [SubjectController::class, 'update'])->name('update');
        // Route::delete('/delete/{id}', [SubjectController::class, 'destroy'])->name('delete');
    });
    Route::group(['prefix' => 'mark', 'as' => 'mark.'], function () {
        Route::post('/store', [MarkController::class, 'store'])->name('store');
        Route::post('/add/student/to/subject',[MarkController::class, 'addStudentToSubject'])->name('addStudentToSubject');
        // Route::put('/mark/{id}', [MarkController::class, 'update'])->name('update');
        // Route::delete('/delete/{id}', [MarkController::class, 'destroy'])->name('delete');
    });
});
