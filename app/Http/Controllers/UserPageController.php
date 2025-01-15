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
        // Ambil ID kelas yang dimiliki oleh user
        $kelasIds = $user->class->pluck('id');

        // Ambil mata pelajaran dan guru yang mengajar berdasarkan kelas user
        $subjects = Subject::withCount([
            'materi' => function ($query) use ($kelasIds) {
                $query->whereHas('classes', function ($q) use ($kelasIds) {
                    $q->whereIn('classes.id', $kelasIds);
                }); // Filter berdasarkan kelas user
            },
            'Task as task_count' => function ($query) use ($user) {
                $query->whereHas('collections', function ($subQuery) use ($user) {
                    $subQuery->where('user_id', $user->id)
                        ->where('status', 'Belum mengumpulkan'); // Hitung tugas belum dikumpulkan
                });
            },
            'user' => function ($query) use ($kelasIds) {
                // Mengambil guru yang mengajar di kelas yang dimiliki oleh user
                $query->whereHas('class', function ($q) use ($kelasIds) {
                    $q->whereIn('classes.id', $kelasIds);
                });
            }
        ])->paginate(6);

        // Mengirim data subjects ke view
        return view('Siswa.mapel', compact('subjects'));
    }


    public function showMateri(Request $request, $materi_id)
    {
        $user = auth()->user();
        $order = $request->input('order', 'desc');
        $search = $request->input('search');
        $activeTab = $request->input('tab', 'materis'); // Default tab adalah "materis"
        $kelasID = $user->class->pluck('id');

        // Query Materi
        $materis = Materi::whereHas('classes', function ($query) use ($kelasID) {
            $query->whereIn('class_id', $kelasID);
        })
            ->with('subject', 'classes')
            ->where('subject_id', $materi_id)
            ->where('title_materi', 'like', '%' . $search . '%')
            ->orderBy('created_at', $order)
            ->paginate(5);

        // Query Task
        $tasks = Task::with(['collections' => function ($query) {
            $query->select('task_id', 'status');
        }])
            ->whereIn('class_id', $kelasID)
            ->where('subject_id', $materi_id)
            ->where('title_task', 'like', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        if ($kelasID->isEmpty()) {
            return redirect()->back()->with('error', 'Materi tidak ditemukan.');
        }

        $subjectName = $materis->first()->subject->name_subject ?? 'Tidak Ada Data';

        return view('Siswa.materi', compact('materis', 'tasks', 'subjectName', 'materi_id', 'activeTab'));
    }



    public function showTask(Request $request)
    {
        $user = auth()->user();
        $search = $request->input('search');
        $status = $request->input('status'); // Ambil nilai status dari query string

        $kelasId = $user->class->pluck('id');
        $tasksQuery = Task::select('tasks.*', 'collections.status as collection_status')
            ->with(['collections' => function ($query) {
                $query->where('user_id', Auth::id());
            }])
            ->leftJoin('collections', function ($join) {
                $join->on('tasks.id', '=', 'collections.task_id')
                    ->where('collections.user_id', '=', Auth::id());
            })
            ->whereHas('Classes', function ($query) use ($kelasId) {
                $query->whereIn('id', $kelasId);
            })
            ->where(function ($query) use ($search) {
                // Memperbaiki pencarian agar lebih terstruktur
                $query->where('title_task', 'like', '%' . $search . '%')
                    ->orWhereHas('Subject', function ($q) use ($search) {
                        $q->where('name_subject', 'like', '%' . $search . '%');
                    });
            })
            ->orderByRaw("FIELD(collections.status, 'Belum mengumpulkan', 'Sudah mengumpulkan', 'Tidak mengumpulkan') ASC");

        if ($status) {
            $tasksQuery->whereHas('collections', function ($query) use ($status) {
                $query->where('user_id', Auth::id());
                if ($status == 'Sudah mengumpulkan') {
                    $query->where('status', 'Sudah mengumpulkan');
                } elseif ($status == 'Belum mengumpulkan') {
                    $query->whereNotIn('status', ['Sudah mengumpulkan', 'Tidak mengumpulkan']);
                } elseif ($status == 'Tidak mengumpulkan') {
                    $query->where('status', 'Tidak mengumpulkan');
                }
            });
        }

        // Menampilkan hasil query dengan pagination
        $tasks = $tasksQuery->paginate(5);
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
