@extends('layouts.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-center">Update Data Pengumuman</h6>

<div class = "container mt-4">
    <form action="{{ route('pengumuman.update', $pengumuman) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Kegiatan</label>
            <input type="text" name="kegiatan" class="form-control" required value="{{ $pengumuman->kegiatan }}">
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required value="{{ $pengumuman->tanggal }}">
        </div>
        <div class="mb-3">
            <label>Waktu</label>
            <input type="time" name="waktu" class="form-control" required value="{{ $pengumuman->waktu }}">
        </div>
        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" required value="{{ $pengumuman->lokasi}}">
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control" required value="{{ $pengumuman->keterangan}}">
        </div>
        
        <button class="btn btn-success">Update</button>
        <a href="{{ route('pengumuman.index') }}" class="btn btn-secondary">Kembali</a>


    </form>
</div>
</div>

@endsection