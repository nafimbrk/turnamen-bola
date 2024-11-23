<x-template>
                <h2 class="mt-4 mb-2">Edit Jadwal</h2>
                <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="turnamen_id">Turnamen</label>
                        <select name="turnamen_id" class="form-control" required>
                            <option value="">-- Pilih Turnamen --</option>
                            @foreach ($turnamen as $t)
                                <option value="{{ $t->id }}" {{ $t->id == $jadwal->turnamen_id ? 'selected' : '' }}>
                                    {{ $t->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tim_a_id">Tim A</label>
                        <select name="tim_a_id" class="form-control" required>
                            <option value="">-- Pilih Tim A --</option>
                            @foreach ($tim as $t)
                                <option value="{{ $t->id }}" {{ $t->id == $jadwal->tim_a_id ? 'selected' : '' }}>
                                    {{ $t->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tim_b_id">Tim B</label>
                        <select name="tim_b_id" class="form-control" required>
                            <option value="">--  Pilih Tim B --</option>
                            @foreach ($tim as $t)
                                <option value="{{ $t->id }}" {{ $t->id == $jadwal->tim_b_id ? 'selected' : '' }}>
                                    {{ $t->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="jenis">Jenis Pertandingan</label>
                        <input type="text" name="jenis" class="form-control" value="{{ $jadwal->jenis }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="waktu">Waktu Pertandingan</label>
                        <div class="input-group">
                            <input type="number" name="waktu" class="form-control" required value="{{ $jadwal->waktu }}">
                            <div class="input-group-append">
                                <span class="input-group-text">Menit</span>
                            </div>
                        </div>
                    </div>
                    

        

                    <button type="submit" class="btn btn-primary me-1">Update</button>
                    <a href="{{ route('jadwal.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
</x-template>
