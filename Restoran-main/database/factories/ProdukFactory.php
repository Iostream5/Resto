<?php

namespace Database\Factories;

// database/factories/ProdukFactory.php
use App\Models\Produk;
use App\Models\Toko;
use App\Models\Kategori;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdukFactory extends Factory
{
    protected $model = Produk::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->word, // Nama produk
            'harga' => $this->faker->randomFloat(2, 10, 1000), // Harga produk antara 10 dan 1000
            'deskripsi' => $this->faker->sentence(15), // Deskripsi produk
            'foto' => $this->faker->imageUrl(640, 480, 'product'), // Foto produk
            'rating' => $this->faker->randomFloat(2, 1, 5), // Rating produk antara 1 dan 5
            'toko_id' => Toko::factory(), // Menghubungkan dengan toko menggunakan factory Toko
            'kategori_id' => Kategori::factory(), // Menghubungkan dengan kategori menggunakan factory Kategori
        ];
    }
}
