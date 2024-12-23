<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\TeacherClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeguruController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    $teacherClasses = TeacherClass::where('user_id', auth()->id())->get();

    $students = [];

    foreach ($teacherClasses as $teacherClass) {
        // Periksa apakah pagination dilakukan dengan benar untuk setiap kelas
        $students[$teacherClass->class->id] = $teacherClass->class->users()->paginate(2);
    }

    return view('Guru.dashboardGuru', compact('teacherClasses', 'students'));
}



}
