<?php

namespace App\Http\Controllers;

use App\Models\BookKeluar;
use App\Models\BookMsk;
use App\Models\ContKeluar;
use App\Models\ContMsk;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContKeluarController extends Controller
{
    public function index()
    {
        $petugas_survey = Petugas::all();
        $cont_keluar = ContKeluar::join('book_cont_keluar', 'book_cont_keluar.id', '=', 'cont_keluar.id_book_keluar')
            ->join('cont_msk', 'cont_msk.id', '=', 'book_cont_keluar.id_cont_msk')
            ->join('book_cont_msk', 'book_cont_msk.id', 'cont_msk.id_book_msk')
            ->join('petugas_survey', 'petugas_survey.id', '=', 'cont_keluar.id_petugas')
            ->select(
                'cont_keluar.*',
                'book_cont_msk.no_container',
                'book_cont_keluar.customer',
                'book_cont_keluar.shiper',
                'book_cont_keluar.tujuan',
                'petugas_survey.nama_petugas'
            )
            ->get();


        return view('cont_keluar.cont_keluar', compact('petugas_survey', 'cont_keluar'));
    }

    public function add()
    {
        $petugas_survey = Petugas::all();
        $book_cont_keluar = BookKeluar::select('book_cont_keluar.*', 'book_cont_msk.no_container')
            ->join('cont_msk', 'cont_msk.id', 'book_cont_keluar.id_cont_msk')
            ->join('book_cont_msk', 'book_cont_msk.id', 'cont_msk.id_book_msk')
            ->where('book_cont_keluar.stage', 'booked')
            ->get();


        return view('cont_keluar.add', compact('book_cont_keluar', 'petugas_survey'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            ContKeluar::create([
                'id_book_keluar' => $request->id_book_keluar,
                'id_petugas'     => $request->id_petugas,
                'tgl_keluar'     => $request->tgl_keluar,
                'kondisi'        => $request->kondisi,
                'angkutan'       => $request->angkutan,
                'driver'         => $request->driver,
                'nopol'          => $request->nopol,
            ]);

            BookKeluar::where('id', $request->id_book_keluar)->update([
                'stage' => 'archive'
            ]);

            DB::commit();
        } catch (\Exception $e) {
            // dd($e);
            throw $e;
        }

        return redirect('/cont_keluar')->with('success', 'Data Berhasil disimpan');
    }

    public function ajax(Request $request)
    {
        $id_book_keluar['id_book_keluar'] = $request->id_book_keluar;
        $ajax_container = BookKeluar::where('id', $id_book_keluar)->get();

        return view('cont_masuk.ajax', compact('ajax_container'));
    }
}
