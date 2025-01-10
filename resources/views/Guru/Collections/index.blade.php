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
    </style>
    <div class="container mx-auto p-4">
        <div class="container mx-auto pt-2">
            <div class="flex items-center space-x-2">
                <h1 class="text-2xl font-bold mr-auto">Pengumpulan</h1>
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
            <!-- Table of assessments -->
            <div class="block max-w bg-white rounded-lg shadow hover:bg-white">
                <h6 class="font-semibold p-3 text-sm ps-5">Daftar Pengumpulan</h6>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white text-center rounded-lg">
                        <thead>
                            <tr class="border">
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">No</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Nama Tugas</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Nama Murid</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Kelas</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Status</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collections as $index => $collection)
                                @php
                                    $offset = ($collections->currentPage() - 1) * $collections->perPage();
                                @endphp
                                <tr>
                                    <td class="border px-4 py-2">{{ $offset + $index + 1 }}</td>
                                    <td class="border px-4 py-2">{{ $collection->Task->title_task }}</td>
                                    <td class="border px-4 py-2">{{ $collection->user->name }}</td>
                                    <td class="border px-4 py-2">
                                        @foreach ($collection->user->class as $class)
                                            {{ $class->name_class }}
                                        @endforeach
                                    </td>
                                    <td class="border px-4 py-2">{{ $collection->status }}</td>
                                    <td class="border px-4 py-2 ">
                                        <!-- Delete form -->
                                        <form action="{{ route('collections.destroy', $collection->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="bg-blue-500 text-white w-10 h-10 rounded-md flex items-center justify-center" style="text-align: center"
                                                onclick="openModal('showAssessmentModal_{{ $collection->id }}')">
                                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M4.998 7.78C6.729 6.345 9.198 5 12 5c2.802 0 5.27 1.345 7.002 2.78a12.713 12.713 0 0 1 2.096 2.183c.253.344.465.682.618.997.14.286.284.658.284 1.04s-.145.754-.284 1.04a6.6 6.6 0 0 1-.618.997 12.712 12.712 0 0 1-2.096 2.183C17.271 17.655 14.802 19 12 19c-2.802 0-5.27-1.345-7.002-2.78a12.712 12.712 0 0 1-2.096-2.183 6.6 6.6 0 0 1-.618-.997C2.144 12.754 2 12.382 2 12s.145-.754.284-1.04c.153-.315.365-.653.618-.997A12.714 12.714 0 0 1 4.998 7.78ZM12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="pagination py-3 px-5">
                    {{ $collections->links('vendor.pagination.tailwind') }}
                </div>
            </div>
            {{-- Modal Show --}}
            @foreach ($collections as $collection)
                <div id="showAssessmentModal_{{ $collection->id }}"
                    class="materiModal fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 z-50"
                    style="display:none;">
                    <div class="bg-white rounded-lg shadow-lg w-[90%] md:w-[60%] lg:w-[50%] h-auto pt-6 pb-7 pl-6 mr-6">
                        {{-- Header Modal --}}
                        <div class="flex justify-between items-center border-b pb-4 mr-6">
                            <h5 class="text-2xl font-bold text-gray-800">Detail Materi</h5>
                            <button type="button" class="text-gray-700 hover:text-gray00"
                                onclick="closeModal('showAssessmentModal_{{ $collection->id }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        {{-- Content Modal --}}
                        <div class="mt-4 space-y-4 overflow-y-auto h-auto max-h-[80%]">
                            <div class="flex space-x-2">
                                <h6 class="text-lg font-semibold text-gray-700">Judul Tugas:</h6>
                                <p class="text-gray-600">{{ $collection->Task->title_task }}</p>
                            </div>
                            <div class="flex space-x-2">
                                <h6 class="text-lg font-semibold text-gray-700">Nama Siswa:</h6>
                                <p class="text-gray-600">{{ $collection->user->name }}</p>
                            </div>
                            <div class="flex space-x-2">
                                <h6 class="text-lg font-semibold text-gray-700">Kelas:</h6>
                                @foreach ($collection->user->class as $class)
                                    <p class="text-gray-600">{{ $class->name_class }}</p>
                                @endforeach
                            </div>
                            <div class="mr-6">
                                <h6 class="text-lg font-semibold text-gray-700 mb-3">File collection</h6>

                                @php
                                    $file = pathinfo($collection->file_collection, PATHINFO_EXTENSION);
                                @endphp
                                @if (in_array($file, ['jpg', 'png']))
                                    <img src="{{ asset('storage/' . $collection->file_collection) }}" alt="File Image"
                                        class="mx-auto w-[90%] h-auto border-2 rounded-lg">
                                @elseif($file === 'pdf')
                                    <embed src="{{ asset('storage/' . $collection->file_collection) }}"
                                        type="application/pdf" class="mx-auto w-[90%] h-full border-2 rounded-lg">
                                @else
                                    <p class="text-red-500">Format file tidak didukung.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endsection
    <script>
        function openModal(id) {
            console.log(`Opening modal: ${id}`);
            const modal = document.getElementById(id);
            if (modal) {
                modal.style.display = 'flex';
            } else {
                console.error(`Modal dengan ID ${id} tidak ditemukan.`);
            }
        }

        function closeModal(id) {
            console.log(`Closing modal: ${id}`);
            const modal = document.getElementById(id);
            if (modal) {
                modal.style.display = 'none';
            } else {
                console.error(`Modal dengan ID ${id} tidak ditemukan.`);
            }
        }

        @if (session('success'))
            document.addEventListener("DOMContentLoaded", function() {
                closeModal('materiModal'); // Close the modal on successful action
            });
        @endif
    </script>

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
