<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\User;
use App\Models\Classes;
use App\Models\Collection;
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
                $query->whereHas('class',function ($q) use ($search){
                    $q->where('name_class','Like','%'.$search.'%');
                })->orWhereHas('subject',function ($q) use ($search){
                    $q->where('name_subject','Like','%'.$search.'%');
                })
                ->orWhere('users.name', 'like', '%' . $search . '%')
                ->orWhere('users.email', 'like', '%' . $search . '%');
            })
            ->leftJoin('class_approvals', 'users.id', '=', 'class_approvals.user_id')
            ->select('users.*', 'class_approvals.status as approval_status')
            ->orderByRaw("class_approvals.user_id IS NULL ASC") // Data NULL (tidak ada di class_approvals) di urutan paling bawah
            ->orderByRaw("FIELD(class_approvals.status, 'pending', 'approved', 'rejected') ASC") // Urutkan berdasarkan status
            ->orderBy('users.created_at', 'desc') // Urutkan berdasarkan tanggal terbaru
            ->paginate(5);


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

        $Status = ClassApproval::where('user_id', auth()->id())->where('status', 'pending')->first();
        if ($Status) {
            $Status->update([
                'class_id' => $request->class_id
            ]);

            return redirect()->route('dashboard')->with('success', 'Pilih kelas Sudah Ter-Updated');
        }

        ClassApproval::create([
            'user_id' => auth()->id(),
            'class_id' => $request->class_id,
            'status' => 'pending',
        ]);


        return redirect()->route('dashboard')->with('success', 'Pilihan kelas telah dikirim untuk persetujuan.');
    }

    public function approve($id)
    {
        $approval = ClassApproval::findOrFail($id);
        DB::table('teacher_classes')->updateOrInsert(
            [
                'user_id' => $approval->user_id,
                'classes_id' => $approval->class_id,
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('class_approvals')
            ->where('id', $id)
            ->update(['status' => 'approved', 'updated_at' => now()]);
        $tasks = DB::table('tasks')
            ->where('class_id', $approval->class_id)
            ->get();
        foreach ($tasks as $task) {
            DB::table('collections')->updateOrInsert(
                [
                    'user_id' => $approval->user_id,
                    'task_id' => $task->id,
                ],
                [
                    'file_collection' => null,
                    'status' => 'Belum mengumpulkan',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
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
