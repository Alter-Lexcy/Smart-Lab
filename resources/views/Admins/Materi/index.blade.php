@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <!-- Search Input -->
        <h1 class="text-2xl font-bold mr-auto">Daftar Materi</h1>
        <div class="container mx-auto pt-2">
            <div class="flex items-center justify-between ">
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
                <a class="group relative inline-block text-xs font-medium text-blue-500 focus:outline-none focus:ring active:text-indigo-500"
                    onclick="openModal('materiModal')">
                    <span
                        class="absolute inset-0 translate-x-1.5 translate-y-1.5 bg-blue-500 transition-transform group-hover:translate-x-0 group-hover:translate-y-0 rounded-md"></span>
                    <span class="relative block border border-current bg-white px-3 py-2 rounded-md">Tambah Materi -></span>
                </a>
            </div>

            <!-- Tabel Materi -->
            <div class="overflow-x-auto">
                <table class="min-w-auto bg-white text-center border border-gray-300 border-collapse">
                    <thead class="bg-gradient-to-r from-sky-200 to-blue-300">
                        <tr class="border">
                            <th class="px-4 py-2 border">No</th>
                            <th class="px-4 py-2 border">Nama Mapel</th>
                            <th class="px-4 py-2 border">Kelas</th>
                            <th class="px-4 py-2 border">Nama Materi</th>
                            <th class="px-4 py-2 border">File Materi</th>
                            <th class="px-4 py-2 border">Deskripsi</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materis as $index => $materi)
                            <tr class="border">
                                <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 border">{{ $materi->subject->name_subject }}</td>
                                <td class="px-4 py-2 border">{{ $materi->classes->name_class }}</td>
                                <td class="px-4 py-2 border">{{ $materi->title_materi }}</td>
                                <td class="px-4 py-2 border">
                                    @php
                                        $file = pathinfo($materi->file_materi, PATHINFO_EXTENSION);
                                    @endphp
                                    @if (in_array($file, ['jpg', 'png']))
                                        <img src="{{ asset('storage/' . $materi->file_materi) }}" alt="File Image"
                                            width="100px">
                                    @elseif($file === 'pdf')
                                        <embed src="{{ asse('storage/' . $materi->file_materi) }}" type="application/pdf"
                                            width="100px" height="100px">
                                    @else
                                        <p>Format file tidak didukung.</p>
                                    @endif
                                </td>
                                <td class="px-4 py-2 border">{{ $materi->description ?? 'Kosong' }}</td>
                                <td class="px-4 py-2 border space-x-5">
                                    <!-- Tombol Ubah -->
                                    <button type="button" class="text-yellow-500 rounded-sm"
                                        onclick="openModal('materiModal-{{ $materi->id }}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-6">
                                            <path
                                                d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                            <path
                                                d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                        </svg>
                                    </button>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('materis.destroy', $materi->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 rounded-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus materi ini?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                class="size-6">
                                                <path fill-rule="evenodd"
                                                    d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
                        <div id="file-preview-new" class="mt-2">
                            <img id="image-preview-new" class="mt-2 w-32 mb-2" style="display: none;" alt="Preview" />
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
                    @php
                        use Illuminate\Support\Str;
                        $shortDescription = Str::limit($materi->description, 60, '...');
                    @endphp

                    <div class="mt-2 text-sm text-gray-700">
                        <p id="description-{{ $materi->id }}" class="inline">
                            {{ $shortDescription }}
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
