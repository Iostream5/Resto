<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table='kategoris';

    protected $fillable=['id','nama_kategori','foto'];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'kategori_id');
    }
}