@extends('layouts.appTeacher')

@section('content')
    <!-- CSS -->
    <style>
        #searchForm {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        #searchForm.show {
            opacity: 1;
            visibility: visible;
        }

        .no-arrows {
            -moz-appearance: textfield;
            /* Firefox */
            -webkit-appearance: none;
            /* Safari and Chrome */
            appearance: none;
            /* Standard */
        }

        .no-arrows::-webkit-inner-spin-button,
        .no-arrows::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
    <div class="container mx-auto p-4">
        <div class="container mx-auto pt-2">
            <div class="flex items-center space-x-2">
                <h1 class="text-2xl font-bold mr-auto">Penilaian</h1>
                <!-- Tombol Search dengan Form Animasi -->
                <div class="relative flex items-center my-4">
                    <!-- Tombol Search -->
                    <button id="searchButton"
                        class="p-3 border-2 bg-white text-black rounded-lg flex items-center justify-center transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-[14px] w-[14px]" viewBox="0 0 24 24">
                            <path fill="black"
                                d="M15.5 14h-.79l-.28-.27A6.47 6.47 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14" />
                        </svg>
                    </button>

                    <!-- Form Pencarian -->
                    <form id="searchForm" action="{{ route('collections.index') }}" method="GET" name="search"
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
                <h6 class="font-semibold p-3 text-sm ps-5">Daftar Penilaian</h6>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white text-center rounded-lg">
                        <thead>
                            <tr class="border">
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">No</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Nama Siswa</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Kelas</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Nama Tugas</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Nilai</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assessments as $index => $assessment)
                                @php
                                    $offset = ($assessments->currentPage() - 1) * $assessments->perPage();
                                @endphp
                                <tr class="text-center">
                                    <td class="border px-4 py-2">{{ $offset + $index + 1 }}</td>
                                    <td class="border px-4 py-2">{{ $assessment->user->name }}</td>
                                    <td class="border px-4 py-2">
                                        @foreach ($assessment->user->classes as $class)
                                            {{ $class->name_class }}<br>
                                        @endforeach
                                    </td>
                                    <td class="border px-4 py-2">
                                        {{ $assessment->collection && $assessment->collection->task ? $assessment->collection->task->title_task : 'Tugas tidak ditemukan' }}
                                    </td>
                                    <td class="border px-4 py-2">
                                        <input type="number" name="scores[{{ $assessment->id }}]"
                                            class="form-control p-1 text-center bg-gray-100 border rounded-xl no-arrows"
                                            min="0" max="100" value="{{ old('scores.' . $assessment->id) }}">
                                    </td>
                                    <td class="border px-4 py-2" style="justify-items: center">
                                        <!-- Show button -->
                                        <button type="button"
                                            class="bg-blue-500 text-white w-10 h-10 rounded-md flex items-center justify-center"
                                            onclick="">
                                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M4.998 7.78C6.729 6.345 9.198 5 12 5c2.802 0 5.27 1.345 7.002 2.78a12.713 12.713 0 0 1 2.096 2.183c.253.344.465.682.618.997.14.286.284.658.284 1.04s-.145.754-.284 1.04a6.6 6.6 0 0 1-.618.997 12.712 12.712 0 0 1-2.096 2.183C17.271 17.655 14.802 19 12 19c-2.802 0-5.27-1.345-7.002-2.78a12.712 12.712 0 0 1-2.096-2.183 6.6 6.6 0 0 1-.618-.997C2.144 12.754 2 12.382 2 12s.145-.754.284-1.04c.153-.315.365-.653.618-.997A12.714 12.714 0 0 1 4.998 7.78ZM12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex justify-end">
                        <button
                            class="flex items-center bg-blue-600 text-white mr-5 mt-5 px-7 py-2 rounded-xl shadow-lg transform hover:scale-105 hover:bg-blue-900 hover:text-blue-100 transition-all duration-300 ease-in-out">
                            <svg class="w-6 h-6 text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 8H4m4 6h8m0 0-2-2m2 2-2 2M4 6v13a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1h-5.032a1 1 0 0 1-.768-.36l-1.9-2.28a1 1 0 0 0-.768-.36H5a1 1 0 0 0-1 1Z"/>
                            </svg>
                            Kirim
                        </button>
                    </div>
                </div>
                <div class="pagination py-3 px-5">
                    {{ $assessments->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    @endsection
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchButton = document.getElementById("searchButton");
            const searchForm = document.getElementById("searchForm");

            searchButton.addEventListener("click", function(event) {
                event.stopPropagation(); // Mencegah klik tombol menutup form
                searchForm.classList.toggle("show");
            });

            document.addEventListener("click", function() {
                searchForm.classList.remove("show");
            });

            searchForm.addEventListener("click", function(event) {
                event.stopPropagation(); // Mencegah klik pada form menutup form
            });
        });
    </script>
