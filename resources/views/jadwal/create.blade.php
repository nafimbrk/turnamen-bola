<x-template>
                <h2 class="mt-4 mb-4">Tambah Jadwal</h2>
                <form action="{{ route('jadwal.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="turnamen_id">Turnamen</label>
                        <select name="turnamen_id" class="form-control" required>
                            <option value="">-- Pilih Turnamen --</option>
                            @foreach ($turnamen as $t)
                                <option value="{{ $t->id }}">{{ $t->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tim_a_id">Tim A</label>
                        <select name="tim_a_id" class="form-control" required>
                            <option value="">-- Pilih Tim A --</option>
                            @foreach ($tim as $t)
                                <option value="{{ $t->id }}">{{ $t->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tim_b_id">Tim B</label>
                        <select name="tim_b_id" class="form-control" required>
                            <option value="">-- Pilih Tim B --</option>
                            @foreach ($tim as $t)
                                <option value="{{ $t->id }}">{{ $t->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    

                    <div class="form-group mb-3">
                        <label for="jenis">Jenis Pertandingan</label>
                        <input type="text" name="jenis" class="form-control" required placeholder="jenis pertandingan">
                    </div>

                    <div class="form-group mb-3">
                        <label for="waktu">Waktu Pertandingan</label>
                        <div class="input-group">
                            <input type="number" name="waktu" class="form-control" required placeholder="Masukkan waktu dalam menit">
                            <div class="input-group-append">
                                <span class="input-group-text">Menit</span>
                            </div>
                        </div>
                    </div>
                    

                    <button type="submit" class="btn btn-primary me-1">Tambah</button>
                    <a href="{{ url('jadwal') }}" class="btn btn-secondary">Kembali</a>
                </form>
</x-template>
