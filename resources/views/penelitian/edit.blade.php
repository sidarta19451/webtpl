@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Penelitian</h1>
    <form action="{{ route('penelitian.update', $penelitian->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $penelitian->judul }}" required>
        </div>
        <div class="form-group">
            <label for="nama_ketua">Nama Ketua (NIDN atau NIM)</label>
            <select class="form-control" id="nama_ketua" name="nama_ketua" required>
                <option value="">Pilih Ketua</option>
                @foreach($dosens as $d)
                    <option value="{{ $d->nidn }}" {{ $d->nidn == $penelitian->nama_ketua ? 'selected' : '' }}>{{ $d->nama }} - {{ $d->nidn }} - ({{ $d->jabatan }})</option>
                @endforeach
                @foreach($mahasiswas as $m)
                    <option value="{{ $m->nim }}" {{ $m->nim == $penelitian->nama_ketua ? 'selected' : '' }}>{{ $m->nama }} - {{ $m->nim }} - (Mahasiswa)</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Nama Anggota (NIDN atau NIM)</label>
            <div id="nama-anggota-container">
                @if($penelitian->nama_anggota)
                    @foreach($penelitian->nama_anggota as $index => $nidn_nim)
                        <div class="nama-anggota-item">
                            <select class="form-control" name="nama_anggota[{{ $index }}]">
                                <option value="">Pilih Anggota</option>
                                @foreach($dosens as $d)
                                    <option value="{{ $d->nidn }}" {{ $d->nidn == $nidn_nim ? 'selected' : '' }}>{{ $d->nama }} - {{ $d->nidn }} - ({{ $d->jabatan }})</option>
                                @endforeach
                                @foreach($mahasiswas as $m)
                                    <option value="{{ $m->nim }}" {{ $m->nim == $nidn_nim ? 'selected' : '' }}>{{ $m->nama }} - {{ $m->nim }} - (Mahasiswa)</option>
                                @endforeach
                            </select>
                            <button type="button" class="btn btn-danger remove-nama-anggota">Hapus</button>
                        </div>
                    @endforeach
                @endif
            </div>
            <button type="button" class="btn btn-secondary" id="add-nama-anggota">Tambah Nama Anggota</button>
        </div>
        <div class="form-group">
            <label for="sumber_dana">Sumber Dana</label>
            <input type="text" class="form-control" id="sumber_dana" name="sumber_dana" value="{{ $penelitian->sumber_dana }}" required>
        </div>
        <div class="form-group">
            <label for="biaya">Biaya</label>
            <input type="number" class="form-control" id="biaya" name="biaya" value="{{ $penelitian->biaya }}" required>
        </div>
        <div class="form-group">
            <label for="jangka_waktu">Jangka Waktu (bulan)</label>
            <input type="number" class="form-control" id="jangka_waktu" name="jangka_waktu" value="{{ $penelitian->jangka_waktu }}" required>
        </div>
        <div class="form-group">
            <label for="luaran_utama">Luaran Utama</label>
            <textarea class="form-control" id="luaran_utama" name="luaran_utama" required>{{ $penelitian->luaran_utama }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<script>
document.getElementById('add-nama-anggota').addEventListener('click', function() {
    const container = document.getElementById('nama-anggota-container');
    const index = container.children.length;
    const div = document.createElement('div');
    div.className = 'nama-anggota-item';
    div.innerHTML = `
        <select class="form-control" name="nama_anggota[${index}]">
            <option value="">Pilih Anggota</option>
            @foreach($dosens as $d)
                <option value="{{ $d->nidn }}">{{ $d->nama }} - {{ $d->nidn }} - ({{ $d->jabatan }})</option>
            @endforeach
            @foreach($mahasiswas as $m)
                <option value="{{ $m->nim }}">{{ $m->nama }} - {{ $m->nim }} - (Mahasiswa)</option>
            @endforeach
        </select>
        <button type="button" class="btn btn-danger remove-nama-anggota">Hapus</button>
    `;
    container.appendChild(div);
});

document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-nama-anggota')) {
        e.target.parentElement.remove();
    }
});
</script>
@endsection
