@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-5">
        <h2 class="text-2xl font-bold mb-5">Daftar Kelas</h2>

        <!-- Button untuk Modal Tambah -->
        <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded mb-5" onclick="openModal('classModal')">
            Tambah Kelas
        </button>

        <!-- Tabel Kelas -->
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">No</th>
                    <th class="py-2 px-4 border-b">Nama Kelas</th>
                    <th class="py-2 px-4 border-b">Deskripsi Kelas</th>
                    <th class="py-2 px-4 border-b">Nama Guru</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classes as $index => $class)
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b">{{ $class->name_class }}</td>
                        <td class="py-2 px-4 border-b">{{ $class->description }}</td>
                        <td class="py-2 px-4 border-b">{{ $class->teacher->name_teacher }}</td>
                        <td class="py-2 px-4 border-b">
                            <!-- Tombol Ubah untuk Modal -->
                            <button type="button" class="bg-yellow-500 text-white px-3 py-1 rounded"
                                    onclick="openModal('editClassModal-{{ $class->id }}')">
                                Ubah
                            </button>
                            <!-- Tombol Hapus -->
                            <form action="{{ route('classes.destroy', $class->id) }}" method="POST" class="inline-block ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus Kelas ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Update/Ubah -->
                    <div class="fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 z-50" id="editClassModal-{{ $class->id }}">
                        <div class="bg-white rounded-lg overflow-hidden w-full max-w-lg mx-4">
                            <div class="p-5">
                                <h5 class="text-lg font-bold">Ubah Kelas</h5>
                                <button type="button" class="text-gray-500 float-right" onclick="closeModal('editClassModal-{{ $class->id }}')">&times;</button>
                                <form action="{{ route('classes.update', $class->id) }}" method="POST" class="mt-4">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Nama Kelas</label>
                                        <input type="text" class="w-full px-4 py-2 border rounded" name="name_class" value="{{ $class->name_class }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Deskripsi</label>
                                        <textarea class="w-full px-4 py-2 border rounded" rows="3" name="description">{{ $class->description }}</textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Guru Pengajar</label>
                                        <select class="w-full px-4 py-2 border rounded" name="teacher_id">
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}" {{ $teacher->id == $class->teacher_id ? 'selected' : '' }}>{{ $teacher->name_teacher }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan Perubahan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah Kelas -->
    <div class="fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 z-50" id="classModal">
        <div class="bg-white rounded-lg overflow-hidden w-full max-w-lg mx-4">
            <div class="p-5">
                <h5 class="text-lg font-bold">Tambah Kelas</h5>
                <button type="button" class="text-gray-500 float-right" onclick="closeModal('classModal')">&times;</button>
                <form action="{{ route('classes.store') }}" method="POST" class="mt-4">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700">Nama Kelas</label>
                        <input type="text" class="w-full px-4 py-2 border rounded" name="name_class" value="{{ old('name_class') }}">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Deskripsi</label>
                        <textarea class="w-full px-4 py-2 border rounded" rows="3" name="description">{{ old('description') }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Guru Pengajar</label>
                        <select class="w-full px-4 py-2 border rounded" name="teacher_id">
                            <option value="" disabled selected>Pilih Guru</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>{{ $teacher->name_teacher }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Tambah Kelas</button>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
    }
    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }
</script>
@endpush
