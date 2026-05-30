@extends('layouts.app');

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-center">Update Data Mahasiswa</h6>

<div class = "container mt-4">
    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf $@method('PUT')
        <div class="mb-3">
            <label>NIM</label>
            <input type="text" name="nim" class="form-control" required value={{ $mahasiswa->nim }}>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required value={{ $mahasiswa->email }}>
        </div>
        <div class="mb-3">
            <label>Jurusan</label>
            <input type="text" name="jurusan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Angkatan</label>
            <input type="text" name="angkatan" class="form-control" required value="{{ $mahasiswa->angkatan }}">
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="belum" {{ $mahasiswa->status === 'belum' ? 'selected' : '' }}>Belum Lulus</option>
                <option value="lulus" {{ $mahasiswa->status === 'lulus' ? 'selected' : '' }}>Lulus</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Foto</label>
            @if($mahasiswa->foto)
                <img src="{{ asset('storage/' .$mahasiswa->foto) }}" width="80"><br>
            @endif
            <input type="file" name="foto" class="form-control">
        </div>
        <button class="btn btn-success">Update</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>


    </form>
</div>
</div>

@endsection