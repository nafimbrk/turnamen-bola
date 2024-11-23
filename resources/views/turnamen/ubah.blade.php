<x-template judul="Ubah Data Turnamen ">
    <h2 class="mt-4 mb-4">Edit Turnamen</h2>
    <form method="post">
        @csrf
        <div class="form-group mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan turnamen"
                required minlength="3" maxlength="50" value="{{ $turnamen['nama'] ?? old('nama') }}">
            <small class="text-zmuted">
                @error('nama')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </small>
        </div>

        

        <div class="form-group mb-3">
            <label for="start" class="form-label">Mulai</label>
            <input type="datetime-local" name="start" id="start" class="form-control"
                maxlength="100" value="{{ $turnamen['start'] ?? old('start') }}">
            <small class="text-muted">
                @error('start')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </small>
        </div>

        <div class="form-group mb-4">
          <label for="selesai" class="form-label">Selesai</label>
          <input type="datetime-local" name="selesai" id="selesai" class="form-control"
              maxlength="100" value="{{ $turnamen['selesai'] ?? old('selesai') }}">
          <small class="text-muted">
              @error('selesai')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
          </small>
            </small>
        </div>

        <div class="form-group">
            <input type="hidden" name="id" value="{{ $turnamen['id'] ?? old('id') }}">
            <button type="submit" class="btn btn-primary me-2">Edit</button>
            <a href="{{ url('turnamen') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</x-template>
