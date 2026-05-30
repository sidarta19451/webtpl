@extends('layouts.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-center">Update Data Kegiatan</h6>

<div class = "container mt-4">
    <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required value="{{ $kegiatan->judul }}">
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $kegiatan->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $kegiatan->tanggal }}">
        </div>
        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="{{ $kegiatan->lokasi }}">
        </div>
        <button class="btn btn-success">Update</button>
        <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">Kembali</a>


    </form>
</div>
</div>

@endsection
