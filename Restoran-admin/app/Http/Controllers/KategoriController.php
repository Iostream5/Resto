<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tampil(){
        return view('page.kategori.data');
    }
    
    public function data()
    {
        $kategoris = Kategori::query();

        return DataTables::of($kategoris)
            ->addColumn('action', function ($kategori) {
                return '
                    <a href="' . route('kategori.show', $kategori->id) . '" class="btn btn-info">View</a>
                    <a href="' . route('kategori.edit', $kategori->id) . '" class="btn btn-warning">Edit</a>
                    <form action="' . route('kategori.destroy', $kategori->id) . '" method="POST" style="display:inline;">
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
        return view('page.kategori.tambah');
    }

    public function create()
    {
        return view('page.kategori.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        Kategori::create($request->all());
        return redirect()->route('produks.tampil')->with('success', 'Kategori berhasil ditambahkan!'); // Sesuaikan dengan route yang benar
    }

    public function show(Kategori $kategori)
    {
        return view('page.kategori.data', compact('kategori'));
    }

    public function edit(Kategori $kategori)
    {
        return view('page.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'sometimes|required|string|max:255',
        ]);

        $kategori->update($request->all());
        return redirect()->route('kategoris.tampil')->with('success', 'Kategori berhasil diperbarui!'); // Sesuaikan dengan route yang benar
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategoris.tampil')->with('success', 'Kategori berhasil dihapus!'); // Sesuaikan dengan route yang benar
    }
}