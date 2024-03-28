<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buku extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bukus';
    // protected $fillable = [
    //     'nomor_buku',
    //     'sampul',
    //     'judul_buku',
    //     'jenis_buku',
    //     'sinopsis',
    //     'nomor_rak'
    // ];

    protected $fillable = [
        'kode_buku',
        'sampul',
        'judul_buku',
        'jenis_buku',
        'penulis',
        'penerbit',
        'cetakan',
        'tebal_buku',
        'dimensi_buku',
        'isbn',
        'sinopsis',
        'rak_id',
        'jumlah_buku'
    ];

    public function rak() {
        return $this->belongsTo(Rak::class);
    }

    public function pinjam() {
        return $this->hasOne(Pinjam::class);
    }
}
