@extends('layouts.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-center">Tambah Data Profil Prodi</h6>

<div class = "container mt-4">
    <form action="{{ route('profil_prodi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Nama Prodi</label>
            <input type="text" name="nama_prodi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Visi</label>
            <textarea name="visi" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label>Misi</label>
            <textarea name="misi" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label>Akreditasi</label>
            <input type="text" name="akreditasi" class="form-control">
        </div>
        <div class="mb-3">
            <label>Logo</label>
            <input type="file" name="logo" class="form-control">
        </div>
        <div class="mb-3">
            <label>Kontak Email</label>
            <input type="email" name="kontak_email" class="form-control">
        </div>
        <div class="mb-3">
            <label>Kontak Telepon</label>
            <input type="text" name="kontak_telepon" class="form-control">
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" rows="3"></textarea>
        </div>
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('profil_prodi.index') }}" class="btn btn-secondary">Kembali</a>


    </form>
</div>
</div>

@endsection
