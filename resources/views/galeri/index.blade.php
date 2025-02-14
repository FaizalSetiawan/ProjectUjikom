@extends('layouts.backend')
@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Galeri</h1>
    <a href="{{ route('galeri.create') }}" class="btn btn-primary mb-3">Tambah Galeri</a>
    <div class="card">
        <div class="card-header"><h5 class="mb-0">Galeri</h5></div>
        <div class="card-body">
            @if ($galeris->isEmpty())
                <div class="alert alert-warning">Tidak ada galeri yang ditemukan.</div>
            @else
                <table class="table table-bordered">
                    <thead><tr><th>ID</th><th>Judul</th><th>Deskripsi</th><th>Gambar</th><th>Aksi</th></tr></thead>
                    <tbody>
                        @foreach ($galeris as $galeri)
                            <tr>
                                <td>{{ $galeri->id }}</td>
                                <td>{{ $galeri->judul }}</td>
                                <td>{{ $galeri->deskripsi }}</td>
                                <td>
                                    @if($galeri->gambar)
                                        <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="Gambar Galeri" class="img-fluid" style="max-width: 100px;">
                                    @else
                                        <p>Tidak ada gambar</p>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('galeri.show', $galeri->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('galeri.edit', $galeri->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('galeri.destroy', $galeri->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus galeri ini?');">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection