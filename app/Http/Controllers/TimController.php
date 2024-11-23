<?php



namespace App\Http\Controllers;

use App\Models\Turnamen;
use App\Models\Tim;
use Illuminate\Http\Request;

class TimController extends Controller
{
    public function index()
    {
        $tim = Tim::with('turnamen')->get();
        return view('tim.index', compact('tim'));
    }
    

    public function create()
{
    $turnamen = Turnamen::all();
    return view('tim.create', compact('turnamen'));
}


public function store(Request $request)
{
    $request->validate([
        'turnamen_id' => 'required|exists:turnamen,id',
        'nama' => 'required',
        'pemain' => 'required'
    ]);

    $input = $request->all();
    $input['pemain'] = json_encode(explode(',', $request->input('pemain')));

    Tim::create($input);

    return redirect()->route('tim.index')->with('success', 'Tim berhasil ditambahkan.');
}



public function edit($id)
{
    $tim = Tim::find($id);

    if (!$tim) {
        return redirect()->route('tim.index')->with('error', 'Data tim tidak ditemukan.');
    }

    $tim->pemain = implode(', ', json_decode($tim->pemain));

    $turnamen = Turnamen::all();
    return view('tim.edit', compact('tim', 'turnamen'));
}



public function update(Request $request, Tim $tim)
{
    $request->validate([
        'turnamen_id' => 'required|exists:turnamen,id',
        'nama' => 'required',
        'pemain' => 'required'
    ]);

    $input = $request->all();
    $input['pemain'] = json_encode(explode(', ', $request->input('pemain'))); // Ubah string menjadi array, kemudian simpan sebagai JSON

    $tim->update($input);

    return redirect()->route('tim.index')->with('success', 'Tim berhasil diperbarui.');
}



public function destroy($id)
{
    $tim = Tim::find($id);
    if (!$tim) {
        return redirect()->route('tim.index')->with('error', 'Data tim tidak ditemukan.');
    }

    $tim->delete();
    return redirect()->route('tim.index')->with('success', 'tim berhasil dihapus.');
}

}
