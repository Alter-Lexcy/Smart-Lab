<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Materi;
use App\Models\Subject;
use App\Models\Collection;
use App\Models\User;
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
        }])->simplePaginate(6);
        return view('Siswa.mapel', compact('subjects'));
    }

    public function showMateri(Request $request, $materi_id)
    {
        $user = auth()->user();
        $order = $request->input('order', 'desc');
        $search = $request->input('search');
        $kelasID = $user->classes->pluck('id');
        $materis = Materi::whereIn('classes_id', $kelasID)
            ->with('subject', 'Classes')
            ->where('subject_id', $materi_id)
            ->where('title_materi', 'like', '%' . $search . '%')
            ->orderBy('created_at',$order)
            ->simplePaginate(5);

        // Jika tidak ada materi ditemukan
        if ($materis->isEmpty()) {
            return redirect()->back()->with('error', 'Materi tidak ditemukan.');
        }

        $subjectName = $materis->first()->subject->name_subject ?? 'Tidak Ada Data';

        return view('Siswa.materi', compact('materis', 'subjectName', 'materi_id'));
    }


    public function showTask(Request $request)
    {
        $user = auth()->user();
        $search = $request->input('search');
        if (!$user->classes()->exists()) {
            return view('Siswa.tugas', [
                'tasks' => collect(),
                'collections' => collect()
            ]);
        }
        $kelasId = $user->classes->pluck('id');
        $tasks = Task::with(['collections' => function ($query) {
            $query->where('user_id', Auth::id());
        }])
            ->whereHas('Classes', function ($query) use ($kelasId) {
                $query->whereIn('id', $kelasId);
            })
            ->where('title_task', 'Like', '%' . $search . '%')
            ->simplePaginate(5);
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

    public function Dashboard()
    {
        $user = auth()->user();
        if ($user && $user->class) {
            $class = $user->class;
        } else {
            $class = collect();
        }

        $countNotCollected = Collection::where('status', 'Belum mengumpulkan')->where('user_id', $user->id)->count();
        $countCollected = Collection::where('status', 'Sudah mengumpulkan')->where('user_id', $user->id)->count();
        return view('Siswa.dashboard', compact('class', 'countNotCollected', 'countCollected'));
    }
}
