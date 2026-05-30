@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Manajemen Data Agenda</h6>
    </div>

 <div class="card-body">
    <a href = "{{ route('agenda.create') }}" class="btn btn-primary">Tambah Data</a>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="table-light">
        <tr>
            <th>No</th>
            <th>Kegiatan</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($agenda as $agd)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $agd->kegiatan_display }}</td>
            <td>{{ $agd->tanggal_mulai }}</td>
            <td>{{ $agd->tanggal_selesai }}</td>
            <td>
                @if($agd->foto)
                    <img src="{{ asset('storage/' . $agd->foto) }}" alt="Foto" width="50" height="50">
                @else
                    No Image
                @endif
            </td>
            <td>
                <a href="{{ route('agenda.show', $agd->id) }}" class="btn btn-sm btn-info mb-1">
                    <i class="fas fa-eye"></i>Detail</a>
                <a href="{{ route('agenda.edit', $agd->id) }}" class="btn btn-sm btn-warning mb-1">
                    <i class="fas fa-edit"></i>Ubah</a>
                <form action="{{ route('agenda.destroy', $agd->id) }}" method="POST" class="d-inline"
                onsubmit="return confirm('Yakin Ingin Menghapus Data ini?')">
                @csrf
                @method('DELETE')
                <button type='submit' class="btn btn-sm btn-danger mb-1">
                    <i class="fas fa-trash"></i>Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">Belum ada Data Agenda</td>
        </tr>
        @endforelse
    </tbody>
    </table>
    </div>
</div>
 </div>
@endsection
