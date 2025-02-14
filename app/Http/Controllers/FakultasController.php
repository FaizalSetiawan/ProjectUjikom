<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fakultas;

class FakultasController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::with('jurusan')->get();
        return view('fakultas.index', compact('fakultas'));
    }

    public function create()
    {
        return view('fakultas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_fakultas' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        Fakultas::create($request->only(['nama_fakultas', 'deskripsi']));

        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil ditambahkan!');
    }

    public function edit(Fakultas $fakultas)
    {
        return view('fakultas.edit', compact('fakultas'));
    }

    public function update(Request $request, Fakultas $fakultas)
    {
        $request->validate([
            'nama_fakultas' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $fakultas->update($request->only(['nama_fakultas', 'deskripsi']));

        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil diperbarui!');
    }

    public function show(Fakultas $fakultas)
    {
        return view('fakultas.show', compact('fakultas'));
    }
    public function destroy(Fakultas $fakultas)
{
    $fakultas->delete();
    return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil dihapus!');
}
}