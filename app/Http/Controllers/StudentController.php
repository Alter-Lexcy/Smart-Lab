<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function User(Request $request)
    {
        $search = $request->input('search');
        $students = User::role('Murid') // Hanya ambil user dengan role Murid
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', '!=', 'Murid'); // Pastikan tidak memiliki role lain
            })->where(function ($query) use($search){
                $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at','desc')->simplePaginate(5);

            $classes = Classes::all();
        return view('Admins.Students.index', compact('students','classes'));
    }
}
