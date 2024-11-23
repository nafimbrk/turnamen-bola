<?php

namespace App\Http\Controllers;

use App\Models\Matchh;
use App\Models\Turnamen;
use App\Models\Tim;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index()
    {
        $jadwal = Matchh::with('turnamen', 'timA', 'timB', 'pemenang')->get();
        return view('jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $turnamen = Turnamen::all();
        $tim = Tim::all();
        return view('jadwal.create', compact('turnamen', 'tim'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'turnamen_id' => 'required|exists:turnamen,id',
            'tim_a_id' => 'required|exists:tim,id',
            'tim_b_id' => 'required|exists:tim,id',
            'jenis' => 'required|string',
            'waktu' => 'required|integer',
        ]);

        Matchh::create($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(Matchh $jadwal)
    {
        $turnamen = Turnamen::all();
        $tim = Tim::all();
        return view('jadwal.edit', compact('jadwal', 'turnamen', 'tim'));
    }

    public function update(Request $request, Matchh $jadwal)
    {
        $request->validate([
            'turnamen_id' => 'required|exists:turnamen,id',
            'tim_a_id' => 'required|exists:tim,id',
            'tim_b_id' => 'required|exists:tim,id',
            'jenis' => 'required|string',
            'waktu' => 'required|integer',
        ]);

        $jadwal->update($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Matchh $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }




    public function indexPertandingan()
{
    $matches = Matchh::with('timA', 'timB', 'pemenang')->get();
    return view('pertandingan.index', compact('matches'));
}



    public function winner($id)
{
    $match = Matchh::findOrFail($id);
    return view('pertandingan.pemenang', compact('match'));
}

public function updateWinner(Request $request, $id)
{
    $request->validate([
        'pemenang_id' => 'required|exists:tim,id',
    ]);

    $match = Matchh::findOrFail($id);
    $match->pemenang_id = $request->input('pemenang_id');
    $match->save();

    return redirect()->route('pertandingan.index', $id)->with('success', 'Pemenang berhasil dipilih.');
}




public function statistik()
{
    $totalMatches = Matchh::count();
    $completedMatches = Matchh::whereNotNull('pemenang_id')->count();
    
    $teams = Tim::all()->map(function ($tim) {
        $tim->total_matches = Matchh::where('tim_a_id', $tim->id)->orWhere('tim_b_id', $tim->id)->count();
        $tim->wins = Matchh::where('pemenang_id', $tim->id)->count();
        $tim->losses = $tim->total_matches - $tim->wins;
        return $tim;
    });

    return view('statistik.index', compact('totalMatches', 'completedMatches', 'teams'));
}

   

    
}





