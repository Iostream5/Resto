<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class TokoController extends Controller
{
    public function tampil()
    {
        return view('page.toko.data');
    }

    public function data(Request $request)
    {
        if ($request->ajax()) {
            $toko = Toko::with('user')->select(['id', 'user_id', 'nama_toko', 'alamat', 'rating', 'foto']);
            return DataTables::of($toko)
                ->addColumn('user_id', function ($toko) {
                    return $toko->user->name;
                })
                ->addColumn('action', function ($toko) {
                    return '
                        <form action="' . route('toko.hapus', $toko->id) . '" method="POST" style="display:inline;">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    ';
                })
                ->editColumn('foto', function ($toko) {
                    return '<img src="' . Storage::url($toko->foto) . '" height="50" />';
                })
                ->rawColumns(['action', 'foto'])
                ->make(true);
        }
    }

    public function tambah()
    {
        return view('page.toko.tambah');
    }

    public function simpan(Request $request)
    {
        $toko = new Toko();
        $toko->nama_toko = $request->nama_toko;
        $toko->alamat = $request->alamat;
        $toko->deskripsi = $request->deskripsi;
        $toko->rating = $request->rating;
        $toko->foto = $request->file('foto')->store('toko', 'public');
        $toko->save();

        return redirect()->route('toko.tampil');
    }

    public function edit($id)
    {
        $toko = Toko::find($id);
        return view('page.toko.edit', compact('toko'));
    }

    public function update(Request $request, $id)
    {
        $toko = Toko::findOrFail($id);
        $toko->nama_toko = $request->nama_toko;
        $toko->alamat = $request->alamat;
        $toko->deskripsi = $request->deskripsi;
        $toko->rating = $request->rating;
        $toko->foto = $request->file('foto')->store('toko', 'public');
        $toko->update();

        return redirect()->route('toko.tampil');
    }

    public function hapus($id)
    {
        $toko = Toko::findOrFail($id);
        if ($toko->foto) {
            Storage::disk('public')->delete($toko->foto);
        }
        $toko->delete();

        return redirect()->route('toko.tampil');
    }
}
