<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Subject;
use Illuminate\Http\Request;

class UserPageController extends Controller
{
    public function showSubject()
    {
        // Ambil user yang sedang login
        $user = auth()->user();

        $kelasIds = $user->classes->pluck('id');
        $subjects = Subject::withCount(['materi' => function ($query) use ($kelasIds) {
            $query->whereIn('classes_id', $kelasIds); // Menggunakan whereIn untuk banyak kelas
        }])->simplePaginate(5);
        return view('Siswa.mapel', compact('subjects'));
    }

    public function showMateri($materi_id)
    {
        $user = auth()->user();
        $kelasID = $user->classes->pluck('id');
        $materis = Materi::whereIn('classes_id', $kelasID)
            ->where('subject_id', $materi_id) 
            ->with('subject', 'Classes')     
            ->simplePaginate(5);          

        return view('Siswa.materi', compact('materis'));
    }
}
