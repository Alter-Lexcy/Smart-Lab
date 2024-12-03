<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Collection;
use App\Models\User;
use App\Http\Requests\StoreAssessmentRequest;
use App\Http\Requests\UpdateAssessmentRequest;
use App\Models\Task;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user(); // Ambil data pengguna saat ini
        
        $assessments = Assessment::with('User', 'Task')->get();
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'Murid');
        })
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', '!=', 'Murid');
            })
            ->get();
        $tasks = Task::all();
        
        if ($user->hasRole('Admin')) {
            return view('Admins.Assesments.index',compact('assessments', 'tasks', 'users'));
        } elseif ($user->hasRole('Guru')) {
            return view('Guru.Assesments.index',compact('assessments', 'tasks', 'users'));
        } else {
            abort(403, 'Unauthorized');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssessmentRequest $request)
    {
        Assessment::create($request->all());
        return redirect()->route('assesments.index')->with('success', 'Data Penilaian Baru Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Assessment $assessments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assessment $assessments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssessmentRequest $request, $id)
    {
        $assessment = Assessment::findOrFail($id);
        $assessment->update($request->all());
        return redirect()->route('assesments.index')->with('success', 'Data Penilaian Yang Dipilih Berhasil Diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $assessments = Assessment::findOrFail($id);
            $assessments->delete();
            return redirect()->route('assesments.index')->with('success', 'Data Penilaian Yang Dipilih Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->route('assesments.index')->with('Gagal', 'Data Penilaian Yang Dipilih Masih Dibutuhkan Pada Tabel Lain');
        }
    }
}
