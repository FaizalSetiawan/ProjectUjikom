@extends('layouts.backend')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Jurusan</h1>

    <a href="{{ route('jurusan.create') }}" class="btn btn-primary mb-3">Tambah Jurusan</a>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Jurusan</h5>
        </div>
        <div class="card-body">
            @if ($jurusan->isEmpty())
                <div class="alert alert-warning" role="alert">
                    Tidak ada jurusan yang ditemukan.
                </div>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Jurusan</th>
                            <th>Fakultas</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jurusan as $jurusanItem)
                            <tr>
                                <td>{{ $jurusanItem->id }}</td>
                                <td>{{ $jurusanItem->nama_jurusan }}</td>
                                <td>{{ $jurusanItem->fakultas->nama_fakultas }}</td>
                                <td>
                                    <div style="white-space: pre-line;">{{ $jurusanItem->deskripsi }}</div>
                                </td>
                                <td>
                                    <a href="{{ route('jurusan.show', $jurusanItem->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('jurusan.edit', $jurusanItem->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('jurusan.destroy', $jurusanItem->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus jurusan ini?');">Hapus</button>
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