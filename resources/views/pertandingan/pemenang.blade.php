<x-template>
                <h2 class="mt-4 mb-2">Pilih Pemenang</h2>

                
                <form action="{{ route('pertandingan.updateWinner', $match->id) }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="pemenang_id" class="form-label">Pilih Pemenang</label>
                        <select name="pemenang_id" id="pemenang_id" class="form-control" required>
                            <option value="">-- Pilih Pemenang --</option>
                            @foreach ([$match->timA, $match->timB] as $tim)
                                <option value="{{ $tim->id }}" {{ $match->pemenang_id == $tim->id ? 'selected' : '' }}>
                                    {{ $tim->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary me-1">Simpan Pemenang</button>
                    <a href="{{ url('pertandingan') }}" class="btn btn-secondary">Kembali</a>
                </form>

                
</x-template>
