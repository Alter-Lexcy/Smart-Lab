@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Komentar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Daftar Komentar</h2>

        <!-- Button Tambah Comment -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addCommentModal">
            Tambah Komentar
        </button>

        <!-- Tabel Data Komentar -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Class ID</th>
                    <th>Content</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{{ $comment->user->name }}</td>
                        <td>{{ $comment->class->name }}</td>
                        <td>{{ $comment->content }}</td>
                        <td>
                            <!-- Button Edit Comment -->
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editCommentModal-{{ $comment->id }}">
                                Edit
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tambah Comment Modal -->
    <div class="modal fade" id="addCommentModal" tabindex="-1" role="dialog" aria-labelledby="addCommentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCommentModalLabel">Tambah Komentar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="user_id">User ID</label>
                            <input type="number" class="form-control" id="user_id" name="user_id" required>
                        </div>
                        <div class="form-group">
                            <label for="class_id">Class ID</label>
                            <input type="number" class="form-control" id="class_id" name="class_id" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Komentar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Comment Modal -->
    @foreach ($comments as $comment)
        <div class="modal fade" id="editCommentModal-{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="editCommentModalLabel-{{ $comment->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCommentModalLabel-{{ $comment->id }}">Edit Komentar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="content-{{ $comment->id }}">Content</label>
                                <textarea class="form-control" id="content-{{ $comment->id }}" name="content" rows="3" required>{{ $comment->content }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Komentar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
