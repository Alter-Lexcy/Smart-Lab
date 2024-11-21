<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\User;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = \App\Models\User::role('Guru')
        ->whereDoesntHave('roles', function ($query) {
            $query->where('name', 'Admin');
        })->get();
        return view('Admins.Teachers.index', compact('teachers'));
    }


}
