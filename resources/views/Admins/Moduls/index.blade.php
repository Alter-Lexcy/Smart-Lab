@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold mb-4">Modul</h2>
        <button type="button" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded mb-4" onclick="openModal('modulModal')">Tambah Modul</button>
        <table class="w-full bg-white border border-gray-300">
            <thead>
                <tr class="">
                    <th class="py-2 px-4 border">No</th>
                    <th class="py-2 px-4 border">Kelas</th>
                    <th class="py-2 px-4 border">Judul Modul</th>
                    <th class="py-2 px-4 border">Diskripsi</th>
                    <th class="py-2 px-4 border">File Modul</th>
                    <th class="py-2 px-4 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($moduls as $modul)
                    <tr>
                        <td class="py-2 px-4 border">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border">{{ $modul->Class->name_class }}</td>
                        <td class="py-2 px-4 border">{{ $modul->title }}</td>
                        <td class="py-2 px-4 border">{{ $modul->description }}</td>
                        <td class="py-2 px-4 border">
                            @php
                                $fileExtension = pathinfo($modul->file_modul, PATHINFO_EXTENSION);
                            @endphp
                            @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                <img src="{{ asset('storage/' . $modul->file_modul) }}" alt="File Image" class="w-24 h-auto">
                            @elseif($fileExtension === 'pdf')
                                <embed src="{{ asset('storage/' . $modul->file_modul) }}" type="application/pdf" class="w-24 h-24">
                            @endif
                        </td>

                        <td class="py-2 px-4 border">
                            <button type="button" class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded" onclick="openModal('editModulModal_{{ $modul->id }}')">
                                Ubah Modul
                            </button>
                            <form action="{{ route('moduls.destroy', $modul->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded" onclick="return confirm('Apakah Anda Ingin Menghapus Modul ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modul Create Modal --}}
    <div id="modulModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-2xl">
            <h5 class="text-xl font-bold mb-4">Tambah Modul</h5>
            <form action="{{ route('moduls.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="class_id" class="block font-semibold">Kelas</label>
                        <select name="class_id" id="class_id" class="border border-gray-300 rounded p-2 w-full">
                            <option value="" disabled selected>Pilih Kelas</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>{{ $class->name_class }}</option>
                            @endforeach
                        </select>
                        @error('class_id') <div class="text-red-500 mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div>
                        <label for="title" class="block font-semibold">Judul Modul</label>
                        <input type="text" id="title" name="title" class="border border-gray-300 rounded p-2 w-full" value="{{ old('title') }}" placeholder="Masukkan Judul Modul">
                        @error('title') <div class="text-red-500 mt-1">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mt-4">
                    <label for="description" class="block font-semibold">Deskripsi</label>
                    <textarea id="description" name="description" rows="3" class="border border-gray-300 rounded p-2 w-full" placeholder="Deskripsikan modul">{{ old('description') }}</textarea>
                    @error('description') <div class="text-red-500 mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="mt-4">
                    <label for="file_modul" class="block font-semibold">File Modul</label>
                    <input type="file" id="file_modul" name="file_modul" class="border border-gray-300 rounded p-2 w-full" onchange="previewFile()">
                    <div id="file_preview" class="mt-2"></div>
                    @error('file_modul') <div class="text-red-500 mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="mt-4 flex justify-end">
                    <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded mr-2" onclick="closeModal('modulModal')">Batal</button>
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">Kirim</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modul Update Modals --}}
    @foreach ($moduls as $modul)
        <div id="editModulModal_{{ $modul->id }}" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-2xl">
                <h5 class="text-xl font-bold mb-4">Ubah Modul</h5>
                <form action="{{ route('moduls.update', $modul->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="class_id_{{ $modul->id }}" class="block font-semibold">Kelas</label>
                            <select name="class_id" id="class_id_{{ $modul->id }}" class="border border-gray-300 rounded p-2 w-full">
                                <option value="" disabled selected>Pilih Kelas</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}" {{ $modul->class_id == $class->id ? 'selected' : '' }}>{{ $class->name_class }}</option>
                                @endforeach
                            </select>
                            @error('class_id') <div class="text-red-500 mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div>
                            <label for="title_{{ $modul->id }}" class="block font-semibold">Judul Modul</label>
                            <input type="text" id="title_{{ $modul->id }}" name="title" class="border border-gray-300 rounded p-2 w-full" value="{{ $modul->title }}">
                            @error('title') <div class="text-red-500 mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mt-4">
                        <label for="description_{{ $modul->id }}" class="block font-semibold">Deskripsi</label>
                        <textarea id="description_{{ $modul->id }}" name="description" rows="3" class="border border-gray-300 rounded p-2 w-full">{{ $modul->description }}</textarea>
                        @error('description') <div class="text-red-500 mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mt-4">
                        <label for="file_modul_{{ $modul->id }}" class="block font-semibold">File Modul</label>
                        <input type="file" id="file_modul_{{ $modul->id }}" name="file_modul" class="border border-gray-300 rounded p-2 w-full" onchange="previewFile({{ $modul->id }})">
                        <div id="file_preview_{{ $modul->id }}" class="mt-2"></div>
                        @error('file_modul') <div class="text-red-500 mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mt-4 flex justify-end">
                        <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded mr-2" onclick="closeModal('editModulModal_{{ $modul->id }}')">Batal</button>
                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection
