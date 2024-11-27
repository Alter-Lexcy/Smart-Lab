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
        ->whereDoesntHave('roles', function ($query) {
            $query->where('name', 'Admin');
        })
        ->orderByRaw('classes_id IS NULL')
        ->orderByRaw('subject_id IS  NULL')
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

    return view('Admins.Teachers.index', compact('teachers', 'subjects','classes'));
}

public function assign(Request $request, User $user) {
    $user->update([
        'classes_id' => $request->classes_id,
        'subject_id' => $request->subject_id
    ]);

    return redirect()->back()->with('success', 'Teacher assigned successfully');
}


}
