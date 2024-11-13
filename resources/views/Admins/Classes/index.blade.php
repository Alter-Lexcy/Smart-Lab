@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Daftar Kelas</h2>

        <!-- Button untuk Modal Tambah -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#classModal">
            Tambah Kelas
        </button>

        <!-- Tabel Kelas -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kelas</th>
                    <th>Deskripsi Kelas</th>
                    <th>Nama Guru</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classes as $index => $class)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $class->name_class }}</td>
                        <td>{{ $class->description }}</td>
                        <td>{{ $class->teacher->name_teacher }}</td>
                        <td>
                            <!-- Tombol Ubah untuk Modal -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editClassModal-{{ $class->id }}">
                                Ubah
                            </button>
                            <!-- Tombol Hapus -->
                            <form action="{{ route('classes.destroy', $class->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus kelas ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Update/Ubah -->
                    <div class="modal fade" id="editClassModal-{{ $class->id }}" tabindex="-1"
                        aria-labelledby="editClassModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editClassModalLabel">Ubah Kelas</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('classes.update', $class->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="name_class" class="form-label">Nama Kelas</label>
                                            <input type="text" class="form-control" id="name_class" name="name_class"
                                                value="{{ $class->name_class }}">
                                            @error('name_class')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" id="description" rows="3" name="description">{{ $class->description }}</textarea>
                                            @error('description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="teacher_id" class="form-label">Guru Pengajar</label>
                                            <select class="form-select" id="teacher_id" name="teacher_id">
                                                @foreach ($teachers as $teacher)
                                                    <option value="{{ $teacher->id }}" {{ $teacher->id == $class->teacher_id ? 'selected' : '' }}>
                                                        {{ $teacher->name_teacher }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('teacher_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah Kelas -->
    <div class="modal fade" id="classModal" tabindex="-1" aria-labelledby="classModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="classModalLabel">Tambah Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('classes.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name_class" class="form-label">Nama Kelas</label>
                            <input type="text" class="form-control" id="name_class" name="name_class" value="{{ old('name_class') }}">
                            @error('name_class')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" rows="3" name="description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="teacher_id" class="form-label">Guru Pengajar</label>
                            <select class="form-select" id="teacher_id" name="teacher_id">
                                <option value="" disabled selected>Pilih Guru</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                        {{ $teacher->name_teacher }}
                                    </option>
                                @endforeach
                            </select>
                            @error('teacher_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Tambah Kelas</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JavaScript untuk membuka modal jika validasi gagal -->
    @if (session('openModal') == 'classModal' || $errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var myModal = new bootstrap.Modal(document.getElementById('classModal'));
                myModal.show();
                var closeButton = document.querySelector('#classModal .btn-close');
                closeButton.addEventListener('click', function() {
                    myModal.hide();
                });
            });
        </script>
    @endif
@endpush
