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
    public function index(Request $request)
    {
        $user = auth()->user();
        $search = $request->input('search');

        $assessments = Assessment::with(['user', 'collection.task'])
            ->whereHas('collection.task', function ($query) use ($user) {
                $query->where('user_id', $user->id); 
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
            ->simplePaginate(5);

        // Ambil semua tugas milik user yang sedang login
        $tasks = Task::where('user_id', $user->id)->get();

        return view('Guru.Assesments.index', compact('assessments', 'tasks'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $taskId)
    {
        $request->validate([
            'user_id' => 'required|array',
            'user_id.*' => 'exists:users,id',
            'mark_task' => 'required|numeric|min:0|max:100',
        ]);

        foreach ($request->user_id as $studentId) {
            Assessment::updateOrCreate(
                [
                    'user_id' => $studentId,
                    'collection_id' => $taskId,
                ],
                [
                    'status' => 'Sudah Di-nilai',
                    'mark_task' => $request->mark_task,
                ]
            );
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
