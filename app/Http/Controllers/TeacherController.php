<?php

namespace App\Http\Controllers;

use App\Models\User;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = \App\Models\User::role('Guru') // Ambil user dengan role Guru
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', 'Admin'); // Kecualikan user dengan role Admin
            })
            ->get();

        return view('Admins.Teachers.index', compact('teachers'));
    }



    /**
     * Show the form for creating a new resource.
     */

}
