<x-template>
                <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                <h2>Daftar Jadwal</h2>
                <a href="{{ route('jadwal.create') }}" class="btn btn-primary">Tambah Jadwal</a>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table table-bordered border-dark">
                    <thead class="table-dark">
                        <tr>
                            <th>Turnamen</th>
                            <th>Tim A</th>
                            <th>Tim B</th>
                            <th>Jenis</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwal as $jdl)
                            <tr>
                                <td>{{ $jdl->turnamen->nama }}</td>
                                <td>{{ $jdl->timA->nama }}</td>
                                <td>{{ $jdl->timB->nama }}</td>
                                <td>{{ $jdl->jenis }}</td>
                                <td>{{ $jdl->waktu }} menit</td>
                                <td>
                                    <a href="{{ route('jadwal.edit', $jdl->id) }}" class="btn btn-warning me-1">Edit</a>
                                    <form action="{{ route('jadwal.destroy', $jdl->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus pertandingan ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
</x-template>
