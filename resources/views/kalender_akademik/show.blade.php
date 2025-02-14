@extends('layouts.backend')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="mb-4 text-center">Detail Kalender Akademik</h1>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Judul</th>
                            <td>{{ $kalenderAkademik->judul }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Mulai</th>
                            <td>{{ \Carbon\Carbon::parse($kalenderAkademik->tanggal_mulai)->format('d M Y') }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Selesai</th>
                            <td>{{ \Carbon\Carbon::parse($kalenderAkademik->tanggal_selesai)->format('d M Y') }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $kalenderAkademik->deskripsi }}</td>
                        </tr>
                    </table>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('kalender-akademik.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('kalender-akademik.edit', $kalenderAkademik->id) }}" class="btn btn-warning">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
