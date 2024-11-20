@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-4">
        <div class="container mx-auto p-4">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl font-bold mr-auto">Daftar Guru</h1>
                <a class="group relative inline-block text-xs font-medium text-blue-500 focus:outline-none focus:ring active:text-indigo-500"
                    onclick="openModal('subjectModal')">
                    <span class="absolute inset-0 translate-x-1.5 translate-y-1.5 bg-blue-500 transition-transform group-hover:translate-x-0 group-hover:translate-y-0 rounded-md"></span>
                    <span class="relative block border border-current bg-white px-3 py-2 rounded-md">Tambah Guru -></span>
                </a>
            </div>
        </div>

        <!-- Tabel Guru -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white text-center border border-gray-300 border-collapse">
                <thead class="bg-gradient-to-r from-sky-200 to-blue-300">
                    <tr class="border">
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Nama Guru</th>
                        <th class="px-4 py-2 border">NIP</th>
                        <th class="px-4 py-2 border">Email Guru</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr class="border">
                            <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border">{{ $teacher->name_teacher }}</td>
                            <td class="px-4 py-2 border">{{ $teacher->NIP }}</td>
                            <td class="px-4 py-2 border">{{ $teacher->email_teacher }}</td>
                            <td class="px-4 py-2 border space-x-5">
                                <!-- Tombol Ubah untuk Modal -->
                                <button type="button" class="text-yellow-500 rounded-sm"
                                    onclick="openModal('editsubjectModal-{{ $teacher->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-6">
                                        <path
                                            d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                        <path
                                            d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                    </svg>
                                </button>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 rounded-sm"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus guru ini?')">
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

                        <!-- Modal Update/Ubah -->
                        <div id="editsubjectModal-{{ $teacher->id }}"
                            class="subjectModal fixed inset-0 hidden items-center justify-center" style="display: none;">
                            <div class="bg-white rounded-lg p-6 w-1/3 shadow-lg">
                                <h5 class="text-xl font-bold mb-4">Ubah Guru</h5>
                                <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="name_teacher" class="block font-medium mb-1">Nama Guru</label>
                                        <input type="text" class="w-full border rounded px-3 py-2" id="name_teacher"
                                            name="name_teacher" value="{{ $teacher->name_teacher }}">
                                        @error('name_teacher')
                                            <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="NIP" class="block font-medium mb-1">NIP</label>
                                        <input type="number" class="w-full border rounded px-3 py-2" id="NIP"
                                            name="NIP" value="{{ $teacher->NIP }}">
                                        @error('NIP')
                                            <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email_teacher" class="block font-medium mb-1">Email Guru</label>
                                        <input type="email" class="w-full border rounded px-3 py-2" id="email_teacher"
                                            name="email_teacher" value="{{ $teacher->email_teacher }}">
                                        @error('email_teacher')
                                            <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan
                                        Perubahan</button>
                                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded"
                                        onclick="closeModal('editsubjectModal-{{ $teacher->id }}')">Batal</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Guru -->
    <div id="subjectModal" class="fixed inset-0 flex items-center justify-center" style="display: none;">
        <div class="bg-white rounded-lg p-6 w-1/3 shadow-lg">
            <h5 class="text-xl font-bold mb-4">Tambah Guru</h5>
            <form action="{{ route('teachers.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name_teacher" class="block font-medium mb-1">Nama Guru</label>
                    <input type="text" class="w-full border rounded px-3 py-2" id="name_teacher" name="name_teacher"
                        value="{{ old('name_teacher') }}">
                    @error('name_teacher')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="NIP" class="block font-medium mb-1">NIP</label>
                    <input type="number" class="w-full border rounded px-3 py-2" id="NIP" name="NIP"
                        value="{{ old('NIP') }}">
                    @error('NIP')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email_teacher" class="block font-medium mb-1">Email Guru</label>
                    <input type="email" class="w-full border rounded px-3 py-2" id="email_teacher"
                        name="email_teacher" value="{{ old('email_teacher') }}">
                    @error('email_teacher')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Tambah Guru</button>
                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded"
                    onclick="closeModal('subjectModal')">Batal</button>
            </form>
        </div>
    </div>
    <script>
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
                closeModal('subjectModal'); // Menutup modal setelah data berhasil ditambah
            });
        @endif
    </script>
@endsection
