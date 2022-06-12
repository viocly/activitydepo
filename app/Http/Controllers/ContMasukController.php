<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookMsk;
use App\Models\Cargo;
use App\Models\ContMsk;
use App\Models\Petugas;

class ContMasukController extends Controller
{
    public function index()
    {
        $cont_msk = ContMsk::join('book_cont_msk', 'book_cont_msk.id', '=', 'cont_msk.id_book_msk')
            ->join('cargo', 'cargo.id', '=', 'cont_msk.id_cargo')
            ->join('petugas_survey', 'petugas_survey.id', '=', 'cont_msk.id_petugas')
            ->select(
                'cont_msk.*',
                'book_cont_msk.no_container',
                'book_cont_msk.customer',
                'book_cont_msk.asal',
                'book_cont_msk.consigne',
                'book_cont_msk.status',
                'book_cont_msk.type',
                'cargo.nama_cargo',
                'petugas_survey.nama_petugas'
            )
            ->get();
        $cargo = Cargo::all();
        $book_cont_msk = BookMsk::all();
        $petugas_survey = Petugas::all();

        return view('cont_masuk.cont_masuk', compact('book_cont_msk', 'petugas_survey', 'cont_msk', 'cargo'));
    }

    public function add()
    {
        $book_cont_msk = BookMsk::whereNotIn('id', ContMsk::pluck('id_book_msk'))->get();
        $petugas_survey = Petugas::all();
        $cargo = Cargo::all();
        return view('cont_masuk.add', compact('book_cont_msk', 'petugas_survey', 'cargo'));
    }

    public function store(Request $request)
    {
        ContMsk::create([
            'id_book_msk' => $request->id_book_msk,
            'id_petugas'  => $request->id_petugas,
            'id_cargo'    => $request->id_cargo,
            'tgl_msk'     => $request->tgl_msk,
            'kondisi'     => $request->kondisi,
            'angkutan'    => $request->angkutan,
            'driver'      => $request->driver,
            'nopol'       => $request->nopol,
        ]);

        return redirect('/cont_masuk')->with('success', 'Data Berhasil disimpan');
    }

    public function show($id)
    {
        $data = BookMsk::where('id', $id)->first();

        return response()->json($data);
    }

    public function ajax(Request $request)
    {
        $id_book_msk['id_book_msk'] = $request->id_book_msk;
        $ajax_container = BookMsk::where('id', $id_book_msk)->get();

        return view('cont_masuk.ajax', compact('ajax_container'));
    }
}
