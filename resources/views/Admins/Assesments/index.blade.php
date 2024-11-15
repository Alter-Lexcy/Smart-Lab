@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-semibold mb-4">Daftar Assessment</h2>

    <!-- Button to trigger the modal for adding a new assessment -->
    <button type="button" class="bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-r hover:from-cyan-600 hover:to-blue-600 text-white font-bold py-2 px-4 rounded mb-4" data-modal-target="#addAssessmentModal">
        Tambah Assessment
    </button>

    <!-- Table of assessments -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
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
                            <button type="button" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-2 rounded" data-modal-target="#editAssessmentModal_{{ $assessment->id }}">
                                Edit
                            </button>

                            <!-- Delete form -->
                            <form action="{{ route('assessments.destroy', $assessment->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus assessment ini?')">
                                    Hapus
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
<div id="addAssessmentModal" class="hidden fixed inset-0 z-50 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
            <h5 class="text-xl font-semibold mb-4">Tambah Assessment</h5>
            <form action="{{ route('assesments.store') }}" method="POST">
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
                    <button type="button" class="bg-gray-400 text-white py-2 px-4 rounded" onclick="document.getElementById('addAssessmentModal').classList.add('hidden')">Batal</button>
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modals for editing each assessment -->
@foreach ($assessments as $assessment)
    <div id="editAssessmentModal_{{ $assessment->id }}" class="hidden fixed inset-0 z-50 overflow-y-auto">
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
@endsection
