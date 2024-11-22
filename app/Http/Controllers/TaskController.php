<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Classes;
use App\Models\Materi;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with('Classes','Subject','Materi')->get();
        $classes = Classes::all();
        $subjects = Subject::all();
        $materis = Materi::all();
        return view('Admins.Tasks.index', compact('tasks','classes','materis','subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(StoreTaskRequest $request)
    {
        $validated =$request->validated();
        if($request->hasFile('file_task')){
            $file = $request->file('file_task')->store('file_task','public');
            $validated['file_task'] = $file;
        }

        Task::create($validated);

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

        if($request->hasFile('file_task')){
            if($task->file_task){
                Storage::disk('public')->delete($task->file_task);
            }
            $file = $request->file('file_task')->store('file_task','public');
            $validated['file_task'] = $file;
        }

        $task->update($validated);

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
