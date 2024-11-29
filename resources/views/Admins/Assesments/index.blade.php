@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mr-auto">Daftar Penilaian</h1>
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
                    onclick="openModal('assessmentModal')">
                    <span
                        class="absolute inset-0 translate-x-1.5 translate-y-1.5 bg-blue-500 transition-transform group-hover:translate-x-0 group-hover:translate-y-0 rounded-md"></span>
                    <span class="relative block border border-current bg-white px-3 py-2 rounded-md">Tambah Penilaian
                        -></span>
                </a>
            </div>
        </div>
        <!-- Table of assessments -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white text-center border border-gray-200">
                <thead class="bg-gradient-to-r from-sky-200 to-blue-300">
                    <tr>
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Tugas</th>
                        <th class="border px-4 py-2">Siswa</th>
                        <th class="border px-4 py-2">Mark Task</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assessments as $index => $assessment)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $assessment->Task->title_task ?? 'Tidak tersedia' }}</td>
                            <td class="border px-4 py-2">{{ $assessment->User->name ?? 'Tidak tersedia' }}</td>
                            <td class="border px-4 py-2">{{ $assessment->mark_task }}</td>
                            <td class="border px-4 py-2 ">
                                <!-- Edit button to open modal -->
                                <button type="button" class="text-yellow-500 rounded-sm"
                                    onclick="openModal('editAssessmentModal-{{ $assessment->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-6">
                                        <path
                                            d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                        <path
                                            d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                    </svg>
                                </button>

                                <!-- Delete form -->
                                <form action="{{ route('assesments.destroy', $assessment->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 rounded-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus assessment ini?')">
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

    <!-- Modal for adding a new assessment -->
    <div id="assessmentModal" class="hidden fixed inset-0 z-50 overflow-y-auto" style="display: none;">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg shadow-lg w-full p-6">
                <h5 class="text-xl font-semibold mb-4">Tambah Assessment</h5>
                <form action="{{ route('assesments.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="task_id" class="block text-gray-700 font-bold mb-2">Tugas</label>
                        <select name="task_id" id="task_id" class="w-full px-3 py-2 border rounded">
                            <option value="" disabled selected>Pilih Tugas</option>
                            @foreach ($tasks as $task)
                                <option value="{{ $task->id }}" {{ old('task_id') == $task->id ? 'selected' : '' }}>
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
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="mark_task" class="block font-semibold">Nilai Tugas</label>
                        <input type="number" class="w-full mt-1 p-2 border border-gray-300 rounded" id="mark_task"
                            name="mark_task" placeholder="Masukkan Mark Task">
                        @error('mark_task')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">Tambah
                        Penilaian</button>
                    <button type="button" class="bg-gray-400 text-white py-2 px-4 rounded"
                        onclick="closeModal('assessmentModal')">Batal</button>
            </div>
        </div>
    </div>

    <!-- Modals for editing each assessment -->
    @foreach ($assessments as $assessment)
        <div id="editAssessmentModal-{{ $assessment->id }}" class="assessmentModal hidden fixed inset-0 z-50 overflow-y-auto"
            style="display: none;">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
                    <h5 class="text-xl font-semibold mb-4">Edit Penilaian</h5>
                    <form action="{{ route('assesments.update', $assessment->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="task_id" class="block text-gray-700 font-bold mb-2">Tugas</label>
                            <select name="task_id" id="task_id" class="w-full px-3 py-2 border rounded">
                                <option value="" disabled selected>Pilih Tugas</option>
                                @foreach ($tasks as $task)
                                    <option value="{{ $task->id }}" {{ $assessment->task_id ? 'selected' : '' }}>
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
                                        {{ $assessment->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="mark_task_{{ $assessment->id }}" class="block font-semibold">Mark Task</label>
                            <input type="text" class="w-full mt-1 p-2 border border-gray-300 rounded"
                                id="mark_task_{{ $assessment->id }}" name="mark_task"
                                value="{{ $assessment->mark_task }}">
                        </div>

                        <div class="flex justify-end gap-2">
                            <button type="button" class="bg-gray-400 text-white py-2 px-4 rounded"
                                onclick="document.getElementById('editAssessmentModal-{{ $assessment->id }}').classList.add('hidden')">Batal</button>
                            <button type="submit"
                                class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
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
