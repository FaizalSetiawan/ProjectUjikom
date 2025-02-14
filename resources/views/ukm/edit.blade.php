@extends('layouts.backend')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Edit UKM</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('ukm.update', $ukm->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_ukm" class="form-label">Nama UKM</label>
                    <input type="text" class="form-control" id="nama_ukm" name="nama_ukm" value="{{ $ukm->nama_ukm }}" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ $ukm->deskripsi }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-label">Logo</label>
                    <input type="file" class="form-control" id="logo" name="logo">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('ukm.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection