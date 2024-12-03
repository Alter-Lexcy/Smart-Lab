@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="container mx-auto pt-2">
            <div class="flex items-center space-x-2">
                <h1 class="text-2xl font-bold mr-auto">Tugas</h1>
                <!-- Tombol Search -->
                <form action="" method="GET">
                    <button type="submit"
                        class="p-2 h-10 mt-4 border-2 bg-white text-black rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24">
                            <path fill="black"
                                d="M15.5 14h-.79l-.28-.27A6.47 6.47 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14" />
                        </svg>
                    </button>
                </form>

                <button type="submit" class="p-3 border-2 bg-white text-black rounded-lg flex items-center justify-center">
                    <svg class="w-[15px] h-[15px] fill-[#000000]" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">

                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M151.6 469.6C145.5 476.2 137 480 128 480s-17.5-3.8-23.6-10.4l-88-96c-11.9-13-11.1-33.3 2-45.2s33.3-11.1 45.2 2L96 365.7V64c0-17.7 14.3-32 32-32s32 14.3 32 32V365.7l32.4-35.4c11.9-13 32.2-13.9 45.2-2s13.9 32.2 2 45.2l-88 96zM320 480c-17.7 0-32-14.3-32-32s14.3-32 32-32h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32H544c17.7 0 32 14.3 32 32s-14.3 32-32 32H320z">
                        </path>

                    </svg>
                </button>

                <!-- Tombol Tambah Materi -->
                <a class="w-40 h-10 p-2 border-2 text-xs text-white bg-blue-600 rounded-lg flex items-center justify-center hover:bg-blue-700 transition"
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
                    <table class="min-w-full bg-white text-center rounded-lg">
                        <thead>
                            <tr class="border">
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">No</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Kelas</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Mapel</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Materi</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Judul Tugas</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">FIle</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Deskripsi</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Tanggal Pengumpulan</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($tasks as $task)
                                <tr class="border border-gray-300">
                                    <td class="py-3 px-6">{{ $loop->iteration }}</td>
                                    <td class="py-3 px-6">{{ $task->Classes->name_class }}</td>
                                    <td class="py-3 px-6">{{ $task->Subject->name_subject }}</td>
                                    <td class="py-3 px-6">{{ $task->Materi->title_materi }}</td>
                                    <td class="py-3 px-6">{{ $task->title_task }}</td>
                                    <td class="py-3 px-6">
                                        @php
                                            $fileExtension = pathinfo($task->file_task, PATHINFO_EXTENSION);
                                        @endphp
                                        @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                            <img src="{{ asset('storage/' . $task->file_task) }}" alt="File Image"
                                                width="100px">
                                        @elseif($fileExtension === 'pdf')
                                            <embed src="{{ asset('storage/' . $task->file_task) }}" type="application/pdf"
                                                width="100px" height="100px">
                                        @else
                                        @endif
                                    </td>
                                    <td class="py-3 px-6">{{ Str::limit($task->description_task, 15, ' ...') ?? 'Kosong' }}
                                    </td>
                                    <td class="py-2 px-6">
                                        {{ \Carbon\Carbon::parse($task->date_collection)->translatedFormat('H:i l, j F Y') }}
                                    </td>
                                    <td class="px-4 py-2">
                                        <!-- Action buttons container -->
                                        <div class="flex space-x-2 items-center justify-center">
                                            <!-- Show button -->
                                            <button type="button" class="text-blue-500 rounded-sm"
                                                onclick="openModal('showAssessmentModal_{{ $task->id }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-7 mt-1">
                                                    <path
                                                        d="M12 4.5c-4.136 0-7.528 2.783-9.17 6.621a1.507 1.507 0 0 0 0 1.757C4.472 16.717 7.864 19.5 12 19.5s7.528-2.783 9.17-6.621a1.507 1.507 0 0 0 0-1.757C19.528 7.283 16.136 4.5 12 4.5Zm0 1.5c3.464 0 6.342 2.32 7.845 5.627a.082.082 0 0 1 0 .074C18.342 14.18 15.464 16.5 12 16.5s-6.342-2.32-7.845-5.627a.082.082 0 0 1 0-.074C5.658 8.32 8.536 6 12 6Zm0 2.25A3.75 3.75 0 1 0 12 15a3.75 3.75 0 0 0 0-7.5Zm0 1.5a2.25 2.25 0 1 1 0 4.5 2.25 2.25 0 0 1 0-4.5Z" />
                                                </svg>
                                            </button>

                                            <!-- Edit button -->
                                            <button type="button" class="text-yellow-500 rounded-sm"
                                                onclick="openModal('editTaskModal{{ $task->id }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-6 mt-1">
                                                    <path
                                                        d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                                    <path
                                                        d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                                </svg>
                                            </button>

                                            <!-- Delete form -->
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 rounded-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus task ini?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="size-6 mt-5">
                                                        <path fill-rule="evenodd"
                                                            d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

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
                                <label for="subject_id" class="block text-gray-700 font-bold mb-2">Mapel</label>
                                <select name="subject_id" id="subject_id" class="w-full px-3 py-2 border rounded">
                                    <option value="" disabled selected>Pilih Mapel</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}"
                                            {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                            {{ $subject->name_subject }}</option>
                                    @endforeach
                                </select>
                                @error('subject_id')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="materi_id" class="block text-gray-700 font-bold mb-2">Materi</label>
                                <select name="materi_id" id="materi_id" class="w-full px-3 py-2 border rounded">
                                    <option value="" disabled selected>Pilih Materi</option>
                                    @foreach ($materis as $materi)
                                        <option value="{{ $materi->id }}"
                                            {{ old('materi_id') == $materi->id ? 'selected' : '' }}>
                                            {{ $materi->title_materi }}</option>
                                    @endforeach
                                </select>
                                @error('materi_id')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4 mr-6">
                                <label for="title_task" class="block text-gray-700 font-bold mb-2">Judul Tugas</label>
                                <input type="text" id="title_task" name="title_task"
                                    class="w-full px-3 py-2 border rounded" value="{{ old('title_task') }}">
                                @error('title_task')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
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
                                    <label for="subject_id" class="block text-gray-700 font-bold mb-2">Mapel</label>
                                    <select name="subject_id" id="subject_id" class="w-full px-3 py-2 border rounded">
                                        <option value="" disabled selected>Pilih Mapel</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}"
                                                {{ $task->subject_id == $subject->id ? 'selected' : '' }}>
                                                {{ $subject->name_subject }}</option>
                                        @endforeach
                                    </select>
                                    @error('subject_id')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 ">
                                    <label for="materi_id" class="block text-gray-700 font-bold mb-2">Materi</label>
                                    <select name="materi_id" id="materi_id" class="w-full px-3 py-2 border rounded">
                                        <option value="" disabled selected>Pilih Materi</option>
                                        @foreach ($materis as $materi)
                                            <option value="{{ $materi->id }}"
                                                {{ $task->materi_id == $materi->id ? 'selected' : '' }}>
                                                {{ $materi->title_materi }}</option>
                                        @endforeach
                                    </select>
                                    @error('materi_id')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 mr-6">
                                    <label for="title_task" class="block text-gray-700 font-bold mb-2">Judul Tugas</label>
                                    <input type="text" id="title_task" name="title_task"
                                        class="w-full px-3 py-2 border rounded" value="{{ $task->title_task }}">
                                    @error('title_task')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 mr-6">
                                <label for="file_task" class="block text-gray-700 font-bold mb-2">File Tugas</label>
                                <div id="file-preview-{{ $task->id }}" class="mt-2">
                                    @if ($task->file_task)
                                        @php
                                            $fileExtension = pathinfo($task->file_task, PATHINFO_EXTENSION);
                                        @endphp
                                        @if (in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                                            <p class="mb-3">Gambar Sebelumnya</p>
                                            <img src="{{ asset('storage/' . $task->file_task) }}" alt="Preview"
                                                class="w-32 mb-2">
                                        @elseif ($fileExtension === 'pdf')
                                            <p class="mb-3">PDF Sebelumnya</p>
                                            <embed src="{{ asset('storage/' . $task->file_task) }}"
                                                type="application/pdf" class="w-full h-32 mb-2" />
                                        @else
                                            <p class="text-red-500">Format file tidak didukung.</p>
                                        @endif
                                    @endif
                                </div>
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

            <script>
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
        @endsection
