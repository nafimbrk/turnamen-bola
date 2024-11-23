<x-template judul="Data Turnamen">
    <div class="d-flex justify-content-between align-items-center mt-4 mb-4">

        <h2>Data Turnamen</h2>
        <a href="{{ url('turnamen/tambah') }}">
            <button class="btn btn-primary">Tambah Turnamen</button>
        </a>
    </div>
    @if (session('pesan'))
        <div class="alert alert-success">
            {{ session('pesan') }}
        </div>
    @endif
    @if (session('gagal'))
        <div class="alert alert-danger">
            {{ session('gagal') }}
        </div>
    @endif
    <table class="table table-bordered border-dark">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>Mulai</th>
                <th>Selesai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($turnamen as $tr)
                <tr>
                    <td>{{ $tr['nama'] }}</td>
                    <td>{{ $tr['start'] }}</td>
                    <td>{{ $tr['selesai'] }}</td>
                    <td>
                        <a href="{{ url('turnamen/update/' . $tr->id) }}" class="btn btn-warning me-1">
                            Edit
                        </a>
                        <form action="{{ url('turnamen/destroy/' . $tr->id) }}" method="POST" onclick="return confirm('yakin ingin manghapus data?');" style="display:inline;">
                          @csrf
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-template>
