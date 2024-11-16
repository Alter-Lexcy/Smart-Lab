@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Tugas</h2>

        <!-- Button to Open Add Task Modal -->
        <button type="button"
            class="bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-r hover:from-cyan-600 hover:to-blue-600 text-white font-bold py-2 px-4 rounded mb-4"
            onclick="openModal('taskModal')">Tambah Tugas</button>

        <!-- Task Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 text-center">
                <thead>
                    <tr class=" text-black  ">
                        <th class="py-3 px-6 ">No</th>
                        <th class="py-3 px-6 ">Kelas</th>
                        <th class="py-3 px-6 ">Judul Tugas</th>
                        <th class="py-3 px-6 ">Deskripsi Tugas</th>
                        <th class="py-3 px-6 ">Tanggal Pengumpulan Tugas</th>
                        <th class="py-3 px-6 ">Aksi</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($tasks as $task)
                        <tr class="border border-gray-300">
                            <td class="py-3 px-6">{{ $loop->iteration }}</td>
                            <td class="py-3 px-6">{{ $task->Class->name_class }}</td>
                            <td class="py-3 px-6">{{ $task->title_task }}</td>
                            <td class="py-3 px-6">{{ $task->description_task }}</td>
                            <td class="py-3 px-6">{{ \Carbon\Carbon::parse($task->date_collection)->translatedFormat('H:i l, j F Y') }}</td>
                            <td class="py-3 px-6">
                                <!-- Open edit modal -->
                                <button type="button"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-2 rounded"
                                    onclick="openModal('editTaskModal{{ $task->id }}')">Ubah Tugas</button>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded"
                                        type="submit"
                                        onclick="return confirm('Apakah Anda ingin menghapus tugas ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Create -->
    <div id="taskModal" class="fixed inset-0 flex items-center justify-center" style="display: none;">
        <div class="bg-white rounded-lg overflow-hidden w-full max-w-md p-6">
            <h5 class="text-xl font-bold mb-4">Tambah Tugas</h5>
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="class_id" class="block text-gray-700 font-bold mb-2">Kelas</label>
                    <select name="class_id" id="class_id" class="w-full px-3 py-2 border rounded">
                        <option value="" disabled selected>Pilih Kelas</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>
                                {{ $class->name_class }}</option>
                        @endforeach
                    </select>
                    @error('class_id')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="title_task" class="block text-gray-700 font-bold mb-2">Judul Tugas</label>
                    <input type="text" id="title_task" name="title_task" class="w-full px-3 py-2 border rounded"
                        value="{{ old('title_task') }}">
                    @error('title_task')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description_task" class="block text-gray-700 font-bold mb-2">Deskripsi</label>
                    <textarea id="description_task" rows="3" name="description_task" class="w-full px-3 py-2 border rounded">{{ old('description_task') }}</textarea>
                    @error('description_task')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="date_collection" class="block text-gray-700 font-bold mb-2">Tanggal dan Waktu Pengumpulan Tugas</label>
                    <input type="datetime-local" id="date_collection" name="date_collection" 
                        class="w-full px-3 py-2 border rounded"
                        value="{{ old('date_collection') }}">
                    @error('date_collection')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit"
                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Kirim</button>
                <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded"
                    onclick="closeModal('taskModal')">Batal</button>
            </form>
        </div>
    </div>

    <!-- Modal Update -->
    @foreach ($tasks as $task)
        <div id="editTaskModal{{ $task->id }}"
            class="taskModal fixed inset-0 z-50 hidden  items-center justify-center bg-black " style="display: none;">
            <div class="bg-white rounded-lg overflow-hidden w-full max-w-md p-6">
                <h5 class="text-xl font-bold mb-4">Ubah Tugas</h5>
                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="class_id" class="block text-gray-700 font-bold mb-2">Kelas</label>
                        <select name="class_id" id="class_id" class="w-full px-3 py-2 border rounded">
                            <option value="" disabled selected>Pilih Kelas</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}" {{ $task->class_id == $class->id ? 'selected' : '' }}>
                                    {{ $class->name_class }}</option>
                            @endforeach
                        </select>
                        @error('class_id')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="title_task" class="block text-gray-700 font-bold mb-2">Judul Tugas</label>
                        <input type="text" id="title_task" name="title_task" class="w-full px-3 py-2 border rounded"
                            value="{{ $task->title_task }}">
                        @error('title_task')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="description_task" class="block text-gray-700 font-bold mb-2">Deskripsi</label>
                        <textarea id="description_task" rows="3" name="description_task" class="w-full px-3 py-2 border rounded">{{ $task->description_task }}</textarea>
                        @error('description_task')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="date_collection" class="block text-gray-700 font-bold mb-2">Tanggal Pengumpulan
                            Tugas</label>
                        <input type="datetime-local" id="date_collection" name="date_collection"
                            class="w-full px-3 py-2 border rounded" value="{{ $task->date_collection }}">
                        @error('date_collection')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Kirim</button>
                    <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded"
                        onclick="closeModal('editTaskModal{{ $task->id }}')">Batal</button>
                </form>
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
                closeModal('taskModal'); // Menutup modal setelah data berhasil ditambah
            });
        @endif
    </script>
@endsection
