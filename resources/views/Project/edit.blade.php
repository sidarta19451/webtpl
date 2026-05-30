@extends('layouts.app')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-center">Update Data Project</h6>

<div class = "container mt-4">
    <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required value="{{ $project->nama }}">
        </div>
        <div class="mb-3">
            <label>Jurusan</label>
            <input type="text" name="jurusan" class="form-control" required value="{{ $project->jurusan }}">
        </div>
        <div class="mb-3">
            <label>NIM</label>
            <input type="text" name="nim" class="form-control" value="{{ $project->nim }}">
        </div>
        <div class="mb-3">
            <label>Foto</label>
            @if($project->foto)
                <img src="{{ asset('storage/' .$project->foto) }}" width="80"><br>
            @endif
            <input type="file" name="foto" class="form-control">
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required value="{{ $project->tanggal }}">
        </div>
        <div class="mb-3">
            <label>Link</label>
            <input type="url" name="link" class="form-control" placeholder="https://example.com" value="{{ $project->link }}">
        </div>
        <button class="btn btn-success">Update</button>
        <a href="{{ route('project.index') }}" class="btn btn-secondary">Kembali</a>


    </form>
</div>
</div>

@endsection
