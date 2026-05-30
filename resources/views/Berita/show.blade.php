@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Detail Berita</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if($berita->foto)
                                <img src="{{ asset('storage/' . $berita->foto) }}" alt="Foto Berita" class="img-fluid rounded">
                            @else
                                <img src="{{ asset('template/img/undraw_profile.svg') }}" alt="Default Foto" class="img-fluid rounded">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Judul</th>
                                    <td>{{ $berita->judul }}</td>
                                </tr>
                                <tr>
                                    <th>Isi</th>
                                    <td>{{ $berita->isi }}</td>
                                </tr>
                                <tr>
                                    <th>Penulis</th>
                                    <td>{{ $berita->penulis }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td>{{ $berita->tanggal }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
