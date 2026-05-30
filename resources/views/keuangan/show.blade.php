@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Detail Keuangan</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Sub Kategori</th>
                                    <td>{{ $keuangan->sub_kategori }}</td>
                                </tr>
                                <tr>
                                    <th>Judul</th>
                                    <td>{{ $keuangan->judul }}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>{{ $keuangan->deskripsi }}</td>
                                </tr>
                                <tr>
                                    <th>File</th>
                                    <td>
                                        @if($keuangan->file_path)
                                            <a href="{{ asset('storage/' . $keuangan->file_path) }}" target="_blank" class="btn btn-sm btn-info">Lihat File</a>
                                        @else
                                            Tidak ada file
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('keuangan.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('keuangan.edit', $keuangan->id) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
