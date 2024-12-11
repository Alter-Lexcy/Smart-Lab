@extends('layouts.app')
@section('content')
    <!-- CSS -->
    <style>
        #searchForm.show {
            opacity: 1;
            visibility: visible;
        }
    </style>
    <div class="container mx-auto p-4">
        <div class="container mx-auto pt-2">
            <div class="flex items-center space-x-2 my-4">
                <h1 class="text-2xl font-bold mr-auto">Siswa</h1>
                <!-- Tombol Search dengan Form Animasi -->
                <div class="relative flex items-center">
                    <!-- Tombol Search -->
                    <button id="searchButton"
                        class="p-3 border-2 bg-white text-black rounded-lg flex items-center justify-center transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-[14px] w-[14px]" viewBox="0 0 24 24">
                            <path fill="black"
                                d="M15.5 14h-.79l-.28-.27A6.47 6.47 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14" />
                        </svg>
                    </button>

                    <!-- Form Pencarian -->
                    <form id="searchForm" action="{{ route('Students') }}" method="GET" name="search"
                        class="absolute right-full mr-2 mt-4 opacity-0 invisible transition-all duration-300">
                        <input type="text" name="search" placeholder="Cari..."
                            class="p-2 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </form>
                </div>
            </div>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <strong class="font-bold">{{ session('success') }}</strong>
                    <button onclick="this.parentElement.style.display='none'"
                        class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Kesalahan Validasi:</strong>
                    <ul class="list-disc ml-5 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button onclick="this.parentElement.style.display='none'"
                        class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="block max-w bg-white rounded-lg shadow hover:bg-white">
                <h6 class="font-semibold p-3 text-sm ps-5">Daftar Siswa</h6>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white text-center rounded-lg">
                        <thead>
                            <tr class="border">
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">No</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Nama Siswa</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Email Siswa</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Status</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Tanggal Lulus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $offset = ($students->currentPage() - 1) * $students->perPage();
                            @endphp
                            @foreach ($students as $student)
                                <tr class="border">
                                    <td class="px-4 py-2 border">{{ $loop->iteration + $offset }}</td>
                                    <td class="px-4 py-2 border">{{ $student->name }}</td>
                                    <td class="px-4 py-2 border">{{ $student->email }}</td>
                                    <td class="px-4 py-2 border">{{ $student->status }}</td>
                                    <td class="px-4 py-2 border">
                                        {{ $student->graduation_date ? \Carbon\Carbon::parse($student->graduation_date)->translatedFormat('j F Y') : 'Belum Lulus' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <script>
                function openModal(id) {
                    console.log(`Opening modal: ${id}`);
                    document.getElementById(id).style.display = 'flex';
                }

                function closeModal(modalId) {
                    document.getElementById(modalId).style.display = 'none';
                }

                function closeModal(id) {
                    console.log(`Closing modal: ${id}`);
                    document.getElementById(id).style.display = 'none';
                }

                document.getElementById('searchButton').addEventListener('click', function(e) {
                    e.preventDefault(); // Mencegah pengiriman form
                    const form = document.getElementById('searchForm');
                    form.classList.toggle('show'); // Toggle class "show"
                });
            </script>
        </div>
        <div class="mt-3">
            {{ $students->links() }}
        </div>
    </div>
@endsection
