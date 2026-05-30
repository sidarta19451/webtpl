@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Detail Profil Prodi</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if($profil_prodi->logo)
                                <img src="{{ asset('storage/' . $profil_prodi->logo) }}" alt="Logo Prodi" class="img-fluid rounded">
                            @else
                                <img src="{{ asset('template/img/undraw_profile.svg') }}" alt="Default Logo" class="img-fluid rounded">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Nama Prodi</th>
                                    <td>{{ $profil_prodi->nama_prodi }}</td>
                                </tr>
                                <tr>
                                    <th>Visi</th>
                                    <td>{{ $profil_prodi->visi }}</td>
                                </tr>
                                <tr>
                                    <th>Misi</th>
                                    <td>{{ $profil_prodi->misi }}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>{{ $profil_prodi->deskripsi }}</td>
                                </tr>
                                <tr>
                                    <th>Akreditasi</th>
                                    <td>{{ $profil_prodi->akreditasi }}</td>
                                </tr>
                                <tr>
                                    <th>Kontak Email</th>
                                    <td>{{ $profil_prodi->kontak_email }}</td>
                                </tr>
                                <tr>
                                    <th>Kontak Telepon</th>
                                    <td>{{ $profil_prodi->kontak_telepon }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $profil_prodi->alamat }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('profil_prodi.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('profil_prodi.edit', $profil_prodi->id) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
