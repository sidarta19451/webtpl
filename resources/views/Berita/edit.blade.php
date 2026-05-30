@extends('layouts.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-center">Update Data Berita</h6>

<div class = "container mt-4">
    <form action="{{ route('berita.update', $berita) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required value="{{ $berita->judul }}">
        </div>
        <div class="mb-3">
            <label>Isi</label>
            <input type="text" name="isi" class="form-control" required value="{{ $berita->isi }}">
        </div>
        <div class="mb-3">
            <label>Foto</label>
            @if($berita->foto)
                <img src="{{ asset('storage/' .$berita->foto) }}" width="80"><br>
            @endif
            <input type="file" name="foto" class="form-control">
        </div>
        <div class="mb-3">
            <label>Penulis</label>
            <select name="penulis" class="form-control" required>
                <option value="">Pilih Penulis</option>
                @foreach($mahasiswa as $mhs)
                    <option value="{{ $mhs->nama }} - {{ $mhs->nim }} - (Mahasiswa)" {{ $berita->penulis == $mhs->nama . ' - ' . $mhs->nim . ' - (Mahasiswa)' ? 'selected' : '' }}>{{ $mhs->nama }} - {{ $mhs->nim }} - (Mahasiswa)</option>
                @endforeach
                @foreach($dosen as $dsn)
                    <option value="{{ $dsn->nama }} - {{ $dsn->nidn }} - ({{ $dsn->jabatan }})" {{ $berita->penulis == $dsn->nama . ' - ' . $dsn->nidn . ' - (' . $dsn->jabatan . ')' ? 'selected' : '' }}>{{ $dsn->nama }} - {{ $dsn->nidn }} - ({{ $dsn->jabatan }})</option>
                @endforeach
                @foreach($admin as $adm)
                    <option value="{{ $adm->nama }} - {{ $adm->bagian }}" {{ $berita->penulis == $adm->nama . ' - ' . $adm->bagian ? 'selected' : '' }}>{{ $adm->nama }} - {{ $adm->bagian }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required value="{{ $berita->tanggal }}">
        </div>
        
        <button class="btn btn-success">Update</button>
        <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>


    </form>
</div>
</div>

@endsection