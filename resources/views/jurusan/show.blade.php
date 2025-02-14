@extends('layouts.backend')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Jurusan</h1>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Informasi Jurusan</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $jurusan->id }}</td>
                </tr>
                <tr>
                    <th>Nama Jurusan</th>
                    <td>{{ $jurusan->nama_jurusan }}</td>
                </tr>
                <tr>
                    <th>Fakultas</th>
                    <td>{{ $jurusan->fakultas->nama_fakultas }}</td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>
                        <div style="white-space: pre-line;">{{ $jurusan->deskripsi }}</div>
                    </td>
                </tr>
            </table>
            <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection