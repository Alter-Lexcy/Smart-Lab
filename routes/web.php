<?php

use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    // Rute lainnya...
    Route::resource('teachers', TeacherController::class);
    Route::resource('classes', ClassesController::class);
    Route::resource('moduls', ModulController::class);
    Route::resource('tasks', TaskController::class);
    Route::resource('collections', CollectionController::class);
    Route::resource('assesments', AssessmentController::class);
    Route::resource('comments', CommentController::class);
});
