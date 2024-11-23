<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Turnamen;
use Illuminate\Http\Request;

class TurnamenController extends Controller
{



    public function index()
    {
        $data['turnamen'] =  Turnamen::get();

        return view('turnamen.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('turnamen.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string'],
            'start' => 'required',
            'selesai' => 'required'
        ]);

        $data = [
            'nama' => $request->input('nama'),
            'start' => $request->input('start'),
            'selesai' => $request->input('selesai')
        ];
        Turnamen::insert($data);
        foreach ($data as $key => $item) {
            session()->flash($key, $item);
        }
        return redirect(url('turnamen'))->with('pesan', 'Data turnamen Berhasil Ditambahkan');
    }


    public function edit(string $id)
    {
        $data['turnamen'] = Turnamen::where('id', $id)->firstOr(function () {});

        if (empty($data['turnamen'])) {
            return redirect('turnamen');
        } else {
            return view('turnamen.ubah', $data);
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string'],
            'start' => 'required',
            'selesai' => 'required'
        ]);

        $input = [
            'nama' => $request->input('nama'),
            'start' => $request->input('start'),
            'selesai' => $request->input('selesai')
        ];

        $data['turnamen'] = Turnamen::where('id', $id)->firstOr(function () {});

        if (empty($data['turnamen'])) {
            return redirect('turnamen');
        } else {
            $data['turnamen']->nama = $request->input('nama');
            $data['turnamen']->start = $request->input('start');
            $data['turnamen']->selesai = $request->input('selesai');
            $data['turnamen']->save();
            return redirect(url('turnamen'))->with('pesan', 'Data turnamen Berhasil Diubah');
        }
    }

    public function destroy($id)
{
    $turnamen = Turnamen::find($id);
    if (!$turnamen) {
        return redirect('turnamen')->with('gagal', 'Data turnamen tidak ditemukan.');
    }

    $turnamen->delete();
    return redirect('turnamen')->with('pesan', 'Data turnamen berhasil dihapus.');
}
}

