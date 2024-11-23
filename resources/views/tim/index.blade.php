<x-template judul="data tim">
    <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
        <h2>Daftar Tim</h2>
        <a href="{{ route('tim.create') }}" class="btn btn-primary">Tambah Tim</a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered border-dark">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>Nama Turnamen</th>
                <th>Pemain</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tim as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->turnamen->nama ?? 'Tidak ada' }}</td>
                    <td>
                        {{ implode(', ', json_decode($item->pemain, true)) }}
                    </td>
                    <td>
                        <a href="{{ route('tim.edit', $item->id) }}" class="btn btn-warning me-1">Edit</a>
                        <form action="{{ route('tim.destroy', $item->id) }}" method="POST" style="display:inline;" onclick="return confirm('yakin ingin manghapus data?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-template>
