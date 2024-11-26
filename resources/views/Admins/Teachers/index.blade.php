@extends('layouts.app')
@section('content')
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
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white text-center border border-gray-300 rounded-lg">
                <thead class="bg-gradient-to-r from-sky-200 to-blue-300 ">
                    <tr class="border ">
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Nama Guru</th>
                        <th class="px-4 py-2 border">Email Guru</th>
                        <th class="px-4 py-2 border">NIP</th>
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
                                <button class="bg-green-400 px-4 py-2 text-white font-medium rounded-md"
                                    onclick="openModal('assignModal')">
                                    Assign
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div id="assignModal" class="fixed inset-0 bg-black bg-opacity-50  items-center justify-center "
            style="display: none">
            <div class="bg-white p-4 rounded-md w-1/3">

                <div class="mt-4 flex justify-end space-x-2">
                    <button onclick="closeModal('assignModal')"
                        class="px-4 py-2 bg-gray-500 text-white rounded-md">Cancel</button>
                    <button class="px-4 py-2 bg-green-500 text-white rounded-md">Confirm</button>
                </div>
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
                closeModal('subjectModal'); // Menutup modal setelah data berhasil ditambah
            });
        @endif
    </script>
@endsection
