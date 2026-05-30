@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Manajemen Data Dosen</h6>
    </div>

 <div class="card-body">
    <a href = "{{ route('dosen.create') }}" class="btn btn-primary">Tambah Data</a>
    @if (session('status'))
    <div class="alert alert-success">{{session('success')}}</div>        
        
    @endif
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="table-light">
        <tr>
            <th>No.</th>
            <th>NIDN</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Jabatan</th>
            <th>Foto</th>
            <th>Links</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($dosen as $dsn)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dsn->nidn }}</td>
                <td>{{ $dsn->nama }}</td>
                <td>{{ $dsn->email }}</td>
                <td>{{ $dsn->jurusan }}</td>
                <td>{{ $dsn->jabatan ?? '-'}}</td>
                <td>
                    @if ($dsn->foto)
                    <img src="{{ asset('storage/'.$dsn->foto) }}" width="70px">
                    @endif
                </td>
                <td>
                    @if($dsn->link_google_scholar)
                        <a href="{{ $dsn->link_google_scholar }}" target="_blank" class="btn btn-sm btn-primary mb-1">Google Scholar</a>
                    @endif
                    @if($dsn->link_sinta)
                        <a href="{{ $dsn->link_sinta }}" target="_blank" class="btn btn-sm btn-success mb-1">Sinta</a>
                    @endif
                    @if($dsn->link_scopus)
                        <a href="{{ $dsn->link_scopus }}" target="_blank" class="btn btn-sm btn-info mb-1">Scopus</a>
                    @endif
                    @if($dsn->link_penelitian && is_array($dsn->link_penelitian))
                        @foreach($dsn->link_penelitian as $link)
                            <a href="{{ $link }}" target="_blank" class="btn btn-sm btn-warning mb-1">Penelitian {{ $loop->iteration }}</a>
                        @endforeach
                    @endif
                </td>
                <td>
                    <a href="{{ route('dosen.show', $dsn->id) }}" class="btn btn-sm btn-info mb-1">
                        <i class="fas fa-eye"></i>Detail</a>
                    <a href="{{ route('dosen.edit', $dsn->id) }}" class="btn btn-sm btn-warning mb-1">
                        <i class="fas fa-edit"></i>Ubah</a>
                    <form action="{{ route('dosen.destroy', $dsn->id) }}" method="POST" class="d-Inline"
                    onsubmit="return confirm('Yakin Ingin Menghapus Data ini?')">
                    @csrf
                    @method('Delete')
                    <button type='submit' class="btn btn-sm btn-danger mb-1">
                        <i class="fas fa-trash"></i>Hapus</button> </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center">Belum ada Data DOSEN </td>
            </tr>
        @endforelse
    </tbody>
    </table>
    </div>
</div>
 </div>
@endsection