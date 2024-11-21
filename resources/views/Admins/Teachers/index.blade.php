@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Daftar Siswa</h1>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white text-center border border-gray-300 border-collapse">
                <thead class="bg-gradient-to-r from-sky-100 to-blue-100">
                    <tr class="border">
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Nama Guru</th>
                        <th class="px-4 py-2 border">Email Guru</th>
                        <th class="px-4 py-2 border">NIP</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr class="border">
                            <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border">{{ $teacher->name }}</td>
                            <td class="px-4 py-2 border">{{ $teacher->email }}</td>
                            <td class="px-4 py-2 border">{{ $teacher->NIP }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
