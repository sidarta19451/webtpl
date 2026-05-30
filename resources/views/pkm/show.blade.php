@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3>Detail PKM</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Judul PKM</th>
                                    <td>{{ $pkm->judul_pkm }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Ketua</th>
                                    <td>{{ $pkm->nama_ketua_formatted }}</td>
                                </tr>
                                <tr>
                                    <th>Mitra</th>
                                    <td>{{ $pkm->mitra }}</td>
                                </tr>
                                <tr>
                                    <th>Lokasi</th>
                                    <td>{{ $pkm->lokasi }}</td>
                                </tr>
                                <tr>
                                    <th>Sumber Dana</th>
                                    <td>{{ $pkm->sumber_dana }}</td>
                                </tr>
                                <tr>
                                    <th>Biaya</th>
                                    <td>Rp {{ number_format($pkm->biaya, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>Luaran Wajib</th>
                                    <td>{{ $pkm->luaran_wajib }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5>Anggota PKM</h5>
                            @if($pkm->anggota_formatted && count($pkm->anggota_formatted) > 0)
                                <ul class="list-group">
                                    @foreach($pkm->anggota_formatted as $anggota)
                                        <li class="list-group-item">
                                            {{ $anggota }}
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p>Tidak ada anggota</p>
                            @endif
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('pkm.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('pkm.edit', $pkm->id) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
