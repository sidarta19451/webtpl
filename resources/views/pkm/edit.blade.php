@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Edit Data PKM</h6>
    </div>

    <div class="card-body">
        <form action="{{ route('pkm.update', $pkm->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Judul PKM</label>
                        <input type="text" name="judul_pkm" class="form-control" value="{{ $pkm->judul_pkm }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Nama Ketua (NIDN atau NIM)</label>
                        <select name="nama_ketua" class="form-control" required>
                            <option value="">Pilih Ketua</option>
                            @foreach(\App\Models\Dosen::all() as $d)
                                <option value="{{ $d->nidn }}" {{ $d->nidn == $pkm->nama_ketua ? 'selected' : '' }}>{{ $d->nama }} - {{ $d->nidn }} - ({{ $d->jabatan }})</option>
                            @endforeach
                            @foreach(\App\Models\Mahasiswa::all() as $m)
                                <option value="{{ $m->nim }}" {{ $m->nim == $pkm->nama_ketua ? 'selected' : '' }}>{{ $m->nama }} - {{ $m->nim }} - (Mahasiswa)</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Mitra</label>
                        <input type="text" name="mitra" class="form-control" value="{{ $pkm->mitra }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" value="{{ $pkm->lokasi }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Sumber Dana</label>
                        <input type="text" name="sumber_dana" class="form-control" value="{{ $pkm->sumber_dana }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Biaya</label>
                        <input type="number" name="biaya" class="form-control" value="{{ $pkm->biaya }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Luaran Wajib</label>
                        <textarea name="luaran_wajib" class="form-control" rows="3" required>{{ $pkm->luaran_wajib }}</textarea>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label>Anggota PKM (NIDN atau NIM)</label>
                <div id="anggota-container">
                    @if($pkm->anggota_formatted)
                        @foreach($pkm->anggota_formatted as $index => $nidn_nim)
                            <div class="anggota-item mb-2">
                                <div class="row">
                                    <div class="col-md-10">
                                        <select name="nama_anggota[{{ $index }}]" class="form-control">
                                            <option value="">Pilih Anggota</option>
                                            @foreach(\App\Models\Dosen::all() as $d)
                                                <option value="{{ $d->nidn }}" {{ $d->nidn == $nidn_nim ? 'selected' : '' }}>{{ $d->nama }} - {{ $d->nidn }} - ({{ $d->jabatan }})</option>
                                            @endforeach
                                            @foreach(\App\Models\Mahasiswa::all() as $m)
                                                <option value="{{ $m->nim }}" {{ $m->nim == $nidn_nim ? 'selected' : '' }}>{{ $m->nama }} - {{ $m->nim }} - (Mahasiswa)</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger remove-anggota">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <button type="button" id="add-anggota" class="btn btn-secondary">Tambah Anggota</button>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('pkm.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<script>
document.getElementById('add-anggota').addEventListener('click', function() {
    const container = document.getElementById('anggota-container');
    const index = container.children.length;
    const div = document.createElement('div');
    div.className = 'anggota-item mb-2';
    div.innerHTML = `
        <div class="row">
            <div class="col-md-10">
                <select name="nama_anggota[${index}]" class="form-control">
                    <option value="">Pilih Anggota</option>
                    @foreach(\App\Models\Dosen::all() as $d)
                        <option value="{{ $d->nidn }}">{{ $d->nama }} - {{ $d->nidn }} - ({{ $d->jabatan }})</option>
                    @endforeach
                    @foreach(\App\Models\Mahasiswa::all() as $m)
                        <option value="{{ $m->nim }}">{{ $m->nama }} - {{ $m->nim }} - (Mahasiswa)</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-anggota">Hapus</button>
            </div>
        </div>
    `;
    container.appendChild(div);
});

document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-anggota')) {
        e.target.closest('.anggota-item').remove();
    }
});
</script>
@endsection
