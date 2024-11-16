<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Fungsi untuk menambah produk ke keranjang
    public function tambah($produkId)
    {
        $cartItem = Cart::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'produk_id' => $produkId,
            ],
            [
                'quantity' => 1,
            ]
        );

        // Jika item sudah ada di keranjang, cukup tambahkan quantity
        if (!$cartItem->wasRecentlyCreated) {
            $cartItem->increment('quantity');
        }

        return back();
    }

    // Fungsi untuk menghapus item dari keranjang
    public function hapus($produkId)
    {
        Cart::where('user_id', Auth::id())->where('produk_id', $produkId)->delete();

        return back()->with('success', 'Produk dihapus dari keranjang!');
    }

    // Fungsi untuk menampilkan semua item di keranjang
    public function index()
    {
        $keranjang = Cart::where('user_id', Auth::id())->with('produk')->get();
        return view('page.profil', compact('keranjang'));
    }


    public function detail($produkId)
    {
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('produk_id', $produkId)
            ->with('produk')
            ->first();

        if (!$cartItem) {
            return redirect()->route('cart.index')->with('error', 'Produk tidak ditemukan di keranjang Anda.');
        }

        return view('cart.detail', compact('cartItem'));
    }

    public function update(Request $request, $produkId)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);

        $cartItem = Cart::where('user_id', Auth::id())->where('produk_id', $produkId)->first();
        if ($cartItem) {
            $cartItem->update(['quantity' => $request->quantity]);
        }

        return redirect()->route('cart.detail', $produkId)->with('success', 'Jumlah produk berhasil diperbarui.');
    }

    public function keranjang()
    {
        $keranjang = Cart::where('user_id', Auth::id())->with('produk')->get();
        $toko = Toko::get();

        return view('page.keranjang', compact('keranjang', 'toko'));
    }


    public function checkout(Request $request)
    {
        // Ambil produk berdasarkan ID
        $produk = Produk::find($request->produk_id);

        // Simpan data penjualan
        $penjualan = new Penjualan;
        $penjualan->user_id = Auth::id();
        $penjualan->produk_id = $produk->id; // Pastikan produk_id valid
        $penjualan->jumlah_terjual = $request->jumlah_terjual;

        // Hitung total harga
        $penjualan->total_harga = $produk->harga * $request->jumlah_terjual;

        $penjualan->save();

        // Hapus item keranjang
        Cart::where('user_id', Auth::id())
            ->where('produk_id', $produk->id)
            ->delete();

        return redirect()->route('transaksi')->with('success', 'Checkout berhasil!');
    }


    public function transaksi()
    {
        $penjualan = Penjualan::where('user_id', Auth::id())->with('produk')->get();
        return view('page.detail.transaksi', compact('penjualan'));
    }

    public function struk($id)
    {
        $penjualan = Penjualan::with('produk')->find($id);
        $totalHarga = $penjualan->produk->harga * $penjualan->jumlah_terjual;
        return view('page.detail.struk', compact('penjualan', 'totalHarga'));
    }
}