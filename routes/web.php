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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::resource('Teacher', TeacherController::class);
    Route::resource('Class', ClassesController::class);
    Route::resource('Modul', ModulController::class);
    Route::resource('Task', TaskController::class);
    Route::resource('Collection', CollectionController::class);
    Route::resource('Assessment', AssessmentController::class);
    Route::resource('Comment', CommentController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
