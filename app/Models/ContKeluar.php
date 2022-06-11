<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ContKeluar extends Model
{
    use HasFactory;

    protected $table = 'cont_keluar';

    protected $fillable = [
        'id_book_keluar',
        'id_petugas',
        'tgl_keluar',
        'angkutan',
        'driver',
        'nopol',
        'created_at',
        'updated_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
