<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gender extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'genders';
    protected $fillable = [
        'gender'
    ];

    public function member() {
        return $this->hasOne(Member::class);
    }

    public function user() {
        return $this->hasOne(User::class);
    }
}
