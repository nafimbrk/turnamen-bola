<x-template judul="Hapus Data Turnamen">
    <h2 class="mt-4 mb-4">Hapus Turnamen</h2>
    <form method="post">
        @csrf
        <div class="form-group mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control" value="{{ $turnamen['nama'] ?? "" }}" disabled>
          </div>
        <div class="form-group mb-3">
            <label for="start" class="form-label">Mulai</label>
            <input type="datetime-local" id="start" name="start" class="form-control" value="{{ $turnamen['start'] ?? "" }}" disabled>
            
          </div>
        <div class="form-group mb-4">
            <label for="selesai" class="form-label">selesai</label>
            <input type="datetime-local" id="selesai" name="selesai" class="form-control" value="{{ $turnamen['selesai'] ?? "" }}" disabled>
          </div>
          <div class="form-group">
            <input type="hidden" name="id" value="{{ $turnamen['id'] ?? "" }}">
            <button type="submit" class="btn btn-primary me-2">Hapus</button>
            <a href="{{ url('siswa') }}" class="btn btn-secondary">Kembali</a>
          </div>
    </form>
</x-template>