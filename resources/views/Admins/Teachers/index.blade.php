@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Daftar Guru</h1>

        <!-- Button untuk Modal Tambah -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#teacherModal">
            Tambah Guru
        </button>

        <!-- Tabel Guru -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Guru</th>
                    <th>NIP</th>
                    <th>Email Guru</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $teacher->name_teacher }}</td>
                        <td>{{ $teacher->NIP }}</td>
                        <td>{{ $teacher->email_teacher }}</td>
                        <td>
                            <!-- Tombol Ubah untuk Modal -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editTeacherModal-{{ $teacher->id }}">
                                Ubah
                            </button>
                            <!-- Tombol Hapus -->
                            <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus guru ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Update/Ubah -->
                    <div class="modal fade" id="editTeacherModal-{{ $teacher->id }}" tabindex="-1"
                        aria-labelledby="editTeacherModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editTeacherModalLabel">Ubah Guru</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="name_teacher" class="form-label">Nama Guru</label>
                                            <input type="text" class="form-control" id="name_teacher" name="name_teacher"
                                                value="{{ $teacher->name_teacher }}">
                                            @error('name_teacher')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="NIP" class="form-label">NIP</label>
                                            <input type="number" class="form-control" id="NIP" name="NIP"
                                                value="{{ $teacher->NIP }}">
                                            @error('NIP')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="email_teacher" class="form-label">Email Guru</label>
                                            <input type="email" class="form-control" id="email_teacher"
                                                name="email_teacher" value="{{ $teacher->email_teacher }}">
                                            @error('email.teacher')
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

    <!-- Modal Tambah Guru -->
    <div class="modal fade" id="teacherModal" tabindex="-1" aria-labelledby="teacherModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="teacherModalLabel">Tambah Guru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('teachers.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name_teacher" class="form-label">Nama Guru</label>
                            <input type="text" class="form-control" id="name_teacher" name="name_teacher"
                                value="{{ old('name_teacher') }}">
                            @error('name_teacher')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="NIP" class="form-label">NIP</label>
                            <input type="number" class="form-control" id="NIP" name="NIP"
                                value="{{ old('NIP') }}">
                            @error('NIP')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email_teacher" class="form-label">Email Guru</label>
                            <input type="email" class="form-control" id="email_teacher" name="email_teacher"
                                value="{{ old('email_teacher') }}">
                            @error('email_teacher')
                                <div class="text-danger mb-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Tambah Guru</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JavaScript untuk membuka modal jika validasi gagal -->
    @if (session('openModal') == 'teacherModal' || $errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var myModal = new bootstrap.Modal(document.getElementById('teacherModal'));
                myModal.show();

                var closeButton = document.querySelector('#teacherModal .btn-close');
                closeButton.addEventListener('click', function() {
                    myModal.hide();
                })

            });
        </script>
    @endif
@endpush
