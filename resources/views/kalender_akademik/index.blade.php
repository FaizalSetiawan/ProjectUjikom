@extends('layouts.backend')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Kalender Akademik</h1>
    <a href="{{ route('kalender-akademik.create') }}" class="btn btn-primary mb-3">Tambah Kalender</a>
    <div class="card">
        <div class="card-header"><h5 class="mb-0">Daftar Kalender Akademik</h5></div>
        <div class="card-body">
            @if ($kalenders->isEmpty())
                <div class="alert alert-warning">Tidak ada kalender akademik yang ditemukan.</div>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kalenders as $kalender)
                            <tr>
                                <td>{{ $kalender->judul }}</td>
                                <td>{{ $kalender->tanggal_mulai }}</td>
                                <td>{{ $kalender->tanggal_selesai }}</td>
                                <td>
                                    <span title="{{ $kalender->deskripsi }}">
                                        {{ \Illuminate\Support\Str::limit($kalender->deskripsi, 50) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('kalender-akademik.show', $kalender->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('kalender-akademik.edit', $kalender->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('kalender-akademik.destroy', $kalender->id) }}" method="POST" style="display:inline;">
                                        
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