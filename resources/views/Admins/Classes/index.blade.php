    @extends('layouts.app')
    @section('content')
        <!-- CSS -->
        <style>
            #searchForm.show {
                opacity: 1;
                visibility: visible;
            }
        </style>
        <div class="container mx-auto p-4">
            <div class="container mx-auto pt-2">
                <div class="flex items-center space-x-2">
                    <h1 class="text-2xl font-bold mr-auto">Kelas</h1>
                    <!-- Tombol Search dengan Form Animasi -->
                    <div class="relative flex items-center">
                        <!-- Tombol Search -->
                        <form action="{{ route('classes.index') }}" method="GET" class="mt-4">
                            <button id="searchButton" name="search"
                                class="p-3 border-2 bg-white text-black rounded-lg flex items-center justify-center transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-[14px] w-[14px]" viewBox="0 0 24 24">
                                    <path fill="black"
                                        d="M15.5 14h-.79l-.28-.27A6.47 6.47 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14" />
                                </svg>
                            </button>
                        </form>

                        <!-- Form Pencarian -->
                        <form id="searchForm" action="" method="GET"
                            class="absolute right-full mr-2 mt-4 transition-all duration-300
                        {{ request('search') ? 'opacity-100 visible' : 'opacity-0 invisible' }}">
                            <input type="text" name="search" placeholder="Cari..."
                                value="{{ old('search', request('search')) }}"
                                class="p-2 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </form>
                    </div>

                    <form action="{{ route('classes.index') }}" method="GET" class="mt-4">
                        @php
                            $nextOrder = request('order', 'desc') === 'desc' ? 'asc' : 'desc';
                        @endphp
                        <input type="hidden" name="order" value="{{ $nextOrder }}">
                        <button type="submit"
                            class="p-3 border-2 bg-white text-black rounded-lg flex items-center justify-center">
                            @if (request('order', 'desc') === 'desc')
                                <svg class="w-[14px] h-[14px] fill-[#000000]" viewBox="0 0 576 512"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M151.6 42.4C145.5 35.8 137 32 128 32s-17.5 3.8-23.6 10.4l-88 96c-11.9 13-11.1 33.3 2 45.2s33.3 11.1 45.2-2L96 146.3 96 448c0 17.7 14.3 32 32 32s32-14.3 32-32l0-301.7 32.4 35.4c11.9 13 32.2 13.9 45.2 2s13.9-32.2 2-45.2l-88-96zM320 480l32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-32 0c-17.7 0-32 14.3-32 32s14.3 32 32 32zm0-128l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0c-17.7 0-32 14.3-32 32s14.3 32 32 32zm0-128l160 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-160 0c-17.7 0-32 14.3-32 32s14.3 32 32 32zm0-128l224 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L320 32c-17.7 0-32 14.3-32 32s14.3 32 32 32z" />
                                </svg>
                            @else
                                <svg class="w-[15px] h-[15px] fill-[#000000]" viewBox="0 0 576 512"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M151.6 469.6C145.5 476.2 137 480 128 480s-17.5-3.8-23.6-10.4l-88-96c-11.9-13-11.1-33.3 2-45.2s33.3-11.1 45.2 2L96 365.7V64c0-17.7 14.3-32 32-32s32 14.3 32 32V365.7l32.4-35.4c11.9-13 32.2-13.9 45.2-2s13.9 32.2 2 45.2l-88 96zM320 480c-17.7 0-32-14.3-32-32s14.3-32 32-32h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32H544c17.7 0 32 14.3 32 32s-14.3 32-32 32H320z">
                                    </path>
                                </svg>
                            @endif
                        </button>
                    </form>

                    <!-- Tombol Tambah Materi -->
                    <a class="w-[120px] h-[43px] p-2 border-2 text-xs text-white bg-blue-600 rounded-lg flex items-center justify-center hover:bg-blue-700 transition"
                        onclick="openModal('classModal')">
                        <svg class="w-[15px] h-[15px] fill-[#ffffff] me-2" viewBox="0 0 448 512"
                            xmlns="http://www.w3.org/2000/svg">

                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                            </path>

                        </svg>
                        Tambah
                    </a>
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
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
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

                <div class="block max-w bg-white rounded-lg shadow hover:bg-white">
                    <h6 class="font-semibold p-3 text-sm ps-5">Daftar Kelas</h6>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white text-center rounded-lg">
                            <thead>
                                <tr class="border">
                                    <th class="px-4 py-2 text-gray-500 text-xs font-semibold">No</th>
                                    <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Nama Kelas</th>
                                    <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Deskripsi Kelas</th>
                                    <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $offset = ($classes->currentPage() - 1) * $classes->perPage();
                                @endphp
                                @foreach ($classes as $index => $class)
                                    <tr class="border">
                                        <td class="px-4 py-2 border">{{ $offset + $index + 1 }}</td>
                                        <td class="py-2 px-4 border">{{ $class->name_class }}</td>
                                        <td class="py-2 px-4 border">{{ $class->description ?? 'Kosong' }}</td>
                                        <td class="py-2 px-4 border space-x-5">
                                            <!-- Tombol Ubah untuk Modal -->
                                            <button type="button" class="text-yellow-500 rounded-sm"
                                                onclick="openModal('editClassModal-{{ $class->id }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-6">
                                                    <path
                                                        d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                                    <path
                                                        d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                                </svg>
                                            </button>
                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('classes.destroy', $class->id) }}" method="POST"
                                                class="inline-block ml-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 rounded-sm"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus Kelas ini?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd"
                                                            d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                        $nameClass = $class->name_class ?? ''; // Ambil nama kelas dari kelas jika ada
                                        $classParts = is_string($nameClass) ? explode('-', $nameClass) : []; // Cek apakah $nameClass adalah string
                                        $classGrade = $classParts[0] ?? ''; // Bagian pertama (angkatan)
                                        $className = $classParts[1] ?? ''; // Bagian kedua (nama kelas)
                                    @endphp
                                    <!-- Modal Update/Ubah -->
                                    <div class="classModal fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 z-50"
                                        style="display: none;" id="editClassModal-{{ $class->id }}">
                                        <div class="bg-white rounded-lg overflow-hidden w-full max-w-lg mx-4">
                                            <div class="p-5">
                                                <h5 class="text-lg font-bold">Ubah Kelas</h5>
                                                <form action="{{ route('classes.update', $class->id) }}" method="POST"
                                                    class="mt-4">
                                                    @csrf
                                                    @method('PUT')
                                                    <!-- Input Angkatan Kelas -->
                                                    <div class="mb-4">
                                                        <label for="class_grade" class="block text-gray-700">Angkatan
                                                            Kelas</label>
                                                        <select name="name_class[0]" id="class_grade"
                                                            class="w-full px-3 py-2 border rounded">
                                                            <option value="" disabled
                                                                {{ $classGrade === '' ? 'selected' : '' }}>Pilih Angkatan
                                                            </option>
                                                            <option value="10"
                                                                {{ $classGrade == 10 ? 'selected' : '' }}>10</option>
                                                            <option value="11"
                                                                {{ $classGrade == 11 ? 'selected' : '' }}>11</option>
                                                            <option value="12"
                                                                {{ $classGrade == 12 ? 'selected' : '' }}>12</option>
                                                        </select>
                                                    </div>
                                                    <!-- Input Nama Kelas -->
                                                    <div class="mb-4">
                                                        <label for="class_name" class="block text-gray-700">Nama
                                                            Kelas</label>
                                                        <input type="text" id="class_name" name="name_class[1]"
                                                            class="w-full px-4 py-2 border rounded"
                                                            value="{{ $className }}">
                                                    </div>
                                                    <!-- Input Deskripsi -->
                                                    <div class="mb-4">
                                                        <label for="description"
                                                            class="block text-gray-700">Deskripsi</label>
                                                        <textarea id="description" class="w-full px-4 py-2 border rounded" rows="3" name="description">{{ $class->description }}</textarea>
                                                    </div>
                                                    <!-- Tombol Aksi -->
                                                    <div class="flex justify-end space-x-4">
                                                        <button type="submit"
                                                            class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                                                            Simpan Perubahan
                                                        </button>
                                                        <button type="button"
                                                            class="bg-gray-300 hover:bg-gray-400 text-white px-4 py-2 rounded"
                                                            onclick="closeModal('editClassModal-{{ $class->id }}')">
                                                            Batal
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Modal Tambah Kelas -->
                    <div id="classModal" class="fixed inset-0 flex items-center justify-center" style="display: none;">
                        <div class="bg-white rounded-lg overflow-hidden w-full max-w-lg mx-4">
                            <div class="p-5">
                                <h5 class="text-lg font-bold">Tambah Kelas</h5>
                                <form action="{{ route('classes.store') }}" method="POST" class="mt-4">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="name_class_0" class="block text-gray-700">Angkatan</label>
                                        <select name="name_class[0]" id="name_class_0"
                                            class="w-full px-3 py-2 border rounded">
                                            <option value="" disabled selected>Pilih Angkatan</option>
                                            <option value="10" {{ old('name_class.0') == '10' ? 'selected' : '' }}>10
                                            </option>
                                            <option value="11" {{ old('name_class.0') == '11' ? 'selected' : '' }}>11
                                            </option>
                                            <option value="12" {{ old('name_class.0') == '12' ? 'selected' : '' }}>12
                                            </option>
                                        </select>
                                        @error('name_class.0')
                                            <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="name_class_1" class="block text-gray-700">Nama Kelas</label>
                                        <input type="text" name="name_class[1]" id="name_class_1"
                                            class="w-full px-4 py-2 border rounded" value="{{ old('name_class.1') }}">
                                        @error('name_class.1')
                                            <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Deskripsi</label>
                                        <textarea class="w-full px-4 py-2 border rounded" rows="3" name="description">{{ old('description') }}</textarea>
                                    </div>
                                    <button type="submit"
                                        class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Tambah
                                        Kelas</button>
                                    <button type="button"
                                        class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded"
                                        onclick="closeModal('classModal')">Batal</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <script>
                        document.getElementById("toggleButton").addEventListener("click", function() {
                            const iconUp = document.getElementById("iconUp");
                            const iconDown = document.getElementById("iconDown");

                            // Toggle visibility
                            if (iconDown.classList.contains("hidden")) {
                                iconDown.classList.remove("hidden");
                                iconUp.classList.add("hidden");
                            } else {
                                iconDown.classList.add("hidden");
                                iconUp.classList.remove("hidden");
                            }

                            // Example: Update data sorting logic here
                            console.log(iconDown.classList.contains("hidden") ? "Data terbaru" : "Data terlama");
                        });

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
                                closeModal('classModal'); // Menutup modal setelah data berhasil ditambah
                            });
                        @endif
                    </script>
                    <script>
                        document.getElementById('searchButton').addEventListener('click', function(e) {
                            e.preventDefault(); // Mencegah pengiriman form
                            const form = document.getElementById('searchForm');
                            form.classList.toggle('show'); // Toggle class "show"
                        });
                    </script>

                    <div class="pagination py-3 px-5">
                        {{ $classes->links('vendor.pagination.tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    @endsection
