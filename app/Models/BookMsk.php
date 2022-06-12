<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BookMsk extends Model
{
    use HasFactory;

    protected $table = 'book_cont_msk';

    protected $fillable = [
        'no_container',
        'tgl_book_msk',
        'customer',
        'consigne',
        'vessel',
        'voyage',
        'asal',
        'ukuran',
        'type',
        'status',
        'date',
        'stage',
        'created_at',
        'updated_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
