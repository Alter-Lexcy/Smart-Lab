@extends('layouts.appTeacher')
@section('content')
    <!-- CSS -->
    <style>
        /* Gaya tombol aktif */
        .profile.active {
            background-color: #2563eb;
            /* Tailwind blue-600 */
            color: #ffffff;
        }

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
                <h1 class="text-2xl font-bold mr-auto">Tugas</h1>
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
                    <form id="searchForm" action="{{ route('tasks.index') }}" method="GET" name="search"
                        class="absolute right-full mr-2 mt-4 opacity-0 invisible transition-all duration-300">
                        <input type="text" name="search" placeholder="Cari..."
                            class="p-2 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </form>
                </div>

                <form action="{{ route('tasks.index') }}" method="GET" class="mt-4">
                    @php
                        $nextOrder = request('order', 'desc') === 'desc' ? 'asc' : 'desc';
                    @endphp
                    <input type="hidden" name="order" value="{{ $nextOrder }}">
                    <button type="submit"
                        class="p-3 border-2 bg-white text-black rounded-lg flex items-center justify-center">
                        @if (request('order', 'desc') === 'desc')
                            <svg class="w-[14px] h-[14px] fill-[#000000]" viewBox="0 0 576 512"
                                xmlns="http://www.w3.org/2000/svg">
                                <!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M151.6 42.4C145.5 35.8 137 32 128 32s-17.5 3.8-23.6 10.4l-88 96c-11.9 13-11.1 33.3 2 45.2s33.3 11.1 45.2-2L96 146.3 96 448c0 17.7 14.3 32 32 32s32-14.3 32-32l0-301.7 32.4 35.4c11.9 13 32.2 13.9 45.2 2s13.9-32.2 2-45.2l-88-96zM320 480l32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-32 0c-17.7 0-32 14.3-32 32s14.3 32 32 32zm0-128l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0c-17.7 0-32 14.3-32 32s14.3 32 32 32zm0-128l160 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-160 0c-17.7 0-32 14.3-32 32s14.3 32 32 32zm0-128l224 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L320 32c-17.7 0-32 14.3-32 32s14.3 32 32 32z" />
                            </svg>
                        @else
                            <svg class="w-[15px] h-[15px] fill-[#000000]" viewBox="0 0 576 512"
                                xmlns="http://www.w3.org/2000/svg">
                                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M151.6 469.6C145.5 476.2 137 480 128 480s-17.5-3.8-23.6-10.4l-88-96c-11.9-13-11.1-33.3 2-45.2s33.3-11.1 45.2 2L96 365.7V64c0-17.7 14.3-32 32-32s32 14.3 32 32V365.7l32.4-35.4c11.9-13 32.2-13.9 45.2-2s13.9 32.2 2 45.2l-88 96zM320 480c-17.7 0-32-14.3-32-32s14.3-32 32-32h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32H544c17.7 0 32 14.3 32 32s-14.3 32-32 32H320z">
                                </path>
                            </svg>
                        @endif
                    </button>
                </form>

                <!-- Tombol Tambah Materi -->
                <a class="w-[120px] h-[43px] p-2 border-2 text-xs text-white bg-blue-600 rounded-lg flex items-center justify-center hover:bg-blue-700 transition"
                    onclick="openModal('taskModal')">
                    <svg class="w-[15px] h-[15px] fill-[#ffffff] me-2" viewBox="0 0 448 512"
                        xmlns="http://www.w3.org/2000/svg">

                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                        </path>

                    </svg>
                    Tambah
                </a>
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
            <!-- Tabel Materi -->
            <div class="block max-w bg-white rounded-lg shadow hover:bg-white">
                <h6 class="font-semibold p-3 text-sm ps-5">Daftar Tugas</h6>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white text-left rounded-lg">
                        <thead>
                            <tr class="border">
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">No</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Nama Tugas</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Kelas</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Materi</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Tanggal Pengumpulan Tugas</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($tasks as $index => $task)
                                @php
                                    $offset = ($tasks->currentPage() - 1) * $tasks->perPage();
                                @endphp
                                <tr class="border border-gray-300">
                                    <td class="py-3 px-6">{{ $offset + $index + 1 }}</td>
                                    <td class="py-3 px-6">{{ $task->title_task }}</td>
                                    <td class="py-3 px-6">{{ $task->Classes->name_class }}</td>
                                    <td class="py-3 px-6">{{ $task->Materi->title_materi }}</td>
                                    <td class="py-2 px-6">
                                        {{ \Carbon\Carbon::parse($task->date_collection)->translatedFormat('H:i l, j F Y') }}
                                    </td>
                                    <td class="px-4 py-2">
                                        <div class="">
                                            <!-- Profile Button -->
                                            <button id="profile-button-{{ $task->id }}"
                                                class="profile flex p-2 text-xs  [&.active]:bg-blue-500  [&.active]:text-blue-100 text-blue-500 bg-blue-100 rounded-lg hover:bg-blue-500 hover:text-blue-100 transition"
                                                onclick="toggleDropdown('dropdown-opsi-{{ $task->id }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                                </svg>
                                            </button>

                                            <!-- Dropdown Profile -->
                                            <div id="dropdown-opsi-{{ $task->id }}"
                                                class="hidden absolute text-left right-28 bg-white shadow-lg rounded-md text-md  font-medium z-10 w-32 ">
                                                <ul class="py-2 ">
                                                    <!-- Edit -->
                                                    <li>
                                                        <a onclick="openModal('editTaskModal{{ $task->id }}')"
                                                            class="block px-4 py-1 text-yellow-500 hover:bg-gray-100">
                                                            Edit
                                                        </a>
                                                    </li>
                                                    <!-- Nilai -->
                                                    <li>
                                                        <a href="{{ route('assesments.index', $task->id) }}"
                                                            class="block px-4 py-1 text-green-500 hover:bg-gray-100">
                                                            Nilai
                                                        </a>
                                                    </li>
                                                    <!-- Lihat -->
                                                    <li>
                                                        <a onclick="openModal('Assessmentshow_{{ $task->id }}')"
                                                            class="block px-4 py-1 text-gray-500 hover:bg-gray-100">
                                                            Lihat
                                                        </a>
                                                    </li>
                                                    <!-- Hapus -->
                                                    <li>
                                                        <form action="{{ route('tasks.destroy', $task->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus task ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="block px-4 py-1 w-full text-start text-red-500 hover:bg-gray-100">
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="pagination py-3 px-5">
                    {{ $tasks->links('vendor.pagination.tailwind') }}
                </div>
            </div>

            {{-- Modal Show --}}
            @foreach ($tasks as $task)
                <div id="Assessmentshow_{{ $task->id }}"
                    class="taskModal fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 z-50"
                    style="display:none;">
                    <div class="bg-white rounded-lg shadow-lg w-[90%] md:w-[60%] lg:w-[50%] h-auto pt-6 pb-7 pl-6 mr-6">
                        {{-- Header Modal --}}
                        <div class="flex justify-between items-center border-b pb-4 mr-6">
                            <h5 class="text-2xl font-bold text-gray-800">Detail Tugas</h5>
                            <button type="button" class="text-gray-700 hover:text-gray00"
                                onclick="closeModal('Assessmentshow_{{ $task->id }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        {{-- Content Modal --}}
                        <div class="mt-4 space-y-4 overflow-y-auto h-auto max-h-[80%]">
                            <div class="">
                                <h6 class="text-lg font-semibold text-gray-700">Nama Tugas :</h6>
                                <p class="text-gray-600">{{ $task->title_task }}</p>
                            </div>
                            <div class="">
                                <h6 class="text-lg font-semibold text-gray-700">Kelas :</h6>
                                <p class="text-gray-600">{{ $task->classes->name_class }}</p>
                            </div>
                            <div class="">
                                <h6 class="text-lg font-semibold text-gray-700">Nama :</h6>
                                <p class="text-gray-600">{{ $task->Materi->title_materi }}</p>
                            </div>
                            <div class="">
                                <h6 class="text-lg font-semibold text-gray-700">Tanggal Pembuatan :</h6>
                                <p class="text-gray-700">
                                    {{ \Carbon\Carbon::parse($task->created_at)->translatedFormat('l, j F Y') }}
                                </p>
                            </div>
                            <div>
                                <h6 class="text-lg font-semibold text-gray-700">Deskripsi :</h6>
                                <p class="text-gray-600">{{ $task->description_task }}</p>
                            </div>
                            <div class="mr-6">
                                <h6 class="text-lg font-semibold text-gray-700 mb-3">File task</h6>

                                @php
                                    $file = pathinfo($task->file_task, PATHINFO_EXTENSION);
                                @endphp
                                @if (in_array($file, ['jpg', 'png']))
                                    <img src="{{ asset('storage/' . $task->file_task) }}" alt="File Image"
                                        class="mx-auto w-[90%] h-full border-2 rounded-lg">
                                @elseif($file === 'pdf')
                                    <embed src="{{ asset('storage/' . $task->file_task) }}" type="application/pdf"
                                        class="mx-auto w-[90%] h-full border-2 rounded-lg">
                                @else
                                    <p class="text-gray-500">File Kosong</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Modal Create -->
            <div id="taskModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50"
                style="display: none;" role="dialog" aria-hidden="true">
                <div class="bg-white rounded-lg w-[40%] h-auto pt-6 pb-2 pl-6">
                    <h5 class="text-xl font-bold mb-4" id="modal-title">Tambah Tugas</h5>
                    <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data"
                        class="overflow-y-auto h-[70%]">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4 mr-2">
                                <label for="class_id" class="block text-gray-700 font-bold mb-2">Kelas</label>
                                <select name="class_id" id="class_id" class="w-full px-3 py-2 border rounded">
                                    <option value="" disabled selected>Pilih Kelas</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}"
                                            {{ old('class_id') == $class->id ? 'selected' : '' }}>
                                            {{ $class->name_class }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('class_id')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4 mr-6">
                                <label for="materi_id" class="block text-gray-700 font-bold mb-2">Materi</label>
                                <select class="js-example-matcher-start w-full px-3 py-2 border rounded" id="materi_id">
                                    <option value="" disabled selected>Pilih Materi</option>
                                    @foreach ($materis as $materi)
                                        <option value="{{ $materi->id }}"
                                            {{ $task->materi_id == $materi->id ? 'selected' : '' }}>
                                            {{ $materi->title_materi }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('materi_id')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                            <script>
                                $(document).ready(function() {
                                    // Inisialisasi Select2 dengan matcher custom
                                    function matchCustom(params, data) {
                                        // Jika tidak ada input, tampilkan semua data
                                        if ($.trim(params.term) === '') {
                                            return data;
                                        }

                                        // Jika data tidak memiliki properti 'text', kembalikan null
                                        if (typeof data.text === 'undefined') {
                                            return null;
                                        }

                                        // Lakukan pencocokan berdasarkan input pengguna
                                        if (data.text.toLowerCase().indexOf(params.term.toLowerCase()) > -1) {
                                            return data; // Tampilkan data yang cocok
                                        }

                                        // Kembalikan null jika tidak cocok
                                        return null;
                                    }

                                    $("#materi_id").select2({
                                        placeholder: "Pilih Materi",
                                        minimumInputLength: 2, // Mulai pencarian setelah 1 karakter
                                        matcher: matchCustom,
                                        allowClear: true
                                    });
                                });
                            </script>
                        </div>
                        <div class="mb-4 mr-6">
                            <label for="title_task" class="block text-gray-700 font-bold mb-2">Judul Tugas</label>
                            <input type="text" id="title_task" name="title_task"
                                class="w-full px-3 py-2 border rounded" value="{{ old('title_task') }}">
                            @error('title_task')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4 mr-6">
                            <label for="date_collection" class="block text-gray-700 font-bold mb-2">
                                Tanggal dan Waktu Pengumpulan Tugas
                            </label>
                            <input type="datetime-local" id="date_collection" name="date_collection"
                                class="w-full px-3 py-2 border rounded" value="{{ old('date_collection') }}">
                            @error('date_collection')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4 mr-6">
                            <label for="description_task" class="block text-gray-700 font-bold mb-2">Deskripsi</label>
                            <textarea id="description_task" rows="3" name="description_task" class="w-full px-3 py-2 border rounded">{{ old('description_task') }}</textarea>
                            @error('description_task')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4 mr-6 ">
                            <label for="file_task" class="block text-gray-700 font-bold mb-2">File Tugas</label>
                            <!-- Image preview -->
                            <div id="file-preview" class="mt-2">
                                <img id="image-preview" class="mt-2 w-32 mb-2" style="display: none;" alt="Preview" />
                            </div>
                            <input type="File" id="file_task" name="file_task"
                                class="w-full px-3 py-2 border rounded" value="{{ old('file_task') }}">
                            @error('file_task')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Repeat other fields -->
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Tambah
                            tugas</button>
                        <button type="button"
                            class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded"
                            onclick="closeModal('taskModal')">Batal</button>
                    </form>
                </div>
            </div>

            <!-- Modal Update -->
            @foreach ($tasks as $task)
                <div id="editTaskModal{{ $task->id }}"
                    class="taskModal fixed inset-0 z-50 hidden  items-center justify-center bg-black "
                    style="display: none;">
                    <div class="bg-white rounded-lg w-[40%] h-auto pt-6 pb-2 pl-6">
                        <h5 class="text-xl font-bold mb-4" id="modal-title">Ubah Tugas</h5>
                        <form action="{{ route('tasks.update', $task->id) }}" method="POST"
                            enctype="multipart/form-data" class="overflow-y-auto h-[70%]">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-2 gap-4">
                                <div class="mb-4">
                                    <label for="class_id" class="block text-gray-700 font-bold mb-2">Kelas</label>
                                    <select name="class_id" id="class_id" class="w-full px-3 py-2 border rounded">
                                        <option value="" disabled selected>Pilih Kelas</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}"
                                                {{ $task->class_id == $class->id ? 'selected' : '' }}>
                                                {{ $class->name_class }}</option>
                                        @endforeach
                                    </select>
                                    @error('class_id')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 mr-6">
                                    <label for="materi_id" class="block text-gray-700 font-bold mb-2">Materi</label>
                                    <select name="materi_id" id="materi_id" class="w-full px-3 py-2 border rounded">
                                        <option value="" disabled selected>Pilih Materi</option>
                                        @foreach ($materis as $materi)
                                            <option value="{{ $materi->id }}"
                                                {{ $task->materi_id == $materi->id ? 'selected' : '' }}>
                                                {{ $materi->title_materi }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('materi_id')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 mr-6">
                                <label for="title_task" class="block text-gray-700 font-bold mb-2">Judul Tugas</label>
                                <input type="text" id="title_task" name="title_task"
                                    class="w-full px-3 py-2 border rounded" value="{{ $task->title_task }}">
                                @error('title_task')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4 mr-6">
                                <label for="file_task" class="block text-gray-700 font-bold mb-2">File Tugas</label>
                                <input type="File" id="file_task-{{ $task->id }}" name="file_task"
                                    class="w-full px-3 py-2 border rounded">
                                @error('file_task')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4 mr-6">
                                <label for="description_task" class="block text-gray-700 font-bold mb-2">Deskripsi</label>
                                <textarea id="description_task" rows="3" name="description_task" class="w-full px-3 py-2 border rounded">{{ $task->description_task }}</textarea>
                                @error('description_task')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4 mr-6">
                                <label for="date_collection" class="block text-gray-700 font-bold mb-2">Tanggal
                                    Pengumpulan
                                    Tugas</label>
                                <input type="datetime-local" id="date_collection" name="date_collection"
                                    class="w-full px-3 py-2 border rounded" value="{{ $task->date_collection }}">
                                @error('date_collection')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit"
                                class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Kirim</button>
                            <button type="button"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded"
                                onclick="closeModal('editTaskModal{{ $task->id }}')">Batal</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Modal Assessment(Penilaian) --}}
    @foreach ($tasks as $task)
        <div id="Assessment_{{ $task->id }}"
            class="Assessment fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 overflow-auto"
            style="display: none">
            <div class="bg-white rounded-lg pt-6 pb-4 px-6 w-[40%] shadow-lg">
                <h5 class="text-xl font-bold mb-4">Penilaian</h5>
                <form action="{{ route('assessments.store', ['task' => $task->id]) }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 gap-4">
                        <!-- Checkbox Section -->
                        <label for="" class="block text-gray-700 font-bold mb-2">Pilih Murid</label>
                        <div class="relative mt-[-20px]">
                            <button type="button" onclick="showCheckboxes({{ $task->id }})"
                                class="px-4 py-2 bg-blue-500 text-white rounded-md">
                                Pilih Opsi
                            </button>
                            <div id="checkboxes_{{ $task->id }}"
                                class="absolute hidden w-full mt-2 bg-white border border-gray-300 rounded-md shadow-lg z-10">
                                @if (isset($collections[$task->id]))
                                    @foreach ($collections[$task->id] as $submission)
                                        <label for="student_{{ $submission->user->id }}"
                                            class="block px-4 py-2 text-sm cursor-pointer hover:bg-gray-100">
                                            <input type="checkbox" id="student_{{ $submission->user->id }}"
                                                name="user_id[]" value="{{ $submission->user->id }}" class="mr-2" />
                                            {{ $submission->user->name }}
                                        </label>
                                    @endforeach
                                @else
                                    <p class="px-4 py-2 text-gray-500">Belum ada siswa yang mengumpulkan tugas.</p>
                                @endif
                            </div>
                        </div>
                        <!-- Input Nilai -->
                        <div>
                            <label for="mark_task" class="block text-gray-700 font-bold mb-2">Masukan Nilai</label>
                            <input type="number" name="mark_task" id="mark_task"
                                class="w-full px-3 py-2 border rounded" required>
                        </div>
                    </div>
                    <!-- Buttons -->
                    <div class="flex justify-between mt-3">
                        <button type="button" onclick="closeModal('Assessment_{{ $task->id }}')"
                            class="bg-gray-500 hover:bg-gray-600 text-white font-bold px-4 py-2 rounded">Batal</button>
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection

