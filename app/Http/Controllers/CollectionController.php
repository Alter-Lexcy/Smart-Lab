<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCollectionRequest;
use App\Http\Requests\UpdateCollectionRequest;
use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collections = Collection::with(['assesments','tasks'])->get();
        return view('Guru.Collection.index', compact('collections'));
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

        return redirect()->route('collections.index')->with('Berhasil','Data Baru Berhasil Ditambahkan');
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
        $collection->update($request->all());

        return redirect()->route('collections.index')->with('Berhasil','Data Yang Dipilih Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collection $collection)
    {
        try {
            $collection->delete();

            return redirect()->route('collections.index')->with('Berhasil','Data Yang Dipilih Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->route('collections.index')->with('Gagal','Data Yang Dipilih Masih Dipakai Tabel Lain');
        }
    }
}