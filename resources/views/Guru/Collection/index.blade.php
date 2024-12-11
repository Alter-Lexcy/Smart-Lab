@extends('layouts.appTeacher')

@section('content')
    <div class="container mx-auto p-4">
        <div class="container mx-auto pt-2">
            <div class="flex items-center space-x-2 mb-2">
                <h1 class="text-2xl font-bold mr-auto">Pengumpulan</h1>
                <!-- Tombol Search -->
                <form action="" method="GET">
                    <button type="submit"
                        class="p-2 h-10 border-2 bg-white text-black rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24">
                            <path fill="black"
                                d="M15.5 14h-.79l-.28-.27A6.47 6.47 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14" />
                        </svg>
                    </button>
                </form>
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
            <!-- Table of assessments -->
            <div class="block max-w bg-white rounded-lg shadow hover:bg-white">
                <h6 class="font-semibold p-3 text-sm ps-5">Daftar Tugas</h6>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white text-center rounded-lg">
                        <thead>
                            <tr class="border">
                            <th class="px-4 py-2 text-gray-500 text-xs font-semibold">No</th>
                            <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Nama Tugas</th>
                            <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Status</th>
                            <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Nilai Tugas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collections as $index => $collection)
                            <tr>
                                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">{{ $collection->Task->title_task }}</td>
                                <td class="border px-4 py-2">{{ $collection->status }}</td>
                                <td class="border px-4 py-2">{{ $collection->Assesment->mark_task ?? 'Tidak tersedia' }}
                                </td>
                                <td class="border px-4 py-2 ">
                                        <!-- Delete form -->
                                        <form action="{{ route('collection.destroy', $collection->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 rounded-sm"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus assessment ini?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-6">
                                                    <path fill-rule="evenodd"
                                                        d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Modals for editing each assessment -->
            @foreach ($collections as $collection)
                <div id="editCollectionModal_{{ $collection->id }}" class="hidden fixed inset-0 z-50 overflow-y-auto"
                    style="display: none;">
                    <div class="flex items-center justify-center min-h-screen px-4">
                        <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
                            <h5 class="text-xl font-semibold mb-4">Edit Penilaian</h5>
                            <form action="{{ route('assesments.update', $collection->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label for="task_id" class="block text-gray-700 font-bold mb-2">Tugas</label>
                                    <select name="task_id" id="task_id" class="w-full px-3 py-2 border rounded">
                                        <option value="" disabled selected>Pilih Tugas</option>
                                        @foreach ($tasks as $task)
                                            <option value="{{ $task->id }}"
                                                {{ $collection->task_id ? 'selected' : '' }}>
                                                {{ $task->title_task }}</option>
                                        @endforeach
                                    </select>
                                    @error('task_id')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="user_id" class="block text-gray-700 font-bold mb-2">Siswa</label>
                                    <select name="user_id" id="user_id"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                        <option value="" disabled selected>Pilih Siswa</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ $collection->user_id == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="mark_task_{{ $collection->id }}" class="block font-semibold">Nilai
                                        Tugas</label>
                                    <input type="text" class="w-full mt-1 p-2 border border-gray-300 rounded"
                                        id="mark_task_{{ $collection->id }}" name="mark_task"
                                        value="{{ $collection->mark_task }}">
                                </div>

                                <div class="flex justify-end gap-2">
                                    <button type="button" class="bg-gray-400 text-white py-2 px-4 rounded"
                                        onclick="document.getElementById('editCollectionModal_{{ $collection->id }}').classList.add('hidden')">Batal</button>
                                    <button type="submit"
                                        class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
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
                closeModal('assessmentModal'); // Menutup modal setelah data berhasil ditambah
            });
        @endif
    </script>
@endsection
