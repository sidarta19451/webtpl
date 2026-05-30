@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Manajemen Data Pengumuman</h6>
    </div>

 <div class="card-body">
    <a href = "{{ route('pengumuman.create') }}" class="btn btn-primary">Tambah Data</a>
    @if (session('status'))
    <div class="alert alert-success">{{session('success')}}</div>        
        
    @endif
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="table-light">
        <tr>
            <th>No</th>
            <th>Kegiatan</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Lokasi</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($pengumuman as $pgn)                          
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pgn->kegiatan }}</td>
                <td>{{ $pgn->tanggal }}</td>
                <td>{{ $pgn->waktu }}</td>
                <td>{{ $pgn->lokasi }}</td>
                <td>{{ $pgn->keterangan }}</td>
                
                <td>
                    <a href="{{ route('pengumuman.show', $pgn->id) }}" class="btn btn-sm btn-info mb-1">
                        <i class="fas fa-eye"></i>Detail</a>
                    <a href="{{ route('pengumuman.edit', $pgn->id) }}" class="btn btn-sm btn-warning mb-1">
                        <i class="fas fa-edit"></i>Ubah</a>
                    <form action="{{ route('pengumuman.destroy', $pgn->id) }}" method="POST" class="d-Inline"
                    onsubmit="return confirm('Yakin Ingin Menghapus Data ini?')">
                    @csrf
                    @method('Delete')
                    <button type='submit' class="btn btn-sm btn-danger mb-1">
                        <i class="fas fa-trash"></i>Hapus</button> </form>
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada Data Pengumuman </td>
            </tr>
        @endforelse
        
    </tbody>
    </table>
    </div>
</div>
 </div>
@endsection