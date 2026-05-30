@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Penelitian</h1>
    <form action="{{ route('penelitian.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
        </div>
        <div class="form-group">
            <label for="nama_ketua">Nama Ketua (NIDN atau NIM)</label>
            <select class="form-control" id="nama_ketua" name="nama_ketua" required>
                <option value="">Pilih Ketua</option>
                @foreach($dosen as $d)
                    <option value="{{ $d->nidn }}">{{ $d->nama }} - {{ $d->nidn }} - ({{ $d->jabatan }})</option>
                @endforeach
                @foreach($mahasiswa as $m)
                    <option value="{{ $m->nim }}">{{ $m->nama }} - {{ $m->nim }} - (Mahasiswa)</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Nama Anggota (NIDN atau NIM)</label>
            <div id="nama-anggota-container">
                <div class="nama-anggota-item">
                    <select class="form-control" name="nama_anggota[]">
                        <option value="">Pilih Anggota</option>
                        @foreach($dosen as $d)
                            <option value="{{ $d->nidn }}">{{ $d->nama }} - {{ $d->nidn }} - ({{ $d->jabatan }})</option>
                        @endforeach
                        @foreach($mahasiswa as $m)
                            <option value="{{ $m->nim }}">{{ $m->nama }} - {{ $m->nim }} - (Mahasiswa)</option>
                        @endforeach
                    </select>
                    <button type="button" class="btn btn-danger remove-nama-anggota">Hapus</button>
                </div>
            </div>
            <button type="button" class="btn btn-secondary" id="add-nama-anggota">Tambah Nama Anggota</button>
        </div>
        <div class="form-group">
            <label for="sumber_dana">Sumber Dana</label>
            <input type="text" class="form-control" id="sumber_dana" name="sumber_dana" required>
        </div>
        <div class="form-group">
            <label for="biaya">Biaya</label>
            <input type="number" class="form-control" id="biaya" name="biaya" required>
        </div>
        <div class="form-group">
            <label for="jangka_waktu">Jangka Waktu (bulan)</label>
            <input type="number" class="form-control" id="jangka_waktu" name="jangka_waktu" required>
        </div>
        <div class="form-group">
            <label for="luaran_utama">Luaran Utama</label>
            <textarea class="form-control" id="luaran_utama" name="luaran_utama" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
document.getElementById('add-nama-anggota').addEventListener('click', function() {
    const container = document.getElementById('nama-anggota-container');
    const div = document.createElement('div');
    div.className = 'nama-anggota-item';
    div.innerHTML = `
        <select class="form-control" name="nama_anggota[]">
            <option value="">Pilih Anggota</option>
            @foreach($dosen as $d)
                <option value="{{ $d->nidn }}">{{ $d->nama }} - {{ $d->nidn }} - ({{ $d->jabatan }})</option>
            @endforeach
            @foreach($mahasiswa as $m)
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
