<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataTerjual extends Model
{

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}