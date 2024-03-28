<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'members';
    // protected $fillable = [
    //     'nama',
    //     'alamat',
    //     'umur',
    //     'jenis_kelamin',
    //     'email',
    //     'no_telp'
    // ];

    protected $fillable = [
        'nama',
        'umur',
        'email',
        'alamat',
        'gender_id',
        'no_telp'
    ];

    public function gender() {
        return $this->belongsTo(Gender::class);
    }

    public function pinjam() {
        return $this->hasOne(Pinjam::class);
    }
}
