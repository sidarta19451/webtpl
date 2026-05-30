@extends('layouts.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-center">Tambah Data Pengumuman</h6>

<div class = "container mt-4">
    <form action="{{ route('pengumuman.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Kegiatan</label>
            <input type="text" name="kegiatan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Waktu</label>
            <input type="time" name="waktu" class="form-control">
        </div>
        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control" required>
        </div>
        
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('pengumuman.index') }}" class="btn btn-secondary">Kembali</a>


    </form>
</div>
</div>

@endsection