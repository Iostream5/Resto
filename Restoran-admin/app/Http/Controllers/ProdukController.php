<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */ 
    public function tampil()
    {

        return view('page.produk.data');
    }

    // Menampilkan daftar semua produk
    public function index()
    {
        $produks = Produk::all();
        return view('produks.index', compact('produks'));
    }

    // Menampilkan form untuk membuat produk baru
    public function create()
    {
        $tokos = Toko::all();
        $kategoris = Kategori::all();
        return view('produks.create', compact('tokos', 'kategoris'));
    }

    // Menyimpan produk baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'toko_id' => 'required|exists:tokos,id',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        Produk::create($request->all());
        return redirect()->route('produks.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Menampilkan produk yang spesifik
    public function show(Produk $produk)
    {
        return view('produks.show', compact('produk'));
    }

    // Menampilkan form untuk mengedit produk
    public function edit(Produk $produk)
    {
        $tokos = Toko::all();
        $kategoris = Kategori::all();
        return view('produks.edit', compact('produk', 'tokos', 'kategoris'));
    }

    // Memperbarui produk yang sudah ada
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'harga' => 'sometimes|required|numeric',
            'deskripsi' => 'nullable|string',
            'toko_id' => 'sometimes|required|exists:tokos,id',
            'kategori_id' => 'sometimes|required|exists:kategoris,id',
        ]);

        $produk->update($request->all());
        return redirect()->route('produks.index')->with('success', 'Produk berhasil diperbarui!');
    }

    // Menghapus produk
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produks.index')->with('success', 'Produk berhasil dihapus!');
    }
}