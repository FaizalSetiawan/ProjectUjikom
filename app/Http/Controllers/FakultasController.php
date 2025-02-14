<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fakultas;

class FakultasController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::with('jurusan')->get(); // Jika ada relasi ke `Jurusan`
        return view('fakultas.index', compact('fakultas'));
    }

    public function create()
    {
        return view('fakultas.create');
    }

    public function store(Request $request)
{
    // Validasi data
    $request->validate([
        'nama_fakultas' => 'required|string|max:255',
        'deskripsi' => 'required|string',
    ]);

    // Menyimpan data ke database
    Fakultas::create([
        'nama_fakultas' => $request->nama_fakultas,
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil ditambahkan!');
}

public function update(Request $request, Fakultas $fakultas)
{
    $request->validate([
        'nama_fakultas' => 'required|string|max:255',
        'deskripsi' => 'required|string',
    ]);

    // Update data fakultas
    $fakultas->update([
        'nama_fakultas' => $request->nama_fakultas,
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil diperbarui!');
}
}