@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Tugas</h2>
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#taskModal">Tambah Modul</button>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Judul Kelas</th>
                    <th>Diskripsi</th>
                    <th>Tanggal Pengumpulan Tugas</th>
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
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editTaskModal">Ubah Modul</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Modul Create --}}
    <div class="modal fade" id="taskModal" aria-labelledby="modulModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="taskModal">Tambah Tugas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="taskModal" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="class_id" class="form-label">Kelas</label>
                            <input type="text" class="form-control" id="class_id" name="class_id">
                        </div>
                        <div class="mb-3">
                            <label for="title_task" class="form-label">Judul Tugas</label>
                            <input type="text" class="form-control" id="title_task" name="title_task">
                        </div>
                        <div class="mb-3">
                            <label for="description_task" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description_task" rows="3" name="description_task"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="date_task" class="form-label">Tanggal Pengumpulan Tugas</label>
                            <input type="date" class="form-control" id="date_task" name="date_task">
                        </div>

                        <button type="submit" class="btn btn-success">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modul update --}}
    <div class="modal fade" id="editTaskModal" aria-labelledby="editTaskModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTaskModal">Ubah Modul</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="taskModal" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="class_id" class="form-label">Kelas</label>
                            <input type="text" class="form-control" id="class_id" name="class_id">
                        </div>
                        <div class="mb-3">
                            <label for="title_task" class="form-label">Judul Tugas</label>
                            <input type="text" class="form-control" id="title_task" name="title_task">
                        </div>
                        <div class="mb-3">
                            <label for="description_task" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description_task" rows="3" name="description_task"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="date_task" class="form-label">Tanggal Pengumpulan Tugas</label>
                            <input type="date" class="form-control" id="date_task" name="date_task">
                        </div>

                        <button type="submit" class="btn btn-success">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
