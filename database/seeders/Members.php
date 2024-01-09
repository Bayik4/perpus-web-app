<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;

class Members extends Seeder
{
    public function run(): void
    {
        Member::create([
            'nama' => 'myos',
            'alamat' => 'banyuwangi',
            'umur' => '20',
            'jenis_kelamin' => 'laki-laki',
            'email' => 'myos@gmail.com',
            'no_telp' => '0854215624'
        ]);
    }
}
