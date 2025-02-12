@extends('layouts.backend')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Edit Fakultas</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('fakultas.update', $fakultas->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_fakultas" class="form-label">Nama Fakultas</label>
                    <input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas" value="{{ $fakultas->nama_fakultas }}" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $fakultas->deskripsi }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('fakultas.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
