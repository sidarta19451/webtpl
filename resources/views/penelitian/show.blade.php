@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Penelitian</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $penelitian->judul }}</h5>
            <p><strong>Nama Ketua:</strong> {{ $penelitian->nama_ketua_formatted }}</p>
            <p><strong>Anggota:</strong></p>
            <ul>
                @foreach($penelitian->anggota_formatted as $anggota)
                    <li>{{ $anggota }}</li>
                @endforeach
            </ul>
            <p><strong>Sumber Dana:</strong> {{ $penelitian->sumber_dana }}</p>
            <p><strong>Biaya:</strong> {{ number_format($penelitian->biaya) }}</p>
            <p><strong>Jangka Waktu:</strong> {{ $penelitian->jangka_waktu }} bulan</p>
            <p><strong>Luaran Utama:</strong> {{ $penelitian->luaran_utama }}</p>
        </div>
    </div>
    <a href="{{ route('penelitian.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
