<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Classes;
use App\Models\Subject;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreMateriRequest;
use App\Http\Requests\UpdateMateriRequest;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materis = Materi::with('Subject', 'Classes')->get();
        $subjects = Subject::all();
        $classes = Classes::all();
        return view('Admins.Materi.index', compact('materis', 'subjects', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMateriRequest $request)
    {
        $validated = $request->validated();

        // Upload file materi
        if ($request->hasFile('file_materi')) {
            $file = $request->file('file_materi')->store('file_materi', 'public');
            $validated['file_materi'] = $file; // Simpan path file ke database
        }

        Materi::create($request->all());

        return redirect()->route('materis.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMateriRequest $request, Materi $materi)
    {
        $validated = $request->validated();

       
        if ($request->hasFile('file_materi')) {
         
            if ($materi->file_materi) {
                Storage::disk('public')->delete($materi->file_materi);
            }

            $file = $request->file('file_materi')->store('file_materi', 'public');
            $validated['file_materi'] = $file;
        }

        // Update data materi
        $materi->update($validated);

        return redirect()->route('materis.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materi $materi)
    {
        try {
            if($materi->file_materi){
                Storage::delete('public/'.$materi->file_materi);
            }
            $materi->delete();
    
            return redirect()->route('materis.index')->with('success', 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->route('materis.index')->withErrors('Data gagal dihapus: ' . $e->getMessage());
        }
    }
    
}
