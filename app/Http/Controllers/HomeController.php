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
        // Buat hitung jumlah total Murid
        $totalMurid = User::whereHas('roles', function ($query) {
            $query->where('name', 'Murid');
        })
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', '<>', 'Murid');
            })
            ->count();

        // Buat Hitung JUmlah total Guru
        $totalguru = User::whereHas('roles', function ($query) {
            $query->where('name', 'Guru');
        })->whereDoesntHave('roles', function ($query) {
            $query->where('name', 'Admin');
        })->count();

        // Buat hitung Guru yang sudah di Assign
        $assignCount = User::role('Guru')
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', 'Admin');
            })
            ->whereNotNull('subject_id')
            ->whereHas('classess')
            ->count();

        // Buat Hitung Guru yang belum di Assign
        $notAssignCount = User::role('Guru')
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', 'Admin');
            })
            ->where(function ($query) {
                $query->whereNull('subject_id')->orWhereDoesntHave('classess');
            })
            ->count();

        // Jumlah Murid pertahun
        $muridPerTahun = User::selectRaw('YEAR(created_at) as year, COUNT(*) as total')->whereHas('roles',function($query){
            $query->where('name','Murid');
        })->groupBy('year')->orderBy('year')->get();

        $totals = $muridPerTahun->pluck('total')->toArray();

        return view('Admins.dashboardAdmin', compact(
            'totalMurid', 'totalguru','assignCount','notAssignCount','totals'));
    }
}
