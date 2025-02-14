<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KalenderAkademik;

class KalenderAkademikController extends Controller
{
    // Menampilkan halaman utama dengan daftar kalender akademik
    public function welcome()
    {
        $kalenders = KalenderAkademik::latest()->paginate(6); // Menggunakan pagination agar lebih ringan
        return view('welcome', compact('kalenders'));
    }

    // Menampilkan semua kalender akademik di halaman index
    public function index()
    {
        $kalenders = KalenderAkademik::all();
        return view('kalender_akademik.index', compact('kalenders'));
    }

    public function create()
    {
        return view('kalender_akademik.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'deskripsi' => 'required|string',
        ]);

        KalenderAkademik::create($request->all());
        return redirect()->route('kalender-akademik.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(KalenderAkademik $kalenderAkademik)
    {
        return view('kalender_akademik.show', compact('kalenderAkademik'));
    }

    public function edit(KalenderAkademik $kalenderAkademik)
    {
        return view('kalender_akademik.edit', compact('kalenderAkademik'));
    }

    public function update(Request $request, KalenderAkademik $kalenderAkademik)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'deskripsi' => 'required|string',
        ]);

        $kalenderAkademik->update($request->all());
        return redirect()->route('kalender-akademik.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(KalenderAkademik $kalenderAkademik)
    {
        $kalenderAkademik->delete();
        return redirect()->route('kalender-akademik.index')->with('success', 'Data berhasil dihapus.');
    }
}
