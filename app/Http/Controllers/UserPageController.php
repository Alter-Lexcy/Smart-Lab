<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Materi;
use App\Models\Subject;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function showTask()
    {
        $user = auth()->user();
        if (!$user->classes()->exists()) {
            return view('Siswa.tugas', ['tasks' => collect(), 'collections' => collect()]);
        }
        $kelasId = $user->classes->pluck('id');
        $tasks = Task::with(['collections' => function ($query) {
            $query->where('user_id', Auth::id());
        }])->simplePaginate(5);


        $this->updateTaskStatus();

        return view('Siswa.tugas', compact('tasks'));
    }

    private function updateTaskStatus()
    {
        $now = now();

        // Perbarui status jika sudah melewati deadline
        $collections = Collection::whereHas('task', function ($query) use ($now) {
            $query->where('date_collection', '<', $now);
        })->where('status', '!=', 'Tidak mengumpulkan')->get();

        foreach ($collections as $collection) {
            $collection->update(['status' => 'Tidak mengumpulkan']);
        }
    }
}
