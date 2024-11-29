@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <!-- Search Input -->
        <div class="container mx-auto pt-2">
            <div class="flex items-center space-x-2">
                <h1 class="text-2xl font-bold mr-auto">Materi</h1>
                <!-- Tombol Search -->
                <form action="" method="GET">
                    <button type="submit"
                        class="p-2 h-10 mt-4 border-2 bg-white text-black rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24">
                            <path fill="black"
                                d="M15.5 14h-.79l-.28-.27A6.47 6.47 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14" />
                        </svg>
                    </button>
                </form>

                <!-- Tombol Tambah Materi -->
                <a class="w-40 h-10 p-2 border-2 text-xs text-white bg-blue-600 rounded-lg flex items-center justify-center hover:bg-blue-700 transition"
                    onclick="openModal('materiModal')">
                    Tambah Materi
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
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">MATA PELAJARAN</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">KELAS</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">MATERI</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">FILE MATERI</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">DESKRIPSI</th>
                                <th class="px-4 py-2 text-gray-500 text-xs font-semibold">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($materis as $index => $materi)
                                <tr class="">
                                    <td class="px-4 py-2 ">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2 ">{{ $materi->subject->name_subject }}</td>
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
                                    <td class="px-4 py-2 border-b">{{ $materi->description ?? 'Kosong' }}</td>
                                    <td class="px-4 py-2">
                                        <!-- Action buttons container -->
                                        <div class="flex space-x-2 items-center justify-center">
                                            <!-- Show button -->
                                            <button type="button" class="text-blue-500 rounded-sm"
                                                onclick="openModal('showAssessmentModal_{{ $materi->id }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-7 mt-1">
                                                    <path d="M12 4.5c-4.136 0-7.528 2.783-9.17 6.621a1.507 1.507 0 0 0 0 1.757C4.472 16.717 7.864 19.5 12 19.5s7.528-2.783 9.17-6.621a1.507 1.507 0 0 0 0-1.757C19.528 7.283 16.136 4.5 12 4.5Zm0 1.5c3.464 0 6.342 2.32 7.845 5.627a.082.082 0 0 1 0 .074C18.342 14.18 15.464 16.5 12 16.5s-6.342-2.32-7.845-5.627a.082.082 0 0 1 0-.074C5.658 8.32 8.536 6 12 6Zm0 2.25A3.75 3.75 0 1 0 12 15a3.75 3.75 0 0 0 0-7.5Zm0 1.5a2.25 2.25 0 1 1 0 4.5 2.25 2.25 0 0 1 0-4.5Z"/>
                                                </svg>
                                            </button>

                                            <!-- Edit button -->
                                            <button type="button" class="text-yellow-500 rounded-sm"
                                                onclick="openModal('editAssessmentModal_{{ $materi->id }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 mt-1">
                                                    <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                                    <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                                </svg>
                                            </button>

                                            <!-- Delete form -->
                                            <form action="{{ route('assesments.destroy', $materi->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 rounded-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus materi ini?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 mt-5">
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
            </div>
        </div>
        <!-- Modal Edit -->
        @foreach ($materis as $materi)
            <div id="materiModal-{{ $materi->id }}"
                class="materiModal fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 z-50 overflow-auto"
                style="display:none;">
                <div class="bg-white rounded-lg pt-6 pb-2 pl-6 w-[40%] h-auto shadow-lg">
                    <h5 class="text-xl font-bold mb-4">Ubah Materi</h5>
                    <form action="{{ route('materis.update', $materi->id) }}" method="POST" enctype="multipart/form-data"
                        class="overflow-y-auto h-[70%]">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-3">
                                <label for="name_subject-{{ $materi->id }}" class="block font-medium mb-1">Nama
                                    Mapel</label>
                                <select id="name_subject-{{ $materi->id }}" name="subject_id"
                                    class="w-full border rounded px-3 py-2">
                                    <option value="" disabled>Pilih Nama Mapel</option>
                                    @foreach ($subjects as $mapel)
                                        <option value="{{ $mapel->id }}"
                                            {{ $materi->subject_id == $mapel->id ? 'selected' : '' }}>
                                            {{ $mapel->name_subject }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="mb-3 mr-6">
                                <label for="classes_id" class="block font-medium mb-1">Kelas</label>
                                <select id="classes_id" name="classes_id" class="w-full border rounded px-3 py-2">
                                    <option value="" disabled>Pilih Kelas</option>
                                    @foreach ($classes as $kelas)
                                        <option value="{{ $kelas->id }}"
                                            {{ $materi->classes_id == $kelas->id ? 'selected' : '' }}>
                                            {{ $kelas->name_class }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 mr-6">
                            <label for="title_materi-{{ $materi->id }}" class="block font-medium mb-1">Nama
                                Materi</label>
                            <input type="text" id="title_materi-{{ $materi->id }}" name="title_materi"
                                class="w-full border rounded px-3 py-2" value="{{ $materi->title_materi }}">
                        </div>

                        <div class="mb-3 mr-6">
                            <label for="description-{{ $materi->id }}" class="block font-medium mb-1">Deskripsi</label>
                            <textarea id="description-{{ $materi->id }}" rows="2" name="description"
                                class="w-full px-3 py-2 border rounded" value="{{ $materi->description }}">{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-3 mr-6">
                            <label for="file_materi-{{ $materi->id }}" class="block font-medium mb-1">File
                                Materi
                            </label>
                            <div id="file-preview-{{ $materi->id }}" class="mt-2">
                                @if ($materi->file_materi)
                                    @php
                                        $fileExtension = pathinfo($materi->file_materi, PATHINFO_EXTENSION);
                                    @endphp
                                    @if (in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                                        <p class="mb-3">Gambar Sebelumnya</p>
                                        <img src="{{ asset('storage/' . $materi->file_materi) }}" alt="Preview"
                                            class="w-32 mb-3">
                                    @elseif ($fileExtension === 'pdf')
                                        <p class="mb-3">PDf Sebelumnya</p>
                                        <embed src="{{ asset('storage/' . $materi->file_materi) }}"
                                            type="application/pdf" class="w-full h-32 mb-2" />
                                    @else
                                        <p class="text-red-500">Format file tidak didukung.</p>
                                    @endif
                                @endif
                            </div>
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
        <div id="materiModal" class="fixed inset-0 flex items-center justify-center " style="display: none;">
            <div class="bg-white rounded-lg pt-6 pb-2 pl-6 w-[40%] h-auto shadow-lg ">
                <h5 class="text-xl font-bold mb-4">Tambah Materi</h5>
                <form action="{{ route('materis.store') }}" method="POST" enctype="multipart/form-data"
                    class="overflow-y-auto h-[70%]">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-3">
                            <label for="subject_id" class="block font-medium mb-1">Pilih Mapel</label>
                            <select id="subject_id" name="subject_id" class="w-full border rounded px-3 py-2">
                                <option value="" disabled selected>Pilih Nama Mapel</option>
                                @foreach ($subjects as $mapel)
                                    <option value="{{ $mapel->id }}">{{ $mapel->name_subject }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="mb-3 mr-6">
                            <label for="classes_id" class="block font-medium mb-1">Kelas</label>
                            <select id="classes_id" name="classes_id" class="w-full border rounded px-3 py-2">
                                <option value="" disabled selected>Pilih Kelas</option>
                                @foreach ($classes as $kelas)
                                    <option value="{{ $kelas->id }}">{{ $kelas->name_class }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 mr-6">
                        <label for="title_materi" class="block font-medium mb-1">Nama Materi</label>
                        <input type="text" id="title_materi" name="title_materi"
                            class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-3 mr-6">
                        <label for="description" class="block font-medium mb-1">Deskripsi</label>
                        <textarea id="description" rows="2" name="description" class="w-full px-3 py-2 border rounded">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3 mr-6">
                        <label for="file_materi" class="block font-medium mb-1">File Materi</label>
                        <!-- Image preview -->
                        <div id="file-preview" class="mt-2">
                            <img id="image-preview" class="mt-2 w-32 mb-2" style="display: none;" alt="Preview" />
                        </div>
                        <input type="file" id="file_materi-new" name="file_materi"
                            class="w-full border rounded px-3 py-2">
                    </div>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Tambah Materi</button>
                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded"
                        onclick="closeModal('materiModal')">Batal</button>
                </form>
            </div>
        </div>

        {{-- @foreach ($materis as $materi)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 w-full">
            <div class="relative mx-auto w-full max-w-sm">
                <div class="shadow-md p-4 rounded-lg bg-white">
                    <!-- File Preview -->
                    <div class="flex justify-center relative rounded-lg overflow-hidden h-48 w-48 mx-auto bg-gray-100">
                        <div class="transition-transform duration-500 transform ease-in-out hover:scale-110 w-full h-full">
                            @php
                                $file = pathinfo($materi->file_materi, PATHINFO_EXTENSION);
                            @endphp
                            @if (in_array($file, ['jpg', 'png', 'jpeg']))
                                <img src="{{ asset('storage/' . $materi->file_materi) }}" alt="File Image"
                                    class="object-cover w-full h-full">
                            @elseif($file === 'pdf')
                                <embed src="{{ asset('storage/' . $materi->file_materi) }}" type="application/pdf"
                                    class="w-full h-full" />
                            @else
                                <div class="flex items-center justify-center w-full h-full bg-gray-200 text-gray-600">
                                    <p>Format file tidak didukung</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Title -->
                    <div class="mt-2 mb-3">
                        <h2 class="font-semibold uppercase text-lg text-gray-800 line-clamp-1 text-center">
                            {{ $materi->title_materi }}
                        </h2>
                    </div>

                    <!-- Subject -->
                    <div class="mt-2 ">
                        <p class="text-gray-600 text-sm">
                            <span class="font-medium">Mapel:</span> {{ $materi->subject->name_subject }}
                        </p>
                    </div>

                    <!-- Class -->
                    <div class="mt-2 ">
                        <p class="text-gray-600 text-sm">
                            <span class="font-medium">Kelas:</span> {{ $materi->classes->name_class }}
                        </p>
                    </div>

                    <!-- Description -->
                    <div class="mt-2 text-sm text-gray-700">
                        <p id="description-{{ $materi->id }}" class="inline">
                            {{ $materi->short_description }}
                        </p>
                        @if (Str::length($materi->description) > 60)
                            <button onclick="showFullDescription('{{ $materi->id }}', '{{ $materi->description }}')"
                                class="text-blue-500 hover:underline ">
                                Lihat Selengkapnya
                            </button>
                        @endif
                    </div>

                    <button class="mt-3 font-medium text-black border-2 border-blue-500 px-4 py-2 rounded-xl">
                        viewmore
                    </button>
                    <script>
                        function showFullDescription(id, description) {
                            console.log(`Opening modal for ID: ${id}`); // Debugging
                            if (!document.getElementById(`modal-${id}`)) {
                                const modal = document.createElement('div');
                                modal.id = `modal-${id}`;
                                modal.className = "fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50";
                                modal.innerHTML = `
            <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
                <h2 class="text-lg font-semibold mb-4">Deskripsi Lengkap</h2>
                <p class="text-gray-700 mb-4">${description}</p>
<button data-modal-id="{{ $materi->id }}"
        class="close-modal-button bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
    Tutup
</button>

            </div>
        `;
                                document.body.appendChild(modal);
                            }
                        }

                        document.addEventListener('click', function(event) {
                            if (event.target.matches('.close-modal-button')) {
                                const modalId = event.target.getAttribute('data-modal-id');
                                const modal = document.getElementById(`modal-${modalId}`);
                                if (modal) {
                                    modal.remove();
                                }
                            }
                        });
                    </script>

                </div>
            </div>
        </div>
        @endforeach --}}
        <script>
            // Seleksi elemen secara unik untuk modal tertentu
            document.querySelectorAll('input[type="file"]').forEach(input => {
                input.addEventListener('change', function(event) {
                    const previewId = this.id.replace('file_materi',
                        'file-preview'); // Replace file ID to match preview ID
                    const filePreview = document.getElementById(previewId); // Get the preview element
                    const file = event.target.files[0];

                    if (file) {
                        const fileExtension = file.name.split('.').pop()
                            .toLowerCase(); // Get the file extension
                        const reader = new FileReader();

                        if (['jpg', 'jpeg', 'png'].includes(fileExtension)) {
                            // If the file is an image
                            reader.onload = function(e) {
                                filePreview.innerHTML = `
                        <center>
                            <p>File Sekarang</p>
                            <img src="${e.target.result}" class="mt-2 w-32 mb-2" alt="Preview">
                        </center>`;
                            };
                        } else if (fileExtension === 'pdf') {
                            // If the file is a PDF
                            reader.onload = function(e) {
                                filePreview.innerHTML = `
                        <center>
                            <p>File Sekarang</p>
                            <embed src="${e.target.result}" type="application/pdf" class="mt-2 w-full h-32 mb-2" />
                        </center>`;
                            };
                        } else {
                            // Unsupported file format
                            filePreview.innerHTML = `<p class="text-red-500">Format file tidak didukung.</p>`;
                        }

                        reader.readAsDataURL(file); // Read the file as a data URL
                    } else {
                        filePreview.innerHTML = ''; // Clear the preview if no file is selected
                    }
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
    @endsection
    {{-- test --}}
