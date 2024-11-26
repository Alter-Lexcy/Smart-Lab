<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateTeacherRequest;
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
        });

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
    $classes = \App\Models\Classes::all();
    $subjects = \App\Models\Subject::all();

    return view('Admins.Teachers.index', compact('teachers', 'subjects','classes'));
}


}
