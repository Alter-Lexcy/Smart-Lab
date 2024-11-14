@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Tugas</h2>
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#taskModal">Tambah
            Tugas</button>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Judul Tugas</th>
                    <th>Deskripsi Tugas</th>
                    <th>Tanggal Pengumpulan Tugas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $task->Class->name_class }}</td>
                        <td>{{ $task->title_task }}</td>
                        <td>{{ $task->description_task }}</td>
                        <td>{{ $task->date_collection }}</td>
                        <td>
                            <!-- Open edit modal -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editTaskModal{{ $task->id }}">Ubah Tugas</button>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"
                                    onclick="return confirm('Apakah Anda ingin menghapus tugas ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modal Create --}}
    <div class="modal fade" id="taskModal" aria-labelledby="modulModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="taskModal">Tambah Tugas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="class_id" class="form-label">Kelas</label>
                            <select name="class_id" id="class_id" class="form-control">
                                <option value="" disabled selected>Pilih Kelas</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}"
                                        {{ old('class_id') == $class->id ? 'selected' : '' }}>{{ $class->name_class }}
                                    </option>
                                @endforeach
                            </select>
                            @error('class_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="title_task" class="form-label">Judul Tugas</label>
                            <input type="text" class="form-control" id="title_task" name="title_task"
                                value="{{ old('title_task') }}">
                            @error('title_task')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description_task" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description_task" rows="3" name="description_task">{{ old('description_task') }}</textarea>
                            @error('description_task')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="date_collection" class="form-label">Tanggal Pengumpulan Tugas</label>
                            <input type="date" class="form-control" id="date_collection" name="date_collection">
                            @error('date_collection')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Update --}}
    @foreach ($tasks as $task)
        <div class="modal fade" id="editTaskModal{{ $task->id }}" aria-labelledby="editTaskModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editTaskModal">Ubah Tugas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="class_id" class="form-label">Kelas</label>
                                <select name="class_id" id="class_id" class="form-control">
                                    <option value="" disabled selected>Pilih Kelas</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}"
                                            {{ $task->class_id == $class->id ? 'selected' : '' }}>{{ $class->name_class }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('class_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="title_task" class="form-label">Judul Tugas</label>
                                <input type="text" class="form-control" id="title_task" name="title_task"
                                    value="{{ $task->title_task }}">
                                @error('title_task')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description_task" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="description_task" rows="3" name="description_task">{{ $task->description_task }}</textarea>
                                @error('description_task')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="date_collection" class="form-label">Tanggal Pengumpulan Tugas</label>
                                <input type="date" class="form-control" id="date_collection" name="date_collection"
                                    value="{{ $task->date_collection }}">
                                @error('date_collection')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection


