@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-4 mt-5">
        <h2 class="text-2xl font-bold mb-4">Daftar Komentar</h2>

        <!-- Button Tambah Comment -->
        <button type="button" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded mb-4" onclick="toggleModal('addCommentModal')">
            Tambah Komentar
        </button>

        <!-- Tabel Data Komentar -->
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="">
                    <th class="py-2 px-4 border">ID</th>
                    <th class="py-2 px-4 border">User ID</th>
                    <th class="py-2 px-4 border">Class ID</th>
                    <th class="py-2 px-4 border">Content</th>
                    <th class="py-2 px-4 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4 border">{{ $comment->id }}</td>
                        <td class="py-2 px-4 border">{{ $comment->user->name }}</td>
                        <td class="py-2 px-4 border">{{ $comment->class->name }}</td>
                        <td class="py-2 px-4 border">{{ $comment->content }}</td>
                        <td class="py-2 px-4 border">
                            <button type="button" class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded" onclick="toggleModal('editCommentModal-{{ $comment->id }}')">
                                Edit
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tambah Comment Modal -->
    <div id="addCommentModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg">
            <h5 class="text-xl font-bold mb-4">Tambah Komentar</h5>
            <button type="button" class="text-gray-400 hover:text-gray-600 absolute top-2 right-2" onclick="toggleModal('addCommentModal')">&times;</button>
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="user_id" class="block font-semibold">User ID</label>
                    <input type="number" id="user_id" name="user_id" class="border border-gray-300 rounded p-2 w-full" required>
                </div>
                <div class="mb-4">
                    <label for="class_id" class="block font-semibold">Class ID</label>
                    <input type="number" id="class_id" name="class_id" class="border border-gray-300 rounded p-2 w-full" required>
                </div>
                <div class="mb-4">
                    <label for="content" class="block font-semibold">Content</label>
                    <textarea id="content" name="content" rows="3" class="border border-gray-300 rounded p-2 w-full" required></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Tambah Komentar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Comment Modals -->
    @foreach ($comments as $comment)
        <div id="editCommentModal-{{ $comment->id }}" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg">
                <h5 class="text-xl font-bold mb-4">Edit Komentar</h5>
                <button type="button" class="text-gray-400 hover:text-gray-600 absolute top-2 right-2" onclick="toggleModal('editCommentModal-{{ $comment->id }}')">&times;</button>
                <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="content-{{ $comment->id }}" class="block font-semibold">Content</label>
                        <textarea id="content-{{ $comment->id }}" name="content" rows="3" class="border border-gray-300 rounded p-2 w-full" required>{{ $comment->content }}</textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Update Komentar</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

    <!-- Tailwind CSS Modal Toggle Script -->
    <script>
        function toggleModal(modalID) {
            document.getElementById(modalID).classList.toggle('hidden');
            document.getElementById(modalID).classList.toggle('flex');
        }
    </script>
@endsection
