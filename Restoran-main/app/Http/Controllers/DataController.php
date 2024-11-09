<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function home()
    {
        $produk = Produk::inRandomOrder()->paginate(20);
        $kategori = Kategori::all();
        $toko = Toko::paginate(10);

        return view('welcome', compact('produk', 'kategori', 'toko'));
    }

    public function search(Request $request)
    {
        $query = $request->input('search');

        $produk = Produk::where('nama', 'like', '%' . $query . '%')
            ->orWhere('deskripsi', 'like', '%' . $query . '%')
            ->inRandomOrder()
            ->paginate(20);

        $toko = Toko::where('nama_toko', 'like', '%' . $query . '%')
            ->orWhere('alamat', 'like', '%' . $query . '%')
            ->inRandomOrder()
            ->paginate(10);

        return view('page.search', compact('produk', 'toko'));
    }

    public function searching()
    {
        $produk = Produk::inRandomOrder()->paginate(20);
        $kategori = Kategori::all();
        $toko = Toko::inRandomOrder()->paginate(10);
        return view('page.search', compact('produk', 'kategori', 'toko'));
    }

    public function detail($id)
    {
        $produk = Produk::with('toko', 'kategori')->find($id);
        return view('page.detail', compact('produk'));
    }

    public function tokoDetail($id)
    {
        $toko = Toko::find($id);
        $produk = $toko->produk()->inRandomOrder()->paginate(20);
        return view('page.detailToko', compact('toko', 'produk'));
    }

    public function kategori($id)
    {
        $kategori = Kategori::find($id);
        $produk = $kategori->produk()->inRandomOrder()->paginate(20);

        return view('page.kategori', compact('kategori', 'produk'));
    }
}
