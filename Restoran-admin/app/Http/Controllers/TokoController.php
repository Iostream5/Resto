<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TokoController extends Controller
{


    public function create()
    {
        return view('page.toko.create'); // Form tambah toko
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'rating' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('tokos', 'public');
        }

        Toko::create($data);

        return redirect()->route('toko.index')->with('success', 'Toko berhasil ditambahkan.');
    }

    public function show(Toko $toko)
    {
        return view('page.toko.show', compact('toko'));
    }

    public function edit(Toko $toko)
    {
        return view('page.toko.edit', compact('toko'));
    }

    public function update(Request $request, Toko $toko)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'rating' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('tokos', 'public');
        }

        $toko->update($data);

        return redirect()->route('toko.index')->with('success', 'Toko berhasil diupdate.');
    }

    public function destroy(Toko $toko)
    {
        $toko->delete();
        return redirect()->route('toko.index')->with('success', 'Toko berhasil dihapus.');
    }

    public function index()
    {
    $tokos = Toko::all(); // Mengambil semua data toko dari database
    return view('page.toko.data', compact('tokos')); // Mengirim data ke view
}
public function tampil()
{
    $tokos = Toko::all(); // Ambil semua data toko dari database
    return view('page.toko.data', compact('tokos')); // Kirim data ke view
}

public function getData(Request $request)
    {
        if ($request->ajax()) {
            $tokos = Toko::select(['id', 'nama', 'alamat', 'rating', 'foto']);
            return DataTables::of($tokos)
                ->addColumn('action', function ($toko) {
                    return view('page.toko.partials.actions', compact('toko'))->render();
                })
                ->editColumn('foto', function ($toko) {
                    return '<img src="' . asset('storage/' . $toko->foto) . '" width="50" height="50" />';
                })
                ->rawColumns(['foto', 'action']) // Kolom yang memerlukan HTML render
                ->make(true);
        }
    }

}
