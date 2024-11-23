<x-template judul="Tambah Data Turnamen">
    <h2 class="mt-4 mb-4">Tambah Turnamen Baru</h2>
    <form method="post">
        @csrf
        
        <div class="form-group mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama" required>
            <small class="text-zmuted">
              @error('nama')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </small>
          </div>
          
          <div class="form-group mb-4">
            <label for="start" class="form-label">Mulai</label>
            <input type="datetime-local" name="start" id="start" required class="form-control" placeholder="Masukkan waktu start">
            <small class="text-zmuted">
              @error('start')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </small>
        </div>
        
        <div class="form-group mb-4">
            <label for="selesai" class="form-label">Selesai</label>
            <input type="datetime-local" name="selesai" id="selesai" required class="form-control" placeholder="Masukkan waktu selesai">
            <small class="text-zmuted">
              @error('selesai')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </small>
        </div>




          <div class="form-group">
            <button type="submit" class="btn btn-primary me-2">Tambah</button>
            <a href="{{ url('turnamen') }}" class="btn btn-secondary">Kembali</a>
          </div>
    </form>
</x-template>