@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Penelitian</h1>
    <a href="{{ route('penelitian.create') }}" class="btn btn-primary">Tambah Penelitian</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Nama Ketua</th>
                <th>Anggota</th>
                <th>Sumber Dana</th>
                <th>Biaya</th>
                <th>Jangka Waktu</th>
                <th>Luaran Utama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penelitian as $penelitian)
            <tr>
                <td>{{ $penelitian->judul }}</td>
                <td>{{ $penelitian->nama_ketua_formatted }}</td>
                <td>
                    @foreach($penelitian->anggota_formatted as $anggota)
                        <div>{{ $anggota }}</div>
                    @endforeach
                </td>
                <td>{{ $penelitian->sumber_dana }}</td>
                <td>{{ number_format($penelitian->biaya) }}</td>
                <td>{{ $penelitian->jangka_waktu }} bulan</td>
                <td>{{ $penelitian->luaran_utama }}</td>
                <td>
                    <a href="{{ route('penelitian.show', $penelitian->id) }}" class="btn btn-info">Lihat</a>
                    <a href="{{ route('penelitian.edit', $penelitian->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('penelitian.destroy', $penelitian->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
