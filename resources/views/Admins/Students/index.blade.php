@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Daftar Siswa</h1>
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
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white text-center border border-gray-300 border-collapse">
                <thead class="bg-gradient-to-r from-sky-200 to-blue-300">
                    <tr class="border">
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Nama Siswa</th>
                        <th class="px-4 py-2 border">Email Siswa</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr class="border">
                            <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border">{{ $student->name }}</td>
                            <td class="px-4 py-2 border">{{ $student->email }}</td>
                            <td class="px-4 py-2 border">
                                <button class="bg-green-400 px-4 py-2 text-white font-medium rounded-md"
                                    onclick="openModal('assignModal-{{ $student->id }}')">
                                    Penempatan
                                </button>
                            </td>
                        </tr>
                        <div id="assignModal-{{ $student->id }}"
                            class="fixed inset-0 bg-black bg-opacity-50  items-center justify-center "
                            style="display: none">
                            <div class="bg-white rounded-lg overflow-hidden w-full max-w-lg mx-4">
                                <div class="p-5">
                                    <h5 class="text-lg font-bold">Tambah Kelas</h5>
                                    <form action="" method="POST" class="mt-4">
                                        @method('PUT')
                                        @csrf
                                        <div class="mb-4">
                                            <label class="block text-gray-700">Nama Kelas</label>
                                            <select name="classes_id" id="classes_id"
                                                class="w-full px-3 py-2 border rounded">
                                                <option value="" disabled selected>Pilih Kelas</option>
                                                @foreach ($classes as $class)
                                                    <option value="{{ $class->id }}"
                                                        {{ old('classes_id') == $class->id ? 'selected' : '' }}>
                                                        {{ $class->name_class }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="mt-4 flex justify-end space-x-2">
                                            <button type="button" onclick="closeModal('assignModal-{{ $student->id }}')"
                                                class="px-4 py-2 bg-gray-500 text-white rounded-md">Batal</button>
                                            <button type="submit"
                                                class="px-4 py-2 bg-green-500 text-white rounded-md">Kirim</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function openModal(id) {
            console.log(`Opening modal: ${id}`);
            document.getElementById(id).style.display = 'flex';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        function closeModal(id) {
            console.log(`Closing modal: ${id}`);
            document.getElementById(id).style.display = 'none';
        }
    </script>
@endsection
