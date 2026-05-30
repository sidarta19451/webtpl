@extends('layouts.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-center">Update Data Kemahasiswaan</h6>

<div class = "container mt-4">
    <form action="{{ route('kemahasiswaan.update', $kemahasiswaan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Sub Kategori</label>
            <select name="sub_kategori" class="form-control" required>
                <option value="tata tertib" {{ $kemahasiswaan->sub_kategori == 'tata tertib' ? 'selected' : '' }}>Tata Tertib</option>
                <option value="kode etik" {{ $kemahasiswaan->sub_kategori == 'kode etik' ? 'selected' : '' }}>Kode Etik</option>
                <option value="kegiatan" {{ $kemahasiswaan->sub_kategori == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required value="{{ $kemahasiswaan->judul }}">
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4">{{ $kemahasiswaan->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label>File (PDF)</label>
            <input type="file" name="file" class="form-control" accept=".pdf">
            @if($kemahasiswaan->file_path)
                <small>File saat ini: <a href="{{ asset('storage/' . $kemahasiswaan->file_path) }}" target="_blank">{{ basename($kemahasiswaan->file_path) }}</a></small>
            @endif
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('kemahasiswaan.index') }}" class="btn btn-secondary">Kembali</a>


    </form>
</div>
</div>

@endsection
