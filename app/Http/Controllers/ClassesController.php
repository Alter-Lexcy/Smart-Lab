<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Classes;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreClassesRequest;
use App\Http\Requests\UpdateClassesRequest;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $search = $request->input('search_class', '');
    $order = $request->input('order', 'desc');

    $classes = Classes::when($search, function ($query, $search) {
        return $query->where('name_class', 'like', '%' . $search . '%');
    })->orderBy('created_at', $order)->paginate(5);

    return view('Admins.Classes.index', compact('classes', 'order', 'search'));
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
        DB::table('classes')->insert([
            'name_class' => $request->input('name_class_combined'),
            'description' => $request->input('description', null),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
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
        $nameClassCombined = $request->input('name_class.0') . '-' . $request->input('name_class.1');
        $class = DB::table('classes')->where('id', $id)->first();

        if (!$class) {
            return redirect()->route('classes.index')->with('error', 'Data kelas tidak ditemukan.');
        }

        // Update data kelas
        DB::table('classes')->where('id', $id)->update([
            'name_class' => $nameClassCombined,
            'description' => $request->input('description', null),
            'updated_at' => now(),
        ]);

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

            return redirect()->route('classes.index')->with('success', 'Data Kelas Yang Dipilih Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Data Masih Digunakan pada Data lain');
        }
    }
}
