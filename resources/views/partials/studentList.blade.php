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
            <script>
                $(document).on('click', '.pagination a', function(event) {
                    event.preventDefault();
                    let page = $(this).attr('href').split('page=')[1];
                    fetchPage(page);
                });

                function fetchPage(page) {
                    $.ajax({
                        url: '/teacher/class-details?page=' + page,
                        success: function(data) {
                            $(`#table-container-${classId}`).html(data);
                        },
                        error: function() {
                            alert('Terjadi kesalahan saat memuat data.');
                        }
                    });
                }
            </script>
        </div>
    </div>
