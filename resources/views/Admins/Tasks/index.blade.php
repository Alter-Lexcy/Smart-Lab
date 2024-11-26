@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mr-auto">Daftar Tugas</h1>
        <div class="container mx-auto pt-2">
            <div class="flex items-center justify-between ">
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
                <a class="group relative inline-block text-xs font-medium text-blue-500 focus:outline-none focus:ring active:text-indigo-500"
                    onclick="openModal('taskModal')">
                    <span
                        class="absolute inset-0 translate-x-1.5 translate-y-1.5 bg-blue-500 transition-transform group-hover:translate-x-0 group-hover:translate-y-0 rounded-md"></span>
                    <span class="relative block border border-current bg-white px-3 py-2 rounded-md">Tambah Tugas -></span>
                </a>
            </div>
        </div>
        <!-- Task Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 text-center">
                <thead class="bg-gradient-to-r from-sky-200 to-blue-300">
                    <tr class=" text-black  ">
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Kelas</th>
                        <th class="px-4 py-2 border">Mapel</th>
                        <th class="px-4 py-2 border">Materi</th>
                        <th class="px-4 py-2 border">Judul Tugas</th>
                        <th class="px-4 py-2 border">FIle Tugas</th>
                        <th class="px-4 py-2 border">Deskripsi Tugas</th>
                        <th class="px-4 py-2 border">Tanggal Pengumpulan Tugas</th>
                        <th class="px-4 py-2 border">Aksi</th>
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
                                    <img src="{{ asset('storage/' . $task->file_task) }}" alt="File Image" width="100px">
                                @elseif($fileExtension === 'pdf')
                                    <embed src="{{ asset('storage/' . $task->file_task) }}" type="application/pdf"
                                        width="100px" height="100px">
                                @else
                                @endif
                            </td>
                            <td class="py-3 px-6">{{ $task->description_task ?? 'Kosong' }}</td>
                            <td class="py-2 px-6">
                                {{ \Carbon\Carbon::parse($task->date_collection)->translatedFormat('H:i l, j F Y') }}</td>
                            <td class="py-3 px-6 space-y-3">
                                <!-- Open edit modal -->
                                <button type="button" class="text-yellow-500 rounded-sm"
                                    onclick="openModal('editTaskModal{{ $task->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-6">
                                        <path
                                            d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                        <path
                                            d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                    </svg>
                                </button>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500 rounded-sm" type="submit"
                                        onclick="return confirm('Apakah Anda ingin menghapus tugas ini?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-6">
                                            <path fill-rule="evenodd"
                                                d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Create -->
    <div id="taskModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50" style="display: none;"
        role="dialog" aria-hidden="true">
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
                                <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>
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
                        <input type="text" id="title_task" name="title_task" class="w-full px-3 py-2 border rounded"
                            value="{{ old('title_task') }}">
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

                        <div id="file-preview-{{ $materi->id }}" class="mt-2">
                            <img id="image-preview" class="mt-2 w-32 mb-2"
                                style="{{ old('file_task') ? '' : 'display: none;' }}"
                                src="{{ old('file_task') ? asset('file_task/' . old('file_task')) : '' }}"
                                alt="Old Image Preview" />
                        </div>

                    <center><div id="file-preview" class="mt-2">
                        <img id="image-preview" class="mt-2 w-32 mb-2" style="display: none;" alt="Preview" />
                    </div></center>

                    <input type="File" id="file_task" name="file_task" class="w-full px-3 py-2 border rounded"
                        value="{{ old('file_task') }}">
                    @error('file_task')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Repeat other fields -->
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Tambah
                    tugas</button>
                <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded"
                    onclick="closeModal('taskModal')">Batal</button>
            </form>
        </div>
    </div>


    <!-- Modal Update -->
    @foreach ($tasks as $task)
        <div id="editTaskModal{{ $task->id }}"
            class="taskModal fixed inset-0 z-50 hidden  items-center justify-center bg-black " style="display: none;">
            <div class="bg-white rounded-lg w-[40%] h-auto pt-6 pb-2 pl-6">
                <h5 class="text-xl font-bold mb-4" id="modal-title">Ubah Tugas</h5>
                <form action="{{ route('tasks.update', $task->id) }}" method="POST" enctype="multipart/form-data"
                    class="overflow-y-auto h-[70%]">
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
                                        <embed src="{{ asset('storage/' . $task->file_task) }}" type="application/pdf"
                                            class="w-full h-32 mb-2" />
                                @else
                                    <p class="text-red-500">Format file tidak didukung.</p>
                                @endif
                            @endif
                        </div>
                        <input type="File" id="file_task-{{ $task->id }}" name="file_task" class="w-full px-3 py-2 border rounded">
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
                        <label for="date_collection" class="block text-gray-700 font-bold mb-2">Tanggal Pengumpulan
                            Tugas</label>
                        <input type="datetime-local" id="date_collection" name="date_collection"
                            class="w-full px-3 py-2 border rounded" value="{{ $task->date_collection }}">
                        @error('date_collection')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Kirim</button>
                    <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded"
                        onclick="closeModal('editTaskModal{{ $task->id }}')">Batal</button>
                </form>
            </div>
        </div>
    @endforeach

    <script>
        document.querySelectorAll('input[type="file"]').forEach(input => {
            input.addEventListener('change', function(event) {

                const previewId = this.id.replace('file_materi',
                    'file-preview'); // Mengganti nama preview ID
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
                                `<center><p>File Sekarang</p>
                                    <img src="${e.target.result}" class="mt-2 w-32 mb-2" alt="Preview"></center>`;
                        };
                    } else if (fileExtension === 'pdf') {
                        // Jika file adalah PDF
                        reader.onload = function(e) {
                            filePreview.innerHTML =
                                `<center><p>File Sekarang</p>
                                    <embed src="${e.target.result}" type="application/pdf" class="mt-2 w-full h-32 mb-2" /></center>`;
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
            document.getElementById(id).style.display = 'flex';
        }

        function closeModal(id) {
            console.log(`Closing modal: ${id}`);
            document.getElementById(id).style.display = 'none';
        }


        // Open the modal if validation fails
        @if (session('success'))
            document.addEventListener("DOMContentLoaded", function() {
                closeModal('taskModal'); // Menutup modal setelah data berhasil ditambah
            });
        @endif
    </script>
@endsection
