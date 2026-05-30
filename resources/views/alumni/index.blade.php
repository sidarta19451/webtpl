@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manajemen Data Alumni Teknik Perangkat Lunak</h6>
        <p class="mb-0 small text-muted">Menu Alumni mencakup Kisah Sukses dan Tracer Studi alumni yang telah lulus</p>
    </div>

    <div class="card-body">
        <!-- Tombol untuk menambah data alumni baru -->
        <a href="{{ route('alumni.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Tambah Data Alumni
        </a>

        <!-- Pesan sukses jika ada -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Tabel untuk menampilkan data alumni -->
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-light">
                    <tr>
                        <th>No.</th>
                        <th>Foto</th>
                        <th>Nama Lengkap</th>
                        <th>Tahun Lulus</th>
                        <th>Status Pekerjaan</th>
                        <th>Perusahaan</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($alumni as $alumnus)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if ($alumnus->foto)
                                    <!-- Menampilkan foto alumni jika ada -->
                                    <img src="{{ asset('storage/' . $alumnus->foto) }}" width="50px" height="50px" class="rounded-circle" alt="Foto Alumni">
                                @else
                                    <!-- Placeholder jika tidak ada foto -->
                                    <img src="{{ asset('template/img/undraw_profile.svg') }}" width="50px" height="50px" class="rounded-circle" alt="Default Foto">
                                @endif
                            </td>
                            <td>{{ $alumnus->nama }}</td>
                            <td>{{ $alumnus->tahun_lulus }}</td>
                            <td>
                                @if($alumnus->status_pekerjaan)
                                    <!-- Menampilkan status pekerjaan dengan warna berbeda berdasarkan nilai -->
                                    @if($alumnus->status_pekerjaan == 'Bekerja')
                                        <span class="badge badge-success">{{ $alumnus->status_pekerjaan }}</span>
                                    @elseif($alumnus->status_pekerjaan == 'Wirausaha')
                                        <span class="badge badge-primary">{{ $alumnus->status_pekerjaan }}</span>
                                    @elseif($alumnus->status_pekerjaan == 'Melanjutkan Studi')
                                        <span class="badge badge-info">{{ $alumnus->status_pekerjaan }}</span>
                                    @elseif($alumnus->status_pekerjaan == 'Belum Bekerja')
                                        <span class="badge badge-secondary">{{ $alumnus->status_pekerjaan }}</span>
                                    @else
                                        <span class="badge badge-warning">{{ $alumnus->status_pekerjaan }}</span>
                                    @endif
                                @else
                                    <!-- Menampilkan belum bekerja jika tidak ada status -->
                                    <span class="badge badge-secondary">Belum Bekerja</span>
                                @endif
                            </td>
                            <td>{{ $alumnus->nama_perusahaan ?? '-' }}</td>
                            <td>{{ $alumnus->jabatan ?? '-' }}</td>
                            <td>
                                <!-- Tombol aksi: Detail, Edit, Hapus -->
                                <a href="{{ route('alumni.show', $alumnus) }}" class="btn btn-sm btn-info mb-1" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('alumni.edit', $alumnus) }}" class="btn btn-sm btn-warning mb-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('alumni.destroy', $alumnus) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus data alumni ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger mb-1" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <!-- Pesan jika tidak ada data alumni -->
                        <tr>
                            <td colspan="8" class="text-center">
                                <div class="py-4">
                                    <i class="fas fa-users fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">Belum ada data alumni Teknik Perangkat Lunak</p>
                                    <a href="{{ route('alumni.create') }}" class="btn btn-primary">Tambah Alumni Pertama</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination links -->
        @if($alumni->hasPages())
            <div class="d-flex justify-content-center mt-3">
                {{ $alumni->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
