<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargo;

date_default_timezone_set('Asia/Jakarta');

class CargoController extends Controller
{

    public function index()
    {
        $cargo = Cargo::all();
        return view('master.cargo', compact('cargo'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Cargo::create([
            'nama_cargo' => $request->nama_cargo,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('/cargo')->with('success', 'Data Berhasil disimpan');
    }


    public function update(Request $request, $id)
    {
        $cargo = Cargo::find($id);

        $cargo->nama_cargo   = $request->nama_cargo;
        $cargo->updated_at   = date('Y-m-d H:i:s');

        $cargo->save();

        return redirect('/cargo')->with('success', 'Data Berhasil diubah');
    }

    public function destroy($id)
    {
        $cargo = Cargo::find($id);

        $cargo->delete();

        return redirect('/cargo')->with('success', 'Data Berhasil diubah');
    }
}
