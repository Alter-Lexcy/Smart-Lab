<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use App\Http\Requests\StoreModulRequest;
use App\Http\Requests\UpdateModulRequest;

class ModulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $moduls = Modul::with('classes')->get();
        return view('Admins.Moduls.index', compact('moduls'));
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
        Modul::create($request->validated());

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
        $modul->update($request->validated());
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
