@extends('layouts.backend')
@section('content')
<div class="container">
    <h1 class="mb-4">Berita</h1>
    <a href="{{ route('berita.create') }}" class="btn btn-primary mb-3">Tambah Berita</a>
    <div class="card">
        <div class="card-header"><h5 class="mb-0">Daftar Berita</h5></div>
        <div class="card-body">
            @if ($beritas->isEmpty())
                <div class="alert alert-warning">Tidak ada berita.</div>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>Gambar</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beritas as $berita)
                            <tr>
                                <td>{{ $berita->id }}</td>
                                <td>{{ $berita->judul }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($berita->isi_berita, 50) }}</td>
                                <td>
                                    @if($berita->gambar)
                                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" class="img-fluid" style="max-width: 100px;">
                                    @else
                                        <p>-</p>
                                    @endif
                                </td>
                                <td>{{ $berita->tanggal }}</td>
                                <td>
                                    <a href="{{ route('berita.show', $berita->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</button>
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