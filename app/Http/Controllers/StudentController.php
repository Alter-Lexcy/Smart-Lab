<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function User(Request $request)
    {
        $search = $request->input('search');
        $students = User::whereIn('status', ['siswa', 'lulus'])->role('Murid')
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', '!=', 'Murid');
            })->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at', 'desc')->simplePaginate(5);

        foreach ($students as $student) {
            $createdAt = Carbon::parse($student->created_at);
            $graduationDate = $createdAt->addYears(3);
            if (Carbon::now()->greaterThanOrEqualTo($graduationDate)) {
                $student->status = 'lulus';
                $student->graduation_date = $graduationDate;
                $student->save();
            }
        }

        $classes = Classes::all();

        return view('Admins.Students.index', compact('students', 'classes'));
    }
}
