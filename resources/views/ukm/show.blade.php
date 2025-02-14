@extends('layouts.backend')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Detail UKM</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="nama_ukm" class="form-label">Nama UKM</label>
                <input type="text" class="form-control" id="nama_ukm" name="nama_ukm" value="{{ $ukm->nama_ukm }}" readonly>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" readonly>{{ $ukm->deskripsi }}</textarea>
            </div>
            <div class="mb-3">
                <label for="logo" class="form-label">Logo</label>
                @if($ukm->logo)
                    <img src="{{ asset('storage/' . $ukm->logo) }}" alt="Logo UKM" class="img-fluid">
                @else
                    <p>Tidak ada logo</p>
                @endif
            </div>
            <a href="{{ route('ukm.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection