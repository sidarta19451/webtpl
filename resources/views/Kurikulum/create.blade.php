@extends('layouts.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-center">Tambah Data Mata Kuliah</h6>

<div class = "container mt-4">
    <form action="{{ route('kurikulum.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Kode Matkul</label>
            <input type="text" name="kode_matkul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama Matkul</label>
            <input type="text" name="nama_matkul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Semester</label>
            <input type="number" name="semester" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>SKS</label>
            <input type="number" name="sks" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" required>
        </div>
        
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('kurikulum.index') }}" class="btn btn-secondary">Kembali</a>


    </form>
</div>
</div>

@endsection