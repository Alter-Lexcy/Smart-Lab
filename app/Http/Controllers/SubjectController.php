<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $search = $request->input('search');
    $order = $request->input('order', 'desc');
    $kelasId = auth()->user()->classes->pluck('id');
    
    $subjects = Subject::withCount(['Materi' => function ($query) use ($kelasId) {
        $query->whereIn('classes_id', $kelasId);
    }])
    ->where('name_subject', 'LIKE', '%' . $search . '%') 
    ->orderBy('name_subject', $order)
    ->simplePaginate(5);
    return view('Siswa.mapel', compact('subjects', 'order'));
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
    public function store(StoreSubjectRequest $request)
    {

        Subject::create($request->all());

        return redirect()->route('subject.index')->with('success', 'Data Sudah Bertambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, $id)
    {

        $subject = Subject::findOrFail($id);
        $subject->update($request->all());

        return redirect()->route('subject.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $subject = Subject::findOrFail($id);
            $subject->delete();
            return redirect()->route('subject.index')->with('success', 'Data Berhasil Di-Hapus');
        } catch (\Exception $e) {
            return redirect()->route('subject.index')->withErrors('Data Gagal Dihapus');
        }
    }
}
