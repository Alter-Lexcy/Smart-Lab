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
        // dd($request);
        $search = $request->input('search_teacher', '');
        $query = User::role('Guru')
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', 'Admin');
            })
            ->when($search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->whereHas('class', function ($q) use ($search) {
                        $q->where('name_class', 'Like', '%' . $search . '%');
                    })
                        ->orWhereHas('subject', function ($q) use ($search) {
                            $q->where('name_subject', 'Like', '%' . $search . '%');
                        })
                        ->orWhere('name', 'Like', '%' . $search . '%')
                        ->orWhere('email', 'Like', '%' . $search . '%')
                        ->orWhere('NIP', 'Like', '%' . $search . '%');
                });
            })
            ->orderByRaw('subject_id IS NOT NULL')
            ->orderByRaw('NOT EXISTS (SELECT 1 FROM teacher_classes WHERE teacher_classes.user_id = users.id) DESC')
            ->orderBy('created_at', 'desc');
        $teachers = $query->simplePaginate(5);

        $classes = Classes::all();
        $subjects = Subject::all();

        return view('Admins.Teachers.index', compact('teachers', 'subjects', 'classes'));
    }

    public function updateAssign(Request $request, $id)
    {
        $teacher = User::findOrFail($id);
        $request->validate([
            'classes_id' => 'required',      
            'subject_id' => 'required',
        ], [
            'classes_id.required' => 'Kelas Belum Dipilih',
            'subject_id.required' => 'Mapel Belum Dipilih',
        ]);

        $existingUser = User::where('id', '!=', $teacher->id)
            ->where('subject_id', $request->subject_id)
            ->whereHas('classess', function ($query) use ($request) {
                $query->whereIn('classes.id', $request->classes_id); // Pastikan menggunakan prefix `classes.id`
            })
            ->first();

        if ($existingUser) {
            return back()->withInput()->withErrors(['error' => 'Kombinasi Kelas dan Mapel sudah digunakan oleh pengguna lain']);
        }

        $teacher->update([
            'subject_id' => $request->subject_id
        ]);
        $teacher->classess()->sync($request->classes_id);
        return redirect()->back()->with('success', 'Data Sudah Ter-Update');
    }
}
