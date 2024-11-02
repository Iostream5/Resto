<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */ 
    public function tampil(){
        return view('page.produk.data');
    }
     
    public function data()
    {
        $produks = Produk::with('toko', 'kategori')->get(); // Menyertakan relasi toko dan kategori

        return DataTables::of($produks)
            ->addColumn('action', function ($produk) {
                return '
                    <a href="' . route('produk.show', $produk->id) . '" class="btn btn-info">View</a>
                    <a href="' . route('produk.edit', $produk->id) . '" class="btn btn-warning">Edit</a>
                    <form action="' . route('produk.destroy', $produk->id) . '" method="POST" style="display:inline;">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</button>
                    </form>
                ';
            })
            ->make(true);
    }

    public function index()
    {
        return view('page.produk.tambah');
    }

    public function create()
    {
        $tokos = Toko::all();
        $kategoris = Kategori::all();
        return view('page.produk.tambah', compact('tokos', 'kategoris'));
    }

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
        return redirect()->route('produk.tampil')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function show(Produk $produk)
    {
        return view('page.produk.tampil', compact('produk'));
    }

    public function edit(Produk $produk)
    {
        $tokos = Toko::all();
        $kategoris = Kategori::all();
        return view('page.produk.edit', compact('produk', 'tokos', 'kategoris'));
    }

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
        return redirect()->route('produk.tampil')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.tampil')->with('success', 'Produk berhasil dihapus!');
    }
}