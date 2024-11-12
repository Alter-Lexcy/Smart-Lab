<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Http\Requests\StoreClassesRequest;
use App\Http\Requests\UpdateClassesRequest;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classes::with('teachers')->get();

        return view('Admins.Classes.index', compact('classes'));
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
    public function store(StoreClassesRequest $request)
    {
        Classes::create($request->validated());

        return redirect()->route('classes.index')->with('success', 'Data Kelas Baru Berhasil Dtambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classes $classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classes $classes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassesRequest $request, Classes $classes)
    {
        $classes->update($request->validated());

        return redirect()->route('classes.index')->with('success', 'Kelas Yang Dipilih Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $classes)
    {
        try {
            $classes->delete();

            return redirect()->route('classes.index')->with('Sukses', 'Data Kelas Yang Dipilih Berhasil Dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('teachers.index')->with('Gagal', 'Data Kelas Yang Dipilih Masih Dibutuhkan Pada Tabel Lain');
        }
    }
}
