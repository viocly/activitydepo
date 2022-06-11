<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Petugas extends Model
{
    use HasFactory;

    protected $table = 'petugas_survey';

    protected $fillable = [
        'nama_petugas',
        'created_at',
        'updated_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
