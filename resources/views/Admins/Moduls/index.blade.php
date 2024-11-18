@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="container mx-auto p-4">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl font-bold mr-auto">Daftar Modul</h1>
                <a class="group relative inline-block text-xs font-medium text-blue-500 focus:outline-none focus:ring active:text-indigo-500"
                    onclick="openModal('modulModal')">
                    <span class="absolute inset-0 translate-x-1.5 translate-y-1.5 bg-blue-500 transition-transform group-hover:translate-x-0 group-hover:translate-y-0 rounded-md"></span>
                    <span class="relative block border border-current bg-white px-3 py-2 rounded-md">Tambah Modul -></span>
                </a>
            </div>
        </div>

        <!-- Tabel Modul -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white text-center border border-gray-300">
                <thead class="bg-gradient-to-r from-sky-200 to-blue-300">
                    <tr class="border">
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Kelas</th>
                        <th class="px-4 py-2 border">Judul Modul</th>
                        <th class="px-4 py-2 border">Deskripsi</th>
                        <th class="px-4 py-2 border">File Modul</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($moduls as $modul)
                        <tr class="border">
                            <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border">{{ $modul->Class->name_class }}</td>
                            <td class="px-4 py-2 border">{{ $modul->title }}</td>
                            <td class="px-4 py-2 border">{{ $modul->description }}</td>
                            <td class="px-4 py-2 border space-x-5">
                                @php
                                    $fileExtension = pathinfo($modul->file_modul, PATHINFO_EXTENSION);
                                @endphp
                                @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                    <img src="{{ asset('storage/' . $modul->file_modul) }}" alt="File Image" class="w-24 h-auto">
                                @elseif($fileExtension === 'pdf')
                                    <embed src="{{ asset('storage/' . $modul->file_modul) }}" type="application/pdf" class="w-24 h-24">
                                @endif
                            </td>
                            <td class="px-4 py-2 border">
                                <!-- Tombol Ubah untuk Modal -->
                                <button type="button" class="bg-yellow-500 text-white px-2 py-1 rounded"
                                    onclick="openModal('editModulModal_{{ $modul->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                        <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                    </svg>
                                </button>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('moduls.destroy', $modul->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus modul ini?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                            <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
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

    <!-- Modal Tambah Modul -->
    <div id="modulModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50" style="display: none;">
        <div class="bg-white rounded-lg p-6 w-1/3 shadow-lg">
            <h5 class="text-xl font-bold mb-4">Tambah Modul</h5>
            <form action="{{ route('moduls.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="class_id" class="block font-medium mb-1">Kelas</label>
                    <select id="class_id" name="class_id" class="w-full border rounded px-3 py-2">
                        <option value="" disabled selected>Pilih Kelas</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name_class }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="title" class="block font-medium mb-1">Judul Modul</label>
                    <input type="text" id="title" name="title" class="w-full border rounded px-3 py-2">
                </div>
                <div class="mb-3">
                    <label for="description" class="block font-medium mb-1">Deskripsi</label>
                    <textarea id="description" name="description" rows="3" class="w-full border rounded px-3 py-2"></textarea>
                </div>
                <div class="mb-3">
                    <label for="file_modul" class="block font-medium mb-1">File Modul</label>
                    <input type="file" id="file_modul" name="file_modul" class="w-full border rounded px-3 py-2">
                </div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Tambah Modul</button>
                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded"
                    onclick="closeModal('modulModal')">Batal</button>
            </form>
        </div>
    </div>

    <script>
        function openModal(id) {
            document.getElementById(id).style.display = 'flex';
        }

        function closeModal(id) {
            document.getElementById(id).style.display = 'none';
        }
    </script>
@endsection
