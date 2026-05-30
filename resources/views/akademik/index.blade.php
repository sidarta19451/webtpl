@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manajemen Data Akademik</h6>
    </div>

    <div class="card-body">
        <a href="{{ route('akademik.create') }}" class="btn btn-primary">Tambah Data</a>
        @if (session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif
        <div class="table-responsive mt-3">
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
                    @forelse ($akademik as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->sub_kategori }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ Str::limit($item->deskripsi, 50) }}</td>
                            <td>
                                @if($item->file_path)
                                    <a href="{{ Storage::url($item->file_path) }}" target="_blank" class="btn btn-sm btn-info">Lihat File</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('akademik.show', $item->id) }}" class="btn btn-sm btn-info mb-1">
                                    <i class="fas fa-eye"></i> Detail</a>
                                <a href="{{ route('akademik.edit', $item->id) }}" class="btn btn-sm btn-warning mb-1">
                                    <i class="fas fa-edit"></i> Ubah</a>
                                <form action="{{ route('akademik.destroy', $item->id) }}" method="POST" class="d-inline"
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
                            <td colspan="6" class="text-center">Belum ada data Akademik</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
