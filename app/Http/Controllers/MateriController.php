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

        $img = $request->file_materi->store('file_materi', 'public');

        Materi::create([
            'title_materi' => $request->title_materi,
            'file_materi' => $img,
            'description' => $request->description,
            'subject_id' => $request->subject_id,
            'classes_id' => $request->classes_id,
        ]);

        return redirect()->route('materis.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMateriRequest $request, Materi $materi)
    {

        dd($materi->id);
        $validated = $request->validated();

    
              
        Storage::delete('public/' . $materi->file_materi);
        $img = $request->file_materi->store('file_materi', 'public');

        

        // Update data materi
        $materi->update([
            'title_materi' => $request->title_materi,
            'file_materi' => $img,
            'description' => $request->description,
            'subject_id' => $request->subject_id,
            'classes_id' => $request->classes_id,
        ]);

        return redirect()->route('materis.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materi $materi)
{
    try {
        // Periksa apakah ada file yang terkait dengan data
        if ($materi->file_materi) {
            // Hapus file dari penyimpanan
            Storage::disk('public')->delete($materi->file_materi);
        }

        // Hapus data dari database
        $materi->delete();

        return redirect()->route('materis.index')->with('success', 'Data Berhasil Dihapus');
    } catch (\Exception $e) {
        return redirect()->route('materis.index')->withErrors('Data gagal dihapus: ' . $e->getMessage());
    }
}
}
