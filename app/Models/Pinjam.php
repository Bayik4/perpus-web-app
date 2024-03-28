<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pinjam extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pinjams';
    protected $fillable = [
        'buku_id',
        'member_id',
        'user_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'jumlah_dipinjam'
    ];

    public function buku() {
        return $this->belongsTo(Buku::class);
    }

    public function member() {
        return $this->belongsTo(Member::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
