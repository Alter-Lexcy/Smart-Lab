@extends('layouts.appTeacher')

@section('content')
<div class="container">
   

    @if(session('success'))
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

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-gradient-to-r from-sky-200 to-blue-300 text-center">
                <tr>
                    <th class="border px-4 py-2">Nama Siswa</th>
                    <th class="border px-4 py-2">File</th>
                    <th class="border px-4 py-2">Nilai</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assessments as $assessment)
                <tr class="text-center">
                    <td class="border px-4 py-2">{{ $assessment->user->name }}</td>
                    <td class="border px-4 py-2">
                        @if($assessment->file_assessment)
                        <a href="{{ asset('storage/' . $assessment->file_assessment) }}" target="_blank" class="text-blue-500 underline">Lihat File</a>
                        @else
                        <span class="text-gray-500">Tidak ada file</span>
                        @endif
                    </td>
                    <td class="border px-4 py-2">
                        @if($assessment->assessment)
                        <span class="font-semibold">{{ $assessment->assessment->mark_task }}</span>
                        @else
                        <span class="text-gray-500">Belum dinilai</span>
                        @endif
                    </td>
                    <td class="border px-4 py-2">
                        <form action="{{ route('assessments.store', $task) }}" method="POST" class="flex items-center justify-center gap-2">
                            @csrf
                            <input type="hidden" name="assessment_id" value="{{ $assessment->id }}">
                            <input type="number" name="mark_task" placeholder="Masukkan Nilai" class="p-2 border rounded" required>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-1 px-4 rounded transition">
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
