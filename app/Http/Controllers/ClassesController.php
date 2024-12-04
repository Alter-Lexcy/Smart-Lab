<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Http\Requests\StoreClassesRequest;
use App\Http\Requests\UpdateClassesRequest;
use Illuminate\Http\Request;
use App\Models\Subject;
use Exception;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $order = $request->get('order', 'asc'); // Default: asc
        $classes = Classes::orderBy('created_at', $order)->get();
        return view('Admins.Classes.index', compact('classes', 'order'));
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
        Classes::create($request->all());
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
    public function update(UpdateClassesRequest $request, $id)
    {

        $class = Classes::findOrFail($id);
        $class->update($request->all());

        return redirect()->route('classes.index')->with('success', 'Kelas Yang Dipilih Berhasil Diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $classes = Classes::findOrFail($id);
            $classes->delete();

            return redirect()->route('classes.index')->with('Sukses', 'Data Kelas Yang Dipilih Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Data Masih Digunakan pada Data lain');
        }
    }
}
