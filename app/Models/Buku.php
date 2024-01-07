<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buku extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bukus';
    protected $fillable = [
        'nomor_buku',
        'judul_buku',
        'jenis_buku',
        'nomor_rak'
    ];
}
