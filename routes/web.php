<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\BookingMasukController;
use App\Http\Controllers\ContMasukController;
use App\Http\Controllers\BookingKeluarController;
use App\Http\Controllers\ContKeluarController;
use App\Http\Controllers\LaporanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'index'])->name('index');
Route::post('/cek_login', [AuthController::class, 'cek_login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/home', [HomeController::class, 'index']);

// Route::group(['middleware' => ['Auth', 'checklevel:admin']], function () {
//     Route::get('/logout', [AuthController::class, 'logout']);
// });

//Data Master User
Route::get('/user', [UserController::class, 'index']);
Route::post('/user/store', [UserController::class, 'store']);
Route::post('/user/{id}/update', [UserController::class, 'update']);
Route::get('/user/{id}/destroy', [UserController::class, 'destroy']);

//Data Master Cargo
Route::get('/cargo', [CargoController::class, 'index']);
Route::post('/cargo/store', [CargoController::class, 'store']);
Route::post('/cargo/{id}/update', [CargoController::class, 'update']);
Route::get('/cargo/{id}/destroy', [CargoController::class, 'destroy']);

//Data Master pwtugas
Route::get('/petugas', [PetugasController::class, 'index']);
Route::post('/petugas/store', [PetugasController::class, 'store']);
Route::post('/petugas/{id}/update', [PetugasController::class, 'update']);
Route::get('/petugas/{id}/destroy', [PetugasController::class, 'destroy']);

//Data Laporan User
Route::get('/lap_user', [LaporanController::class, 'lap_user']);
Route::get('/lap_user/cetak_user', [LaporanController::class, 'cetak_user']);

Route::get('/lap_book_masuk', [LaporanController::class, 'lap_book_masuk']);
Route::get('/lap_book_masuk/cetak_book_masuk', [LaporanController::class, 'cetak_book_masuk']);

Route::get('/lap_book_keluar', [LaporanController::class, 'lap_book_keluar']);
Route::get('/lap_book_keluar/cetak_book_keluar', [LaporanController::class, 'cetak_book_keluar']);

Route::get('/lap_cont_masuk', [LaporanController::class, 'lap_cont_masuk']);
Route::get('/lap_cont_masuk/cetak_cont_masuk', [LaporanController::class, 'cetak_cont_masuk']);

Route::get('/lap_cont_keluar', [LaporanController::class, 'lap_cont_keluar']);
Route::get('/lap_cont_keluar/cetaK_cont_keluar', [LaporanController::class, 'cetaK_cont_keluar']);

//Data Booking Masuk
Route::get('/booking_masuk', [BookingMasukController::class, 'index']);
Route::get('/booking_masuk/create', [BookingMasukController::class, 'add']);
Route::post('/booking_masuk/store', [BookingMasukController::class, 'store']);
Route::post('/booking_masuk/{id}/update', [BookingMasukController::class, 'update']);
// Route::post('/booking_masuk/{id}/update', [BookingMasukController::class, 'update']);
// Route::get('/booking_masuk/{id}/destroy', [BookingMasukController::class, 'destroy']);

//Data Cont Masuk
Route::get('/cont_masuk', [ContMasukController::class, 'index']);
Route::get('/cont_masuk/id/{id}', [ContMasukController::class, 'show']);
Route::get('/cont_masuk/ajax', [ContMasukController::class, 'ajax']);
Route::get('/cont_masuk/create', [ContMasukController::class, 'add']);
Route::post('/cont_masuk/store', [ContMasukController::class, 'store']);

//Data Book Keluar
Route::get('/booking_keluar', [BookingKeluarController::class, 'index']);
Route::get('/booking_keluar/id/{id}', [BookingKeluarController::class, 'show']);
Route::get('/booking_keluar/ajax', [BookingKeluarController::class, 'ajax']);
Route::get('/booking_keluar/create', [BookingKeluarController::class, 'add']);
Route::post('/booking_keluar/store', [BookingKeluarController::class, 'store']);

//Data Cont Keluar
Route::get('/cont_keluar', [ContKeluarController::class, 'index']);
Route::get('/cont_keluar/ajax', [ContKeluarController::class, 'ajax']);
Route::get('/cont_keluar/create', [ContKeluarController::class, 'add']);
Route::post('/cont_keluar/store', [ContKeluarController::class, 'store']);
// Route::post('/cont_keluar/{id}/update', [ContKeluarController::class, 'update']);

// Route::group(['middleware' => ['Auth', 'checklevel:admin,gudang']], function () {

//     Route::get('/home', [AuthController::class, 'home']);
// });


// Route::get('/', function () {
//     return view('home');
// });
