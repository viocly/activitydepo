<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ContMsk extends Model
{
    use HasFactory;

    protected $table = 'cont_msk';

    protected $fillable = [
        'id_book_msk',
        'id_petugas',
        'id_cargo',
        'tgl_msk',
        'kondisi',
        'angkutan',
        'driver',
        'nopol',
        'created_at',
        'updated_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
