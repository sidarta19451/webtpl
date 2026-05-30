@extends('layouts.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-center">Update Data Profil Prodi</h6>

<div class = "container mt-4">
    <form action="{{ route('profil_prodi.update', $profil_prodi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama Prodi</label>
            <input type="text" name="nama_prodi" class="form-control" required value="{{ $profil_prodi->nama_prodi }}">
        </div>
        <div class="mb-3">
            <label>Visi</label>
            <textarea name="visi" class="form-control" rows="3">{{ $profil_prodi->visi }}</textarea>
        </div>
        <div class="mb-3">
            <label>Misi</label>
            <textarea name="misi" class="form-control" rows="3">{{ $profil_prodi->misi }}</textarea>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3">{{ $profil_prodi->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label>Akreditasi</label>
            <input type="text" name="akreditasi" class="form-control" value="{{ $profil_prodi->akreditasi }}">
        </div>
        <div class="mb-3">
            <label>Logo</label>
            @if($profil_prodi->logo)
                <img src="{{ asset('storage/' .$profil_prodi->logo) }}" width="80"><br>
            @endif
            <input type="file" name="logo" class="form-control">
        </div>
        <div class="mb-3">
            <label>Kontak Email</label>
            <input type="email" name="kontak_email" class="form-control" value="{{ $profil_prodi->kontak_email }}">
        </div>
        <div class="mb-3">
            <label>Kontak Telepon</label>
            <input type="text" name="kontak_telepon" class="form-control" value="{{ $profil_prodi->kontak_telepon }}">
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" rows="3">{{ $profil_prodi->alamat }}</textarea>
        </div>
        <button class="btn btn-success">Update</button>
        <a href="{{ route('profil_prodi.index') }}" class="btn btn-secondary">Kembali</a>


    </form>
</div>
</div>

@endsection
