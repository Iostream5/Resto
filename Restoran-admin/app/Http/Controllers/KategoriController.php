<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tampil()
    {

        return view('page.kategori.data');
    }

     public function index()
    {
        $kategoris = Kategori::all();
        return view('kategoris.index', compact('kategoris'));
    }

    // Menampilkan form untuk membuat kategori baru
    public function create()
    {
        return view('kategoris.create');
    }

    // Menyimpan kategori baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        Kategori::create($request->all());
        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    // Menampilkan kategori yang spesifik
    public function show(Kategori $kategori)
    {
        return view('kategoris.show', compact('kategori'));
    }

    // Menampilkan form untuk mengedit kategori
    public function edit(Kategori $kategori)
    {
        return view('kategoris.edit', compact('kategori'));
    }

    // Memperbarui kategori yang sudah ada
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'sometimes|required|string|max:255',
        ]);

        $kategori->update($request->all());
        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    // Menghapus kategori
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil dihapus!');
    }
}