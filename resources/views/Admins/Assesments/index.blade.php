@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Assessment</h2>

    <!-- Button to trigger the modal for adding a new assessment -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addAssessmentModal">
        Tambah Assessment
    </button>

    <!-- Table of assessments -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Collection</th>
                <th>User</th>
                <th>Mark Task</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assessments as $index => $assessment)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $assessment->collection->name ?? 'Tidak tersedia' }}</td>
                    <td>{{ $assessment->user->name ?? 'Tidak tersedia' }}</td>
                    <td>{{ $assessment->mark_task }}</td>
                    <td>
                        <!-- Edit button to open modal -->
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editAssessmentModal_{{ $assessment->id }}">
                            Edit
                        </button>

                        <!-- Delete form -->
                        <form action="{{ route('assesments.destroy', $assesments->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus assessment ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal for adding a new assessment -->
<div class="modal fade" id="addAssessmentModal" tabindex="-1" aria-labelledby="addAssessmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAssessmentModalLabel">Tambah Assessment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('assesments.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Collection selection -->
                    <div class="mb-3">
                        <label for="collection_id" class="form-label">Collection</label>
                        <select name="collection_id" id="collection_id" class="form-control">
                            <option value="" disabled selected>Pilih Collection</option>
                            @foreach ($collections as $collection)
                                <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                            @endforeach
                        </select>
                        @error('collection_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- User selection -->
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User</label>
                        <select name="user_id" id="user_id" class="form-control">
                            <option value="" disabled selected>Pilih User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Mark Task -->
                    <div class="mb-3">
                        <label for="mark_task" class="form-label">Mark Task</label>
                        <input type="text" class="form-control" id="mark_task" name="mark_task" placeholder="Masukkan Mark Task">
                        @error('mark_task')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modals for editing each assessment -->
@foreach ($assessments as $assessment)
    <div class="modal fade" id="editAssessmentModal_{{ $assesments->id }}" tabindex="-1" aria-labelledby="editAssessmentModalLabel_{{ $assessment->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAssessmentModalLabel_{{ $assessment->id }}">Edit Assessment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('assessments.update', $assessment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <!-- Collection selection -->
                        <div class="mb-3">
                            <label for="collection_id_{{ $assessment->id }}" class="form-label">Collection</label>
                            <select name="collection_id" id="collection_id_{{ $assessment->id }}" class="form-control">
                                @foreach ($collections as $collection)
                                    <option value="{{ $collection->id }}" {{ $collection->id == $assessment->collection_id ? 'selected' : '' }}>
                                        {{ $collection->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- User selection -->
                        <div class="mb-3">
                            <label for="user_id_{{ $assessment->id }}" class="form-label">User</label>
                            <select name="user_id" id="user_id_{{ $assessment->id }}" class="form-control">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $user->id == $assessment->user_id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Mark Task -->
                        <div class="mb-3">
                            <label for="mark_task_{{ $assessment->id }}" class="form-label">Mark Task</label>
                            <input type="text" class="form-control" id="mark_task_{{ $assessment->id }}" name="mark_task" value="{{ $assessment->mark_task }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
@endsection
