<?php

namespace App\Http\Controllers;

use App\Models\BookKeluar;
use App\Models\BookMsk;
use App\Models\ContMsk;
use Illuminate\Http\Request;

class BookingKeluarController extends Controller
{
    public function index()
    {
        $book_cont_keluar = BookKeluar::join('cont_msk', 'cont_msk.id', '=', 'book_cont_keluar.id_cont_msk')
            ->join('book_cont_msk', 'book_cont_msk.id', '=', 'cont_msk.id_book_msk')
            ->get();

        return view('booking_keluar.booking_keluar', compact('book_cont_keluar'));
    }

    public function add()
    {
        $cont_msk = ContMsk::select('cont_msk.*', 'no_container')->join('book_cont_msk', 'book_cont_msk.id', 'cont_msk.id_book_msk')
            ->whereNotIn('cont_msk.id', BookKeluar::pluck('id_cont_msk'))->get();

        // $cont_msk = ContMsk::whereNotIn('id', BookKeluar::pluck('id_cont_msk'))->get();
        return view('booking_keluar.add', compact('cont_msk'));
    }

    public function store(Request $request)
    {
        BookKeluar::create([
            'id_cont_msk' => $request->id_cont_msk,
            'tgl_book_keluar' => $request->tgl_book_keluar,
            'customer' => $request->customer,
            'shiper' => $request->shiper,
            'vessel' => $request->vessel,
            'voyage' => $request->voyage,
            'tujuan' => $request->tujuan,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('/booking_keluar')->with('success', 'Data Berhasil disimpan');
    }

    public function show($id)
    {
        $data = BookKeluar::where('id', $id)->first();

        return response()->json($data);
    }

    public function ajax(Request $request)
    {
        $id_cont_msk['id_cont_msk'] = $request->id_cont_msk;
        $ajax_container = ContMsk::where('id', $id_cont_msk)->get();

        return view('booking_keluar.ajax', compact('ajax_container'));
    }

    public function update(Request $request, $id)
    {

        $book_cont_keluar = BookKeluar::find($id);

        $book_cont_keluar->no_container   = $request->no_container;
        $book_cont_keluar->tgl_book_keluar   = $request->tgl_book_keluar;
        $book_cont_keluar->customer   = $request->customer;
        $book_cont_keluar->shiper   = $request->shiper;
        $book_cont_keluar->vessel   = $request->vessel;
        $book_cont_keluar->voyage   = $request->voyage;
        $book_cont_keluar->tujuan   = $request->tujuan;
        $book_cont_keluar->updated_at   = date('Y-m-d H:i:s');

        $book_cont_keluar->save();

        return redirect('/booking_keluar')->with('success', 'Data Berhasil diubah');
    }
}
