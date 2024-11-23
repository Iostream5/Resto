<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\DataTerjual;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Toko;
use App\Models\User;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DataController extends Controller
{
    public function home()
    {
        $produk = Produk::inRandomOrder()->paginate(20);
        $kategori = Kategori::all();
        $toko = Toko::paginate(10);

        $user = Auth::user();

        return view('welcome', compact('produk', 'kategori', 'toko', 'user'));
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
        $produks = Produk::inRandomOrder()->take(8)->get();
        $produk = Produk::with('toko', 'kategori')->find($id);
        return view('page.detail', compact('produk', 'produks'));
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


    //profile

    public function profil()
    {
        $dataTerjual = DataTerjual::select('produk_id')
            ->selectRaw('SUM(jumlah_terjual) as total_terjual')
            ->selectRaw('SUM(keuntungan) as total_keuntungan')
            ->where('user_id', Auth::id())
            ->groupBy('produk_id')
            ->get();
        $keranjang = Cart::where('user_id', Auth::id())->with('produk')->get();
        $produk = Auth::user()->produk;
        $favorite = Auth::user()->favorite()->with('produk')->get();
        $user = Auth::user();
        $user->load(['produk', 'toko']);



        return view('page.profil', compact('user', 'favorite', 'produk', 'keranjang', 'dataTerjual'));
    }
}