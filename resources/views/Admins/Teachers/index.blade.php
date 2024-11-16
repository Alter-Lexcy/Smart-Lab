@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Daftar Guru</h1>

        <!-- Button untuk Modal Tambah -->
        <button type="button"
            class="bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-r hover:from-cyan-600 hover:to-blue-600 text-white px-4 py-2 rounded mb-3"
            onclick="openModal('teacherModal')">
            Tambah Guru
        </button>

        <!-- Tabel Guru -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white text-center border border-gray-300 border-collapse">
                <thead class="bg-gradient-to-r from-cyan-100 to-blue-300">
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
                            <td class="px-4 py-2 border">
                                <!-- Tombol Ubah untuk Modal -->
                                <button type="button" class="bg-yellow-500 text-white px-2 py-1 rounded"
                                    onclick="openModal('editTeacherModal-{{ $teacher->id }}')">Ubah</button>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus guru ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal Update/Ubah -->
                        <div id="editTeacherModal-{{ $teacher->id }}"
                            class="teacherModal fixed inset-0 hidden items-center justify-center" style="display: none;">
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
                                        onclick="closeModal('editTeacherModal-{{ $teacher->id }}')">Batal</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Guru -->
    <div id="teacherModal" class="fixed inset-0 flex items-center justify-center" style="display: none;">
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
                    <input type="email" class="w-full border rounded px-3 py-2" id="email_teacher" name="email_teacher"
                        value="{{ old('email_teacher') }}">
                    @error('email_teacher')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Tambah Guru</button>
                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded"
                    onclick="closeModal('teacherModal')">Batal</button>
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
                    closeModal('teacherModal'); // Menutup modal setelah data berhasil ditambah
                });
            @endif
        </script>
@endsection

