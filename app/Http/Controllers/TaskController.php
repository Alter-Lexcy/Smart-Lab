<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Materi;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
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
        $taskId = $request->input('task_id');
        $user = auth()->user();
        $classID = $request->input('class_id');
        $class = $user->class; // Kelas yang dimiliki oleh user
        $subject = $user->subject;

        // Ambil semua tugas dengan relasi Classes, Subject, Materi
        $tasks = Task::where('user_id', auth()->id())
            ->when($classID, function ($query) use ($classID){
                $query->whereHas('Classes',function ($q) use ($classID) {
                    $q->where('id',$classID);
                });
            })
            ->where(function ($query) use ($search) {
                $query->whereHas('Classes', function ($q) use ($search) {
                    $q->where('name_class', 'like', '%' . $search . '%');
                })
                    ->orWhereHas('Subject', function ($q) use ($search) {
                        $q->where('name_subject', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('Materi', function ($q) use ($search) {
                        $q->where('title_materi', 'like', '%' . $search . '%');
                    })
                    ->orWhere('title_task', 'like', '%' . $search . '%')
                    ->orWhere('date_collection','like','%'.$search.'%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $collections = Collection::with('user')->where('status', 'Sudah mengumpulkan')
            ->get()
            ->groupBy('task_id');

        $classes = $user->class()->get();
        $subjects = Subject::all();

        $materis = collect(); // Inisialisasi default
        if ($user && $class && $subject) {
            $materis = Materi::where('user_id', $user->id)
                ->whereHas('classes', function ($query) use ($class) {
                    $query->whereIn('class_id', $class->pluck('id'));
                })
                ->where('subject_id', $subject->id)
                ->get();
        }

        $pengumpulans = Collection::with(['user', 'task'])
            ->when($taskId, function ($query) use ($taskId) {
                $query->where('task_id', $taskId);
            })
            ->whereHas('task', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->orderByRaw("FIELD(status, 'Belum mengumpulkan') DESC")
            ->orderBy('status', 'asc')
            ->get()
            ->groupBy('task_id');


        $kelas = $user->class;

        return view('Guru.Tasks.index', compact('tasks', 'classes', 'subjects', 'materis', 'collections', 'pengumpulans','kelas'));
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
            DB::beginTransaction();
            $task->collections()->delete();
            $task->Assessment()->delete();
            $filename = $task->file_task;
            Storage::disk('public')->delete($filename);
            $task->delete();
            DB::commit();
            return redirect()->route('tasks.index')->with('success', 'Tugas dan data terkait berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('tasks.index')->with('error', 'Data Tugas masih dibutuhkan pada tabel lain');
        }
    }
}
