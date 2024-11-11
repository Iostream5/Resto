<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function tampil()
    {
        $produk = Auth::user()->produk;
        $favorite = Auth::user()->favorite()->with('produk')->get();
        $user = Auth::user();
        $user->load(['produk', 'toko']);
        return view('page.profil', compact('user', 'favorite', 'produk'));
    }

    public function edit()
    {
        $user = Auth::user(); // Mendapatkan data user yang sedang login
        return view('form.edit.user', compact('user'));
    }

    // Memperbarui profile user
    public function update(Request $request)
    {
        $user = Auth::user(); // Mendapatkan user yang sedang login
        // Update data user
        $user->name = $request->name;
        $user->bio = $request->bio;
        $user->email = $request->email;

        // Jika password diisi, update password
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        // Update foto profile jika ada
        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo_path = $path;
        }
        $user->save();

        return redirect()->route('toko.tampil');
    }
}
