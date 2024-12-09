<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateStatusStudents extends Command
{
    // Tentukan signature untuk perintah
    protected $signature = 'status:update-status-students';

    // Deskripsi perintah
    protected $description = 'Update status dan tanggal lulus siswa';

    public function handle()
    {
        // Logika untuk memperbarui status siswa
        $students = User::whereNull('graduation_date')
                           ->where('status', 'siswa')
                           ->get();

        foreach ($students as $student) {
            $createdAt = Carbon::parse($student->created_at);
            $graduationDate = $createdAt->addYears(3);

            if (Carbon::now()->greaterThanOrEqualTo($graduationDate)) {
                $student->status = 'lulus';
                $student->graduation_date = Carbon::now();
                $student->save();
            }
        }
    }
}
