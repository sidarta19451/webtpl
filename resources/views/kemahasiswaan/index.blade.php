@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Manajemen Data Kemahasiswaan</h6>
    </div>

 <div class="card-body">
    <a href = "{{ route('kemahasiswaan.create') }}" class="btn btn-primary">Tambah Data</a>
    @if (session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="table-light">
        <tr>
            <th>No.</th>
            <th>Sub Kategori</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>File</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($kemahasiswaan as $k)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $k->sub_kategori }}</td>
                <td>{{ $k->judul }}</td>
                <td>{{ $k->deskripsi }}</td>
                <td>
                    @if($k->file_path)
                        <a href="{{ asset('storage/' . $k->file_path) }}" target="_blank" class="btn btn-sm btn-info">Lihat File</a>
                    @else
                        Tidak ada file
                    @endif
                </td>
                <td>
                    <a href="{{ route('kemahasiswaan.show', $k->id) }}" class="btn btn-sm btn-info mb-1">
                        <i class="fas fa-eye"></i>Detail</a>
                    <a href="{{ route('kemahasiswaan.edit', $k->id) }}" class="btn btn-sm btn-warning mb-1">
                        <i class="fas fa-edit"></i>Ubah</a>
                    <form action="{{ route('kemahasiswaan.destroy', $k->id) }}" method="POST" class="d-Inline"
                    onsubmit="return confirm('Yakin Ingin Menghapus Data ini?')">
                    @csrf
                    @method('Delete')
                    <button type='submit' class="btn btn-sm btn-danger mb-1">
                        <i class="fas fa-trash"></i>Hapus</button> </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada Data Kemahasiswaan </td>
            </tr>
        @endforelse

    </tbody>
    </table>
    </div>
</div>
 </div>
@endsection
