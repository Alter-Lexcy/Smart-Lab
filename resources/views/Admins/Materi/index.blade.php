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
                <table class="min-w-full bg-white text-center border border-gray-300 border-collapse">
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
            <div class="relative mx-auto w-full">
                <a href="#"
                    class="relative inline-block duration-300 ease-in-out transition-transform transform hover:-translate-y-2 w-full">
                    <div class="shadow p-4 rounded-lg bg-white">
                        <div class="flex justify-center relative rounded-lg overflow-hidden h-52">
                            <div class="transition-transform duration-500 transform ease-in-out hover:scale-110 w-full">
                                <div class="absolute inset-0 bg-black opacity-10"></div>
                            </div>

                        </div>

                        <div class="mt-4 ml-1">
                            <h2 class="font-semibold uppercase text-base md:text-lg text-gray-800 line-clamp-1">
                                {{ $materi->title_materi }}
                            </h2>
                        </div>

                        <div class="grid grid-cols-2 grid-rows-2 gap-4 mt-8">
                            <p class="inline-flex flex-col xl:flex-row xl:items-center text-gray-800">
                                <svg class="inline-block w-5 h-5 xl:w-4 xl:h-4 mr-3 fill-current text-gray-800"
                                    viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.5883 7.872H16.4286L16.7097 8.99658H6.74743V10.1211H17.4309C17.5163 10.1211 17.6006 10.1017 17.6774 10.0642C17.7542 10.0267 17.8214 9.97222 17.874 9.90487C17.9266 9.83753 17.9631 9.75908 17.9808 9.6755C17.9986 9.59192 17.997 9.5054 17.9763 9.42251L17.5883 7.872ZM17.5883 4.49829H16.4286L16.7097 5.62286H6.74743V6.74743H17.4309C17.5163 6.74742 17.6006 6.72794 17.6774 6.69046C17.7542 6.65299 17.8214 6.59851 17.874 6.53116C17.9266 6.46381 17.9631 6.38537 17.9808 6.30179C17.9986 6.2182 17.997 6.13168 17.9763 6.04879L17.5883 4.49829ZM17.4309 0H0.562286C0.413158 0 0.270139 0.0592407 0.16469 0.16469C0.0592407 0.270139 0 0.413158 0 0.562286L0 2.81143C0 2.96056 0.0592407 3.10358 0.16469 3.20903C0.270139 3.31448 0.413158 3.37372 0.562286 3.37372H4.49829V5.62286H1.28271L1.56386 4.49829H0.404143L0.0175714 6.04879C-0.00313354 6.13162 -0.00470302 6.21808 0.012982 6.30161C0.0306671 6.38514 0.0671423 6.46355 0.119641 6.53088C0.172139 6.59822 0.239283 6.65271 0.315978 6.69023C0.392673 6.72775 0.476905 6.74731 0.562286 6.74743H4.49829V8.99658H1.28271L1.56386 7.872H0.404143L0.0175714 9.42251C-0.00313354 9.50534 -0.00470302 9.5918 0.012982 9.67533C0.0306671 9.75886 0.0671423 9.83727 0.119641 9.9046C0.172139 9.97193 0.239283 10.0264 0.315978 10.0639C0.392673 10.1015 0.476905 10.121 0.562286 10.1211H4.49829V14.7228C4.12312 14.8554 3.80693 15.1164 3.60559 15.4596C3.40424 15.8028 3.33072 16.2062 3.39801 16.5984C3.4653 16.9906 3.66907 17.3464 3.9733 17.6028C4.27754 17.8593 4.66265 18 5.06057 18C5.4585 18 5.84361 17.8593 6.14784 17.6028C6.45208 17.3464 6.65585 16.9906 6.72314 16.5984C6.79043 16.2062 6.7169 15.8028 6.51556 15.4596C6.31422 15.1164 5.99803 14.8554 5.62286 14.7228V3.37372H17.4309C17.58 3.37372 17.723 3.31448 17.8285 3.20903C17.9339 3.10358 17.9932 2.96056 17.9932 2.81143V0.562286C17.9932 0.413158 17.9339 0.270139 17.8285 0.16469C17.723 0.0592407 17.58 0 17.4309 0V0ZM5.06057 16.8686C4.94936 16.8686 4.84065 16.8356 4.74818 16.7738C4.65572 16.712 4.58365 16.6242 4.54109 16.5215C4.49853 16.4187 4.4874 16.3057 4.50909 16.1966C4.53079 16.0875 4.58434 15.9873 4.66298 15.9087C4.74162 15.8301 4.8418 15.7765 4.95088 15.7548C5.05995 15.7331 5.17301 15.7443 5.27575 15.7868C5.3785 15.8294 5.46631 15.9014 5.5281 15.9939C5.58988 16.0864 5.62286 16.1951 5.62286 16.3063C5.62286 16.4554 5.56362 16.5984 5.45817 16.7039C5.35272 16.8093 5.2097 16.8686 5.06057 16.8686ZM16.8686 2.24914H1.12457V1.12457H16.8686V2.24914Z">
                                    </path>
                                </svg>
                                <span class="mt-2 xl:mt-0">
                                    Partly furnished
                                </span>
                            </p>
                            <p class="inline-flex flex-col xl:flex-row xl:items-center text-gray-800">
                                <svg class="inline-block w-5 h-5 xl:w-4 xl:h-4 mr-3 fill-current text-gray-800"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M399.959 170.585c-4.686 4.686-4.686 12.284 0 16.971L451.887 239H60.113l51.928-51.444c4.686-4.686 4.686-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.686-16.97 0l-84.485 84c-4.686 4.686-4.686 12.284 0 16.971l84.485 84c4.686 4.686 12.284 4.686 16.97 0l7.071-7.07c4.686-4.686 4.686-12.284 0-16.971L60.113 273h391.773l-51.928 51.444c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l84.485-84c4.687-4.686 4.687-12.284 0-16.971l-84.485-84c-4.686-4.686-12.284-4.686-16.97 0l-7.07 7.071z">
                                    </path>
                                </svg>
                                <span class="mt-2 xl:mt-0">
                                    1,386 sq. ft.
                                </span>
                            </p>
                            <p class="inline-flex flex-col xl:flex-row xl:items-center text-gray-800">
                                <svg class="inline-block w-5 h-5 xl:w-4 xl:h-4 mr-3 fill-current text-gray-800"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path
                                        d="M532.01 386.17C559.48 359.05 576 325.04 576 288c0-80.02-76.45-146.13-176.18-157.94 0 .01.01.02.01.03C368.37 72.47 294.34 32 208 32 93.12 32 0 103.63 0 192c0 37.04 16.52 71.05 43.99 98.17-15.3 30.74-37.34 54.53-37.7 54.89-6.31 6.69-8.05 16.53-4.42 24.99A23.085 23.085 0 0 0 23.06 384c53.54 0 96.67-20.24 125.17-38.78 9.08 2.09 18.45 3.68 28 4.82C207.74 407.59 281.73 448 368 448c20.79 0 40.83-2.41 59.77-6.78C456.27 459.76 499.4 480 552.94 480c9.22 0 17.55-5.5 21.18-13.96 3.64-8.46 1.89-18.3-4.42-24.99-.35-.36-22.39-24.14-37.69-54.88zm-376.59-72.13l-13.24-3.05-11.39 7.41c-20.07 13.06-50.49 28.25-87.68 32.47 8.77-11.3 20.17-27.61 29.54-46.44l10.32-20.75-16.49-16.28C50.75 251.87 32 226.19 32 192c0-70.58 78.95-128 176-128s176 57.42 176 128-78.95 128-176 128c-17.73 0-35.42-2.01-52.58-5.96zm289.8 100.35l-11.39-7.41-13.24 3.05A234.318 234.318 0 0 1 368 416c-65.14 0-122-25.94-152.43-64.29C326.91 348.62 416 278.4 416 192c0-9.45-1.27-18.66-3.32-27.66C488.12 178.78 544 228.67 544 288c0 34.19-18.75 59.87-34.47 75.39l-16.49 16.28 10.32 20.75c9.38 18.86 20.81 35.19 29.53 46.44-37.19-4.22-67.6-19.41-87.67-32.47zM233.38 182.91l-41.56-12.47c-4.22-1.27-7.19-5.62-7.19-10.58 0-6.03 4.34-10.94 9.66-10.94h25.94c3.9 0 7.65 1.08 10.96 3.1 3.17 1.93 7.31 1.15 10-1.4l11.44-10.87c3.53-3.36 3.38-9.22-.54-12.11-8.18-6.03-17.97-9.58-28.08-10.32V104c0-4.42-3.58-8-8-8h-16c-4.42 0-8 3.58-8 8v13.4c-21.85 1.29-39.38 19.62-39.38 42.46 0 18.98 12.34 35.94 30 41.23l41.56 12.47c4.22 1.27 7.19 5.62 7.19 10.58 0 6.03-4.34 10.94-9.66 10.94h-25.94c-3.9 0-7.65-1.08-10.96-3.1-3.17-1.94-7.31-1.15-10 1.4l-11.44 10.87c-3.53 3.36-3.38 9.22.54 12.11 8.18 6.03 17.97 9.58 28.08 10.32V280c0 4.42 3.58 8 8 8h16c4.42 0 8-3.58 8-8v-13.4c21.85-1.29 39.38-19.62 39.38-42.46 0-18.98-12.35-35.94-30-41.23z">
                                    </path>
                                </svg>
                                <span class="mt-2 xl:mt-0">
                                    $1.98 /sq.ft
                                </span>
                            </p>
                        </div>

                        <div class="grid grid-cols-2 mt-8">
                            <div class="flex items-center">
                                <div class="relative">
                                    <div class="rounded-full w-6 h-6 md:w-8 md:h-8 bg-gray-200"></div>
                                    <span
                                        class="absolute top-0 right-0 inline-block w-3 h-3 bg-primary-red rounded-full"></span>
                                </div>

                                <p class="ml-2 text-gray-800 line-clamp-1">
                                    John Doe
                                </p>
                            </div>

                            <div class="flex justify-end">
                                <p
                                    class="inline-block font-semibold text-primary whitespace-nowrap leading-tight rounded-xl">
                                    <span class="text-sm uppercase">
                                        $
                                    </span>
                                    <span class="text-lg">3,200</span>/m
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <script>
            // Seleksi elemen secara unik untuk modal tertentu
            document.querySelectorAll('input[type="file"]').forEach(input => {
                input.addEventListener('change', function(event) {
                    const previewId = this.id.replace('file_materi',
                        'file-preview'); // Replace file ID to match preview ID
                    const filePreview = document.getElementById(
                        previewId); // Get the preview element
                    const file = event.target.files[0];

                    if (file) {
                        const fileExtension = file.name.split('.').pop()
                            .toLowerCase(); // Get the file extension
                        const reader = new FileReader();

                        if (['jpg', 'jpeg', 'png'].includes(fileExtension)) {
                            // If the file is an image
                            reader.onload = function(e) {
                                filePreview.innerHTML =
                                    `<img src="${e.target.result}" class="mt-2 w-32 mb-2" alt="Preview">`;
                            };
                        } else if (fileExtension === 'pdf') {
                            // If the file is a PDF
                            reader.onload = function(e) {
                                filePreview.innerHTML =
                                    `<embed src="${e.target.result}" type="application/pdf" class="mt-2 w-full h-32 mb-2" />`;
                            };
                        } else {
                            // Unsupported file format
                            filePreview.innerHTML =
                                `<p class="text-red-500">Format file tidak didukung.</p>`;
                        }

                        reader.readAsDataURL(file); // Read the file as a data URL
                    } else {
                        filePreview.innerHTML = ''; // Clear the preview if no file is selected
                    }
                });
            });

            function openModal(id) {
                console.log(`Opening modal: ${id}`);
                document.getElementById(id).style.display = 'flex';
            }

            function closeModal(id) {
                console.log(`Closing modal: ${id}`);
                document.getElementById(id).style.display = 'none';
            }

            @if (session('success'))
                document.addEventListener("DOMContentLoaded", function() {
                    closeModal('materiModal'); // Close the modal on successful action
                });
            @endif
        </script>
    @endsection
