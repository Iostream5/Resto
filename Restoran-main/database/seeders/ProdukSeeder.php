<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Ambil semua id kategori yang ada
        $namaProduk = ['Sate', 'Rendang', 'Soto'];
        $hargaProduk = [20000, 35000, 30000];

        // Buat 10 data dummy untuk produk
        foreach (range(1, 10) as $index) {
            DB::table('produks')->insert([
                'nama' => $namaProduk[array_rand($namaProduk)],
                'harga' => $hargaProduk[array_rand($hargaProduk)],
                'deskripsi' => 'Selamat datang di Toko Warbaz, surga bagi para pecinta kuliner! Kami menyajikan berbagai pilihan hidangan lezat, mulai dari makanan tradisional khas Indonesia hingga kreasi modern yang menggugah selera. Semua menu kami dibuat dari bahan-bahan segar dan berkualitas tinggi, dipadukan dengan bumbu autentik untuk menciptakan cita rasa yang tak terlupakan.',
                'toko_id' => 2,
                'kategori_id' => 2,
                'foto' => 'produk/XAS0bbEF6Tv9NeMDRAtJRoKYxWapGjfuH1LtL0Od.png',
                'rating' => $faker->randomFloat(1, 1, 5),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}