<?php

namespace Database\Seeders;

// database/seeders/KategoriSeeder.php
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan 10 kategori dummy
        Kategori::factory(10)->create();
    }
}
