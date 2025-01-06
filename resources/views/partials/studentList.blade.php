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
                    @php
                        $globalIndex = ($students->currentPage() - 1) * $students->perPage();
                    @endphp

                    @foreach ($students as $student)
                        <tr class="border">
                            <td class="px-4 py-2">{{ $globalIndex + $loop->iteration }}</td>
                            <!-- Menambahkan indeks global -->
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
                    {{ $students->withQueryString()->links() }}
                    <!-- Menambahkan denganQueryString() untuk menjaga URL tetap utuh -->
                </div>
            @endif
        </div>
    </div>
