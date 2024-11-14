@extends('layouts.app')
@section('content')
<div class="container mt-5">
        <h2>Daftar Koleksi</h2>

        <!-- Button Tambah Collection -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addCollectionModal">
            Tambah Collection
        </button>

        <!-- Tabel Data Koleksi -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Task ID</th>
                    <th>File Collection</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($collections as $collection)
                    <tr>
                        <td>{{ $collection->id }}</td>
                        <td>{{ $collection->user_id }}</td>
                        <td>{{ $collection->task_id }}</td>
                        <td>{{ $collection->file_collection }}</td>
                        <td>{{ $collection->status }}</td>
                        <td>
                            <!-- Button Edit Collection -->
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editCollectionModal-{{ $collection->id }}">
                                Edit
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tambah Collection Modal -->
    <div class="modal fade" id="addCollectionModal" tabindex="-1" role="dialog" aria-labelledby="addCollectionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCollectionModalLabel">Tambah Collection</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('collections.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="user_id">User ID</label>
                            <input type="number" class="form-control" id="user_id" name="user_id" required>
                        </div>
                        <div class="form-group">
                            <label for="task_id">Task ID</label>
                            <input type="number" class="form-control" id="task_id" name="task_id" required>
                        </div>
                        <div class="form-group">
                            <label for="file_collection">File Collection</label>
                            <input type="file" class="form-control" id="file_collection" name="file_collection" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="not yet rated">Not Yet Rated</option>
                                <option value="has been rated">Has Been Rated</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Collection</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Collection Modal -->
    @foreach ($collections as $collection)
        <div class="modal fade" id="editCollectionModal-{{ $collection->id }}" tabindex="-1" role="dialog" aria-labelledby="editCollectionModalLabel-{{ $collection->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCollectionModalLabel-{{ $collection->id }}">Edit Collection</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('collections.update', $collection->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="user_id-{{ $collection->id }}">User ID</label>
                                <input type="number" class="form-control" id="user_id-{{ $collection->id }}" name="user_id" value="{{ $collection->user_id }}" required>
                            </div>
                            <div class="form-group">
                                <label for="task_id-{{ $collection->id }}">Task ID</label>
                                <input type="number" class="form-control" id="task_id-{{ $collection->id }}" name="task_id" value="{{ $collection->task_id }}" required>
                            </div>
                            <div class="form-group">
                                <label for="file_collection-{{ $collection->id }}">File Collection</label>
                                <input type="file" class="form-control" id="file_collection-{{ $collection->id }}" name="file_collection">
                                <small>File saat ini: {{ $collection->file_collection }}</small>
                            </div>
                            <div class="form-group">
                                <label for="status-{{ $collection->id }}">Status</label>
                                <select class="form-control" id="status-{{ $collection->id }}" name="status" required>
                                    <option value="not yet rated" {{ $collection->status == 'not yet rated' ? 'selected' : '' }}>Not Yet Rated</option>
                                    <option value="has been rated" {{ $collection->status == 'has been rated' ? 'selected' : '' }}>Has Been Rated</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Collection</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @endsection
