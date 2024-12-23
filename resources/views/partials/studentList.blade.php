<div class="modal-body">
    <div id="table-container">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white text-center rounded-lg">
                <thead>
                    <tr class="border">
                        <th class="px-4 py-2 text-gray-500 text-xs font-semibold">No</th>
                        <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Nama Siswa</th>
                        <th class="px-4 py-2 text-gray-500 text-xs font-semibold">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr class="border">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $student->name }}</td>
                            <td class="px-4 py-2">{{ $student->email }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="pagination px-5 py-2">
            <!-- Di dalam studentList.blade.php, pastikan pagination sudah benar -->
            @if ($students->hasPages())
                <div class="pagination">
                    {{ $students->links() }} <!-- Pastikan pagination di-render di sini -->
                </div>
            @endif

        </div>
        <script>
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault(); // Mencegah default redirect

                let url = $(this).attr('href'); // Ambil URL dari link pagination
                let classId = url.split('/classes/')[1].split('/students')[0]; // Mendapatkan class ID dari URL

                $.ajax({
                    url: url,
                    success: function(data) {
                        // Mengupdate bagian tabel siswa berdasarkan classId
                        $(`#table-container-${classId}`).html(data);
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat memuat data.');
                    }
                });
            });
        </script>
    </div>
