<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rak extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'raks';
    protected $fillable = [
        'nomor_rak'
    ];

    public function buku() {
        return $this->hasMany(Book::class);
    }
}
