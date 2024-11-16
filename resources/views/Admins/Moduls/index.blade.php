@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Modul</h1>

        <!-- Button untuk Modal Tambah -->
        <button type="button"
            class="bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-r hover:from-cyan-600 hover:to-blue-600 text-white px-4 py-2 rounded mb-3"
            onclick="openModal('modulModal')">
            Tambah Modul
        </button>

        <!-- Tabel Modul -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white text-center border border-gray-300">
                <thead class="bg-gradient-to-r from-cyan-100 to-blue-300">
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
                            <td class="px-4 py-2 border">
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
                                    onclick="openModal('editModulModal_{{ $modul->id }}')">Ubah</button>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('moduls.destroy', $modul->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus modul ini?')">Hapus</button>
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
