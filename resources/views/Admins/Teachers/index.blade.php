@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Daftar Guru</h1>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#teacherModal">
            Tambah Guru
        </button>

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
                <tr>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editTeacherModal">
                            Ubah
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Modal Create --}}
    <div class="modal fade" id="teacherModal" tabindex="-1" aria-labelledby="teacherModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="teacherModalLabel">Tambah Guru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="teacherForm" action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name_teacher" class="form-label">Nama Guru</label>
                            <input type="text" class="form-control" id="name_teacher" name="name_teacher">
                        </div>
                        <div class="mb-3">
                            <label for="NIP" class="form-label">NIP</label>
                            <input type="number" class="form-control" id="NIP" name="NIP">
                        </div>
                        <div class="mb-3">
                            <label for="email_teacher" class="form-label">Email Guru</label>
                            <input type="email" class="form-control" id="email_teacher" name="email_teacher">
                        </div>

                        <button type="submit" class="btn btn-success">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Update --}}
    <div class="modal fade" id="editTeacherModal" tabindex="-1" aria-labelledby="editTeacherModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTeacherModalLabel">Ubah Guru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editTeacherForm" action="" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name_teacher" class="form-label">Nama Guru</label>
                            <input type="text" class="form-control" id="name_teacher" name="name_teacher">
                        </div>
                        <div class="mb-3">
                            <label for="NIP" class="form-label">NIP</label>
                            <input type="number" class="form-control" id="NIP" name="NIP">
                        </div>
                        <div class="mb-3">
                            <label for="email_teacher" class="form-label">Email Guru</label>
                            <input type="email" class="form-control" id="email_teacher" name="email_teacher">
                        </div>

                        <button type="submit" class="btn btn-success">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
