<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use App\Http\Requests\StoreModulRequest;
use App\Http\Requests\UpdateModulRequest;
use App\Models\Classes;
use Illuminate\Support\Facades\Storage;

class ModulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $moduls = Modul::with('Class')->get();
        $classes = Classes::all();
        return view('Admins.Moduls.index', compact('moduls','classes'));
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
    public function store(StoreModulRequest $request)
    {
        $file = $request->file_modul->store('file','public');
        Modul::create([
            'class_id'=>$request->class_id,
            'title'=>$request->title,
            'description'=>$request->description,
            'file_modul'=>$file
        ]);
        return redirect()->route('moduls.index')->with('success', 'Data Materi Baru Berhasil Dtambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Modul $modul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modul $modul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateModulRequest $request, Modul $modul)
    {
        if($request->hasFile('file_modul')){
            if($modul->file_modul){
                Storage::disk('public')->delete($modul->file_modul);
            }

            $file = $request->file_modul->store('file','public');
            $modul->file_modul = $file;
        }

        $modul->class_id = $request->class_id;
        $modul->title = $request->title;
        $modul->description = $request->description;

        $modul->save();
        return redirect()->route('moduls.index')->with('success', 'Materi Yang Dipilih Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modul $modul)
    {
        try {
            $modul->delete();

            return redirect()->route('moduls.index')->with('success', 'Materi Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->route('moduls.index')->with('success', 'Data Materi Yang Dipilih Masih Dibutuhkan Pada Tabel Lain');
        }
    }
}
