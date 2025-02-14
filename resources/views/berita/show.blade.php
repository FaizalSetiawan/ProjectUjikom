@extends('layouts.backend')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Detail Berita</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $berita->judul }}" readonly>
            </div>
            <div class="mb-3">
                <label for="isi_berita" class="form-label">Isi Berita</label>
                <textarea class="form-control" id="isi_berita" name="isi_berita" rows="5" readonly>{{ $berita->isi_berita }}</textarea>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                @if($berita->gambar)
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" class="img-fluid" style="max-width: 200px;">
                @else
                    <p>Tidak ada gambar</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $berita->tanggal }}" readonly>
            </div>
            <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection