<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Alumni Teknik Perangkat Lunak</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #858796;
            --success-color: #1cc88a;
            --info-color: #36b9cc;
            --warning-color: #f6c23e;
            --danger-color: #e74a3b;
            --light-color: #f8f9fc;
            --dark-color: #5a5c69;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f5 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            padding: 20px 0;
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.75rem 2rem rgba(0, 0, 0, 0.15);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary-color), #6f42c1);
            color: white;
            padding: 1.75rem;
            border-bottom: none;
            position: relative;
            overflow: hidden;
        }
        
        .card-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 100%);
        }
        
        .card-title {
            font-weight: 700;
            margin-bottom: 0;
            text-align: center;
            position: relative;
            z-index: 1;
        }
        
        .card-body {
            padding: 2rem;
        }
        
        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #d1d3e2;
            transition: all 0.3s;
            background-color: #f8f9fc;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
            background-color: white;
        }
        
        .form-control:read-only {
            background-color: #f8f9fc;
            border-color: #e3e6f0;
            color: #6e707e;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
        }
        
        .form-label i {
            margin-right: 8px;
            color: var(--primary-color);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), #6f42c1);
            border: none;
            border-radius: 10px;
            padding: 12px 25px;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 6px rgba(78, 115, 223, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 10px rgba(78, 115, 223, 0.4);
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, var(--secondary-color), #6c757d);
            border: none;
            border-radius: 10px;
            padding: 12px 25px;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 6px rgba(133, 135, 150, 0.3);
        }
        
        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 10px rgba(133, 135, 150, 0.4);
        }
        
        .file-upload-container {
            padding: 20px;
            background: linear-gradient(135deg, #f8f9fc 0%, #e9ecef 100%);
            border-radius: 15px;
            border: 2px dashed #d1d3e2;
            transition: all 0.3s;
            margin-bottom: 20px;
        }
        
        .file-upload-container:hover {
            border-color: var(--primary-color);
            background: linear-gradient(135deg, #f0f4ff 0%, #e2e8ff 100%);
        }
        
        .current-photo {
            text-align: center;
            margin-top: 15px;
        }
        
        .current-photo img {
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
            max-width: 150px;
            max-height: 150px;
            object-fit: cover;
        }
        
        .current-photo img:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        
        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            margin-top: 10px;
        }
        
        .file-input-wrapper input[type=file] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
        
        .file-input-button {
            background: linear-gradient(135deg, var(--info-color), #258ea6);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 6px rgba(54, 185, 204, 0.3);
            cursor: pointer;
        }
        
        .file-input-button:hover {
            background: linear-gradient(135deg, #2ca1ba, #1d7a8c);
            transform: translateY(-2px);
            box-shadow: 0 6px 10px rgba(54, 185, 204, 0.4);
        }
        
        .form-section {
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 25px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
        }
        
        .section-title {
            color: var(--primary-color);
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-weight: 700;
        }
        
        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e3e6f0;
        }
        
        @media (max-width: 768px) {
            .action-buttons {
                flex-direction: column;
            }
            
            .action-buttons .btn {
                width: 100%;
            }
        }
        
        .floating-icon {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 2rem;
            opacity: 0.2;
            z-index: 0;
        }
        
        .read-only-field {
            background-color: #f8f9fc;
            border-radius: 10px;
            padding: 15px;
            border-left: 4px solid var(--info-color);
            margin-bottom: 15px;
        }
        
        .read-only-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 5px;
        }
        
        .read-only-value {
            color: var(--secondary-color);
            font-size: 1.1rem;
        }
        
        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-left: 10px;
        }
        
        .badge-bekerja {
            background-color: rgba(28, 200, 138, 0.1);
            color: var(--success-color);
        }
        
        .badge-wirausaha {
            background-color: rgba(78, 115, 223, 0.1);
            color: var(--primary-color);
        }
        
        .badge-studi {
            background-color: rgba(54, 185, 204, 0.1);
            color: var(--info-color);
        }
        
        .badge-belum {
            background-color: rgba(108, 117, 125, 0.1);
            color: var(--secondary-color);
        }
        
        .info-text {
            font-size: 0.85rem;
            color: var(--secondary-color);
            margin-top: 5px;
        }
        
        .gaji-input {
            position: relative;
        }
        
        .gaji-input::before {
            content: "Rp";
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--secondary-color);
            font-weight: 600;
            z-index: 1;
        }
        
        .gaji-input input {
            padding-left: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-user-graduate floating-icon"></i>
                        <h4 class="card-title">Edit Data Alumni Teknik Perangkat Lunak</h4>
                        <p class="text-center mb-0 mt-2 opacity-75">Perbarui informasi karier dan pencapaian alumni</p>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ route('alumni.update', $alumni) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Informasi Dasar Alumni (Read-only) -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="fas fa-id-card me-2"></i>Informasi Dasar Alumni
                                </h5>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="read-only-field">
                                            <div class="read-only-label">
                                                <i class="fas fa-id-badge me-2"></i>NIM
                                            </div>
                                            <div class="read-only-value">{{ $alumni->nim }}</div>
                                            <div class="info-text">NIM tidak dapat diubah karena berasal dari data mahasiswa</div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="read-only-field">
                                            <div class="read-only-label">
                                                <i class="fas fa-user me-2"></i>Nama Lengkap
                                            </div>
                                            <div class="read-only-value">{{ $alumni->nama }}</div>
                                            <div class="info-text">Nama tidak dapat diubah karena berasal dari data mahasiswa</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="read-only-field">
                                            <div class="read-only-label">
                                                <i class="fas fa-envelope me-2"></i>Email
                                            </div>
                                            <div class="read-only-value">{{ $alumni->email }}</div>
                                            <div class="info-text">Email tidak dapat diubah karena berasal dari data mahasiswa</div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="read-only-field">
                                            <div class="read-only-label">
                                                <i class="fas fa-graduation-cap me-2"></i>Jurusan
                                            </div>
                                            <div class="read-only-value">{{ $alumni->jurusan }}</div>
                                            <div class="info-text">Jurusan sudah ditentukan sebagai Teknik Perangkat Lunak</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Informasi Kelulusan -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="fas fa-calendar-alt me-2"></i>Informasi Kelulusan
                                </h5>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="tahun_lulus" class="form-label">
                                                <i class="fas fa-graduation-cap"></i>Tahun Lulus <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="fas fa-calendar text-primary"></i>
                                                </span>
                                                <input type="number" class="form-control @error('tahun_lulus') is-invalid @enderror"
                                                       id="tahun_lulus" name="tahun_lulus" value="{{ old('tahun_lulus', $alumni->tahun_lulus) }}"
                                                       min="2000" max="{{ date('Y') + 1 }}" required>
                                            </div>
                                            @error('tahun_lulus')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Informasi Pekerjaan -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="fas fa-briefcase me-2"></i>Informasi Pekerjaan
                                </h5>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="status_pekerjaan" class="form-label">
                                                <i class="fas fa-user-tie"></i>Status Pekerjaan
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="fas fa-user-tie text-primary"></i>
                                                </span>
                                                <select class="form-control @error('status_pekerjaan') is-invalid @enderror"
                                                        id="status_pekerjaan" name="status_pekerjaan">
                                                    <option value="">Pilih Status Pekerjaan</option>
                                                    <option value="Bekerja" {{ old('status_pekerjaan', $alumni->status_pekerjaan) == 'Bekerja' ? 'selected' : '' }}>Bekerja</option>
                                                    <option value="Wirausaha" {{ old('status_pekerjaan', $alumni->status_pekerjaan) == 'Wirausaha' ? 'selected' : '' }}>Wirausaha</option>
                                                    <option value="Melanjutkan Studi" {{ old('status_pekerjaan', $alumni->status_pekerjaan) == 'Melanjutkan Studi' ? 'selected' : '' }}>Melanjutkan Studi</option>
                                                    <option value="Belum Bekerja" {{ old('status_pekerjaan', $alumni->status_pekerjaan) == 'Belum Bekerja' ? 'selected' : '' }}>Belum Bekerja</option>
                                                </select>
                                            </div>
                                            @error('status_pekerjaan')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="nama_perusahaan" class="form-label">
                                                <i class="fas fa-building"></i>Nama Perusahaan
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="fas fa-building text-primary"></i>
                                                </span>
                                                <input type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror"
                                                       id="nama_perusahaan" name="nama_perusahaan" value="{{ old('nama_perusahaan', $alumni->nama_perusahaan) }}"
                                                       placeholder="Masukkan nama perusahaan tempat bekerja">
                                            </div>
                                            @error('nama_perusahaan')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="jabatan" class="form-label">
                                                <i class="fas fa-user-md"></i>Jabatan
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="fas fa-user-md text-primary"></i>
                                                </span>
                                                <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                                       id="jabatan" name="jabatan" value="{{ old('jabatan', $alumni->jabatan) }}"
                                                       placeholder="Masukkan jabatan di perusahaan">
                                            </div>
                                            @error('jabatan')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="lokasi_kerja" class="form-label">
                                                <i class="fas fa-map-marker-alt"></i>Lokasi Kerja
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="fas fa-map-marker-alt text-primary"></i>
                                                </span>
                                                <input type="text" class="form-control @error('lokasi_kerja') is-invalid @enderror"
                                                       id="lokasi_kerja" name="lokasi_kerja" value="{{ old('lokasi_kerja', $alumni->lokasi_kerja) }}"
                                                       placeholder="Masukkan lokasi tempat kerja">
                                            </div>
                                            @error('lokasi_kerja')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="gaji" class="form-label">
                                                <i class="fas fa-money-bill-wave"></i>Gaji (Rp)
                                            </label>
                                            <div class="input-group gaji-input">
                                                <span class="input-group-text bg-light">
                                                    <i class="fas fa-money-bill-wave text-primary"></i>
                                                </span>
                                                <input type="number" class="form-control @error('gaji') is-invalid @enderror"
                                                       id="gaji" name="gaji" value="{{ old('gaji', $alumni->gaji) }}" min="0" step="100000"
                                                       placeholder="Masukkan gaji dalam Rupiah">
                                            </div>
                                            @error('gaji')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                            <div class="info-text">Opsional: Masukkan gaji dalam Rupiah (contoh: 5000000)</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Kisah Sukses -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="fas fa-star me-2"></i>Kisah Sukses
                                </h5>
                                
                                <div class="mb-4">
                                    <label for="kisah_sukses" class="form-label">
                                        <i class="fas fa-book-open"></i>Kisah Sukses
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light align-items-start">
                                            <i class="fas fa-book-open text-primary mt-2"></i>
                                        </span>
                                        <textarea class="form-control @error('kisah_sukses') is-invalid @enderror"
                                                  id="kisah_sukses" name="kisah_sukses" rows="4"
                                                  placeholder="Ceritakan kisah sukses alumni setelah lulus...">{{ old('kisah_sukses', $alumni->kisah_sukses) }}</textarea>
                                    </div>
                                    @error('kisah_sukses')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    <div class="info-text">Opsional: Bagikan pengalaman sukses alumni</div>
                                </div>
                            </div>
                            
                            <!-- Foto Alumni -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="fas fa-camera me-2"></i>Foto Alumni
                                </h5>
                                
                                <div class="file-upload-container">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            <i class="fas fa-image"></i>Foto Alumni
                                        </label>
                                        <div class="file-input-wrapper">
                                            <button type="button" class="file-input-button">
                                                <i class="fas fa-cloud-upload-alt me-2"></i>Pilih Foto Baru
                                            </button>
                                            <input type="file" class="form-control-file @error('foto') is-invalid @enderror"
                                                   id="foto" name="foto" accept="image/*">
                                        </div>
                                        @error('foto')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                        <div class="info-text">Opsional: Upload foto baru (JPG, PNG, max 2MB). Kosongkan jika tidak ingin mengubah foto.</div>
                                    </div>
                                    
                                    @if($alumni->foto)
                                        <div class="current-photo">
                                            <p class="mb-2 fw-bold">Foto saat ini:</p>
                                            <img src="{{ asset('storage/' . $alumni->foto) }}" alt="Foto Alumni" class="img-fluid">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="action-buttons">
                                <a href="{{ route('alumni.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Update Data Alumni
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Update file input display when a file is selected
        document.querySelector('input[name="foto"]').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name || 'Tidak ada file dipilih';
            document.querySelector('.file-input-button').innerHTML = 
                `<i class="fas fa-file-image me-2"></i>${fileName}`;
        });
        
        // Format gaji input with currency formatting
        document.getElementById('gaji').addEventListener('blur', function(e) {
            if (this.value) {
                const formattedValue = new Intl.NumberFormat('id-ID').format(this.value);
                this.value = formattedValue.replace(/,/g, '');
            }
        });
        
        // Add visual feedback for required fields
        const requiredFields = document.querySelectorAll('input[required], select[required], textarea[required]');
        requiredFields.forEach(field => {
            field.addEventListener('focus', function() {
                this.parentElement.parentElement.style.borderLeft = '4px solid var(--primary-color)';
            });
            
            field.addEventListener('blur', function() {
                this.parentElement.parentElement.style.borderLeft = '';
            });
        });
    </script>
</body>
</html>