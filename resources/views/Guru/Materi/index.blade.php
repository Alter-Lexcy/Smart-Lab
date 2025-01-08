@extends('layouts.appTeacher')

@section('content')
    <!-- CSS -->
    <style>
        #searchForm {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        #searchForm.show {
            opacity: 1;
            visibility: visible;
        }
    </style>
    <div class="container mx-auto p-4">
        <div class="container mx-auto pt-2">
            <div class="flex items-center space-x-2">
                <h1 class="text-2xl font-bold mr-auto">Materi</h1>
                <!-- Tombol Search dengan Form Animasi -->
                <div class="relative flex items-center">
                    <!-- Tombol Search -->
                    <button id="searchButton"
                        class="p-3 border-2 bg-white text-black rounded-lg flex items-center justify-center transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-[14px] w-[14px]" viewBox="0 0 24 24">
                            <path fill="black"
                                d="M15.5 14h-.79l-.28-.27A6.47 6.47 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14" />
                        </svg>
                    </button>

                    <!-- Form Pencarian -->
                    <form id="searchForm" action="{{ route('materis.index') }}" method="GET" name="search"
                        class="absolute right-full mr-2 mt-4 opacity-0 invisible transition-all duration-300">
                        <input type="text" name="search" placeholder="Cari..."
                            class="p-2 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </form>
                </div>

                <form action="{{ route('materis.index') }}" method="GET" class="mt-4">
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
                    onclick="openModal('materiModal')">
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
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
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

            <!-- Tabel Materi -->
            <div class="block max-w bg-white rounded-lg shadow hover:bg-white">
                <h6 class="font-semibold p-3 text-sm ps-5">Daftar Materi</h6>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white text-center rounded-lg">
                        <thead>
                            <tr class="border-y">
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">NO</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">KELAS</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">MATERI</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">FILE MATERI</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">DESKRIPSI</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">TANGGAL PEMBUATAN</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($materis as $index => $materi)
                                @php
                                    $offset = ($materis->currentPage() - 1) * $materis->perPage();
                                @endphp
                                <tr class="">
                                    <td class="px-4 py-2 ">{{ $offset + $index + 1 }}</td>
                                    <td class="px-4 py-2 ">{{ $materi->classes->name_class }}</td>
                                    <td class="px-4 py-2 ">{{ $materi->title_materi }}</td>
                                    <td class="px-4 py-2 ">
                                        @php
                                            $file = pathinfo($materi->file_materi, PATHINFO_EXTENSION);
                                        @endphp
                                        @if (in_array($file, ['jpg', 'png']))
                                            <img src="{{ asset('storage/' . $materi->file_materi) }}" alt="File Image"
                                                class="mx-auto" width="100px">
                                        @elseif($file === 'pdf')
                                            <embed src="{{ asset('storage/' . $materi->file_materi) }}"
                                                type="application/pdf" class="mx-auto" width="100px" height="100px">
                                        @else
                                            <p class="text-red-500">Format file tidak didukung.</p>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 border-b">
                                        {{ $materi->short_description = Str::limit($materi->description, 20, '...') ?? 'Kosong' }}
                                    </td>
                                    <td class="px-4 py-2 border-b">
                                        {{ \Carbon\Carbon::parse($materi->created_at)->translatedFormat('l, j F Y') }}
                                    </td>
                                    <td class="px-4 py-2">
                                        <!-- Action buttons container -->
                                        <div class="flex space-x-2 items-center justify-center">
                                            <!-- Show button -->
                                            <button type="button"
                                                class="bg-blue-500 text-white w-10 h-10 rounded-md flex items-center justify-center"
                                                onclick="openModal('showAssessmentModal_{{ $materi->id }}')">
                                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M4.998 7.78C6.729 6.345 9.198 5 12 5c2.802 0 5.27 1.345 7.002 2.78a12.713 12.713 0 0 1 2.096 2.183c.253.344.465.682.618.997.14.286.284.658.284 1.04s-.145.754-.284 1.04a6.6 6.6 0 0 1-.618.997 12.712 12.712 0 0 1-2.096 2.183C17.271 17.655 14.802 19 12 19c-2.802 0-5.27-1.345-7.002-2.78a12.712 12.712 0 0 1-2.096-2.183 6.6 6.6 0 0 1-.618-.997C2.144 12.754 2 12.382 2 12s.145-.754.284-1.04c.153-.315.365-.653.618-.997A12.714 12.714 0 0 1 4.998 7.78ZM12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>

                                            <!-- Edit button -->
                                            <button type="button"
                                                class="bg-yellow-500 text-white w-10 h-10 rounded-md flex items-center justify-center"
                                                onclick="openModal('materiModal-{{ $materi->id }}')">
                                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z"
                                                        clip-rule="evenodd" />
                                                    <path fill-rule="evenodd"
                                                        d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>

                                            <!-- Delete button -->
                                            <form action="{{ route('materis.destroy', $materi->id) }}" method="POST"
                                                class="inline m-0 p-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 text-white w-10 h-10 rounded-md flex items-center justify-center"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus materi ini?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-5 h-5">
                                                        <path fill-rule="evenodd"
                                                            d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="pagination py-3 px-5">
                    {{ $materis->links('vendor.pagination.tailwind') }}
                </div>
            </div>

            {{-- Modal Show --}}
            @foreach ($materis as $materi)
                <div id="showAssessmentModal_{{ $materi->id }}"
                    class="materiModal fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 z-50"
                    style="display:none;">
                    <div class="bg-white rounded-lg shadow-lg w-[90%] md:w-[60%] lg:w-[50%] h-auto pt-6 pb-7 pl-6 mr-6">
                        {{-- Header Modal --}}
                        <div class="flex justify-between items-center border-b pb-4 mr-6">
                            <h5 class="text-2xl font-bold text-gray-800">Detail Materi</h5>
                            <button type="button" class="text-gray-700 hover:text-gray00"
                                onclick="closeModal('showAssessmentModal_{{ $materi->id }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        {{-- Content Modal --}}
                        <div class="mt-4 space-y-4 overflow-y-auto h-auto max-h-[80%]">
                            <div class="flex space-x-2">
                                <h6 class="text-lg font-semibold text-gray-700">Materi:</h6>
                                <p class="text-gray-600">{{ $materi->title_materi }}</p>
                            </div>
                            <div class="flex space-x-2">
                                <h6 class="text-lg font-semibold text-gray-700">Kelas:</h6>
                                <p class="text-gray-600">{{ $materi->classes->name_class }}</p>
                            </div>
                            <div class="flex space-x-2">
                                <h6 class="text-lg font-semibold text-gray-700">Tanggal Pembuatan:</h6>
                                <p class="text-gray-700">
                                    {{ \Carbon\Carbon::parse($materi->created_at)->translatedFormat('l, j F Y') }}
                                </p>
                            </div>
                            <div>
                                <h6 class="text-lg font-semibold text-gray-700">Deskripsi:</h6>
                                <p class="text-gray-600">{{ $materi->description }}</p>
                            </div>
                            <div class="mr-6">
                                <h6 class="text-lg font-semibold text-gray-700 mb-3">File Materi</h6>

                                @php
                                    $file = pathinfo($materi->file_materi, PATHINFO_EXTENSION);
                                @endphp
                                @if (in_array($file, ['jpg', 'png']))
                                    <img src="{{ asset('storage/' . $materi->file_materi) }}" alt="File Image"
                                        class="mx-auto w-[90%] h-full border-2 rounded-lg">
                                @elseif($file === 'pdf')
                                    <embed src="{{ asset('storage/' . $materi->file_materi) }}" type="application/pdf"
                                        class="mx-auto w-[90%] h-full border-2 rounded-lg">
                                @else
                                    <p class="text-red-500">Format file tidak didukung.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


            <!-- Modal Edit -->
            @foreach ($materis as $materi)
                <div id="materiModal-{{ $materi->id }}"
                    class="materiModal fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 z-50 overflow-auto"
                    style="display:none;">
                    <div class="bg-white rounded-lg pt-6 pb-2 pl-6 w-[40%] h-auto shadow-lg">
                        <h5 class="text-xl font-bold mb-4">Ubah Materi</h5>
                        <form action="{{ route('materis.update', $materi->id) }}" method="POST"
                            enctype="multipart/form-data" class="overflow-y-auto h-[70%]">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 mr-6">
                                <label for="classes_id" class="block font-medium mb-1">Kelas</label>
                                <select id="classes_id" name="classes_id" class="w-full border rounded px-3 py-2">
                                    <option value="" disabled>Pilih Kelas</option>
                                    @foreach ($classes as $kelas)
                                        <option value="{{ $kelas->id }}"
                                            {{ old('classes_id', $materi->classes_id) == $kelas->id ? 'selected' : '' }}>
                                            {{ $kelas->name_class }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="mb-3 mr-6">
                                <label for="title_materi-{{ $materi->id }}" class="block font-medium mb-1">Nama
                                    Materi</label>
                                <input type="text" id="title_materi-{{ $materi->id }}" name="title_materi"
                                    class="w-full border rounded px-3 py-2"
                                    value="{{ old('title_materi', $materi->title_materi) }}">
                            </div>

                            <div class="mb-3 mr-6">
                                <label for="description-{{ $materi->id }}"
                                    class="block font-medium mb-1">Deskripsi</label>
                                <textarea id="description-{{ $materi->id }}" rows="2" name="description"
                                    class="w-full px-3 py-2 border rounded">{{ old('description', $materi->description) }}</textarea>
                            </div>
                            <div class="mb-3 mr-6">
                                <label for="file_materi-{{ $materi->id }}" class="block font-medium mb-1">File
                                    Materi</label>
                                <small>File Harus Berformat PDF</small>
                                <input type="file" id="file_materi-{{ $materi->id }}" name="file_materi"
                                    class="w-full border rounded px-3 py-2">
                            </div>
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan
                                Perubahan</button>
                            <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded"
                                onclick="closeModal('materiModal-{{ $materi->id }}')">Batal</button>
                        </form>
                    </div>
                </div>
            @endforeach

            <!-- Modal Tambah -->
            <div id="materiModal"
                class="fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 z-50 overflow-auto"
                style="display: none;">
                <div class="bg-white rounded-lg pt-6 pb-2 pl-6 w-[40%] h-auto shadow-lg">
                    <h5 class="text-xl font-bold mb-4">Tambah Materi</h5>

                    <form action="{{ route('materis.store') }}" method="POST" enctype="multipart/form-data"
                        class="overflow-y-auto h-[56%]">
                        @csrf

                        <!-- Kelas -->
                        <div class="mb-3 mr-6">
                            <label for="classes_id" class="block font-medium mb-1">Kelas</label>
                            <select id="classes_id" name="classes_id" class="w-full border rounded px-3 py-2">
                                <option value="" disabled {{ old('classes_id') ? '' : 'selected' }}>Pilih Kelas
                                </option>
                                @foreach ($classes as $kelas)
                                    <option value="{{ $kelas->id }}"
                                        {{ old('classes_id') == $kelas->id ? 'selected' : '' }}>
                                        {{ $kelas->name_class }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Nama Materi -->
                        <div class="mb-3 mr-6">
                            <label for="title_materi" class="block font-medium mb-1">Nama Materi</label>
                            <input type="text" id="title_materi" name="title_materi"
                                class="w-full border rounded px-3 py-2" value="{{ old('title_materi') }}">
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-3 mr-6">
                            <label for="description" class="block font-medium mb-1">Deskripsi</label>
                            <textarea id="description" rows="2" name="description" class="w-full px-3 py-2 border rounded">{{ old('description') }}</textarea>
                        </div>

                        <!-- File Materi -->
                        <div class="mb-3 mr-6">
                            <label for="file_materi" class="block font-medium mb-1">File Materi</label>
                            <small>File Harus Berformat PDF</small>

                            <!-- Input File -->
                            <input type="file" id="file_materi-new" name="file_materi"
                                class="w-full border rounded px-3 py-2">
                            <div id="file-preview-new" class="mt-2"></div> <!-- Elemen untuk menampilkan preview -->

                        </div>

                        <!-- Tombol Submit -->
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
                            Tambah Materi
                        </button>
                        <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded"
                            onclick="closeModal('materiModal')">
                            Batal
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('input[type="file"]').forEach(input => {
            input.addEventListener('change', function(event) {
                const previewId = this.id.replace('file_materi', 'file-preview-new');
                const filePreview = document.getElementById(previewId);
                const file = event.target.files[0];

                if (file) {
                    const fileExtension = file.name.split('.').pop().toLowerCase();

                    if (['jpg', 'jpeg', 'png'].includes(fileExtension)) {
                        // Jika file adalah gambar
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            filePreview.innerHTML =
                                `<img src="${e.target.result}" class="mt-2 w-32 mb-2" alt="Preview">`;
                        };
                        reader.readAsDataURL(file);
                    } else if (fileExtension === 'pdf') {
                        // Jika file adalah PDF
                        const pdfUrl = URL.createObjectURL(file);
                        filePreview.innerHTML =
                            `<embed src="${pdfUrl}" type="application/pdf" class="mt-2 w-full h-64 mb-2" />`;
                    } else {
                        // Jika format tidak didukung
                        filePreview.innerHTML =
                            `<p class="text-red-500">Format file tidak didukung.</p>`;
                    }
                } else {
                    filePreview.innerHTML = ''; // Kosongkan preview jika file dihapus
                }
            });
        });
    });



    function openModal(id) {
        console.log(`Opening modal: ${id}`);
        const modal = document.getElementById(id);
        if (modal) {
            modal.style.display = 'flex';
        } else {
            console.error(`Modal dengan ID ${id} tidak ditemukan.`);
        }
    }

    function closeModal(id) {
        console.log(`Closing modal: ${id}`);
        const modal = document.getElementById(id);
        if (modal) {
            modal.style.display = 'none';
        } else {
            console.error(`Modal dengan ID ${id} tidak ditemukan.`);
        }
    }

    @if (session('success'))
        document.addEventListener("DOMContentLoaded", function() {
            closeModal('materiModal'); // Close the modal on successful action
        });
    @endif
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchButton = document.getElementById("searchButton");
        const searchForm = document.getElementById("searchForm");

        searchButton.addEventListener("click", function(event) {
            event.stopPropagation(); // Mencegah klik tombol menutup form
            searchForm.classList.toggle("show");
        });

        document.addEventListener("click", function() {
            searchForm.classList.remove("show");
        });

        searchForm.addEventListener("click", function(event) {
            event.stopPropagation(); // Mencegah klik pada form menutup form
        });
    });
</script>
{{-- test --}}
