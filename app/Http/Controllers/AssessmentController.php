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
    public function index()
    {
        $user = auth()->user(); // Ambil pengguna yang sedang login

        // Ambil data penilaian dengan relasi ke collections, tasks, dan users
        $assessments = Assessment::with(['collection', 'collection.task', 'collection.user'])->get();

        // Ambil semua tugas
        $tasks = Task::all();

        // Ambil semua siswa yang terhubung ke tugas
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'Murid');
        })->get();

        // Halaman berdasarkan peran
        if ($user->hasRole('Admin')) {
            return view('Admins.Assesments.index', compact('assessments', 'tasks', 'users'));
        } elseif ($user->hasRole('Guru')) {
            return view('Guru.Assesments.index', compact('assessments', 'tasks', 'users',));
        } else {
            abort(403, 'Unauthorized');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'collection_id' => 'required|exists:collections,id',
            'mark_task' => 'required|numeric|min:0|max:100',
        ]);

        // Buat penilaian baru
        Assessment::create($validated);

        return redirect()->route('assessments.index')->with('success', 'Penilaian berhasil dibuat.');
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
