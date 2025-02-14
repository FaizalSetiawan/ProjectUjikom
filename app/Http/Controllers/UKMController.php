<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UKM;

class UKMController extends Controller
{
    public function index()
    {
        $ukms = UKM::all();
        return view('ukm.index', compact('ukms'));
    }

    public function create()
    {
        return view('ukm.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ukm' => 'required',
            'deskripsi' => 'nullable',
            'logo' => 'nullable|image',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        UKM::create($data);
        return redirect()->route('ukm.index')->with('success', 'UKM berhasil ditambahkan');
    }

    public function show(UKM $ukm)
    {
        return view('ukm.show', compact('ukm'));
    }

    public function edit(UKM $ukm)
    {
        return view('ukm.edit', compact('ukm'));
    }

    public function update(Request $request, UKM $ukm)
    {
        $request->validate([
            'nama_ukm' => 'required',
            'deskripsi' => 'nullable',
            'logo' => 'nullable|image',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($ukm->logo) {
                \Storage::delete('public/' . $ukm->logo);
            }
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $ukm->update($data);
        return redirect()->route('ukm.index')->with('success', 'UKM berhasil diperbarui');
    }

    public function destroy(UKM $ukm)
    {
        if ($ukm->logo) {
            \Storage::delete('public/' . $ukm->logo);
        }
        $ukm->delete();
        return redirect()->route('ukm.index')->with('success', 'UKM berhasil dihapus');
    }
}