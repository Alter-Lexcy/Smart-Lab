<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Http\Requests\StoreCollectionRequest;
use App\Http\Requests\UpdateCollectionRequest;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collections = Collection::with('users','tasks')->get();
        return view('Admins.Collections.index', compact('collections'));
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
        Collection::create($request->validated());

        return redirect()->route('collections.index')->with('success', 'Data Pengumpulan Baru Berhasil Dtambahkan');
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
    public function update(UpdateCollectionRequest $request, Collection $collection)
    {
        $collection->update($request->validated());

        return redirect()->route('collections.index')->with('success', 'Pengumpulan Yang Dipilih Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collection $collection)
    {
        try {
            $collection->delete();

            return redirect()->route('collections.index')->with('success', 'Data Pengumpulan Yang Dipilih Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->route('collections.index')->with('gagal', 'Data Pengumpulan Yang Dipilih Masih Dibutuhkan Pada Tabel Lain');
        }
    }
}
