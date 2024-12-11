@extends('layouts.appTeacher')

@section('content')
    <div class="container mx-auto p-4">
        <div class="container mx-auto pt-2">
            <div class="flex items-center space-x-2 mb-2">
                <h1 class="text-2xl font-bold mr-auto">Penilaian</h1>
                <!-- Tombol Search -->
                <form action="" method="GET">
                    <button type="submit"
                        class="p-2 h-10 border-2 bg-white text-black rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24">
                            <path fill="black"
                                d="M15.5 14h-.79l-.28-.27A6.47 6.47 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14" />
                        </svg>
                    </button>
                </form>

                <!-- Tombol Tambah Materi -->
                <a class="w-40 h-10 p-2 border-2 text-xs text-white bg-blue-600 rounded-lg flex items-center justify-center hover:bg-blue-700 transition"
                    onclick="openModal('taskModal')">
                    Tambah Penilaian
                </a>
            </div>
            @if (session('success'))
                <div class="alert alert-success mb-4">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <strong>Kesalahan Validasi:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="block max-w bg-white rounded-lg shadow hover:bg-white">
                <h6 class="font-semibold p-3 text-sm ps-5">Daftar Penilaian</h6>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white text-center rounded-lg">
                        <thead>
                            <tr class="border">
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Nama Siswa</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">File</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Nilai</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assessments as $assessment)
                                <tr class="text-center">
                                    <td class="border px-4 py-2">{{ $assessment->user->name }}</td>
                                    <td class="border px-4 py-2">
                                        @if ($assessment->file_assessment)
                                            <a href="{{ asset('storage/' . $assessment->file_assessment) }}" target="_blank"
                                                class="text-blue-500 underline">Lihat File</a>
                                        @else
                                            <span class="text-gray-500">Tidak ada file</span>
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2">
                                        @if ($assessment->assessment)
                                            <span class="font-semibold">{{ $assessment->assessment->mark_task }}</span>
                                        @else
                                            <span class="text-gray-500">Belum dinilai</span>
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2">
                                        <form action="{{ route('assessments.store', $task) }}" method="POST"
                                            class="flex items-center justify-center gap-2">
                                            @csrf
                                            <input type="hidden" name="assessment_id" value="{{ $assessment->id }}">
                                            <input type="number" name="mark_task" placeholder="Masukkan Nilai"
                                                class="p-2 border rounded" required>
                                            <button type="submit"
                                                class="bg-blue-600 hover:bg-blue-700 text-white py-1 px-4 rounded transition">
                                                Simpan
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endsection
