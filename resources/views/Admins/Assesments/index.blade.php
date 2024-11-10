<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Assesments </h1>

    <!-- Button to trigger modal for adding a new assesment -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#assesmentModal">
        Tambah assesment
    </button>

    <!--  Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Collection ID</th>
                <th>Mark Task</th>
                <th>Created At</th>
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
        <!-- Button to trigger edit modal -->
        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editAssessmentModal">
            Edit
        </button>

        <!-- Actions: View, Delete -->
        <form action="#" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus assessment ini?')">Hapus</button>
        </form>
    </td>
</tr>

<!-- Edit Assessment Modal -->
<div class="modal fade" id="editAssessmentModal" tabindex="-1" aria-labelledby="editAssessmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAssessmentModalLabel">Edit Assessment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editAssessmentForm" action="#" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Collection ID Input -->
                    <div class="mb-3">
                        <label for="collection_id" class="form-label">Collection ID</label>
                        <input type="number" class="form-control" id="collection_id" name="collection_id" value="#" required>
                    </div>
                    
                    <!-- Mark Task Input -->
                    <div class="mb-3">
                        <label for="mark_task" class="form-label">Mark Task</label>
                        <input type="text" class="form-control" id="mark_task" name="mark_task" value="#" required>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

        </tbody>
    </table>
</div>

<!-- Modal for adding a new assesment -->
<div class="modal fade" id="assesmentModal" tabindex="-1" aria-labelledby="assesmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assesmentModalLabel">Tambah assesment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="assesmentForm" action="#" method="POST">
                    @csrf
                    <!-- Collection ID Input -->
                    <div class="mb-3">
                        <label for="collection_id" class="form-label">Collection ID</label>
                        <input type="number" class="form-control" id="collection_id" name="collection_id" required>
                    </div>
                    
                    <!-- Mark Task Input -->
                    <div class="mb-3">
                        <label for="mark_task" class="form-label">Mark Task</label>
                        <input type="text" class="form-control" id="mark_task" name="mark_task" required>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

</body>
</html>