<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;

Auth::routes();


Route::middleware('auth')->group(function () {
    Route::post('register-murid', [RegisterController::class, 'registerMurid'])->name('register_murid');
    Route::post('register-guru', [RegisterController::class, 'registerGuru'])->name('register_guru');
});

Route::middleware('auth')->group(function(){

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::resource('materis',MateriController::class);
    Route::resource('subjects',SubjectController::class);
    Route::resource('classes', ClassesController::class);
    Route::resource('tasks', TaskController::class);
    Route::resource('assessments', AssessmentController::class);
    Route::resource('comments', CommentController::class);

    Route::resource('teachers', TeacherController::class);
    Route::get('/Students',[StudentController::class,'User'])->name('Students');

    Route::get('/guru',function(){
        return view('Guru.index');
    });
});
Route::middleware(['auth', 'check.approval'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/approval-pending', function () {return view('approval.pending');})->name('approval.pending');
});

