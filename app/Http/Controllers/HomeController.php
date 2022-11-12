<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BookKeluar;
use App\Models\BookMsk;
use App\Models\ContMsk;
use App\Models\ContKeluar;
use App\Models\Cargo;
use App\Models\Petugas;
use DB;

class HomeController extends Controller
{
    public function index()
    {

        $user = User::count();
        $book_cont_msk = BookMsk::count();
        $book_cont_keluar = BookKeluar::count();
        $cont_msk = ContMsk::count();
        $cont_keluar = ContKeluar::count();

        $masuk_jan = ContMsk::whereMonth('tgl_msk', '01')->count();
        $masuk_feb = ContMsk::whereMonth('tgl_msk', '02')->count();
        $masuk_mar = ContMsk::whereMonth('tgl_msk', '03')->count();
        $masuk_apr = ContMsk::whereMonth('tgl_msk', '04')->count();
        $masuk_mei = ContMsk::whereMonth('tgl_msk', '05')->count();
        $masuk_jun = ContMsk::whereMonth('tgl_msk', '06')->count();
        $masuk_jul = ContMsk::whereMonth('tgl_msk', '07')->count();
        $masuk_agu = ContMsk::whereMonth('tgl_msk', '08')->count();
        $masuk_sep = ContMsk::whereMonth('tgl_msk', '09')->count();
        $masuk_okt = ContMsk::whereMonth('tgl_msk', '10')->count();
        $masuk_nov = ContMsk::whereMonth('tgl_msk', '11')->count();
        $masuk_des = ContMsk::whereMonth('tgl_msk', '12')->count();

        $keluar_jan = ContKeluar::whereMonth('tgl_keluar', '01')->count();
        $keluar_feb = ContKeluar::whereMonth('tgl_keluar', '02')->count();
        $keluar_mar = ContKeluar::whereMonth('tgl_keluar', '03')->count();
        $keluar_apr = ContKeluar::whereMonth('tgl_keluar', '04')->count();
        $keluar_mei = ContKeluar::whereMonth('tgl_keluar', '05')->count();
        $keluar_jun = ContKeluar::whereMonth('tgl_keluar', '06')->count();
        $keluar_jul = ContKeluar::whereMonth('tgl_keluar', '07')->count();
        $keluar_agu = ContKeluar::whereMonth('tgl_keluar', '08')->count();
        $keluar_sep = ContKeluar::whereMonth('tgl_keluar', '09')->count();
        $keluar_okt = ContKeluar::whereMonth('tgl_keluar', '10')->count();
        $keluar_nov = ContKeluar::whereMonth('tgl_keluar', '11')->count();
        $keluar_des = ContKeluar::whereMonth('tgl_keluar', '12')->count();

        return view('home', compact(
            'user',
            'book_cont_msk',
            'book_cont_keluar',
            'cont_msk',
            'cont_keluar',

            'masuk_jan',
            'masuk_feb',
            'masuk_mar',
            'masuk_apr',
            'masuk_mei',
            'masuk_jun',
            'masuk_jul',
            'masuk_agu',
            'masuk_sep',
            'masuk_okt',
            'masuk_nov',
            'masuk_des',

            'keluar_jan',
            'keluar_feb',
            'keluar_mar',
            'keluar_apr',
            'keluar_mei',
            'keluar_jun',
            'keluar_jul',
            'keluar_agu',
            'keluar_sep',
            'keluar_okt',
            'keluar_nov',
            'keluar_des',
        ));
    }
}
