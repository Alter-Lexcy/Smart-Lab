@extends('layouts.app')
@section('content')

    {{-- Script Select2 --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Daftar Guru</h1>
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
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">{{ session('success') }}</strong>
                <button onclick="this.parentElement.style.display='none'" class="absolute top-0 bottom-0 right-0 px-4 py-3">
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
                <button onclick="this.parentElement.style.display='none'" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white text-center border border-gray-300 rounded-lg">
                <thead class="bg-gradient-to-r from-sky-200 to-blue-300 ">
                    <tr class="border ">
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Nama Guru</th>
                        <th class="px-4 py-2 border">Email Guru</th>
                        <th class="px-4 py-2 border">NIP</th>
                        <th class="px-4 py-2 border">Kelas</th>
                        <th class="px-4 py-2 border">Mapel</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr class="border">
                            <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border">{{ $teacher->name }}</td>
                            <td class="px-4 py-2 border">{{ $teacher->email }}</td>
                            <td class="px-4 py-2 border">{{ $teacher->NIP }}</td>
                            <td class="px-4 py-2 border">
                                {{ $teacher->class->isNotEmpty() ? $teacher->class->pluck('name_class')->implode(', ') : 'kosong' }}
                            </td>
                            </td>
                            <td class="px-4 py-2 border">{{ $teacher->subject->name_subject ?? 'kosong' }}</td>
                            <td class="px-4 py-2 border">
                                <button class="bg-green-400 px-4 py-2 text-white font-medium rounded-md"
                                    onclick="openModal('assignModal-{{ $teacher->id }}')">
                                    Penempatan
                                </button>
                            </td>
                        </tr>
                        <div id="assignModal-{{ $teacher->id }}"
                            class="fixed inset-0 bg-black bg-opacity-50  items-center justify-center "
                            style="display: none">
                            <div class="bg-white rounded-lg overflow-hidden w-full max-w-lg mx-4">
                                <div class="p-5">
                                    <h5 class="text-lg font-bold">Tambah Kelas</h5>
                                    <form action="{{ route('assignTeacher', $teacher->id) }}" method="POST"
                                        class="mt-4">
                                        @method('PUT')
                                        @csrf
                                        <div class="mb-4">
                                            <label class="block text-gray-700">Mapel</label>
                                            <select id="name_subject" name="subject_id"
                                                class="w-full border rounded px-3 py-2">
                                                <option value="" disabled selected>Pilih Nama Mapel</option>
                                                @foreach ($subjects as $mapel)
                                                    <option value="{{ $mapel->id }}"
                                                        {{ old('subject_id', $mapel->subject_id) == $mapel->id ? 'selected' : '' }}>
                                                        {{ $mapel->name_subject }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-gray-700">Nama Kelas</label>
                                            <select name="classes_id[]" id="classes_id"
                                                class="w-full px-3 py-2 border rounded js-example-basic-multiple"
                                                multiple="multiple">
                                                <option value="" disabled>Pilih Kelas</option>
                                                @foreach ($classes as $class)
                                                    <option value="{{ $class->id }}"
                                                        {{ in_array($class->id, old('classes_id', [$class->classes_id])) ? 'selected' : '' }}>
                                                        {{ $class->name_class }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mt-4 flex justify-end space-x-2">
                                            <button type="button" onclick="closeModal('assignModal-{{ $teacher->id }}')"
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

        // Open the modal if validation fails
        @if (session('success'))
            document.addEventListener("DOMContentLoaded", function() {
                closeModal('subjectModal'); // Menutup modal setelah data berhasil ditambah
            });
        @endif

        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });

        $(document).ready(function() {
            // Inisialisasi untuk input Select2
            $('#classes_id').select2({
                placeholder: "Pilih Kelas",
                width: '100%' // Gunakan full width dari kontainer
            });

        });
    </script>
@endsection
