@extends('layouts.backend')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Detail Galeri</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $galeri->judul }}" readonly>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" readonly>{{ $galeri->deskripsi }}</textarea>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                @if($galeri->gambar)
                    <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="Gambar Galeri" class="img-fluid" style="max-width: 200px;">
                @else
                    <p>Tidak ada gambar</p>
                @endif
            </div>
            <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection