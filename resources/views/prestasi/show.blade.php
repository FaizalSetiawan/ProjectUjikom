@extends('layouts.backend')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Detail Prestasi</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="nama_prestasi" class="form-label">Nama Prestasi</label>
                <input type="text" class="form-control" id="nama_prestasi" name="nama_prestasi" value="{{ $prestasi->nama_prestasi }}" readonly>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $prestasi->kategori }}" readonly>
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $prestasi->tanggal }}" readonly>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" readonly>{{ $prestasi->deskripsi }}</textarea>
            </div>
            <a href="{{ route('prestasi.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection