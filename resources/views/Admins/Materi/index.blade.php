@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold mr-auto">Daftar Materi</h1>
        <a class="group relative inline-block text-xs font-medium text-blue-500 focus:outline-none focus:ring active:text-indigo-500"
            onclick="openModal('materiModal')">
            <span class="absolute inset-0 translate-x-1.5 translate-y-1.5 bg-blue-500 transition-transform group-hover:translate-x-0 group-hover:translate-y-0 rounded-md"></span>
            <span class="relative block border border-current bg-white px-3 py-2 rounded-md">Tambah Materi -></span>
        </a>
    </div>

    <!-- Tabel Materi -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white text-center border border-gray-300 border-collapse">
            <thead class="bg-gradient-to-r from-sky-200 to-blue-300">
                <tr class="border">
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Nama Mapel</th>
                    <th class="px-4 py-2 border">Kelas</th>
                    <th class="px-4 py-2 border">Nama Materi</th>
                    <th class="px-4 py-2 border">File Materi</th>
                    <th class="px-4 py-2 border">Deskripsi</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materis as $index => $materi)
                <tr class="border">
                    <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                    <td class="px-4 py-2 border">{{ $materi->subject->name_subject }}</td>
                    <td class="px-4 py-2 border">{{ $materi->classes->name_class }}</td>
                    <td class="px-4 py-2 border">{{ $materi->title_materi }}</td>
                    <td class="px-4 py-2 border">
                        @if ($materi->file_materi && in_array(pathinfo($materi->file_materi, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                        <img src="{{ asset('storage/' . $materi->file_materi) }}" alt="Preview" class="w-32 h-32 object-cover">
                        @elseif ($materi->file_materi)
                        <span class="text-gray-500">Preview tidak tersedia</span>
                        @else
                        <span class="text-gray-500">Tidak ada file</span>
                        @endif
                    </td>



                    <td class="px-4 py-2 border">{{ $materi->description }}</td>
                    <td class="px-4 py-2 border space-x-5">
                        <!-- Tombol Ubah -->
                        <button type="button" class="text-yellow-500 rounded-sm"
                            onclick="openModal('editmateriModal-{{ $materi->id }}')">Edit</button>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('materis.destroy', $materi->id) }}" method="POST"
                            class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 rounded-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus materi ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal Edit -->
                <div id="editmateriModal-{{ $materi->id }}"
                    class="materiModal fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 z-50">
                    <div class="bg-white rounded-lg p-6 w-1/3 shadow-lg">
                        <h5 class="text-xl font-bold mb-4">Ubah Materi</h5>
                        <form action="{{ route('materis.update', $materi->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name_subject-{{ $materi->id }}" class="block font-medium mb-1">Nama Mapel</label>
                                <select id="name_subject-{{ $materi->id }}" name="subject_id"
                                    class="w-full border rounded px-3 py-2" required>
                                    <option value="" disabled>Pilih Nama Mapel</option>
                                    @foreach ($subjects as $mapel)
                                    <option value="{{ $mapel->id }}"
                                        {{ $mapel->subject_id == $mapel->id ? 'selected' : '' }}>
                                        {{ $mapel->name_subject }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="classes_id" class="block font-medium mb-1">Kelas</label>
                                <select id="classes_id" name="classes_id" class="w-full border rounded px-3 py-2" required>
                                    <option value="" disabled>Pilih Kelas</option>
                                    @foreach ($classes as $kelas)
                                    <option value="{{ $kelas->id }}" {{ $materi->kelas_id == $kelas->id ? 'selected' : '' }}>
                                        {{ $kelas->name_class }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="title_materi-{{ $materi->id }}" class="block font-medium mb-1">Nama Materi</label>
                                <input type="text" id="title_materi-{{ $materi->id }}" name="title_materi"
                                    class="w-full border rounded px-3 py-2" value="{{ $materi->title_materi }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="file_materi-{{ $materi->id }}" class="block font-medium mb-1">File Materi</label>
                                <input type="file" id="file_materi-{{ $materi->id }}" name="file_materi"
                                    class="w-full border rounded px-3 py-2">
                            </div>

                            <div class="mb-3">
                                <label for="description-{{ $materi->id }}" class="block font-medium mb-1">Deskripsi</label>
                                <input type="text" id="description-{{ $materi->id }}" name="description"
                                    class="w-full border rounded px-3 py-2" value="{{ $materi->description }}" required>
                            </div>

                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan Perubahan</button>
                            <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded"
                                onclick="closeModal('editmateriModal-{{ $materi->id }}')">Batal</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah -->
<div id="materiModal" class="fixed inset-0 flex items-center justify-center" style="display: none;">
    <div class="bg-white rounded-lg p-6 w-1/3 shadow-lg">
        <h5 class="text-xl font-bold mb-4">Tambah Materi</h5>
        <form action="{{ route('materis.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="subject_id" class="block font-medium mb-1">Pilih Mapel</label>
                <select id="subject_id" name="subject_id" class="w-full border rounded px-3 py-2" required>
                    <option value="" disabled selected>Pilih Nama Mapel</option>
                    @foreach ($subjects as $mapel)
                    <option value="{{ $mapel->id }}">{{ $mapel->name_subject }}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label for="classes_id" class="block font-medium mb-1">Kelas</label>
                <select id="classes_id" name="classes_id" class="w-full border rounded px-3 py-2" required>
                    <option value="" disabled selected>Pilih Kelas</option>
                    @foreach ($classes as $kelas)
                    <option value="{{ $kelas->id }}">{{ $kelas->name_class }}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label for="title_materi" class="block font-medium mb-1">Nama Materi</label>
                <input type="text" id="title_materi" name="title_materi" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-3">
                <label for="file_materi" class="block font-medium mb-1">File Materi</label>
                <input type="file" id="file_materi" name="file_materi" class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-3">
                <label for="description" class="block font-medium mb-1">Deskripsi</label>
                <input type="text" id="description" name="description" class="w-full border rounded px-3 py-2" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
            <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded"
                onclick="closeModal('materiModal')">Batal</button>
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
    @if(session('success'))
    document.addEventListener("DOMContentLoaded", function() {
        closeModal('materiModal'); // Menutup modal setelah data berhasil ditambah
    });
    @endif
</script>
@endsection
