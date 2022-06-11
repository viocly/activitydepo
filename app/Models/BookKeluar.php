<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BookKeluar extends Model
{
    use HasFactory;

    protected $table = 'book_cont_keluar';

    protected $fillable = [
        'id_cont_msk',
        'tgl_book_keluar',
        'customer',
        'shiper',
        'vessel',
        'voyage',
        'tujuan',
        'created_at',
        'updated_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
