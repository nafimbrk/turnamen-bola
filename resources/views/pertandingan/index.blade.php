<x-template>
    
                <h2 class="mt-4 mb-2">Daftar Pertandingan</h2>
                


                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif


                @if($matches->isEmpty())
                    <p>Tidak ada pertandingan yang tersedia.</p>
                @else
                    <table class="table table-bordered border-dark mt-4">
                        <thead class="table-dark">
                            <tr>
                                <th>Nama</th>
                                <th>Tim A</th>
                                <th>Tim B</th>
                                <th>Jenis</th>
                                <th>Waktu</th>
                                <th>Pemenang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matches as $match)
                                <tr>
                                    <td>{{ $match->turnamen->nama }}</td>
                                    <td>{{ $match->timA->nama }}</td>
                                    <td>{{ $match->timB->nama }}</td>
                                    <td>{{ $match->jenis }}</td>
                                    <td>{{ $match->waktu }} menit</td>
                                    <td>
                                        
                                            {{ $match->pemenang->nama ?? 'belum ada pemenang' }}
                                        
                                    </td>
                                    <td>
                                        <a href="{{ route('pertandingan.winner', $match->id) }}" class="btn btn-primary">Pilih Pemenang</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-template>
