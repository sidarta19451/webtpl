@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Detail Mata Kuliah</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Kode Matkul</th>
                                    <td>{{ $kurikulum->kode_matkul }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Matkul</th>
                                    <td>{{ $kurikulum->nama_matkul }}</td>
                                </tr>
                                <tr>
                                    <th>Semester</th>
                                    <td>{{ $kurikulum->semester }}</td>
                                </tr>
                                <tr>
                                    <th>SKS</th>
                                    <td>{{ $kurikulum->sks }}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>{{ $kurikulum->deskripsi }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('kurikulum.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('kurikulum.edit', $kurikulum->id) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
