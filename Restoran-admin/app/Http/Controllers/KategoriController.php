<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    public function tampil()
    {
        return view('page.kategori.data');
    }


    public function data()
    {
        $kategoris = Kategori::query();

        return DataTables::of($kategoris)
            ->addColumn('action', function ($kategori) {
                return '
                     <a href="' . route('kategori.edit', $kategori->id) . '" class="btn btn-warning btn-sm">Edit</a>
                    <form action="' . route('kategori.hapus', $kategori->id) . '" method="POST" style="display:inline;">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">Hapus</button>
                    </form>
                ';
            })
            ->editColumn('foto', function ($kategori) {
                return '<img src="' . asset('storage/' . $kategori->foto) . '" alt="' . $kategori->nama_kategori . '" style="max-width: 100px;">';
            })
            ->rawColumns(['action', 'foto'])
            ->make(true);
    }


    public function tambah()
    {
        return view('page.kategori.tambah');
    }

    public function simpan(Request $request)
    {
        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->foto = $request->file('foto')->store('kategori', 'public');
        $kategori->save();

        return redirect()->route('kategori.tampil');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('page.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->foto = $request->file('foto')->store('kategori', 'public');
        $kategori->update();

        return redirect()->route('kategori.tampil');
    }

    public function hapus($id)
    {
        $kategori = Kategori::findOrFail($id);

        if ($kategori->foto) {
            Storage::disk('public')->delete($kategori->foto);
        }

        $kategori->delete();

        return redirect()->route('kategori.tampil')->with('success', 'Kategori berhasil dihapus!');
    }
}
