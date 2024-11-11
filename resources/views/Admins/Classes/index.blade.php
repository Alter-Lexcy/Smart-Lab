@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Daftar Kelas</h2>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#classModal" >
            Tambah Kelas
        </button>

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
                <tr>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editClassModal">Ubah Kelas</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Model Create --}}
    <div class="modal fade" id="classModal" tabindex="-1" aria-labelledby="classModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="classModalLabel">Tambah Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="classForm" action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name_class" class="form-label">Nama Kelas</label>
                            <input type="text" class="form-control" id="name_class" name="name_class">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="teacher_id" class="form-label">Guru Pengajar</label>
                            <input type="text" class="form-control" id="teacher_id" name="teacher_id">
                        </div>

                        <button type="submit" class="btn btn-success">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modul Update --}}

    <div class="modal fade" id="editClassModal" tabindex="-1" aria-labelledby="editClassModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editClassModal">Ubah Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="editClassForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name_class" class="form-label">Nama Kelas</label>
                            <input type="text" class="form-control" id="name_class" name="name_class">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="teacher_id" class="form-label">Guru Pengajar</label>
                            <input type="text" class="form-control" id="teacher_id" name="teacher_id">
                        </div>

                        <button type="submit" class="btn btn-success">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
