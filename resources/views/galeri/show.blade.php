@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Detail Galeri</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if($galeri->file)
                                @if($galeri->tipe == 'image')
                                    <img src="{{ asset('storage/' . $galeri->file) }}" alt="Galeri" class="img-fluid rounded">
                                @elseif($galeri->tipe == 'video')
                                    <video controls class="img-fluid rounded">
                                        <source src="{{ asset('storage/' . $galeri->file) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @endif
                            @else
                                <img src="{{ asset('template/img/undraw_posting_photo.svg') }}" alt="Default Galeri" class="img-fluid rounded">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Kegiatan</th>
                                    <td>{{ $galeri->kegiatan->judul ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Tipe</th>
                                    <td>{{ $galeri->tipe }}</td>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <td>{{ $galeri->keterangan ?? '-' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('galeri.edit', $galeri->id) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
