<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Http\Requests\StoreMateriRequest;
use App\Http\Requests\UpdateMateriRequest;
use App\Models\Subject;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materis = Materi::with('Subject','Classes')->get();
        return view('Admins.Materi.index',compact('materis'));
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
    public function store(StoreMateriRequest $request)
    {
        Subject::create($request->all());

        return redirect()->route('materis.index')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materi $materi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materi $materi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMateriRequest $request, Materi $materi)
    {
        $materi->update($request->all());
        return redirect()->route('materi')->with('success','Data Berhasil Di-ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materi $materi)
    {
        try{
            $materi->delete();
            return redirect()->route('materis.index')->with();
        }catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withErrors('Data gagal Dihapus');
        }
    }
}
