<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function tambah($produkId)
    {
        Favorite::firstOrCreate([
            'user_id' => Auth::id(),
            'produk_id' => $produkId,
        ]);

        return back();
    }

    public function hapus($produkId)
    {
        Favorite::where('user_id', Auth::id())->where('produk_id', $produkId)->delete();

        return back()->with('success', 'Produk dihapus dari favorit!');
    }

    public function index()
    {
        $favorites = Favorite::where('user_id', Auth::id())->with('produk')->get();
        return view('favorites.index', compact('favorites'));
    }
}
