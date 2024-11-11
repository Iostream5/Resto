<?php

namespace Database\Factories;

// database/factories/KategoriFactory.php
use App\Models\Kategori;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class KategoriFactory extends Factory
{
    protected $model = Kategori::class;

    public function definition()
    {
        return [
            'nama_kategori' => $this->faker->word, // Nama kategori
            'foto' => $this->faker->imageUrl(640, 480, 'category'), // Foto kategori
        ];
    }
}
