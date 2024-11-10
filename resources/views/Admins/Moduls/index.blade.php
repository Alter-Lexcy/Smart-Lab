@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Modul</h2>
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modulModal">Tambah Modul</button>

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
                <tr>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModulModal">Ubah Modul</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Modul Create --}}
    <div class="modal fade" id="modulModal" aria-labelledby="modulModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modulModal">Tambah Modul</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="modulForm" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="class_id" class="form-label">Kelas</label>
                            <input type="text" class="form-control" id="class_id" name="class_id">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Modul</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="file_modul" class="form-label">File Modul</label>
                            <input type="file" class="form-control" id="file_modul" name="file_modul">
                        </div>

                        <button type="submit" class="btn btn-success">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modul update --}}
    <div class="modal fade" id="editModulModal" aria-labelledby="editModulModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModulModal">Ubah Modul</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="modulForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="class_id" class="form-label">Kelas</label>
                            <input type="text" class="form-control" id="class_id" name="class_id">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Modul</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="file_modul" class="form-label">File Modul</label>
                            <input type="file" class="form-control" id="file_modul" name="file_modul">
                        </div>

                        <button type="submit" class="btn btn-success">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
