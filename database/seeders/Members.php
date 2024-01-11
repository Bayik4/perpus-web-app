<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;
use Faker\Factory as Faker;

class Members extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for($i = 0; $i < 10; $i++) {
            Member::create([
                'nama' => $faker->name,
                'alamat' => $faker->text,
                'umur' => $faker->numberBetween(20, 90),
                'jenis_kelamin' => $faker->randomElement(['laki-laki', 'perempuan']),
                'email' => $faker->safeEmail,
                'no_telp' => $faker->phoneNumber
            ]);
        }
    }
}
