<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas_survey = Petugas::all();
        return view('master.petugas', compact('petugas_survey'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('/petugas')->with('success', 'Data Berhasil disimpan');
    }


    public function update(Request $request, $id)
    {
        $petugas = Petugas::find($id);

        $petugas->nama_petugas   = $request->nama_petugas;
        $petugas->updated_at   = date('Y-m-d H:i:s');

        $petugas->save();

        return redirect('/petugas')->with('success', 'Data Berhasil diubah');
    }

    public function destroy($id)
    {
        $petugas = Petugas::find($id);

        $petugas->delete();

        return redirect('/petugas')->with('success', 'Data Berhasil diubah');
    }
}
