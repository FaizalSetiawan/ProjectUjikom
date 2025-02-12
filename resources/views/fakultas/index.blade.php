@extends('layouts.backend')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Fakultas</h1>

    <a href="{{ route('fakultas.create') }}" class="btn btn-primary mb-3">Tambah Fakultas</a>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Fakultas</h5>
        </div>
        <div class="card-body">
            @if ($fakultas->isEmpty())
                <div class="alert alert-warning" role="alert">
                    Tidak ada fakultas yang ditemukan.
                </div>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Fakultas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fakultas as $fakultasItem)
                            <tr>
                                <td>{{ $fakultasItem->id }}</td>
                                <td>{{ $fakultasItem->nama_fakultas }}</td> <!-- Perubahan nama kolom -->
                                <td>
                                    <a href="{{ route('fakultas.edit', $fakultasItem->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('fakultas.destroy', $fakultasItem->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus fakultas ini?');">Hapus</button>
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
