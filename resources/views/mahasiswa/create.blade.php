@extends('layouts.app')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card modern-card">
                <div class="card-header text-center">
                    <h2 class="mb-0"><i class="fas fa-user-graduate me-2"></i>Tambah Data Mahasiswa</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">NIM</label>
                                <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror" value="{{ old('nim') }}" required>
                                @error('nim') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                                @error('nama') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Jurusan</label>
                                <input type="text" name="jurusan" class="form-control" value="{{ old('jurusan') }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <label class="form-label">Angkatan</label>
                                <input type="number" name="angkatan" class="form-control" value="{{ old('angkatan') }}" required>
                            </div>
                            
                            <div class="col-md-4 mb-4">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="belum" {{ old('status') == 'belum' ? 'selected' : '' }}>Belum Lulus</option>
                                    <option value="lulus" {{ old('status') == 'lulus' ? 'selected' : '' }}>Lulus</option>
                                </select>
                            </div>
                            
                            <div class="col-md-4 mb-4">
                                <label class="form-label">Foto</label>
                                <input type="file" name="foto" class="form-control">
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary-modern">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-success-modern">
                                <i class="fas fa-save me-1"></i> Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection