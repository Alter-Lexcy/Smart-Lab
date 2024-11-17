<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    // Tampilkan daftar guru yang belum disetujui
    public function index()
    {
        $pendingUsers = User::where('role', 'teacher')->where('is_approved', false)->get();
        return view('approval.index', compact('pendingUsers'));
    }

    // Approve akun guru
    public function approve($id)
    {
        $user = User::findOrFail($id);
        $user->is_approved = true;
        $user->save();

        return redirect()->route('approval.index')->with('success', 'Akun berhasil disetujui.');
    }

    // Reject akun guru
    public function reject($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('approval.index')->with('success', 'Akun berhasil ditolak.');
    }
}

