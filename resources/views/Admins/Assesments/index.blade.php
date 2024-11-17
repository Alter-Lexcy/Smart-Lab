@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-semibold mb-4">Daftar Assessment</h2>

    <!-- Button to trigger the modal for adding a new assessment -->
    <button type="button" class="bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-r hover:from-cyan-600 hover:to-blue-600 text-white font-bold py-2 px-4 rounded mb-4" onclick="openModal('assessmentModal')">
        Tambah Assessment
    </button>

    <!-- Table of assessments -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-gradient-to-r from-cyan-100 to-blue-300">
                <tr>
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Collection</th>
                    <th class="border px-4 py-2">User</th>
                    <th class="border px-4 py-2">Mark Task</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assessments as $index => $assessment)
                    <tr>
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $assessment->collection->name ?? 'Tidak tersedia' }}</td>
                        <td class="border px-4 py-2">{{ $assessment->user->name ?? 'Tidak tersedia' }}</td>
                        <td class="border px-4 py-2">{{ $assessment->mark_task }}</td>
                        <td class="border px-4 py-2 flex gap-2">
                            <!-- Edit button to open modal -->
                            <button type="button" class="text-yellow-500 rounded-sm" data-modal-target="#editAssessmentModal_{{ $assessment->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                    <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                    <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                </svg>
                            </button>

                            <!-- Delete form -->
                            <form action="{{ route('assessments.destroy', $assessment->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus assessment ini?')">
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

<!-- Modal for adding a new assessment -->
<div id="assessmentModal" class="hidden fixed inset-0 z-50 overflow-y-auto" style="display: none;">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
            <h5 class="text-xl font-semibold mb-4">Tambah Assessment</h5>
            <form action="{{ route('assessments.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="collection_id" class="block font-semibold">Collection</label>
                    <select name="collection_id" id="collection_id" class="w-full mt-1 p-2 border border-gray-300 rounded">
                        <option value="" disabled selected>Pilih Collection</option>
                        @foreach ($collections as $collection)
                            <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                        @endforeach
                    </select>
                    @error('collection_id')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="user_id" class="block font-semibold">User</label>
                    <select name="user_id" id="user_id" class="w-full mt-1 p-2 border border-gray-300 rounded">
                        <option value="" disabled selected>Pilih User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="mark_task" class="block font-semibold">Mark Task</label>
                    <input type="text" class="w-full mt-1 p-2 border border-gray-300 rounded" id="mark_task" name="mark_task" placeholder="Masukkan Mark Task">
                    @error('mark_task')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" class="bg-gray-400 text-white py-2 px-4 rounded" onclick="closeModal('assessmentModal')">Batal</button>
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modals for editing each assessment -->
@foreach ($assessments as $assessment)
    <div id="editAssessmentModal_{{ $assessment->id }}" class="hidden fixed inset-0 z-50 overflow-y-auto" style="display: none;">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
                <h5 class="text-xl font-semibold mb-4">Edit Assessment</h5>
                <form action="{{ route('assessments.update', $assessment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="collection_id_{{ $assessment->id }}" class="block font-semibold">Collection</label>
                        <select name="collection_id" id="collection_id_{{ $assessment->id }}" class="w-full mt-1 p-2 border border-gray-300 rounded">
                            @foreach ($collections as $collection)
                                <option value="{{ $collection->id }}" {{ $collection->id == $assessment->collection_id ? 'selected' : '' }}>
                                    {{ $collection->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="user_id_{{ $assessment->id }}" class="block font-semibold">User</label>
                        <select name="user_id" id="user_id_{{ $assessment->id }}" class="w-full mt-1 p-2 border border-gray-300 rounded">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $user->id == $assessment->user_id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="mark_task_{{ $assessment->id }}" class="block font-semibold">Mark Task</label>
                        <input type="text" class="w-full mt-1 p-2 border border-gray-300 rounded" id="mark_task_{{ $assessment->id }}" name="mark_task" value="{{ $assessment->mark_task }}">
                    </div>

                    <div class="flex justify-end gap-2">
                        <button type="button" class="bg-gray-400 text-white py-2 px-4 rounded" onclick="document.getElementById('editAssessmentModal_{{ $assessment->id }}').classList.add('hidden')">Batal</button>
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">Simpan</button>
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
