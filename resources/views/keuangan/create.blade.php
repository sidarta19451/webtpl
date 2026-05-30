@extends('layouts.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-center">Tambah Data Keuangan</h6>

<div class = "container mt-4">
    <form action="{{ route('keuangan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Sub Kategori</label>
            <select name="sub_kategori" class="form-control" required>
                <option value="">Pilih Sub Kategori</option>
                <option value="biaya kuliah">Biaya Kuliah</option>
                <option value="beasiswa">Beasiswa</option>
                <option value="denda keterlambatan">Denda Keterlambatan</option>
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
            <label>File (PDF, DOC, DOCX, JPG, JPEG, PNG)</label>
            <input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('keuangan.index') }}" class="btn btn-secondary">Kembali</a>


    </form>
</div>
</div>

@endsection
