<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Classes;
use App\Models\Subject;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreMateriRequest;
use App\Http\Requests\UpdateMateriRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $order = $request->input('order', 'desc');
        $materis = Materi::with('Classes', 'Subject')
            ->where(function ($query) use ($search) {
                $query->whereHas('Classes', function ($q) use ($search) {
                    $q->where('name_class', 'like', '%' . $search . '%');
                })
                    ->orWhereHas('Subject', function ($q) use ($search) {
                        $q->where('name_subject', 'like', '%' . $search . '%');
                    });
            })->orWhere('title_materi','Like','%'.$search.'%')
            ->orderBy('created_at', $order)
            ->get();

        $subjects = Subject::all();
        $classes = Classes::all();

        $user = auth()->user();
        
        if ($user->hasRole('Admin')) {
            return view('Admins.Materi.index', compact('materis', 'subjects', 'classes'));
        } elseif ($user->hasRole('Guru')) {
            return view('Guru.Materi.index', compact('materis', 'subjects', 'classes'));
        } else {
            abort(403, 'Unauthorized');
        }
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

        $validated  = $request->validated();

        if ($request->hasFile('file_materi')) {
            if ($materi->file_materi) {
                Storage::disk('public')->delete($materi->file_materi);
            }

            $file = $request->file('file_materi')->store('file_materi', 'public');
            $validated['file_materi'] = $file;
        }

        $materi->update($validated);
        return redirect()->route('materis.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materi $materi)
    {
        try {
            $fileName = $materi->file_materi;
            $materi->delete();
            Storage::disk('public')->delete($fileName);
            return redirect()->route('materis.index')->with('success', 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->route('materis.index')->withErrors('Data gagal dihapus Karena Masih Digunakan    ');
        }
    }
}
