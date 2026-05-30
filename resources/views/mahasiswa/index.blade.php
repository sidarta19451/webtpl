@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Manajemen Data Mahasiswa</h6>
    </div>

 <div class="card-body">
    <a href = "{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambah Data</a>
    @if (session('status'))
    <div class="alert alert-success">{{session('success')}}</div>        
        
    @endif
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="table-light">
        <tr>
            <th>No.</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Angkatan</th>
            <th>Status</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($mahasiswa as $mhs)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mhs->nim }}</td>
                <td>{{ $mhs->nama }}</td>
                <td>{{ $mhs->email }}</td>
                <td>{{ $mhs->jurusan }}</td>
                <td>{{ $mhs->angkatan ?? '-'}}</td>
                <td>
                    <span class="badge badge-{{ $mhs->status === 'lulus' ? 'success' : 'warning' }}">
                        {{ ucfirst($mhs->status) }}
                    </span>
                </td>
                <td>
                    @if ($mhs->foto)
                    <img src="{{ asset('storage/'.$mhs->foto) }}" width="70px">
                    @endif
                </td>
                <td>
                    <form action="{{ route('mahasiswa.toggleStatus', $mhs->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-secondary mb-1">
                            <i class="fas fa-exchange-alt"></i> Ubah Status
                        </button>
                    </form>
                    <a href="{{ route('mahasiswa.show', $mhs->id) }}" class="btn btn-sm btn-info mb-1">
                        <i class="fas fa-eye"></i>Detail</a>
                    <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-sm btn-warning mb-1">
                        <i class="fas fa-edit"></i>Ubah</a>
                    <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" class="d-Inline"
                    onsubmit="return confirm('Yakin Ingin Menghapus Data ini?')">
                    @csrf
                    @method('Delete')
                    <button type='submit' class="btn btn-sm btn-danger mb-1">
                        <i class="fas fa-trash"></i>Hapus</button> </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center">Belum ada Data Mahasiswa </td>
            </tr>
        @endforelse
    </tbody>
    </table>
    </div>
</div>
 </div>

@endsection