<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BookKeluar;
use App\Models\BookMsk;
use App\Models\ContMsk;
use App\Models\ContKeluar;
use App\Models\Cargo;
use App\Models\Petugas;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    //laporan user
    public function lap_user()
    {
        $user = User::all();
        return view('laporan.lap_user.lap_user', compact('user'));
    }

    public function cetak_user()
    {
        $user = User::all();
        return view('laporan.lap_user.cetak_user', compact('user'));
    }

    //laporan booking masuk
    public function lap_book_masuk()
    {
        $book_cont_msk = BookMsk::all();
        return view('laporan.lap_book_masuk.lap_book_masuk', compact('book_cont_msk'));
    }

    public function cetak_book_masuk(Request $request)
    {
        $tgl_mulai = $request->tgl_mulai;
        $tgl_selesai = $request->tgl_selesai;

        if ($tgl_mulai and $tgl_selesai) {
            $book_cont_msk = BookMsk::select('book_cont_msk.*')
                ->whereBetween('book_cont_msk.tgl_book_msk', [$tgl_mulai, $tgl_selesai])
                ->get();

            $sum_total = BookMsk::whereBetween('tgl_book_msk', [$tgl_mulai, $tgl_selesai]);
        } else {
            $book_cont_msk = BookMsk::all();
        }

        return view('laporan.lap_book_masuk.cetak_book_masuk', compact('book_cont_msk', 'sum_total', 'tgl_mulai', 'tgl_selesai'));
    }

    public function lap_cont_masuk()
    {
        $cargo = Cargo::all();
        $book_cont_msk = BookMsk::all();
        $petugas_survey = Petugas::all();

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

        return view('laporan.lap_cont_masuk.lap_cont_masuk', compact('cont_msk'));
    }

    public function cetak_cont_masuk(Request $request)
    {
        $cargo = Cargo::all();
        $book_cont_msk = BookMsk::all();
        $petugas_survey = Petugas::all();

        $tgl_mulai = $request->tgl_mulai;
        $tgl_selesai = $request->tgl_selesai;

        if ($tgl_mulai and $tgl_selesai) {
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
                ->whereBetween('cont_msk.tgl_msk', [$tgl_mulai, $tgl_selesai])
                ->get();

            $sum_total = ContMsk::whereBetween('tgl_msk', [$tgl_mulai, $tgl_selesai]);
        } else {
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
        }

        return view('laporan.lap_cont_masuk.cetak_cont_masuk', compact('cont_msk', 'sum_total', 'tgl_mulai', 'tgl_selesai'));
    }

    public function lap_book_keluar()
    {
        $book_cont_keluar = BookKeluar::join('cont_msk', 'cont_msk.id', '=', 'book_cont_keluar.id_cont_msk')
            ->join('book_cont_msk', 'book_cont_msk.id', '=', 'cont_msk.id_book_msk')
            ->get();

        return view('laporan.lap_book_keluar.lap_book_keluar', compact('book_cont_keluar'));
    }

    public function cetak_book_keluar(Request $request)
    {

        $book_cont_msk = BookMsk::all();
        $tgl_mulai = $request->tgl_mulai;
        $tgl_selesai = $request->tgl_selesai;

        if ($tgl_mulai and $tgl_selesai) {
            $book_cont_keluar = BookKeluar::join('cont_msk', 'cont_msk.id', '=', 'book_cont_keluar.id_cont_msk')
                ->join('book_cont_msk', 'book_cont_msk.id', '=', 'cont_msk.id_book_msk')
                ->whereBetween('book_cont_keluar.tgl_book_keluar', [$tgl_mulai, $tgl_selesai])
                ->get();

            $sum_total = ContMsk::whereBetween('tgl_book_keluar', [$tgl_mulai, $tgl_selesai]);
        } else {
            $book_cont_keluar = BookKeluar::join('cont_msk', 'cont_msk.id', '=', 'book_cont_keluar.id_cont_msk')
                ->join('book_cont_msk', 'book_cont_msk.id', '=', 'cont_msk.id_book_msk')
                ->get();
        }
        return view('laporan.lap_book_keluar.cetak_book_keluar', compact('book_cont_keluar', 'sum_total', 'tgl_mulai', 'tgl_selesai'));
    }

    public function lap_cont_keluar()
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


        return view('laporan.lap_cont_keluar.lap_cont_keluar', compact('petugas_survey', 'cont_keluar'));
    }

    public function cetak_cont_keluar(Request $request)
    {

        $tgl_mulai = $request->tgl_mulai;
        $tgl_selesai = $request->tgl_selesai;

        if ($tgl_mulai and $tgl_selesai) {
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
                ->whereBetween('cont_keluar.tgl_keluar', [$tgl_mulai, $tgl_selesai])
                ->get();

            $sum_total = ContMsk::whereBetween('tgl_keluar', [$tgl_mulai, $tgl_selesai]);
        } else {
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
        }
        return view('laporan.lap_cont_keluar.cetak_cont_keluar', compact('cont_keluar', 'sum_total', 'tgl_mulai', 'tgl_selesai', 'petugas_survey'));
    }
}
