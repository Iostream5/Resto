<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\DataTerjual;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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

        return redirect()->route('keranjang');
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

        $penjualanData = [];
        $totalHarga = 0;

        foreach ($produkIds as $index => $produkId) {
            $produk = Produk::find($produkId);

            if (!$produk) {
                return redirect()->back()->with('error', 'Produk tidak ditemukan.');
            }

            $penjualan = new Penjualan;
            $penjualan->user_id = Auth::id();
            $penjualan->produk_id = $produk->id;
            $penjualan->harga_jual = $produk->harga;
            $penjualan->jumlah_terjual = $jumlahTerjual[$index];
            $penjualan->total_harga = $produk->harga * $jumlahTerjual[$index];

            $penjualan->save();

            $penjualanData[] = [
                'produk_nama' => $produk->nama,
                'jumlah' => $jumlahTerjual[$index],
                'harga' => $produk->harga,
                'total' => $produk->harga * $jumlahTerjual[$index],
            ];

            $totalHarga += $produk->harga * $jumlahTerjual[$index];

            Cart::where('user_id', Auth::id())
                ->where('produk_id', $produk->id)
                ->delete();
        }

        return redirect()->route('transaksi');
    }

    public function transaksi()
    {
        // Mengambil data penjualan untuk pengguna yang sedang login, beserta data produk terkait
        $penjualan = Penjualan::where('user_id', Auth::id())->with('produk')->get();

        // Memeriksa apakah ada data penjualan
        if ($penjualan) {
            // Menggunakan each untuk memproses setiap item tanpa menggunakan foreach
            $penjualan->each(function ($item) {
                // Membuat instance baru untuk DataTerjual
                $dataJual = new DataTerjual();

                // Menyimpan data produk_id, user_id, jumlah_terjual, dan total_harga
                $dataJual->produk_id = $item->produk_id;
                $dataJual->user_id = $item->user_id;
                $dataJual->jumlah_terjual = $item->jumlah_terjual;
                $dataJual->total_harga = $item->jumlah_terjual * $item->produk->harga;

                // Menghitung total harga produk yang telah terjual
                $total_harga_produk = Penjualan::where('produk_id', $item->produk_id)
                    ->sum('total_harga');

                // Menyimpan keuntungan
                $dataJual->keuntungan = $total_harga_produk;

                // Menyimpan data ke dalam tabel DataTerjual
                $dataJual->save();
            });
        }

        // Mengembalikan tampilan dengan data penjualan
        return view('page.detail.transaksi', compact('penjualan'));
    }


    public function hapusRiwayat($id)
    {
        // Mencari penjualan berdasarkan ID dan memuat data produk terkait
        $penjualan = Penjualan::with('produk')->find($id);

        // Menghapus data penjualan
        $penjualan->delete();

        // Redirect ke halaman profil
        return redirect()->route('profil');
    }
}