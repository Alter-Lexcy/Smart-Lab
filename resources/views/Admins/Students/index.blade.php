@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Daftar Siswa</h1>
        <form action="" method="GET" class="flex items-center mr-full   ">
            <input type="text" name="search" placeholder="Search..."
                class="w-64 p-2 border-2 border-r-0 rounded-l-lg focus:outline-none  " />
            <button type="submit" class="p-2 border-2 border-l-0 bg-white text-white rounded-r-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24">
                    <path fill="black"
                        d="M15.5 14h-.79l-.28-.27A6.47 6.47 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14" />
                </svg>
            </button>
        </form>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white text-center border border-gray-300 border-collapse">
                <thead class="bg-gradient-to-r from-sky-200 to-blue-300">
                    <tr class="border">
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Nama Siswa</th>
                        <th class="px-4 py-2 border">Email Siswa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr class="border">
                            <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border">{{ $student->name }}</td>
                            <td class="px-4 py-2 border">{{ $student->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
