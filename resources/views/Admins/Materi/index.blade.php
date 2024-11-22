@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-bold mr-auto">Daftar Materi</h1>
            <a class="group relative inline-block text-xs font-medium text-blue-500 focus:outline-none focus:ring active:text-indigo-500"
                onclick="openModal('materiModal')">
                <span
                    class="absolute inset-0 translate-x-1.5 translate-y-1.5 bg-blue-500 transition-transform group-hover:translate-x-0 group-hover:translate-y-0 rounded-md"></span>
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
                                @if ($materi->file_materi)
                                    <img src="{{ asset('file_materi/' . $materi->file_materi) }}" alt="Preview"
                                        class="w-16 h-16 object-cover">
                                @else
                                    No Image
                                @endif
                            </td>



                            <td class="px-4 py-2 border">{{ $materi->description }}</td>
                            <td class="px-4 py-2 border space-x-5">
                                <!-- Tombol Ubah -->
                                <button type="button" class="text-yellow-500 rounded-sm"
                                    onclick="openModal('materiModal-{{ $materi->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-6">
                                        <path
                                            d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                        <path
                                            d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                    </svg>
                                </button>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('materis.destroy', $materi->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 rounded-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus materi ini?')">
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
    <!-- Modal Edit -->
    @foreach ($materis as $materi)
        <div id="materiModal-{{ $materi->id }}"
            class="materiModal fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 z-50 overflow-auto"
            style="display:none;">
            <div class="bg-white rounded-lg py-6 pl-6 w-[50%] h-auto shadow-lg">
                <h5 class="text-xl font-bold mb-4">Ubah Materi</h5>
                <form action="{{ route('materis.update', $materi->id) }}" method="POST" enctype="multipart/form-data"
                    class="overflow-y-auto h-[70%]">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-3">
                            <label for="name_subject-{{ $materi->id }}" class="block font-medium mb-1">Nama
                                Mapel</label>
                            <select id="name_subject-{{ $materi->id }}" name="subject_id"
                                class="w-full border rounded px-3 py-2">
                                <option value="" disabled>Pilih Nama Mapel</option>
                                @foreach ($subjects as $mapel)
                                    <option value="{{ $mapel->id }}"
                                        {{ $mapel->subject_id == $mapel->id ? 'selected' : '' }}>
                                        {{ $mapel->name_subject }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 mr-6">
                            <label for="classes_id" class="block font-medium mb-1">Kelas</label>
                            <select id="classes_id" name="classes_id" class="w-full border rounded px-3 py-2">
                                <option value="" disabled>Pilih Kelas</option>
                                @foreach ($classes as $kelas)
                                    <option value="{{ $kelas->id }}"
                                        {{ $materi->kelas_id == $kelas->id ? 'selected' : '' }}>
                                        {{ $kelas->name_class }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 mr-6">
                        <label for="title_materi-{{ $materi->id }}" class="block font-medium mb-1">Nama
                            Materi</label>
                        <input type="text" id="title_materi-{{ $materi->id }}" name="title_materi"
                            class="w-full border rounded px-3 py-2" value="{{ $materi->title_materi }}">
                    </div>

                    <div class="mb-3 mr-6">
                        <label for="description-{{ $materi->id }}" class="block font-medium mb-1">Deskripsi</label>
                        <textarea id="description-{{ $materi->id }}" rows="2" name="description"
                            class="w-full px-3 py-2 border rounded" value="{{ $materi->description }}">{{ old('description') }}</textarea>
                    </div>
                    <div class="mb-3 mr-6">
                        <label for="file_materi-{{ $materi->id }}" class="block font-medium mb-1">File
                            Materi
                        </label>
                        <!-- Image preview -->
                        <img id="image-preview-{{ $materi->id }}" class="mt-2 w-32 mb-2"
                            src="{{ $materi->file_materi ? asset('file_materi/' . $materi->file_materi) : '' }}"
                            alt="Preview" style="{{ $materi->file_materi ? '' : 'display: none;' }}" />
                        <input type="file" id="file_materi-{{ $materi->id }}" name="file_materi"
                            class="w-full border rounded px-3 py-2">
                    </div>

                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan
                        Perubahan</button>
                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded"
                        onclick="closeModal('materiModal-{{ $materi->id }}')">Batal</button>
                </form>
            </div>
        </div>
    @endforeach

    <!-- Modal Tambah -->
    <div id="materiModal" class="fixed inset-0 flex items-center justify-center " style="display: none;">
        <div class="bg-white rounded-lg py-6 pl-6 w-[50%] h-auto shadow-lg ">
            <h5 class="text-xl font-bold mb-4">Tambah Materi</h5>
            <form action="{{ route('materis.store') }}" method="POST" enctype="multipart/form-data"
                class="overflow-y-auto h-[70%]">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-3">
                        <label for="subject_id" class="block font-medium mb-1">Pilih Mapel</label>
                        <select id="subject_id" name="subject_id" class="w-full border rounded px-3 py-2">
                            <option value="" disabled selected>Pilih Nama Mapel</option>
                            @foreach ($subjects as $mapel)
                                <option value="{{ $mapel->id }}">{{ $mapel->name_subject }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-3 mr-6">
                        <label for="classes_id" class="block font-medium mb-1">Kelas</label>
                        <select id="classes_id" name="classes_id" class="w-full border rounded px-3 py-2">
                            <option value="" disabled selected>Pilih Kelas</option>
                            @foreach ($classes as $kelas)
                                <option value="{{ $kelas->id }}">{{ $kelas->name_class }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3 mr-6">
                    <label for="title_materi" class="block font-medium mb-1">Nama Materi</label>
                    <input type="text" id="title_materi" name="title_materi" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-3 mr-6">
                    <label for="description" class="block font-medium mb-1">Deskripsi</label>
                    <textarea id="description" rows="2" name="description" class="w-full px-3 py-2 border rounded">{{ old('description') }}</textarea>
                </div>

                <div class="mb-3 mr-6">
                    <label for="file_materi" class="block font-medium mb-1">File Materi</label>
                    <!-- Image preview -->
                    <img id="image-preview-new" class="mt-2 w-32 mb-2" style="display: none;" alt="Preview" />
                    <input type="file" id="file_materi-new" name="file_materi"
                        class="w-full border rounded px-3 py-2">
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded"
                    onclick="closeModal('materiModal')">Batal</button>
            </form>
        </div>
    </div>

    <script>
        // Seleksi elemen secara unik untuk modal tertentu
        document.querySelectorAll('input[type="file"]').forEach(input => {
            input.addEventListener('change', function(event) {
                const previewId = this.id.replace('file_materi', 'image-preview');
                const imagePreview = document.getElementById(previewId);
                const file = event.target.files[0];

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    imagePreview.style.display = 'none';
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
                closeModal('materiModal'); // Menutup modal setelah data berhasil ditambah
            });
        @endif
    </script>
@endsection
