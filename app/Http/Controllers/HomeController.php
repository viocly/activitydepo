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

        return view('home', compact('user', 'book_cont_msk', 'book_cont_keluar', 'cont_msk', 'cont_keluar'));
    }
}
