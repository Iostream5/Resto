<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;

    protected $fillable = ['nama_toko', 'alamat', 'rating', 'foto', 'user_id'];

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');  // Relasi belongsTo untuk menghubungkan dengan User
    }
}
