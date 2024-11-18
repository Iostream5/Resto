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

        if (!$cartItem->wasRecentlyCreated) {
            $cartItem->increment('quantity');
        }

        return back();
    }

    public function hapus($produkId)
    {
        Cart::where('user_id', Auth::id())->where('produk_id', $produkId)->delete();

        return back()->with('success', 'Produk dihapus dari keranjang!');
    }

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
        // Pastikan produk_id dan jumlah_terjual adalah array
        $produkIds = $request->produk_id;
        $jumlahTerjual = $request->jumlah_terjual;

        if (empty($produkIds) || empty($jumlahTerjual)) {
            return redirect()->back()->with('error', 'Tidak ada produk yang dipilih.');
        }

        foreach ($produkIds as $index => $produkId) {
            $produk = Produk::find($produkId);

            if (!$produk) {
                return redirect()->back()->with('error', 'Produk tidak ditemukan.');
            }

            $penjualan = new Penjualan;
            $penjualan->user_id = Auth::id();
            $penjualan->produk_id = $produk->id;
            $penjualan->jumlah_terjual = $jumlahTerjual[$index];
            $penjualan->total_harga = $produk->harga * $jumlahTerjual[$index];

            // Simpan penjualan
            $penjualan->save();

            // Hapus produk dari keranjang setelah checkout
            Cart::where('user_id', Auth::id())
                ->where('produk_id', $produk->id)
                ->delete();
        }

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

        Penjualan::where('user_id', Auth::id())
            ->where('produk_id', $penjualan->id)
            ->delete();

        return view('page.detail.struk', compact('penjualan', 'totalHarga'));
    }

    public function analisa(Request $request)
    {
        $produk = Produk::with('penjualan')->where('user_id', Auth::id())->get();


        $jumlahTerjual = $request->jumlah_terjual;

        foreach ($produk as $produk) {
            $produk->total_harga = $produk->harga * $jumlahTerjual;
            $produk->keuntungan = ($produk->harga - $produk->harga_beli) * $jumlahTerjual;
        }

        return view('page.profil', compact('produk', 'jumlahTerjual'));
    }

    public function hapusRiwayat($id)
    {
        $penjualan = Penjualan::find($id);
        $penjualan->delete();
        return redirect()->route('transaksi');
    }
}