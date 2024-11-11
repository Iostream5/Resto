<?php

namespace Database\Seeders;

// database/seeders/TokoSeeder.php
use Illuminate\Database\Seeder;
use App\Models\Toko;

class TokoSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan 10 toko dummy
        Toko::factory(10)->create();
    }
}
