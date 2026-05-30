@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Manajemen Data Project</h6>
    </div>

 <div class="card-body">
    <a href = "{{ route('project.create') }}" class="btn btn-primary">Tambah Data</a>
    @if (session('success'))
    <div class="alert alert-success">{{session('success')}}</div>

    @endif
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="table-light">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Jurusan</th>
            {{-- <th>Profesi</th> --}}
            <th>NIM</th>
            <th>Foto</th>
            <th>Tanggal</th>
            <th>Link</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($projects as $project)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $project->nama }}</td>
                <td>{{ $project->jurusan }}</td>
                {{-- <td>{{ $project->profesi }}</td> --}}
                <td>{{ $project->nim ?? '-' }}</td>
                <td>
                    @if ($project->foto)
                    <img src="{{ asset('storage/'.$project->foto) }}" width="70px">
                    @endif
                </td>
                <td>{{ $project->tanggal }}</td>
                <td>
                    @if($project->link)
                        <a href="{{ $project->link }}" target="_blank">Link</a>
                    @else
                        -
                    @endif
                </td>
                <td>
                    <a href="{{ route('project.show', $project->id) }}" class="btn btn-sm btn-info mb-1">
                        <i class="fas fa-eye"></i>Detail</a>
                    <a href="{{ route('project.edit', $project->id) }}" class="btn btn-sm btn-warning mb-1">
                        <i class="fas fa-edit"></i>Ubah</a>
                    <form action="{{ route('project.destroy', $project->id) }}" method="POST" class="d-Inline"
                    onsubmit="return confirm('Yakin Ingin Menghapus Data ini?')">
                    @csrf
                    @method('Delete')
                    <button type='submit' class="btn btn-sm btn-danger mb-1">
                        <i class="fas fa-trash"></i>Hapus</button> </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="10" class="text-center">Belum ada Data PROJECT </td>
            </tr>
        @endforelse
    </tbody>
    </table>
    </div>
</div>
 </div>


@endsection
