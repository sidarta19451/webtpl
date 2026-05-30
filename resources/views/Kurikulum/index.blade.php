@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Manajemen Data Mata Kuliah</h6>
    </div>

 <div class="card-body">
    <a href = "{{ route('kurikulum.create') }}" class="btn btn-primary">Tambah Data</a>
    @if (session('status'))
    <div class="alert alert-success">{{session('success')}}</div>        
        
    @endif
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="table-light">
        <tr>
            <th>No.</th>
            <th>Kode Matkul</th>
            <th>Nama Matkul</th>
            <th>Semester</th>
            <th>SKS</th>
            <th>Deskripsi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($kurikulum as $krk)                          
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $krk->kode_matkul }}</td>
                <td>{{ $krk->nama_matkul }}</td>
                <td>{{ $krk->semester }}</td>
                <td>{{ $krk->sks }}</td>
                <td>{{ $krk->deskripsi }}</td>
                
                <td>
                    <a href="{{ route('kurikulum.show', $krk->id) }}" class="btn btn-sm btn-info mb-1">
                        <i class="fas fa-eye"></i>Detail</a>
                    <a href="{{ route('kurikulum.edit', $krk->id) }}" class="btn btn-sm btn-warning mb-1">
                        <i class="fas fa-edit"></i>Ubah</a>
                    <form action="{{ route('kurikulum.destroy', $krk->id) }}" method="POST" class="d-Inline"
                    onsubmit="return confirm('Yakin Ingin Menghapus Data ini?')">
                    @csrf
                    @method('Delete')
                    <button type='submit' class="btn btn-sm btn-danger mb-1">
                        <i class="fas fa-trash"></i>Hapus</button> </form>
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada Data Kurikulum </td>
            </tr>
        @endforelse
        
    </tbody>
    </table>
    </div>
</div>
 </div>
@endsection