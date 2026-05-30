@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Detail Kegiatan</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if($kegiatan->galeri->count() > 0)
                                @if($kegiatan->galeri->first()->tipe == 'image')
                                    <img src="{{ asset('storage/' . $kegiatan->galeri->first()->file) }}" alt="Galeri Kegiatan" class="img-fluid rounded">
                                @elseif($kegiatan->galeri->first()->tipe == 'video')
                                    <video controls class="img-fluid rounded">
                                        <source src="{{ asset('storage/' . $kegiatan->galeri->first()->file) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @endif
                            @else
                                <img src="{{ asset('template/img/undraw_rocket.svg') }}" alt="Default Kegiatan" class="img-fluid rounded">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Judul</th>
                                    <td>{{ $kegiatan->judul }}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>{{ $kegiatan->deskripsi ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td>{{ $kegiatan->tanggal ? \Carbon\Carbon::parse($kegiatan->tanggal)->format('d M Y') : '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Lokasi</th>
                                    <td>{{ $kegiatan->lokasi ?? '-' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    @if($kegiatan->galeri->count() > 0)
                        <div class="mt-3">
                            <h5>Galeri Kegiatan</h5>
                            <div class="row">
                                @foreach($kegiatan->galeri as $galeri)
                                    <div class="col-md-3 mb-3">
                                        @if($galeri->tipe == 'image')
                                            <img src="{{ asset('storage/' . $galeri->file) }}" alt="Galeri" class="img-fluid rounded">
                                        @elseif($galeri->tipe == 'video')
                                            <video controls class="img-fluid rounded">
                                                <source src="{{ asset('storage/' . $galeri->file) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @endif
                                        <p class="mt-1">{{ $galeri->keterangan ?? '' }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <div class="mt-3">
                        <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('kegiatan.edit', $kegiatan->id) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
