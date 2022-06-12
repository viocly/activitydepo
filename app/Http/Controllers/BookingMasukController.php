<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookMsk;

date_default_timezone_set('Asia/Jakarta');

class BookingMasukController extends Controller
{
    public function index()
    {
        $book_cont_msk = BookMsk::where('stage', 'booked')->get();

        return view('booking_masuk.booking_masuk', compact('book_cont_msk'));
    }

    public function add()
    {
        $book_cont_msk = BookMsk::all();
        return view('booking_masuk.add', compact('book_cont_msk'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        BookMsk::create([
            'no_container' => $request->no_container,
            'tgl_book_msk' => $request->tgl_book_msk,
            'customer'     => $request->customer,
            'consigne'     => $request->consigne,
            'vessel'       => $request->vessel,
            'voyage'       => $request->voyage,
            'asal'         => $request->asal,
            'ukuran'       => $request->ukuran,
            'type'         => $request->type,
            'status'       => $request->status,
        ]);

        return redirect('/booking_masuk')->with('success', 'Data Berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        $book_cont_msk = BookMsk::find($id);

        $book_cont_msk->no_container   = $request->no_container;
        $book_cont_msk->tgl_book_msk   = $request->tgl_book_msk;
        $book_cont_msk->customer   = $request->customer;
        $book_cont_msk->consigne   = $request->consigne;
        $book_cont_msk->vessel   = $request->vessel;
        $book_cont_msk->voyage   = $request->voyage;
        $book_cont_msk->asal   = $request->asal;
        $book_cont_msk->ukuran   = $request->ukuran;
        $book_cont_msk->type   = $request->type;
        $book_cont_msk->status   = $request->status;
        $book_cont_msk->updated_at   = date('Y-m-d H:i:s');

        $book_cont_msk->save();

        return redirect('/booking_masuk')->with('success', 'Data Berhasil diubah');
    }

    public function show(Request $request)
    {
        //
    }
}
