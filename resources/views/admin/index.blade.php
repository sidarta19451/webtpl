@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Manajemen Data Admin</h6>
    </div>

 <div class="card-body">
    <a href = "{{ route('admin.create') }}" class="btn btn-primary">Tambah Data</a>
    @if (session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="table-light">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Bagian</th>
            <th>Email</th>
            <th>No. Telepon</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($admin as $admin)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $admin->nama }}</td>
                <td>{{ $admin->bagian }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->no_tlp }}</td>
                <td>
                    @if ($admin->foto)
                        <img src="{{ asset('storage/' . $admin->foto) }}" width="50px">
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.show', $admin->id) }}" class="btn btn-sm btn-info mb-1">
                        <i class="fas fa-eye"></i>Detail</a>
                    <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-sm btn-warning mb-1">
                        <i class="fas fa-edit"></i>Ubah</a>
                    <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" class="d-Inline"
                    onsubmit="return confirm('Yakin Ingin Menghapus Data ini?')">
                    @csrf
                    @method('Delete')
                    <button type='submit' class="btn btn-sm btn-danger mb-1">
                        <i class="fas fa-trash"></i>Hapus</button> </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada Data ADMIN </td>
            </tr>
        @endforelse
    </tbody>
    </table>
    </div>
</div>
 </div>

@endsection
