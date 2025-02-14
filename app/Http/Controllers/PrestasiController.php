<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestasi;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasis = Prestasi::all();
        return view('prestasi.index', compact('prestasis'));
    }

    public function create()
    {
        return view('prestasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_prestasi' => 'required',
            'kategori' => 'required',
            'tanggal' => 'required|date',
            'deskripsi' => 'nullable',
        ]);

        Prestasi::create($request->all());
        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil ditambahkan');
    }

    public function show(Prestasi $prestasi)
    {
        return view('prestasi.show', compact('prestasi'));
    }

    public function edit(Prestasi $prestasi)
    {
        return view('prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        $request->validate([
            'nama_prestasi' => 'required',
            'kategori' => 'required',
            'tanggal' => 'required|date',
            'deskripsi' => 'nullable',
        ]);

        $prestasi->update($request->all());
        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil diperbarui');
    }

    public function destroy(Prestasi $prestasi)
    {
        $prestasi->delete();
        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil dihapus');
    }
}