<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Classes;
use Illuminate\Http\Request;
use App\Models\ClassApproval;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function User(Request $request)
    {
        $search = $request->input('search');
        $students = User::whereIn('users.status', ['siswa', 'lulus'])
            ->role('Murid')
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', '!=', 'Murid');
            })
            ->where(function ($query) use ($search) {
                $query->where('users.name', 'like', '%' . $search . '%')
                    ->orWhere('users.email', 'like', '%' . $search . '%');
            })
            ->leftJoin('class_approvals', 'users.id', '=', 'class_approvals.user_id')
            ->select('users.*', 'class_approvals.status as approval_status')
            ->orderByRaw("FIELD(class_approvals.status, 'pending', 'approved') ASC")
            ->orderBy('users.created_at', 'desc')
            ->simplePaginate(5);

        foreach ($students as $student) {
            $createdAt = Carbon::parse($student->created_at);
            $graduationDate = $createdAt->addYears(3);
            if (Carbon::now()->greaterThanOrEqualTo($graduationDate)) {
                $student->status = 'lulus';
                $student->graduation_date = $graduationDate;
                $student->save();
            }
        }

        $approvals = ClassApproval::all();
        $classes = Classes::all();

        return view('Admins.Students.index', compact('students', 'classes', 'approvals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:classes,id',
        ]);

        ClassApproval::create([
            'user_id' => auth()->id(),
            'class_id' => $request->class_id,
            'status' => 'pending',
        ]);


        return redirect()->back()->with('success', 'Pilihan kelas telah dikirim untuk persetujuan.');
    }

    public function approve($id)
    {
        $approval = ClassApproval::findOrFail($id);

        DB::table('teacher_classes')->insert([
            'user_id' => $approval->user_id,
            'classes_id' => $approval->class_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Update status approval
        $approval->update(['status' => 'approved']);

        return redirect()->back()->with('success', 'Kelas telah disetujui dan ditambahkan ke sistem.');
    }

    public function reject($id)
    {
        $approval = ClassApproval::findOrFail($id);
        $approval->update(['status' => 'rejected']);

        $approval->delete();
        return redirect()->back()->with('success', 'Kelas telah ditolak.');
    }
}
