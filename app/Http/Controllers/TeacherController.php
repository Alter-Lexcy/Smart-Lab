<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\User;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = User::role('Guru')
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', 'Admin');
            })
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('NIP', 'like', '%' . $search . '%');
            })
            ->orderByRaw('subject_id IS NOT NULL')
            ->orderByRaw('(SELECT COUNT(*) FROM teacher_classes WHERE teacher_classes.user_id = users.id) = 0 DESC')
            ->orderBy('created_at', 'desc');



        $teachers = $query->simplePaginate(5);

        // Get all subjects for the dropdown
        $classes = Classes::all();
        $subjects = Subject::all();

        return view('Admins.Teachers.index', compact('teachers', 'subjects', 'classes'));
    }

    public function updateAssign(Request $request,$id){
        $teacher = User::findOrFail($id);
        // dd($teacher);
        $request->validate([
            'classes_id' => 'required',
            'subject_id' => 'required',
        ], [
            'classes_id.required' => 'Kelas Belum Dipilih',
            'subject_id.required' => 'Mapel Belum Dipilih',
        ]);


        $existingUser = User::where('id', '!=', $teacher->id)
        ->where('subject_id', $request->subject_id)
        ->whereHas('class', function ($query) use ($request) {
            $query->whereIn('classes.id', $request->classes_id); // Pastikan menggunakan prefix `classes.id`
        })
        ->first();

        if ($existingUser) {
            return redirect()->back()->withErrors(['error' => 'Kombinasi Kelas dan Mapel sudah digunakan oleh pengguna lain']);
        }

        $teacher->update([
            'subject_id' => $request->subject_id
        ]);
        $teacher->class()->sync($request->classes_id);
        return redirect()->back()->with('success', 'Data Sudah Ter-Update');
    }
}
