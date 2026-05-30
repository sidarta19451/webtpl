@extends('layouts.app');

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-center">Update Data Keuangan</h6>

<div class = "container mt-4">
    <form action="{{ route('keuangan.update', $keuangan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Sub Kategori</label>
            <select name="sub_kategori" class="form-control" required>
                <option value="biaya kuliah" {{ $keuangan->sub_kategori == 'biaya kuliah' ? 'selected' : '' }}>Biaya Kuliah</option>
                <option value="beasiswa" {{ $keuangan->sub_kategori == 'beasiswa' ? 'selected' : '' }}>Beasiswa</option>
                <option value="denda keterlambatan" {{ $keuangan->sub_kategori == 'denda keterlambatan' ? 'selected' : '' }}>Denda Keterlambatan</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required value="{{ $keuangan->judul }}">
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4">{{ $keuangan->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label>File (PDF, DOC, DOCX, JPG, JPEG, PNG)</label>
            <input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
            @if($keuangan->file_path)
                <small>File saat ini: <a href="{{ asset('storage/' . $keuangan->file_path) }}" target="_blank">{{ basename($keuangan->file_path) }}</a></small>
            @endif
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('keuangan.index') }}" class="btn btn-secondary">Kembali</a>


    </form>
</div>
</div>

@endsection
