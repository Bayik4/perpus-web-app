<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as faker;
use App\Models\Member;
use App\Models\User;
use App\Models\Buku;
use App\Models\Gender;
use App\Models\Rak;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // seeder gender
        Gender::create([
            'gender' => 'laki-laki'
        ]);

        Gender::create([
            'gender' => 'perempuan'
        ]);

        // seeder rak
        Rak::create([
            'nomor_rak' => 'A01'
        ]);

        Rak::create([
            'nomor_rak' => 'A02'
        ]);

        Rak::create([
            'nomor_rak' => 'A03'
        ]);

        // seeder member
        Member::create([
            'nama' => 'ayikarbailidia',
            'umur' => 20,
            'email' => 'ayikarbail@gmail.com',
            'alamat' => 'kab. Nganjuk',
            'gender_id' => 1,
            'no_telp' => '08571234567'
        ]);

        Member::create([
            'nama' => 'arbail',
            'umur' => 20,
            'email' => 'arbail@gmail.com',
            'alamat' => 'kab. Nganjuk',
            'gender_id' => 1,
            'no_telp' => '08571234567'
        ]);

        Member::create([
            'nama' => 'idia',
            'umur' => 20,
            'email' => 'idia@gmail.com',
            'alamat' => 'kab. Nganjuk',
            'gender_id' => 1,
            'no_telp' => '08571234567'
        ]);

        // seeder user/petugas/admin
        User::create([
            'name' => 'ayikarbail',
            'email' => 'ayikarbail@gmail.com',
            'password' => 'arbailayik12',
            'foto_user' => 'profile.jpg',
            'alamat' => 'kab. Nganjuk',
            'umur' => 20,
            'gender_id' => 1,
            'no_telp' => '01986389937'
        ]);

        User::create([
            'name' => 'arbail',
            'email' => 'botgeng12@gmail.com',
            'password' => 'gengbot34',
            'foto_user' => 'profile.jpg',
            'alamat' => 'kab. Nganjuk',
            'umur' => 20,
            'gender_id' => 1,
            'no_telp' => '01986389937'
        ]);

        // $faker = Faker::create('id_ID');
        // for($i = 0; $i < 10; $i++) {
        //     Buku::create([
        //         'nomor_buku' => $faker->numberBetween(100, 500),
        //         'judul_buku' => $faker->word,
        //         'jenis_buku' => $faker->word,
        //         'nomor_rak' => $faker->numberBetween(1, 5)
        //     ]);
        // }

        // seeder buku
        Buku::create([
            'kode_buku' => 'B001',
            'judul_buku'=> 'SENI HIDUP MINIMALIS; FRANCINE JAY',
            'jenis_buku' => 'self development',
            'penulis' => 'Francie Jay',
            'penerbit' => 'PT Gramedia Pustaka Utama',
            'cetakan' => 'Cetakan pertama: Agustus 2018, Cetakan kedua: Januari 2019, Cetakan ketiga: Februari 2019, Cetakan keempat: April 2019, Cetakan kelima: Agustus 2019, Cetakan keenam: Desember 2019, Cetakan ketujuh: Mei 2020',
            'tebal_buku' => '-',
            'dimensi_buku' => '-',
            'isbn' => '978-602-03-9844-0',
            'sinopsis' => 'Bagian pertama dari buku ini akan menumbuhkan pola pikir minimalis. Bagian kedua berisi metode STREAMLINE-satu dari sepuluh teknik paling efektif untuk menjaga rumah tetap rapi. Bagian ketiga mengajak anda menggunakan langkah-langkah khusus untuk menangani setiap ruangan di rumah. Bagian keempat, Anda akan melihat bagaimana konsep minimalis membuat kita lebih ramah lingkungan sehingga mampu melestarikan Bumi untuk generasi berikutnya.',
            'rak_id' => 1,
            'jumlah_buku' => 1
        ]);

        Buku::create([
            'kode_buku' => 'B002',
            'judul_buku' => 'THE INTELLIGNET INVESTOR Rev. Ed',
            'jenis_buku' => 'investasi',
            'penulis' => 'Benjamin Graham(1894-1976), Jason Zweig(1987)',
            'penerbit' => 'The Wall Street Journal',
            'cetakan' => '-',
            'tebal_buku' => '-',
            'dimensi_buku' => '-',
            'isbn' => '-',
            'sinopsis' => '-',
            'rak_id' => 2,
            'jumlah_buku' => 1
        ]);

        Buku::create([
            'kode_buku' => 'B003',
            'judul_buku' => 'Panduan Praktik Menguasai Vue.Js',
            'jenis_buku' => 'pemrogaraman',
            'penulis' => 'Lutfi Gani ',
            'penerbit' => 'CV. LOKOMEDIA',
            'cetakan' => 'Cetakan pertama: April 2018',
            'tebal_buku' => '140 halaman',
            'dimensi_buku' => '14 x 21 cm',
            'isbn' => '978-602-62311-6-1',
            'sinopsis' => 'Saat ini, ada 3 framework javascript yang paling diminati, yaitu, AngularJs, ReactJs, dan VueJs. Buku ini akan membahas khusus VueJs yang lebih unggul secara kecepatan dan performa dibndingkan framework javascript lainnya.',
            'rak_id' => 3,
            'jumlah_buku' => 1
        ]);
    }
}
