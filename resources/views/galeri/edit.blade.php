@extends('layouts.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-center">Update Data Galeri</h6>

<div class = "container mt-4">
    <form action="{{ route('galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Kegiatan</label>
            <select name="kegiatan_id" class="form-control" required>
                <option value="">Pilih Kegiatan</option>
                @foreach($kegiatan as $kgt)
                    <option value="{{ $kgt->id }}" {{ $galeri->kegiatan_id == $kgt->id ? 'selected' : '' }}>{{ $kgt->judul }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>File</label>
            @if($galeri->file)
                @if($galeri->tipe == 'image')
                    <img src="{{ asset('storage/' . $galeri->file) }}" width="80"><br>
                @elseif($galeri->tipe == 'video')
                    <video width="80" controls>
                        <source src="{{ asset('storage/' . $galeri->file) }}" type="video/mp4">
                    </video><br>
                @endif
            @endif
            <input type="file" name="file" class="form-control" accept="image/*,video/*">
        </div>
        <div class="mb-3">
            <label>Tipe</label>
            <select name="tipe" class="form-control" required>
                <option value="image" {{ $galeri->tipe == 'image' ? 'selected' : '' }}>Image</option>
                <option value="video" {{ $galeri->tipe == 'video' ? 'selected' : '' }}>Video</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $galeri->keterangan }}</textarea>
        </div>
        <button class="btn btn-success">Update</button>
        <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Kembali</a>


    </form>
</div>
</div>

@endsection
