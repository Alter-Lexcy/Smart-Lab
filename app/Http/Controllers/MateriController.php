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
        $user = auth()->user();

        // Filter dan Search Materi menggunakan whereHas
        $materis = Materi::with('classes')
            ->where('user_id', auth()->id()) // Filter berdasarkan user ID terlebih dahulu
            ->where(function ($query) use ($search) {
                $query->whereHas('classes', function ($q) use ($search){
                    $q->where('name_class','like','%'.$search.'%');
                })
                ->orWhere('title_materi','like','%'.$search.'%')
                ->orWhere('created_at','like','%'.$search.'%');
            })
            ->orderBy('created_at', $order) // Urutkan berdasarkan waktu pembuatan
            ->paginate(5); // Pagination

        // Filter Dropdown Kelas
        $classes = $user->class()->get();
        return view('Guru.Materi.index', compact('materis', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMateriRequest $request)
    {
        $validated = $request->validated();

        $subject = auth()->user()->subject;
        $img = $request->file_materi->store('file_materi', 'public');

        if (!auth()->check()) {
            return redirect()->back()->withErrors('Anda harus login untuk membuat materi.');
        }

        $materi = Materi::create([
            'title_materi' => $request->title_materi,
            'file_materi' => $img,
            'description' => $request->description,
            'subject_id' => $subject->id,
            'user_id' => auth()->id(),
        ]);
        $materi->classes()->attach($request->class_id);

        if (!$subject) {
            return redirect()->back()->withErrors('Materi tidak bisa dibikin karena anda tidak ada mapel');
        }

        return redirect()->route('materis.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMateriRequest $request, Materi $materi)
    {
        // Validasi input
        $validated = $request->validated();

        // Cek apakah ada file yang diunggah
        if ($request->hasFile('file_materi')) {
            // Hapus file lama jika ada
            if ($materi->file_materi) {
                Storage::disk('public')->delete($materi->file_materi);
            }

            // Simpan file baru dan tambahkan ke array $validated
            $file = $request->file('file_materi')->store('file_materi', 'public');
            $validated['file_materi'] = $file;
        }

        // Ambil subject user yang sedang login
        $subject = auth()->user()->subject;

        // Update data materi, hanya tambahkan file_materi jika ada
        $updateData = [
            'title_materi' => $validated['title_materi'],
            'description' => $validated['description'],
            'subject_id' => $subject->id,
            'user_id' => auth()->id(),
        ];

        // Tambahkan file_materi jika ada dalam $validated
        if (isset($validated['file_materi'])) {
            $updateData['file_materi'] = $validated['file_materi'];
        }

        // Lakukan update
        $materi->update($updateData);

        $materi->classes()->sync($request->class_id);

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
            return redirect()->route('materis.index')->withErrors('Data gagal dihapus Karena Masih Digunakan');
        }
    }
}
