<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as faker;
use App\Models\Member;
use App\Models\User;
use App\Models\Buku;
use App\Models\Penjaga;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Member::create([
            'nama' => 'ayikarbailidia',
            'alamat' => 'kab. Nganjuk',
            'umur' => '19',
            'jenis_kelamin' => 'laki-laki',
            'email' => 'ayikarbail@gmail.com',
            'no_telp' => '08571234567'
        ]);

        User::create([
            'name' => 'ayikarbail',
            'email' => 'ayikarbail@gmail.com',
            'password' => 'arbailayik12'
        ]);

        $faker = Faker::create('id_ID');
        for($i = 0; $i < 10; $i++) {
            Buku::create([
                'nomor_buku' => $faker->numberBetween(100, 500),
                'judul_buku' => $faker->word,
                'jenis_buku' => $faker->word,
                'nomor_rak' => $faker->numberBetween(1, 5)
            ]);
        }

        Penjaga::create([
            'nama' => 'kutubuku',
            'alamat' => 'Kab. malang',
            'umur' => '25',
            'jenis_kelamin' => 'laki-laki',
            'email' => 'kutubuku@gmail.com',
            'no_telp' => '085813310'
        ]);
    }
}
