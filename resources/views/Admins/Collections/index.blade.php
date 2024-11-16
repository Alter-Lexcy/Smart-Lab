@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 mt-5">
    <h2 class="text-2xl font-bold mb-4">Daftar Koleksi</h2>

    <!-- Button Tambah Collection -->
    <button type="button" class="bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-r hover:from-cyan-600 hover:to-blue-600 text-white font-bold py-2 px-4 rounded mb-4" onclick="toggleModal('addCollectionModal')">
        Tambah Collection
    </button>

    <!-- Tabel Data Koleksi -->
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr class="">
                <th class="py-2 px-4 border">ID</th>
                <th class="py-2 px-4 border">User ID</th>
                <th class="py-2 px-4 border">Task ID</th>
                <th class="py-2 px-4 border">File Collection</th>
                <th class="py-2 px-4 border">Status</th>
                <th class="py-2 px-4 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($collections as $collection)
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4 border">{{ $collection->id }}</td>
                    <td class="py-2 px-4 border">{{ $collection->user_id }}</td>
                    <td class="py-2 px-4 border">{{ $collection->task_id }}</td>
                    <td class="py-2 px-4 border">{{ $collection->file_collection }}</td>
                    <td class="py-2 px-4 border">{{ $collection->status }}</td>
                    <td class="py-2 px-4 border">
                        <button type="button" class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded" onclick="toggleModal('editCollectionModal-{{ $collection->id }}')">
                            Edit
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Tambah Collection Modal -->
<div id="addCollectionModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg">
        <h5 class="text-xl font-bold mb-4">Tambah Collection</h5>
        <button type="button" class="text-gray-400 hover:text-gray-600 absolute top-2 right-2" onclick="toggleModal('addCollectionModal')">&times;</button>
        <form action="{{ route('collections.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="user_id" class="block font-semibold">User ID</label>
                <input type="number" id="user_id" name="user_id" class="border border-gray-300 rounded p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="task_id" class="block font-semibold">Task ID</label>
                <input type="number" id="task_id" name="task_id" class="border border-gray-300 rounded p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="file_collection" class="block font-semibold">File Collection</label>
                <input type="file" id="file_collection" name="file_collection" class="border border-gray-300 rounded p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="status" class="block font-semibold">Status</label>
                <select id="status" name="status" class="border border-gray-300 rounded p-2 w-full" required>
                    <option value="not yet rated">Not Yet Rated</option>
                    <option value="has been rated">Has Been Rated</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Tambah Collection</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Collection Modals -->
@foreach ($collections as $collection)
    <div id="editCollectionModal-{{ $collection->id }}" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg">
            <h5 class="text-xl font-bold mb-4">Edit Collection</h5>
            <button type="button" class="text-gray-400 hover:text-gray-600 absolute top-2 right-2" onclick="toggleModal('editCollectionModal-{{ $collection->id }}')">&times;</button>
            <form action="{{ route('collections.update', $collection->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="user_id-{{ $collection->id }}" class="block font-semibold">User ID</label>
                    <input type="number" id="user_id-{{ $collection->id }}" name="user_id" class="border border-gray-300 rounded p-2 w-full" value="{{ $collection->user_id }}" required>
                </div>
                <div class="mb-4">
                    <label for="task_id-{{ $collection->id }}" class="block font-semibold">Task ID</label>
                    <input type="number" id="task_id-{{ $collection->id }}" name="task_id" class="border border-gray-300 rounded p-2 w-full" value="{{ $collection->task_id }}" required>
                </div>
                <div class="mb-4">
                    <label for="file_collection-{{ $collection->id }}" class="block font-semibold">File Collection</label>
                    <input type="file" id="file_collection-{{ $collection->id }}" name="file_collection" class="border border-gray-300 rounded p-2 w-full">
                    <small class="text-gray-500">File saat ini: {{ $collection->file_collection }}</small>
                </div>
                <div class="mb-4">
                    <label for="status-{{ $collection->id }}" class="block font-semibold">Status</label>
                    <select id="status-{{ $collection->id }}" name="status" class="border border-gray-300 rounded p-2 w-full" required>
                        <option value="not yet rated" {{ $collection->status == 'not yet rated' ? 'selected' : '' }}>Not Yet Rated</option>
                        <option value="has been rated" {{ $collection->status == 'has been rated' ? 'selected' : '' }}>Has Been Rated</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Update Collection</button>
                </div>
            </form>
        </div>
    </div>
@endforeach

<!-- Tailwind CSS Modal Toggle Script -->
<script>
    function toggleModal(modalID) {
        document.getElementById(modalID).classList.toggle('hidden');
        document.getElementById(modalID).classList.toggle('flex');
    }
</script>
@endsection
