@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Modul</h2>
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modulModal">Tambah
            Modul</button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Judul Modul</th>
                    <th>Diskripsi</th>
                    <th>File Modul</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($moduls as $modul)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $modul->Class->name_class }}</td>
                        <td>{{ $modul->title }}</td>
                        <td>{{ $modul->description }}</td>
                        <td>
                            @php
                                $fileExtension = pathinfo($modul->file_modul, PATHINFO_EXTENSION);
                            @endphp
                            @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                <img src="{{ asset('storage/' . $modul->file_modul) }}" alt="File Image" width="100px">
                            @elseif($fileExtension === 'pdf')
                                <embed src="{{ asset('storage/' . $modul->file_modul) }}" type="application/pdf"
                                    width="100px" height="100px">
                            @endif
                        </td>

                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModulModal_{{ $modul->id }}">
                                Ubah Modul
                            </button>
                            <form action="{{ route('moduls.destroy', $modul->id) }}" class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return Confirm('Apakah Anda Ingin Menghapus Modul ini ? ')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modul Create --}}
    <div class="modal fade" id="modulModal" tabindex="-1" aria-labelledby="modulModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modulModalLabel">Tambah Modul</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('moduls.store') }}" id="modulForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Guru Pengajar -->
                            <div class="col-md-6 mb-3">
                                <label for="class_id" class="form-label">Kelas</label>
                                <select name="class_id" id="class_id" class="form-control">
                                    <option value="" disabled selected>Pilih Kelas</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}"
                                            {{ old('class_id') == $class->id ? 'selected' : '' }}>
                                            {{ $class->name_class }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('class_id')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Judul Modul -->
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">Judul Modul</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Masukkan Judul Modul" value="{{ old('title') }}">
                                @error('title')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <!-- Deskripsi -->
                            <div class="col-md-12 mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="description" rows="3" name="description" placeholder="Deskripsikan modul">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <!-- File Modul -->
                            <div class="col-md-12 mb-3">
                                <label for="file_modul" class="form-label">File Modul</label>
                                <input type="file" class="form-control" id="file_modul" name="file_modul"
                                    onchange="previewFile()">
                                <div id="file_preview" class="mt-2"></div>
                                @error('file_modul')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modul update --}}
    @foreach ($moduls as $modul)
        <div class="modal fade" id="editModulModal_{{ $modul->id }}"
            aria-labelledby="editModulModal_{{ $modul->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModulModal_{{ $modul->id }}">Ubah Modul</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('moduls.update', $modul->id) }}" id="modulForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <!-- Guru Pengajar -->
                                <div class="col-md-6 mb-3">
                                    <label for="class_id" class="form-label">Kelas</label>
                                    <select name="class_id" id="class_id" class="form-control">
                                        <option value="" disabled selected>Pilih Kelas</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}"
                                                {{ $class->id == $class->id ? 'selected' : '' }}>
                                                {{ $class->name_class }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('class_id')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Judul Modul -->
                                <div class="col-md-6 mb-3">
                                    <label for="title" class="form-label">Judul Modul</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Masukkan Judul Modul" value="{{ $modul->title }}">
                                    @error('title')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <!-- Deskripsi -->
                                <div class="col-md-12 mb-3">
                                    <label for="description" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="description" rows="3" name="description" placeholder="Deskripsikan modul">{{ $modul->description }}</textarea>
                                    @error('description')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="file_modul" class="form-label">Foto</label>
                                    <input type="file" class="form-control" id="file_modul_{{ $modul->id }}"
                                        name="file_modul" onchange="previewFile({{ $modul->id }})">
                                    <div id="file_preview_{{ $modul->id }}" class="mt-2">
                                        @php
                                            $fileExtension = pathinfo($modul->file_modul, PATHINFO_EXTENSION);
                                        @endphp
                                        @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                            <center>
                                                <p>File Sebelumnya</p>
                                                <img src="{{ asset('storage/' . $modul->file_modul) }}" alt="File Image"
                                                    width="100px">
                                            </center>
                                        @elseif($fileExtension === 'pdf')
                                            <center>
                                                <p>File Sebelumnya</p><embed
                                                    src="{{ asset('storage/' . $modul->file_modul) }}"
                                                    type="application/pdf" width="100px" height="100px">
                                            </center>
                                        @endif
                                    </div>


                                    @error('file_modul')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@push('scripts')
    <script>
        function previewFile() {
            const file = document.getElementById('file_modul').files[0];
            const previewContainer = document.getElementById('file_preview');
            previewContainer.innerHTML = ''; // Clear previous preview

            if (file) {
                const fileName = document.createElement('p');
                previewContainer.appendChild(fileName);

                // For image files, create an image preview
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('img-fluid');
                        previewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            }
        }

        function previewFile(modulId) {
            const fileInput = document.getElementById(`file_modul_${modulId}`);
            const preview = document.getElementById(`file_preview_${modulId}`);

            // Hapus preview lama
            preview.innerHTML = '';

            if (fileInput.files && fileInput.files[0]) {
                const file = fileInput.files[0];
                const reader = new FileReader();

                reader.onload = function(e) {
                    if (file.type.startsWith('image/')) {
                        preview.innerHTML =
                            `<center><p>File Sekarang</p>
                                <img src="${e.target.result}" alt="Preview" width="200" class="img-thumbnail"></center>`;
                    } else if (file.type === 'application/pdf') {
                        preview.innerHTML =
                            `<center><p>File Sekarang</p>
                                <embed src="${e.target.result}" type="application/pdf" width="200" height="200"></center>`;
                    } else {
                        preview.innerHTML = `<p>File tidak dapat dipreview.</p>`;
                    }
                };

                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush
