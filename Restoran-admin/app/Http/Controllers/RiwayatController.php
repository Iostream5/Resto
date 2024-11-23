<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataTerjual;
use App\Models\Penjualan;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class RiwayatController extends Controller
{

    public function tampil()
    {
        return view('page.riwayat.data');
    }

    public function data()
    {
        $data = Penjualan::with(['produk', 'user'])->get();

        return DataTables::of($data)
            ->editColumn('produk_id', function ($data) {
                return $data->produk->nama;
            })
            ->editColumn('user_id', function ($data) {
                return $data->user->name;
            })
            ->addColumn('action', function ($data) {
                return '
                <form action="' . route('riwayat.destroy', $data->id) . '" method="POST" style="display:inline;">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="submit" class="btn btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</button>
                </form>
            ';
            })
            ->rawColumns(['action', 'foto'])
            ->make(true);
    }

    public function hapus($id)
    {
        $produk = Penjualan::findOrFail($id);
        $produk->delete();

        return redirect()->route('produk.tampil');
    }
}
