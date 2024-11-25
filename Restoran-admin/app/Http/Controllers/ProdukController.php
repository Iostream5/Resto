<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function tampil()
    {
        return view('page.produk.data');
    }

    public function data()
    {
        $produk = Produk::with(['kategori', 'toko'])->get();

        return DataTables::of($produk)
            ->addColumn('kategori', function ($produk) {
                return $produk->kategori->nama_kategori;
            })
            ->addColumn('toko', function ($produk) {
                return $produk->toko->nama_toko;
            })
            ->addColumn('action', function ($produk) {
                return '
                <form action="' . route('produk.destroy', $produk->id) . '" method="POST" style="display:inline;">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="submit" class="btn btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</button>
                </form>
            ';
            })
            ->editColumn('foto', function ($produk) {
                return '<img src="' . asset('storage/' . $produk->foto) . '" alt="" style="max-width: 100px;">';
            })
            ->rawColumns(['action', 'foto'])
            ->make(true);
    }



    public function tambah()
    {
        $toko = Toko::all();
        $kategori = Kategori::all();
        return view('page.produk.tambah', compact('toko', 'kategori'));
    }

    public function simpan(Request $request)
    {
        $produk = new Produk();
        $produk->toko_id = $request->toko_id;
        $produk->nama = $request->nama;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->rating = $request->rating;
        $produk->kategori_id = $request->kategori_id;
        $produk->foto = $request->file('foto')->store('produk', 'public');
        $produk->save();

        return redirect()->route('produk.tampil');
    }

    public function edit($id)
    {
        $produk = Produk::with(['kategori', 'toko'])->findOrFail($id);
        $toko = Toko::all();
        $kategori = Kategori::all();

        return view('page.produk.edit', compact('produk', 'toko', 'kategori'));
    }


    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $produk->toko_id = $request->toko_id;
        $produk->nama = $request->nama;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->rating = $request->rating;
        $produk->kategori_id = $request->kategori_id;
        $produk->foto = $request->file('foto')->store('produk', 'public');
        $produk->update();

        return redirect()->route('produk.tampil');
    }

    public function hapus($id)
    {
        $produk = Produk::findOrFail($id);
        if ($produk->foto) {
            Storage::disk('public')->delete($produk->foto);
        }
        $produk->delete();

        return redirect()->route('produk.tampil');
    }
}