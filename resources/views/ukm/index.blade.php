@extends('layouts.backend')
@section('content')
<div class="container">
    <h1 class="mb-4">Daftar UKM</h1>
    <a href="{{ route('ukm.create') }}" class="btn btn-primary mb-3">Tambah UKM</a>
    <div class="card">
        <div class="card-header"><h5 class="mb-0">UKM</h5></div>
        <div class="card-body">
            @if ($ukms->isEmpty())
                <div class="alert alert-warning">Tidak ada UKM yang ditemukan.</div>
            @else
                <table class="table table-bordered">
                    <thead><tr><th>ID</th><th>Nama UKM</th><th>Deskripsi</th><th>Logo</th><th>Aksi</th></tr></thead>
                    <tbody>
                        @foreach ($ukms as $ukm)
                            <tr>
                                <td>{{ $ukm->id }}</td>
                                <td>{{ $ukm->nama_ukm }}</td>
                                <td>{{ $ukm->deskripsi }}</td>
                                <td>
                                    @if($ukm->logo)
                                        <img src="{{ asset('storage/' . $ukm->logo) }}" alt="Logo UKM" class="img-fluid" style="max-width: 100px;">
                                    @else
                                        <p>Tidak ada logo</p>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('ukm.show', $ukm->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('ukm.edit', $ukm->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('ukm.destroy', $ukm->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus UKM ini?');">Hapus</button>
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