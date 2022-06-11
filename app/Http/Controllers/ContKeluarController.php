<?php

namespace App\Http\Controllers;

use App\Models\BookKeluar;
use App\Models\ContKeluar;
use App\Models\Petugas;
use Illuminate\Http\Request;

class ContKeluarController extends Controller
{
    public function index()
    {
        $cont_keluar = ContKeluar::join('book_cont_keluar', 'book_cont_keluar.id', '=', 'cont_keluar.id_book_keluar')
            ->join('cont_msk', 'cont_msk.id', '=', 'book_cont_keluar.id_cont_msk')
            ->get();

        $petugas_survey = Petugas::all();

        return view('cont_keluar.cont_keluar', compact('petugas_survey', 'cont_keluar'));
    }

    public function add()
    {
        $petugas_survey = Petugas::all();
        $book_cont_keluar = BookKeluar::select('book_cont_keluar.*', 'no_container')
            // ->join('book_cont_msk', 'book_cont_msk.id', 'book_cont_msk.id_cont_msk')
            ->join('cont_msk', 'cont_msk.id', 'book_cont_keluar.id_cont_msk')
            ->whereNotIn('book_cont_keluar.id', ContKeluar::pluck('id_book_keluar'))->get();

        return view('cont_keluar.add', compact('book_cont_keluar', 'petugas_survey'));
    }

    public function store(Request $request)
    {

        ContKeluar::create([
            'id_book_keluar' => $request->id_book_keluar,
            'id_petugas' => $request->id_petugas,
            'tgl_msk' => $request->tgl_msk,
            'kondisi' => $request->kondisi,
            'angkutan' => $request->angkutan,
            'driver' => $request->driver,
            'nopol' => $request->nopol,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('/cont_masuk')->with('success', 'Data Berhasil disimpan');
    }

    public function ajax(Request $request)
    {
        $id_book_keluar['id_book_keluar'] = $request->id_book_keluar;
        $ajax_container = BookKeluar::where('id', $id_book_keluar)->get();

        return view('cont_masuk.ajax', compact('ajax_container'));
    }
}
