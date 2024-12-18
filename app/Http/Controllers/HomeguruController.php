<?php

namespace App\Http\Controllers;

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
        $teacherId = Auth::id();
    
        // Mengambil data kelas beserta relasi yang diperlukan
        $teacherClasses = TeacherClass::with('class.users') // Pastikan properti 'class.users' ter-load
            ->where('user_id', $teacherId)
            ->paginate(6); // Gunakan paginate tanpa get()
    
        return view('Guru.dashboardGuru', compact('teacherClasses'));
    }     
}
