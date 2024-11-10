<?php

use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/', function () {
        return view('home');
    });
    Route::resource('teachers', TeacherController::class);
    Route::resource('classes', ClassesController::class);
    Route::resource('moduls', ModulController::class);
    Route::resource('tasks', TaskController::class);
    Route::resource('collections', CollectionController::class);
    Route::resource('assesments', AssessmentController::class);
    Route::resource('comments', CommentController::class);
});
