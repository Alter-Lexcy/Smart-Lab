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
        $query = User::role('Guru')
            ->orderByRaw('subject_id IS NOT NULL')
            ->orderByRaw('(SELECT COUNT(*) FROM teacher_classes WHERE teacher_classes.user_id = users.id) = 0 DESC')
            ->orderBy('created_at', 'desc');

        // Full-text search
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            });
        }

        // Filter by subject
        if ($request->filled('subject_id')) {
            $subjectId = $request->input('subject_id');
            $query->whereHas('subjects', function ($q) use ($subjectId) {
                $q->where('id', $subjectId);
            });
        }

        $teachers = $query->get();

        // Get all subjects for the dropdown
        $classes = Classes::all();
        $subjects = Subject::all();

        return view('Admins.Teachers.index', compact('teachers', 'subjects', 'classes'));
    }

    public function assign(Request $request, User $user)
    {

        $request->validate([
            'classes_id' => 'required',
            'subject_id' => 'required'
        ], [
            'classes_id.required' => 'Kelas Belum Di-pilih',
            'subject_id.required' => 'Mapel Belum Di-pilih'
        ]);

        $existingUser = User::where('id', '!=', $user->id)
        ->where('subject_id', $request->subject_id)
        ->whereHas('class', function ($query) use ($request) {
            $query->whereIn('classes.id', $request->classes_id); // Pastikan menggunakan prefix `classes.id`
        })
        ->first();

        if ($existingUser) {
            return redirect()->back()->withErrors(['error' => 'Kombinasi Kelas dan Mapel sudah digunakan oleh pengguna lain']);
        }

        $user->update([
            'subject_id' => $request->subject_id
        ]);
        $user->class()->sync($request->classes_id);

        return redirect()->back()->with('success', 'Data Sudah Ter-Update');
    }
}
