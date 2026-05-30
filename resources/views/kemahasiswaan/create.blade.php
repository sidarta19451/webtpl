@extends('layouts.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-center">Tambah Data Kemahasiswaan</h6>

<div class = "container mt-4">
    <form action="{{ route('kemahasiswaan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Sub Kategori</label>
            <select name="sub_kategori" class="form-control" required>
                <option value="">Pilih Sub Kategori</option>
                <option value="tata tertib">Tata Tertib</option>
                <option value="kode etik">Kode Etik</option>
                <option value="kegiatan">Kegiatan</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4"></textarea>
        </div>
        <div class="mb-3">
            <label>File (PDF)</label>
            <input type="file" name="file" class="form-control" accept=".pdf">
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('kemahasiswaan.index') }}" class="btn btn-secondary">Kembali</a>


    </form>
</div>
</div>

@endsection
