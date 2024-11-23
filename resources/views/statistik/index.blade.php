<x-template>
                <h2 class="mt-4 mb-4">Statistik</h2>
                
                <div class="card mb-4 col-4">
                    <div class="card-body">
                        <h4 class="card-title">Statistik Pertandingan</h4>
                        <p>Total Pertandingan: {{ $totalMatches }}</p>
                        <p>Pertandingan Selesai: {{ $completedMatches }}</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Statistik Tim</h4>
                        <table class="table table-bordered border-dark">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nama Tim</th>
                                    <th>Total Pertandingan</th>
                                    <th>Kemenangan</th>
                                    <th>Kekalahan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $team)
                                    <tr>
                                        <td>{{ $team->nama }}</td>
                                        <td>{{ $team->total_matches }}</td>
                                        <td>{{ $team->wins }}</td>
                                        <td>{{ $team->losses }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
</x-template>
