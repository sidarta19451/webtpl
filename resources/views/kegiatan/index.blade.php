@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Manajemen Data Kegiatan</h6>
    </div>

 <div class="card-body">
    <a href = "{{ route('kegiatan.create') }}" class="btn btn-primary">Tambah Data</a>
    @if (session('success'))
    <div class="alert alert-success">{{session('success')}}</div>

    @endif
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="table-light">
        <tr>
            <th>No.</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Tanggal</th>
            <th>Lokasi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($kegiatan as $kgt)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kgt->judul }}</td>
                <td>{{ $kgt->deskripsi ?? '-' }}</td>
                <td>{{ $kgt->tanggal ? \Carbon\Carbon::parse($kgt->tanggal)->format('d M Y') : '-' }}</td>
                <td>{{ $kgt->lokasi ?? '-' }}</td>
                <td>
                    <a href="{{ route('kegiatan.show', $kgt->id) }}" class="btn btn-sm btn-info mb-1">
                        <i class="fas fa-eye"></i>Detail</a>
                    <a href="{{ route('kegiatan.edit', $kgt->id) }}" class="btn btn-sm btn-warning mb-1">
                        <i class="fas fa-edit"></i>Ubah</a>
                    <form action="{{ route('kegiatan.destroy', $kgt->id) }}" method="POST" class="d-Inline"
                    onsubmit="return confirm('Yakin Ingin Menghapus Data ini?')">
                    @csrf
                    @method('Delete')
                    <button type='submit' class="btn btn-sm btn-danger mb-1">
                        <i class="fas fa-trash"></i>Hapus</button> </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada Data KEGIATAN </td>
            </tr>
        @endforelse
    </tbody>
    </table>
    </div>
</div>
 </div>


@endsection
