@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Manajemen Data Berita</h6>
    </div>

 <div class="card-body">
    <a href = "{{ route('berita.create') }}" class="btn btn-primary">Tambah Data</a>
    @if (session('status'))
    <div class="alert alert-success">{{session('success')}}</div>        
        
    @endif
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="table-light">
        <tr>
            <th>No.</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Foto</th>
            <th>Penulis</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($berita as $brt)                          
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $brt->judul }}</td>
                <td>{{ $brt->isi }}</td>
                <td>
                    @if ($brt->foto)
                    <img src="{{ asset('storage/'.$brt->foto) }}" width="70px">
                    @endif
                </td>
                <td>{{ $brt->penulis }}</td>
                <td>{{ $brt->tanggal }}</td>
                
                <td>
                    <a href="{{ route('berita.show', $brt->id) }}" class="btn btn-sm btn-info mb-1">
                        <i class="fas fa-eye"></i>Detail</a>
                    <a href="{{ route('berita.edit', $brt->id) }}" class="btn btn-sm btn-warning mb-1">
                        <i class="fas fa-edit"></i>Ubah</a>
                    <form action="{{ route('berita.destroy', $brt->id) }}" method="POST" class="d-Inline"
                    onsubmit="return confirm('Yakin Ingin Menghapus Data ini?')">
                    @csrf
                    @method('Delete')
                    <button type='submit' class="btn btn-sm btn-danger mb-1">
                        <i class="fas fa-trash"></i>Hapus</button> </form>
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada Data Berita </td>
            </tr>
        @endforelse
        
    </tbody>
    </table>
    </div>
</div>
 </div>
@endsection