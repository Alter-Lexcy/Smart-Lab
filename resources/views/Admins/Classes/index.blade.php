    @extends('layouts.app')
    @section('content')
        <div class="container mx-auto p-5">
            <!-- Button untuk Modal Tambah -->
            <div class="container mx-auto p-4">
                <div class="flex items-center justify-between mb-4">
                    <h1 class="text-2xl font-bold mr-auto">Daftar Kelas</h1>
                    <a class="group relative inline-block text-xs font-medium text-blue-500 focus:outline-none focus:ring active:text-indigo-500"
                        onclick="openModal('classModal')">
                        <span class="absolute inset-0 translate-x-1.5 translate-y-1.5 bg-blue-500 transition-transform group-hover:translate-x-0 group-hover:translate-y-0 rounded-md"></span>
                        <span class="relative block border border-current bg-white px-3 py-2 rounded-md">Tambah Kelas -></span>
                    </a>
                </div>
            </div>

            <!-- Tabel Kelas -->
            <table class="min-w-full bg-white text-center border border-gray-300">
                <thead class="bg-gradient-to-r from-sky-200 to-blue-300">
                    <tr class="border">
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Nama Kelas</th>
                        <th class="px-4 py-2 border">Deskripsi Kelas</th>
                        <th class="px-4 py-2 border">Nama Guru</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classes as $index => $class)
                        <tr class="border">
                            <td class="py-2 px-4 border">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4 border">{{ $class->Subject->name_subject }}</td>
                            <td class="py-2 px-4 border">{{ $class->name_class }}</td>
                            <td class="py-2 px-4 border">{{ $class->description }}</td>
                            <td class="py-2 px-4 border space-x-5">
                                <!-- Tombol Ubah untuk Modal -->
                                <button type="button" class="text-yellow-500 rounded-sm"
                                    onclick="openModal('editClassModal-{{ $class->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                        <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                    </svg>
                                </button>
                                <!-- Tombol Hapus -->
                                <form action="{{ route('classes.destroy', $class->id) }}" method="POST"
                                    class="inline-block ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 rounded-sm"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus Kelas ini?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                            <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal Update/Ubah -->
                        <div class="classModal fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 z-50" style="display: none;"
                            id="editClassModal-{{ $class->id }}">
                            <div class="bg-white rounded-lg overflow-hidden w-full max-w-lg mx-4">
                                <div class="p-5">
                                    <h5 class="text-lg font-bold">Ubah Kelas</h5>
                                    <form action="{{ route('classes.update', $class->id) }}" method="POST" class="mt-4">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-4">
                                            <label class="block text-gray-700">Guru Pengajar</label>
                                            <select class="w-full px-4 py-2 border rounded" name="teacher_id">
                                                @foreach ($subject as $mapel)
                                                    <option value="{{ $teacher->id }}"
                                                        {{ $mapel->id == $class->mapel_id ? 'selected' : '' }}>
                                                        {{ $mapel->name_subject }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-gray-700">Nama Kelas</label>
                                            <input type="text" class="w-full px-4 py-2 border rounded" name="name_class"
                                                value="{{ $class->name_class }}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-gray-700">Deskripsi</label>
                                            <textarea class="w-full px-4 py-2 border rounded" rows="3" name="description">{{ $class->description }}</textarea>
                                        </div>
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Simpan
                                            Perubahan</button>
                                    <button type="button" class="bg-gray-300 hover:bg-gray-400 text-white px-4 py-2 rounded" onclick="closeModal('editClassModal-{{ $class->id }}')">Batal</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal Tambah Kelas -->
        <div id="classModal" class="fixed inset-0 flex items-center justify-center" style="display: none;">
            <div class="bg-white rounded-lg overflow-hidden w-full max-w-lg mx-4">
                <div class="p-5">
                    <h5 class="text-lg font-bold">Tambah Kelas</h5>
                    <form action="{{ route('classes.store') }}" method="POST" class="mt-4">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700">Mapel</label>
                            <select class="w-full px-4 py-2 border rounded" name="teacher_id">
                                <option value="" disabled selected>Pilih Mapel</option>
                                @foreach ($subject as $mapel)
                                    <option value="{{ $mapel->id }}"
                                        {{ old('subject_id') == $mapel->id ? 'selected' : '' }}>{{ $mapel->name_subject }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Nama Kelas</label>
                            <input type="text" class="w-full px-4 py-2 border rounded" name="name_class"
                                value="{{ old('name_class') }}">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Deskripsi</label>
                            <textarea class="w-full px-4 py-2 border rounded" rows="3" name="description">{{ old('description') }}</textarea>
                        </div>
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Tambah Kelas</button>
                        <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded" onclick="closeModal('classModal')">Batal</button>
                    </form>
                </div>
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
                        closeModal('classModal'); // Menutup modal setelah data berhasil ditambah
                    });
                @endif
            </script>
    @endsection

