@extends('layouts.backend')
@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Prestasi</h1>
    <a href="{{ route('prestasi.create') }}" class="btn btn-primary mb-3">Tambah Prestasi</a>
    <div class="card">
        <div class="card-header"><h5 class="mb-0">Prestasi</h5></div>
        <div class="card-body">
            @if ($prestasis->isEmpty())
                <div class="alert alert-warning">Tidak ada prestasi yang ditemukan.</div>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Prestasi</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prestasis as $prestasi)
                            <tr>
                                <td>{{ $prestasi->id }}</td>
                                <td>{{ $prestasi->nama_prestasi }}</td>
                                <td>{{ $prestasi->kategori }}</td>
                                <td>{{ $prestasi->tanggal }}</td>
                                <td>
                                    <span title="{{ $prestasi->deskripsi }}">
                                        {{ Str::limit($prestasi->deskripsi, 50) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('prestasi.show', $prestasi->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('prestasi.edit', $prestasi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('prestasi.destroy', $prestasi->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus prestasi ini?');">Hapus</button>
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