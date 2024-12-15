<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CariController extends Controller
{
    public function index(Request $request)
    {
        // Normalisasi input menjadi huruf kecil
        $query = strtolower($request->input('search'));

        // Daftar sinonim untuk setiap rute
        $routes = [
            'dashboard' => 'homeguru',
            'materi' => 'materis.index',
            'material' => 'materis.index',
            'tugas' => 'tasks.index',
            'task' => 'tasks.index',
            'penilaian' => 'assesments.index',
            'assessment' => 'assesments.index', // Sinonim
        ];

        // Periksa apakah input cocok dengan salah satu kunci di $routes
        if (array_key_exists($query, $routes)) {
            return redirect()->route($routes[$query]);
        }

        // Tampilkan error jika input tidak ditemukan
        return back()->with('error', 'Menu tidak ditemukan!');
    }
}
