<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('Admins.Subject.index',compact('subjects'));
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
    public function store(Request $request)
    {
        $request->validate([
            'name_subject'=>['required','unique:subject,name_subject','string']
        ],[
            'name_subject.required'=>'Nama Mata Pembelajaran Belum Di-sisi',
            'name_subject.unique'=>'Nama Mata Pembelajaran Sudah Ada',
            'name_subject.unique'=>'Nama Mata Pembelajaran Harus Berformat Huruf',
        ]);

        Subject::create($request->all());

        return redirect()->route('subject.index')->with('success','Data Sudah Bertambah');
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_subject' => [
                'required',
                'string',
                Rule::unique('subject', 'name_subject')->ignore($this->route('subject'))
            ]
        ],[
            'name_subject.required'=>'Nama Mata Pembelajaran Belum Di-isi',
            'name_subject.string'=>'Nama Mata Pembelajaran Harus Bertipe Huruf',
            'name_subject.unique'=>'Nama Mata Pembelajaran Sudah Ada'
        ]);

        $subject = Subject::findOrFail($id);
        $subject->update($request->all());

        return redirect()->route('subject.index')->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $subject = Subject::findOrFail($id);
            $subject->delete();
            return redirect()->route('subject.edit')->with('success','Data Berhasil Di-Hapus');
        }catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withErrors('Data Gagal Dihapus');
        }
    }
}
