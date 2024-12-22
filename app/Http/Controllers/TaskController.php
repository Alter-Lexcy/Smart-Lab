<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Materi;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreTaskRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $order = $request->input('order', 'desc');

        // Ambil semua tugas dengan relasi Classes, Subject, Materi
        $tasks = Task::with('Classes', 'Subject', 'Materi')
            ->where('user_id', auth()->id())
            ->where(function ($query) use ($search) {
                $query->whereHas('Classes', function ($q) use ($search) {
                    $q->where('name_class', 'like', '%' . $search . '%');
                })
                    ->orWhereHas('Subject', function ($q) use ($search) {
                        $q->where('name_subject', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('Materi', function ($q) use ($search) {
                        $q->where('title_materi', 'like', '%' . $search . '%');
                    });
            })->orWhere('title_task', 'like', '%' . $search . '%')
            ->orderBy('created_at', $order)
            ->simplePaginate(5);

        $collections = Collection::with('user')
            ->get()
            ->groupBy('task_id');

        $classes = Classes::all();
        $subjects = Subject::all();
        $materis = Materi::all();
        $collections = Collection::all();

        return view('Guru.Tasks.index', compact('tasks', 'classes', 'subjects', 'materis', 'collections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    


    public function store(StoreTaskRequest $request)
    {
        $validated = $request->validated();

        // Proses upload file jika ada
        if ($request->hasFile('file_task')) {
            $file = $request->file('file_task')->store('file_task', 'public');
            $validated['file_task'] = $file;
        }

        // Ambil data Subject yang terkait dengan user yang sedang login
        $task = auth()->user()->Subject;

        // Simpan data tugas baru
        $tasks = Task::create([
            'class_id' => $validated['class_id'],
            'materi_id' => $validated['materi_id'],
            'title_task' => $validated['title_task'],
            'file_task' => $validated['file_task'] ?? null,
            'description_task' => $validated['description_task'],
            'date_collection' => $validated['date_collection'],
            'subject_id' => $task->id,
            'user_id' => auth()->id(),
        ]);

        $students = User::whereHas('class', function ($query) use ($tasks) {
            $query->where('classes.id', $tasks->class_id);
        })->get();

        foreach ($students as $student) {
            if (!$student->hasRole('Guru')) {
                $existingCollection = Collection::where('user_id', $student->id)
                    ->where('task_id', $tasks->id)
                    ->first();

                if (!$existingCollection) {
                    Collection::create([
                        'user_id' => $student->id,
                        'task_id' => $tasks->id,
                        'file_collection' => null,
                        'status' => 'Belum mengumpulkan'
                    ]);
                }
            }
        }

        // Redirect ke halaman tugas dengan pesan sukses
        return redirect()->route('tasks.index')->with('success', 'Data Tugas Baru Berhasil Ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {

        $validated = $request->validated();

        if ($request->hasFile('file_task')) {
            if ($task->file_task) {
                Storage::disk('public')->delete($task->file_task);
            }
            $file = $request->file('file_task')->store('file_task', 'public');
            $validated['file_task'] = $file;
        }

        $subject = auth()->user()->Subject;

        $task->update([
            'class_id' => $validated['class_id'],
            'materi_id' => $validated['materi_id'],
            'title_task' => $validated['title_task'],
            'file_task' => $validated['file_task'] ?? null,
            'description_task' => $validated['description_task'],
            'date_collection' => $validated['date_collection'],
            'subject_id' => $subject->id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tugas Yang Dipilih Berhasil Diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        try {
            $filename = $task->file_task;
            $task->delete();
            Storage::disk('public')->delete($filename);
            return redirect()->route('tasks.index')->with('success', 'Tugas Yang Dipilih Berhasil Dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('tasks.index')->with('success', 'Data Tugas Yang Dipilih Masih Dibutuhkan Pada Tabel Lain');
        }
    }
}
