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

route::middleware('auth')->group(function(){
    route::resource([
        'Teacher'=>TeacherController::class,
        'Class'=>ClassesController::class,
        'Modul'=>ModulController::class,
        'Task'=>TaskController::class,
        'Collection'=>CollectionController::class,
        'Assessment'=>AssessmentController::class,
        'Comment'=>CommentController::class
    ]);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
