@extends('layouts.backend')
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Tambah Jurusan</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('jurusan.store') }}" method="POST">
                @csrf
                <select name="fakultas_id" class="form-control">
                    @foreach($fakultas as $f)
                        <option value="{{ $f->id }}">{{ $f->nama_fakultas }}</option>
                    @endforeach
                </select>
                <div class="mb-3">
                    <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
                    <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
