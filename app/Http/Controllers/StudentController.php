<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function User()
    {
        $students = \App\Models\User::role('Murid') // Hanya ambil user dengan role Murid
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', '!=', 'Murid'); // Pastikan tidak memiliki role lain
            })->get();

            $classes = Classes::all();
        return view('Admins.Students.index', compact('students','classes'));

    }
}
