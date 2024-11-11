<?php

namespace Database\Seeders;

// database/seeders/ProdukSeeder.php
use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan 10 produk dummy
        Produk::factory(10)->create();
    }
}
