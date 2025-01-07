<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Assessment;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCollectionRequest;
use App\Http\Requests\UpdateCollectionRequest;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collections = Collection::with(['user', 'task'])
            ->orderByRaw("FIELD(status, 'Sudah mengumpulkan') DESC") // 'Sudah mengumpulkan' at the top
            ->orderBy('status', 'asc') // Sort remaining statuses alphabetically or as needed
            ->simplePaginate(5);

        return view('Guru.Collections.index', compact('collections'));
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
    public function store(StoreCollectionRequest $request)
    {
        Collection::create($request->all());

        return redirect()->route('collections.index')->with('Berhasil', 'Data Baru Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Collection $collection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collection $collection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateCollection(Request $request, $task_id)
    {
        $request->validate([
            'file_collection' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $user_id = auth()->id();
        $task = Task::find($task_id);

        if (!$task) {
            return redirect()->back()->with('error', 'Tugas tidak ditemukan.');
        }
        $collection = Collection::where('task_id', $task_id)
            ->where('user_id', $user_id)
            ->first();

        if (!$collection) {
            return redirect()->back()->with('error', 'Pengumpulan tugas tidak ditemukan.');
        }
        if (now()->greaterThan($task->date_collection)) {
            $collection->update([
                'status' => 'Tidak mengumpulkan',
            ]);
        }
        if ($request->hasFile('file_collection')) {
            $file = $request->file('file_collection');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('collections', $fileName, 'public');
            if ($collection->file_collection && Storage::exists('public/' . $collection->file_collection)) {
                Storage::delete('public/' . $collection->file_collection);
            }
            $collection->update([
                'file_collection' => $filePath,
                'status' => 'Sudah mengumpulkan',
            ]);
        }

        $assessment = Assessment::where('collection_id', $collection->id)
            ->where('user_id', $user_id)
            ->first();
        if (!$assessment) {
            $assessment = new Assessment();
            $assessment->collection_id = $collection->id;
            $assessment->user_id = $user_id;
            $assessment->status = 'Belum Di-nilai';
            $assessment->mark_task = null;
            $assessment->save();
        }
        else {
        }
        return redirect()->back()->with('success', 'Tugas berhasil diperbarui!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collection $collection)
    {
        try {
            $collection->delete();

            return redirect()->route('collections.index')->with('Berhasil', 'Data Yang Dipilih Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->route('collections.index')->with('Gagal', 'Data Yang Dipilih Masih Dipakai Tabel Lain');
        }
    }
}
