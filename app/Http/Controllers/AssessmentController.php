<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Collection;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $task)
    {
        $user = auth()->user();
        $search = $request->input('search');

        // Ubah $task menjadi model
        $task = Task::findOrFail($task);

        $assessments = Assessment::with(['user', 'collection.task'])
            ->select(
                'assessments.*',
                'assessments.status as assessments_status',
                'collections.status as collections_status'
            )
            ->whereHas('collection.task', function ($query) use ($user, $task) {
                $query->where('user_id', $user->id)
                    ->where('id', $task->id);
            })
            ->whereHas('collection', function ($query) {
                $query->where('status', 'Sudah mengumpulkan');
            })
            ->where(function ($query) use ($search) {
                $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                })
                    ->orWhereHas('collection.task', function ($q) use ($search) {
                        $q->where('title_task', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('user.classes', function ($q) use ($search) {
                        $q->where('name_class', 'like', '%' . $search . '%');
                    });
            })
            ->join('users', 'user_id', '=', 'users.id')
            ->join('collections', 'assessments.collection_id', '=', 'collections.id')
            ->orderByRaw("FIELD(collections.status, 'Belum Di-nilai', 'Sudah Di-nilai') ASC")
            ->orderBy('users.name', 'asc')
            ->paginate(5);

        $tasks = Task::where('user_id', $user->id)->get();

        $countSiswa = User::whereHas('roles', function ($query) {
            $query->where('roles.name', 'Murid');
        })
            ->whereHas('class', function ($query) use ($task) {
                $query->where('classes.id', $task->class_id); // Spesifikkan tabel dengan menambahkan alias `classes.id`
            })
            ->count();

        $countCollection = User::whereHas('roles', function ($query) {
            $query->where('roles.name', 'Murid'); // Pastikan hanya menghitung siswa
        })
            ->whereHas('class', function ($query) use ($task) {
                $query->where('classes.id', $task->class_id); // Sesuaikan dengan kelas tugas
            })
            ->whereHas('collections', function ($query) use ($task) {
                $query->where('task_id', $task->id) // Pastikan tidak memiliki tugas yang dimaksud
                    ->where('status', 'Sudah mengumpulkan'); // Pastikan status 'belum mengumpulkan'
            })
            ->count();
        return view('Guru.Assesments.index', compact('assessments', 'tasks', 'task', 'countSiswa', 'countCollection'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $taskId)
    {
        // Validasi mark_task untuk setiap item dalam array
        $request->validate([
            'mark_task.*' => 'required|min:0|max:100', // Validasi setiap nilai dalam array
        ], [
            'mark_task.*.required' => 'Nilai tidak boleh kosong.',
            'mark_task.*.min' => 'Nilai harus di atas atau sama dengan 0.',
            'mark_task.*.max' => 'Nilai harus di bawah atau sama dengan 100.',
        ]);

        foreach ($request->mark_task as $userId => $collections) {
            foreach ($collections as $collectionId => $mark) {
                // Lakukan update atau create berdasarkan user_id dan collection_id
                Assessment::updateOrCreate(
                    [
                        'user_id' => $userId,
                        'collection_id' => $collectionId,
                    ],
                    [
                        'mark_task' => $mark,
                        'status' => 'Sudah Di-nilai',
                    ]
                );
            }
        }
        return redirect()->back()->with('success', 'Penilaian berhasil disimpan.');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data
        $validated = $request->validate([
            'mark_task' => 'required|numeric|min:0|max:100',
        ]);

        // Cari penilaian berdasarkan ID dan perbarui
        $assessment = Assessment::findOrFail($id);
        $assessment->update($validated);

        return redirect()->route('assessments.index')->with('success', 'Penilaian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Hapus penilaian berdasarkan ID
            $assessment = Assessment::findOrFail($id);
            $assessment->delete();

            return redirect()->route('assessments.index')->with('success', 'Penilaian berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('assessments.index')->with('error', 'Gagal menghapus penilaian. Data masih dibutuhkan.');
        }
    }

    /**
     * Menampilkan siswa yang sudah mengumpulkan tugas.
     */
    public function showCollectionsByTask($taskId)
    {
        $user = auth()->user(); // Ambil pengguna yang sedang login

        // Ambil koleksi tugas berdasarkan ID tugas yang dikumpulkan siswa
        $collections = Collection::where('task_id', $taskId)
            ->where('status', 'Sudah mengumpulkan')
            ->with('user')
            ->get();

        // Tampilkan halaman khusus guru untuk menilai tugas
        if ($user->hasRole('Guru')) {
            return view('Guru.Assesments.Collections', compact('collections'));
        } else {
            abort(403, 'Unauthorized');
        }
    }
}
