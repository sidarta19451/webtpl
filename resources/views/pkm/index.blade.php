@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manajemen Data PKM</h6>
    </div>

    <div class="card-body">
        <a href="{{ route('pkm.create') }}" class="btn btn-primary">Tambah Data</a>
        @if (session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif
        <div class="table-responsive mt-3">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-light">
                    <tr>
                        <th>No.</th>
                        <th>Judul PKM</th>
                        <th>Ketua (NIDN)</th>
                        <th>Anggota</th>
                        <th>Mitra</th>
                        <th>Lokasi</th>
                        <th>Sumber Dana</th>
                        <th>Biaya</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pkms as $pkm)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pkm->judul_pkm }}</td>
                            <td>{{ $pkm->nama_ketua_formatted }}</td>
                            <td>
                                @foreach($pkm->anggota_formatted as $anggota)
                                    {{ $anggota }}<br>
                                @endforeach
                            </td>
                            <td>{{ $pkm->mitra }}</td>
                            <td>{{ $pkm->lokasi }}</td>
                            <td>{{ $pkm->sumber_dana }}</td>
                            <td>Rp {{ number_format($pkm->biaya, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('pkm.show', $pkm->id) }}" class="btn btn-sm btn-info mb-1">
                                    <i class="fas fa-eye"></i> Detail</a>
                                <a href="{{ route('pkm.edit', $pkm->id) }}" class="btn btn-sm btn-warning mb-1">
                                    <i class="fas fa-edit"></i> Ubah</a>
                                <form action="{{ route('pkm.destroy', $pkm->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger mb-1">
                                        <i class="fas fa-trash"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Belum ada data PKM</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
