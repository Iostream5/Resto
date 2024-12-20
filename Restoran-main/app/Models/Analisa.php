<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Analisa extends Model
{
    protected $fillable = ['produk_id', 'jumlah_terjual', 'total_harga'];

    protected $table = 'analisa';

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
