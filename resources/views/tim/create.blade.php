<x-template judul="tambah tim">
    <h3 class="mt-4 mb-4">Tambah Tim</h3>
    <form action="{{ route('tim.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" required class="form-control"
            placeholder="Masukkan nama">
        </div>
        <div class="form-group mb-3">
            <label for="turnamen_id" class="form-label">Turnamen</label>
            <select name="turnamen_id" id="turnamen_id" required class="form-control">
                <option value="">-- Pilih turnamen --</option>
                @foreach ($turnamen as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group mb-4">
            <label for="pemain" class="form-label">Pemain (pisahkan dengan koma)</label>
            <textarea id="pemain" name="pemain" rows="4" cols="50" required class="form-control" placeholder="Masukkan pemain">
</textarea>
        </div>





        <div class="form-group">
            <button type="submit" class="btn btn-primary me-2">Tambah</button>
            <a href="{{ url('tim') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</x-template>
