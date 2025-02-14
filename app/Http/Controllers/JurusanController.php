<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\Fakultas;

class JurusanController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::with('jurusan')->get();
        $jurusan = Jurusan::with('fakultas')->get();
        return view('jurusan.index', compact('jurusan'));
    }

    public function create()
    {
        $fakultas = Fakultas::all();
        return view('jurusan.create', compact('fakultas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fakultas_id' => 'required',
            'nama_jurusan' => 'required',
            'deskripsi' => 'required'
        ]);
        
        Jurusan::create($request->all());
        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil ditambahkan.');
    }

    public function edit(Jurusan $jurusan)
    {
        $fakultas = Fakultas::all();
        return view('jurusan.edit', compact('jurusan', 'fakultas'));
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $request->validate([
            'fakultas_id' => 'required',
            'nama_jurusan' => 'required',
            'deskripsi' => 'required'
        ]);
        
        $jurusan->update($request->all());
        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil diperbarui.');
    }
    public function show(Jurusan $jurusan)
{
    $jurusan->load('fakultas');
    return view('jurusan.show', compact('jurusan'));
}

    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();
        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil dihapus.');
    }
}