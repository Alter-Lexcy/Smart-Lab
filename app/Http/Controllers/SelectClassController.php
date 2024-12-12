<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class SelectClassController extends Controller
{
    public function index()
    {
        $kelas10 = Classes::where('name_class', 'Like', '10-%')->orderBy('name_class', 'ASC')->get();
        $kelas11 = Classes::where('name_class', 'Like', '11-%')->orderBy('name_class', 'ASC')->get();
        $kelas12 = Classes::where('name_class', 'Like', '12-%')->orderBy('name_class', 'ASC')->get();

        return view('Users.kelas', compact('kelas10', 'kelas11', 'kelas12'));
    }
}
