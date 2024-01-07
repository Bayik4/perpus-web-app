<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penjaga extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'penjagas';
    protected $fillable = [
        'nama',
        'alamat',
        'umur',
        'jenis_kelamin',
        'email',
        'no_telp'
    ];
}
