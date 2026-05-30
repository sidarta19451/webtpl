@extends('layouts.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-center">Tambah Data Berita</h6>

<div class = "container mt-4">
    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Isi</label>
            <input type="text" name="isi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>
        <div class="mb-3">
            <label>Penulis</label>
            <select name="penulis" class="form-control" required>
                <option value="">Pilih Penulis</option>
                @foreach($mahasiswa as $mhs)
                    <option value="{{ $mhs->nama }} - {{ $mhs->nim }} - (Mahasiswa)">{{ $mhs->nama }} - {{ $mhs->nim }} - (Mahasiswa)</option>
                @endforeach
                @foreach($dosen as $dsn)
                    <option value="{{ $dsn->nama }} - {{ $dsn->nidn }} - ({{ $dsn->jabatan }})">{{ $dsn->nama }} - {{ $dsn->nidn }} - ({{ $dsn->jabatan }})</option>
                @endforeach
                @foreach($admin as $adm)
                    <option value="{{ $adm->nama }} - {{ $adm->bagian }}">{{ $adm->nama }} - {{ $adm->bagian }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>


    </form>
</div>
</div>

@endsection