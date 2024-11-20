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
        $materis = Materi::with('Subject','Classes')->get();
        $subjects = Subject::all();
        $classes = Classes::all();
        return view('Admins.Materi.index',compact('materis','subjects','classes'));
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
        $file = $request->file_materi->store('File_materi','public');
        Materi::create([
            'subject_id'=>$request->subject_id,
            'classes_id'=>$request->classes_id,
            'title_materi'=>$request->title_materi,
            'file_materi'=>$file,
            'description'=>$request->description
        ]);
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
        if($materi->hasFile('file_materi')){
            $file = $request->file('file_materi')->store('public');
            if($materi->file_materi){
                Storage::disk('public')->delete($materi->file_materii);
            }
         $materi->file_materi = $file;
        }

        $materi->class_id = $request->class_id;
        $materi->subject_id = $request->subject_id;
        $materi->title_materi = $request->title_materi;
        $materi->description = $request->description;

        $materi->save();

        return redirect()->route('materi')->with('success','Data Berhasil Di-ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materi $materi)
    {
        try{
            $filename = $materi->file_materi;
            $materi->delete();
            Storage::disk('public')->delete($filename);
            return redirect()->route('materis.index')->with('success','Data Berhasil Dihapus');
        }catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withErrors('Data gagal Dihapus');
        }
    }
}
