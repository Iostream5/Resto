<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // Relasi banyak ke satu dengan Toko
    public function toko()
    {
        return $this->belongsTo(Toko::class);
    }

    // Relasi banyak ke satu dengan Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    // Relasi banyak ke banyak dengan Favorite
    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
}