<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Collection;
use App\Models\User;
use App\Http\Requests\StoreAssessmentRequest;
use App\Http\Requests\UpdateAssessmentRequest;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assessments = Assessment::with('collections')->get();
        $users = User::all();

        return view('Admins.Assesments.index', compact('assessments','collections','users'));
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

        return redirect()->route('assessments.index')->with('success', 'Data Penilaian Baru Berhasil Dibuat');
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
    public function update(UpdateAssessmentRequest $request, Assessment $assessments)
    {
        $assessments->update($request->validated());

        return redirect()->route('assessments.index')->with('success', 'Data Penilaian Yang Dipilih Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assessment $assessments)
    {
        try {
            $assessments->delete();

            return redirect()->route('assessments.index')->with('success', 'Data Penilaian Yang Dipilih Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->route('assessments.index')->with('Gagal', 'Data Penilaian Yang Dipilih Masih Dibutuhkan Pada Tabel Lain');
        }
    }
}
