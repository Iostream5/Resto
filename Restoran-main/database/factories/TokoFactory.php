<?php

namespace Database\Factories;

// database/factories/TokoFactory.php
use App\Models\Toko;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class TokoFactory extends Factory
{
    protected $model = Toko::class;

    public function definition()
    {
        return [
            'nama_toko' => $this->faker->company,
            'deskripsi' => $this->faker->sentence(10),
            'alamat' => $this->faker->address,
            'rating' => $this->faker->randomFloat(2, 1, 5), // Rating antara 1 dan 5
            'foto' => $this->faker->imageUrl(640, 480, 'business'), // Foto toko
            'user_id' => \App\Models\User::factory(), // Menambahkan user_id yang merujuk ke model User
        ];
    }
}
