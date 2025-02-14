@extends('layouts.backend')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Detail Fakultas</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="nama_fakultas" class="form-label">Nama Fakultas</label>
                <input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas" value="{{ $fakultas->nama_fakultas }}" readonly>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" readonly>{{ $fakultas->deskripsi }}</textarea>
            </div>
            <a href="{{ route('fakultas.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection