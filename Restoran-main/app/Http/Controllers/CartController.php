<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function tambah($produkId)
    {
        $cartItem = Cart::firstOrCreate(
            ['user_id' => Auth::id(), 'produk_id' => $produkId],
            ['quantity' => 1]
        );

        $cartItem->quantity += 1;
        $cartItem->save();

        return back()->with('success', 'Produk ditambahkan ke keranjang!');
    }

    public function hapus($produkId)
    {
        Cart::where('user_id', Auth::id())->where('produk_id', $produkId)->delete();

        return back()->with('success', 'Produk dihapus dari keranjang!');
    }

    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('produk')->get();
        return view('carts.index', compact('cartItems'));
    }

    public function update(Request $request, $produkId)
    {
        $cartItem = Cart::where('user_id', Auth::id())->where('produk_id', $produkId)->first();
        if ($cartItem) {
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
        }

        return back()->with('success', 'Jumlah produk di keranjang diperbarui!');
    }
}
