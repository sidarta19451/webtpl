@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Detail Kemahasiswaan</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Sub Kategori</th>
                                    <td>{{ $kemahasiswaan->sub_kategori }}</td>
                                </tr>
                                <tr>
                                    <th>Judul</th>
                                    <td>{{ $kemahasiswaan->judul }}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>{{ $kemahasiswaan->deskripsi }}</td>
                                </tr>
                                <tr>
                                    <th>File</th>
                                    <td>
                                        @if($kemahasiswaan->file_path)
                                            <a href="{{ asset('storage/' . $kemahasiswaan->file_path) }}" target="_blank" class="btn btn-sm btn-info">Lihat File</a>
                                        @else
                                            Tidak ada file
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('kemahasiswaan.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('kemahasiswaan.edit', $kemahasiswaan->id) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
