<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Materi;
use App\Models\Subject;
use App\Models\Task;
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

    public function showTask(){
        $user = auth()->user();
        $kelasId = $user->classes->pluck('id');
        $collections = Collection::all();
        $tasks = Task::with('collections')->whereIn('class_id', $kelasId)->simplePaginate(5);

        return view('Siswa.tugas',compact('tasks','collections'));
    }
}
