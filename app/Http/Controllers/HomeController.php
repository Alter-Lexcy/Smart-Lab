<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        $totalMurid = User::whereHas('roles', function ($query) {
            $query->where('name', 'Murid');
        })
        ->whereDoesntHave('roles', function ($query) {
            $query->where('name', '<>', 'Murid');
        })
        ->count();

        $totalguru = User::whereHas('roles',function($query){
            $query->where('name','Guru');
        })->whereDoesntHave('roles',function($query){
            $query->where('name','Admin');
        })->count();
        return view('home.dashboardAdmin', compact('totalMurid','totalguru'));
    }
}
