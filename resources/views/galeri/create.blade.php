@extends('layouts.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-center">Tambah Data Galeri</h6>

<div class = "container mt-4">
    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Kegiatan</label>
            <select name="kegiatan_id" class="form-control" required>
                <option value="">Pilih Kegiatan</option>
                @foreach($kegiatan as $kgt)
                    <option value="{{ $kgt->id }}">{{ $kgt->judul }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>File</label>
            <input type="file" name="file" class="form-control" accept="image/*,video/*" required>
        </div>
        <div class="mb-3">
            <label>Tipe</label>
            <select name="tipe" class="form-control" required>
                <option value="image">Image</option>
                <option value="video">Video</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Kembali</a>


    </form>
</div>
</div>

@endsection
