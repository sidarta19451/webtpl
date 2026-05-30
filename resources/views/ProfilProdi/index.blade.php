@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Manajemen Data Profil Prodi</h6>
    </div>

 <div class="card-body">
    <a href = "{{ route('profil_prodi.create') }}" class="btn btn-primary">Tambah Data</a>
    @if (session('success'))
    <div class="alert alert-success">{{session('success')}}</div>

    @endif
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="table-light">
        <tr>
            <th>No.</th>
            <th>Nama Prodi</th>
            <th>Visi</th>
            <th>Misi</th>
            <th>Deskripsi</th>
            <th>Akreditasi</th>
            <th>Logo</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($profil_prodi as $pp)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pp->nama_prodi }}</td>
                <td>{{ Str::limit($pp->visi, 50) ?? '-' }}</td>
                <td>{{ Str::limit($pp->misi, 50) ?? '-' }}</td>
                <td>{{ Str::limit($pp->deskripsi, 50) ?? '-' }}</td>
                <td>{{ $pp->akreditasi ?? '-' }}</td>
                <td>
                    @if ($pp->logo)
                    <img src="{{ asset('storage/'.$pp->logo) }}" width="70px">
                    @endif
                </td>
                <td>
                    <a href="{{ route('profil_prodi.show', $pp->id) }}" class="btn btn-sm btn-info mb-1">
                        <i class="fas fa-eye"></i>Detail</a>
                    <a href="{{ route('profil_prodi.edit', $pp->id) }}" class="btn btn-sm btn-warning mb-1">
                        <i class="fas fa-edit"></i>Ubah</a>
                    <form action="{{ route('profil_prodi.destroy', $pp->id) }}" method="POST" class="d-Inline"
                    onsubmit="return confirm('Yakin Ingin Menghapus Data ini?')">
                    @csrf
                    @method('Delete')
                    <button type='submit' class="btn btn-sm btn-danger mb-1">
                        <i class="fas fa-trash"></i>Hapus</button> </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">Belum ada Data Profil Prodi </td>
            </tr>
        @endforelse
    </tbody>
    </table>
    </div>
</div>
 </div>


@endsection
