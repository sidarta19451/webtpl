@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Detail Pengumuman</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Kegiatan</th>
                                    <td>{{ $pengumuman->kegiatan }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td>{{ $pengumuman->tanggal }}</td>
                                </tr>
                                <tr>
                                    <th>Waktu</th>
                                    <td>{{ $pengumuman->waktu }}</td>
                                </tr>
                                <tr>
                                    <th>Lokasi</th>
                                    <td>{{ $pengumuman->lokasi }}</td>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <td>{{ $pengumuman->keterangan }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('pengumuman.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('pengumuman.edit', $pengumuman->id) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
