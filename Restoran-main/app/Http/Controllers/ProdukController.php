<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class ProdukController extends Controller
{
    public function tampil()
    {
        return redirect()->route('profil');
    }

    public function data()
    {
        $produk = Produk::with(['kategori', 'toko'])
            ->whereHas('toko', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->get();

        return DataTables::of($produk)
            ->addColumn('kategori', function ($produk) {
                return $produk->kategori->nama_kategori;
            })
            ->addColumn('toko', function ($produk) {
                return $produk->toko->nama_toko;
            })
            ->addColumn('action', function ($produk) {
                return '
                <a href="' . route('produk.edit', $produk->id) . '" class="btn btn-warning">Edit</a>
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
        $toko = Toko::where('user_id', Auth::id())->get();
        $kategori = Kategori::all();
        return view('form.produk', compact('toko', 'kategori'));
    }

    public function simpan(Request $request)
    {
        // // Validasi toko_id dan pastikan toko milik user yang sedang login
        // $request->validate([
        //     'toko_id' => 'required|exists:tokos,id,user_id,' . Auth::id(), // Validasi toko_id milik user yang sedang login
        //     'nama' => 'required|string|max:255',
        //     'deskripsi' => 'required|string|max:255',
        //     'harga' => 'required|numeric',
        //     'kategori_id' => 'required|exists:kategoris,id',
        //     'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        // // Mendapatkan toko berdasarkan toko_id dan user_id
        $toko = Toko::where('id', $request->toko_id)
            ->where('user_id', Auth::id())
            ->firstOrFail(); // Jika tidak ditemukan, akan mengembalikan 404

        // Proses penyimpanan produk
        $produk = new Produk();
        $produk->toko_id = $toko->id;
        $produk->nama = $request->nama;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->rating = $request->rating;
        $produk->kategori_id = $request->kategori_id;
        $produk->foto = $request->file('foto')->store('produk', 'public');
        $produk->save();

        return redirect()->route('profil');
    }


    public function edit($id)
    {
        $produk = Produk::with(['kategori', 'toko'])
            ->whereHas('toko', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->findOrFail($id);
        $toko = Toko::where('user_id', Auth::id())->get();
        $kategori = Kategori::all();
        return view('form.edit.produk', compact('produk', 'toko', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::whereHas('toko', function ($query) {
            $query->where('user_id', Auth::id());
        })->findOrFail($id);
        // $request->validate([
        //     'nama' => 'required|string|max:255',
        //     'deskripsi' => 'nullable|string',
        //     'harga' => 'required|numeric',
        //     'rating' => 'nullable|numeric|between:0,5',
        //     'kategori_id' => 'required|exists:kategoris,id',
        //     'toko_id' => 'required|exists:tokos,id',
        //     'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
        // ]);

        // Validasi toko milik user yang sedang login
        $toko = Toko::where('id', $request->toko_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $produk->toko_id = $toko->id;
        $produk->nama = $request->nama;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->rating = $request->rating;
        $produk->kategori_id = $request->kategori_id;
        $produk->foto = $request->file('foto')->store('produk', 'public');
        $produk->save();

        return redirect()->route('produk.tampil')->with('success', 'Produk berhasil diperbarui');
    }

    public function hapus($id)
    {
        $produk = Produk::whereHas('toko', function ($query) {
            $query->where('user_id', Auth::id());
        })->findOrFail($id);
        $produk->delete();

        return redirect()->route('profil')->with('success', 'Produk berhasil dihapus');
    }
}