<script>
    function toggleDropdown(taskId) {
        // Menutup dropdown lain yang terbuka
        const currentDropdown = document.querySelector('.dropdown-active');
        const currentButton = document.querySelector('.active');

        if (currentDropdown && currentDropdown.id !== `dropdown-opsi-${taskId}`) {
            currentDropdown.classList.add('hidden');
            currentDropdown.classList.remove('dropdown-active');
            if (currentButton) currentButton.classList.remove('active');
        }

        const dropdown = document.getElementById(`dropdown-opsi-${taskId}`);
        const button = document.getElementById(`profile-button-${taskId}`);

        // Toggle visibilitas dropdown
        const isDropdownHidden = dropdown.classList.contains('hidden');
        if (isDropdownHidden) {
            dropdown.classList.remove('hidden');
            dropdown.classList.add('dropdown-active');
            button.classList.add('active');
        } else {
            dropdown.classList.add('hidden');
            dropdown.classList.remove('dropdown-active');
            button.classList.remove('active');
        }
    }


    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function(event) {

            const previewId = this.id.replace('file_task',
                'file-preview'); // Mengganti nama preview ID
            const filePreview = document.getElementById(previewId); // Elemen untuk preview
            const file = event.target.files[0];

            if (file) {
                const fileExtension = file.name.split('.').pop()
                    .toLowerCase(); // Dapatkan ekstensi file
                const reader = new FileReader();

                if (['jpg', 'jpeg', 'png'].includes(fileExtension)) {
                    // Jika file adalah gambar
                    reader.onload = function(e) {
                        filePreview.innerHTML =
                            `<p>File Sekarang</p>
<img src="${e.target.result}" class="mt-2 w-32 mb-2" alt="Preview">`;
                    };
                } else if (fileExtension === 'pdf') {
                    // Jika file adalah PDF
                    reader.onload = function(e) {
                        filePreview.innerHTML =
                            `<p>File Sekarang</p>
<embed src="${e.target.result}" type="application/pdf" class="mt-2 w-full h-32 mb-2" />`;
                    };
                } else {
                    // Jika format tidak didukung
                    filePreview.innerHTML = `<p class="text-red-500">Format file tidak didukung.</p>`;
                }

                reader.readAsDataURL(file); // Membaca file sebagai URL data
            } else {
                filePreview.innerHTML = ''; // Kosongkan preview jika file dihapus
            }
        });
    });



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

    // Open the modal if validation fails
    @if (session('success'))
        document.addEventListener("DOMContentLoaded", function() {
            closeModal('taskModal'); // Menutup modal setelah data berhasil ditambah
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
<script>
    var expanded = false;

    function showCheckboxes(taskId) {
        var checkboxes = document.getElementById("checkboxes_" + taskId);
        if (checkboxes.style.display === "block") {
            checkboxes.style.display = "none";
        } else {
            checkboxes.style.display = "block";
        }
    }
</script>
