<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\TeacherClass;
use App\Models\User;
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
            // Mengurutkan siswa berdasarkan nama dan melakukan pagination
            $students[$teacherClass->class->id] = $teacherClass->class->users()->orderBy('name')->paginate(10);
        }

        return view('Guru.dashboardGuru', compact('teacherClasses', 'students'));
    }

    public function getClassDetails(Request $request, $classId)
    {
        $class = Classes::find($classId);

        if (!$class) {
            return response()->json(['message' => 'Kelas tidak ditemukan'], 404);
        }

        $students = $class->users()->get();

        if ($request->ajax()) {
            return view('partials.studentList', compact('students'))->render();
        }

        return response()->json(['message' => 'Permintaan tidak valid'], 400);
    }


}
