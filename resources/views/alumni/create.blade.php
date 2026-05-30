<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Alumni Teknik Perangkat Lunak</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a56d4;
            --secondary: #6c757d;
            --success: #4cc9f0;
            --light: #f8f9fa;
            --dark: #212529;
            --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            --input-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            padding: 20px 0;
        }
        
        .modern-card {
            border: none;
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: white;
        }
        
        .modern-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .card-header-custom {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 1.75rem 2rem;
            border-bottom: none;
            position: relative;
            overflow: hidden;
        }
        
        .card-header-custom::before {
            content: "";
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(30deg);
        }
        
        .card-body-custom {
            padding: 2.5rem;
        }
        
        @media (max-width: 768px) {
            .card-body-custom {
                padding: 1.5rem;
            }
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }
        
        .form-label i {
            margin-right: 8px;
            width: 20px;
            text-align: center;
            color: var(--primary);
        }
        
        .required-star {
            color: #e74c3c;
            margin-left: 4px;
        }
        
        .form-control, .form-select {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 1.5px solid #e1e5ee;
            transition: all 0.3s;
            box-shadow: var(--input-shadow);
            font-size: 1rem;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.15);
        }
        
        .input-group-icon {
            position: relative;
        }
        
        .input-group-icon .form-control, .input-group-icon .form-select {
            padding-left: 45px;
        }
        
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
            z-index: 5;
        }
        
        .btn-modern {
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-primary-modern {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
        }
        
        .btn-primary-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(67, 97, 238, 0.4);
        }
        
        .btn-secondary-modern {
            background: linear-gradient(135deg, var(--secondary), #5a6268);
            color: white;
            box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
        }
        
        .btn-secondary-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(108, 117, 125, 0.4);
        }
        
        .form-section {
            margin-bottom: 2.5rem;
            padding: 1.5rem;
            background-color: #f8f9fa;
            border-radius: 12px;
            border-left: 4px solid var(--primary);
        }
        
        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
        }
        
        .section-title i {
            margin-right: 10px;
            background: rgba(67, 97, 238, 0.1);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .file-upload-container {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }
        
        .file-upload-container input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
        
        .file-upload-label {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1rem;
            background-color: #f8f9fa;
            border: 2px dashed #dee2e6;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            color: #6c757d;
        }
        
        .file-upload-label:hover {
            background-color: #e9ecef;
            border-color: var(--primary);
        }
        
        .file-upload-label i {
            margin-right: 8px;
            font-size: 1.2rem;
        }
        
        .file-preview {
            margin-top: 10px;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 8px;
            display: none;
        }
        
        .file-preview.active {
            display: block;
        }
        
        .file-icon {
            font-size: 1.5rem;
            margin-right: 10px;
            color: var(--primary);
        }
        
        .gaji-input-container {
            position: relative;
        }
        
        .gaji-input-container .form-control {
            padding-left: 45px;
        }
        
        .gaji-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
            z-index: 5;
        }
        
        .gaji-display {
            font-size: 0.875rem;
            color: #28a745;
            font-weight: 600;
            margin-top: 5px;
        }
        
        .mahasiswa-info-card {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: 10px;
            padding: 1rem;
            margin-top: 10px;
            display: none;
            border-left: 4px solid var(--primary);
        }
        
        .mahasiswa-info-card.active {
            display: block;
        }
        
        .info-item {
            display: flex;
            margin-bottom: 0.5rem;
        }
        
        .info-label {
            font-weight: 600;
            min-width: 100px;
            color: var(--dark);
        }
        
        .info-value {
            color: #6c757d;
        }
        
        .form-text {
            font-size: 0.8rem;
        }
        
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-right: 8px;
            margin-bottom: 8px;
        }
        
        .status-bekerja {
            background-color: rgba(40, 167, 69, 0.1);
            color: #28a745;
            border: 1px solid rgba(40, 167, 69, 0.2);
        }
        
        .status-wirausaha {
            background-color: rgba(255, 193, 7, 0.1);
            color: #ffc107;
            border: 1px solid rgba(255, 193, 7, 0.2);
        }
        
        .status-studi {
            background-color: rgba(0, 123, 255, 0.1);
            color: #007bff;
            border: 1px solid rgba(0, 123, 255, 0.2);
        }
        
        .status-belum {
            background-color: rgba(108, 117, 125, 0.1);
            color: #6c757d;
            border: 1px solid rgba(108, 117, 125, 0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9">
                <div class="modern-card">
                    <div class="card-header-custom text-center">
                        <h2 class="mb-0"><i class="fas fa-user-graduate me-2"></i>Tambah Data Alumni Teknik Perangkat Lunak</h2>
                        <p class="mb-0 mt-2 opacity-75">Isi formulir berikut untuk menambahkan data alumni baru</p>
                    </div>
                    <div class="card-body-custom">
                        <form action="{{ route('alumni.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-section">
                                <div class="section-title">
                                    <i class="fas fa-user-circle"></i>
                                    <span>Informasi Dasar Alumni</span>
                                </div>
                                
                                <div class="mb-4">
                                    <label class="form-label">
                                        <i class="fas fa-user"></i>
                                        Pilih Mahasiswa
                                        <span class="required-star">*</span>
                                    </label>
                                    <div class="input-group-icon">
                                        <i class="fas fa-user input-icon"></i>
                                        <select class="form-control @error('mahasiswa_id') is-invalid @enderror"
                                                id="mahasiswa_id" name="mahasiswa_id" required>
                                            <option value="">-- Pilih Mahasiswa --</option>
                                            @foreach($mahasiswa as $mhs)
                                                <option value="{{ $mhs->id }}" {{ old('mahasiswa_id') == $mhs->id ? 'selected' : '' }}
                                                    data-nama="{{ $mhs->nama }}"
                                                    data-nim="{{ $mhs->nim }}"
                                                    data-jurusan="{{ $mhs->jurusan }}">
                                                    {{ $mhs->nama }} - {{ $mhs->nim }} - ({{ $mhs->jurusan }})
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('mahasiswa_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <small class="form-text text-muted">Pilih mahasiswa yang akan dijadikan data alumni</small>
                                    
                                    <div class="mahasiswa-info-card" id="mahasiswa-info">
                                        <div class="info-item">
                                            <span class="info-label">Nama:</span>
                                            <span class="info-value" id="info-nama">-</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">NIM:</span>
                                            <span class="info-value" id="info-nim">-</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Jurusan:</span>
                                            <span class="info-value" id="info-jurusan">-</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label">
                                            <i class="fas fa-calendar-alt"></i>
                                            Tahun Lulus
                                            <span class="required-star">*</span>
                                        </label>
                                        <div class="input-group-icon">
                                            <i class="fas fa-calendar-alt input-icon"></i>
                                            <input type="number" class="form-control @error('tahun_lulus') is-invalid @enderror"
                                                   id="tahun_lulus" name="tahun_lulus" value="{{ old('tahun_lulus', date('Y')) }}"
                                                   min="2000" max="{{ date('Y') + 1 }}" required>
                                            @error('tahun_lulus')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label">
                                            <i class="fas fa-camera"></i>
                                            Foto Alumni
                                        </label>
                                        <div class="file-upload-container">
                                            <input type="file" class="form-control-file @error('foto') is-invalid @enderror"
                                                   id="foto" name="foto" accept="image/*">
                                            <label for="foto" class="file-upload-label">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <span id="file-text">Pilih foto atau seret ke sini</span>
                                            </label>
                                        </div>
                                        <div class="file-preview" id="file-preview">
                                            <div class="d-flex align-items-center">
                                                <i class="file-icon fas fa-file-image"></i>
                                                <div>
                                                    <div id="file-name" class="fw-bold"></div>
                                                    <div id="file-size" class="text-muted small"></div>
                                                </div>
                                                <div class="ms-auto">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary" id="preview-image-btn">
                                                        <i class="fas fa-eye me-1"></i> Pratinjau
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @error('foto')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                        <small class="form-text text-muted">Opsional: Upload foto alumni (JPG, PNG, max 2MB)</small>
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <label class="form-label">
                                        <i class="fas fa-book-open"></i>
                                        Kisah Sukses
                                    </label>
                                    <textarea class="form-control @error('kisah_sukses') is-invalid @enderror"
                                              id="kisah_sukses" name="kisah_sukses" rows="4"
                                              placeholder="Ceritakan kisah sukses alumni setelah lulus...">{{ old('kisah_sukses') }}</textarea>
                                    @error('kisah_sukses')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Opsional: Bagikan pengalaman sukses alumni</small>
                                </div>
                            </div>
                            
                            <div class="form-section">
                                <div class="section-title">
                                    <i class="fas fa-chart-line"></i>
                                    <span>Data Tracer Studi</span>
                                </div>
                                
                                <div class="mb-4">
                                    <label class="form-label">
                                        <i class="fas fa-briefcase"></i>
                                        Status Pekerjaan
                                    </label>
                                    <div class="input-group-icon">
                                        <i class="fas fa-briefcase input-icon"></i>
                                        <select class="form-control @error('status_pekerjaan') is-invalid @enderror"
                                                id="status_pekerjaan" name="status_pekerjaan">
                                            <option value="">Pilih Status Pekerjaan</option>
                                            <option value="Bekerja" {{ old('status_pekerjaan') == 'Bekerja' ? 'selected' : '' }}>Bekerja</option>
                                            <option value="Wirausaha" {{ old('status_pekerjaan') == 'Wirausaha' ? 'selected' : '' }}>Wirausaha</option>
                                            <option value="Melanjutkan Studi" {{ old('status_pekerjaan') == 'Melanjutkan Studi' ? 'selected' : '' }}>Melanjutkan Studi</option>
                                            <option value="Belum Bekerja" {{ old('status_pekerjaan') == 'Belum Bekerja' ? 'selected' : '' }}>Belum Bekerja</option>
                                        </select>
                                        @error('status_pekerjaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="d-flex flex-wrap mt-2">
                                        <span class="status-badge status-bekerja">Bekerja</span>
                                        <span class="status-badge status-wirausaha">Wirausaha</span>
                                        <span class="status-badge status-studi">Melanjutkan Studi</span>
                                        <span class="status-badge status-belum">Belum Bekerja</span>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label">
                                            <i class="fas fa-building"></i>
                                            Nama Perusahaan
                                        </label>
                                        <div class="input-group-icon">
                                            <i class="fas fa-building input-icon"></i>
                                            <input type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror"
                                                   id="nama_perusahaan" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}"
                                                   placeholder="Masukkan nama perusahaan tempat bekerja">
                                            @error('nama_perusahaan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label">
                                            <i class="fas fa-user-tie"></i>
                                            Jabatan
                                        </label>
                                        <div class="input-group-icon">
                                            <i class="fas fa-user-tie input-icon"></i>
                                            <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                                   id="jabatan" name="jabatan" value="{{ old('jabatan') }}"
                                                   placeholder="Masukkan jabatan di perusahaan">
                                            @error('jabatan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label">
                                            <i class="fas fa-map-marker-alt"></i>
                                            Lokasi Kerja
                                        </label>
                                        <div class="input-group-icon">
                                            <i class="fas fa-map-marker-alt input-icon"></i>
                                            <input type="text" class="form-control @error('lokasi_kerja') is-invalid @enderror"
                                                   id="lokasi_kerja" name="lokasi_kerja" value="{{ old('lokasi_kerja') }}"
                                                   placeholder="Masukkan lokasi tempat kerja">
                                            @error('lokasi_kerja')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label">
                                            <i class="fas fa-money-bill-wave"></i>
                                            Gaji (Rp)
                                        </label>
                                        <div class="gaji-input-container">
                                            <i class="fas fa-money-bill-wave gaji-icon"></i>
                                            <input type="number" class="form-control @error('gaji') is-invalid @enderror"
                                                   id="gaji" name="gaji" value="{{ old('gaji') }}" min="0" step="100000"
                                                   placeholder="Masukkan gaji dalam Rupiah">
                                            @error('gaji')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="gaji-display" id="gaji-display"></div>
                                        <small class="form-text text-muted">Opsional: Masukkan gaji dalam Rupiah (contoh: 5000000)</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between mt-5 pt-3">
                                <a href="{{ route('alumni.index') }}" class="btn btn-secondary-modern btn-modern">
                                    <i class="fas fa-arrow-left me-2"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-primary-modern btn-modern">
                                    <i class="fas fa-save me-2"></i> Simpan Data Alumni
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for image preview -->
    <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imagePreviewModalLabel">Pratinjau Foto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="preview-image" src="" alt="Preview" class="img-fluid rounded">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Script untuk menampilkan nama file yang dipilih
        document.getElementById('foto').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const fileName = file.name;
                const fileSize = (file.size / 1024 / 1024).toFixed(2); // Convert to MB
                
                document.getElementById('file-text').textContent = fileName;
                document.getElementById('file-name').textContent = fileName;
                document.getElementById('file-size').textContent = fileSize + ' MB';
                
                // Tampilkan preview
                document.getElementById('file-preview').classList.add('active');
                
                // Buat URL untuk pratinjau gambar
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview-image').src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                document.getElementById('file-text').textContent = 'Pilih foto atau seret ke sini';
                document.getElementById('file-preview').classList.remove('active');
            }
        });
        
        // Script untuk pratinjau gambar
        document.getElementById('preview-image-btn').addEventListener('click', function() {
            const previewModal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
            previewModal.show();
        });
        
        // Script untuk menampilkan informasi mahasiswa yang dipilih
        document.getElementById('mahasiswa_id').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const infoCard = document.getElementById('mahasiswa-info');
            
            if (selectedOption.value) {
                document.getElementById('info-nama').textContent = selectedOption.getAttribute('data-nama');
                document.getElementById('info-nim').textContent = selectedOption.getAttribute('data-nim');
                document.getElementById('info-jurusan').textContent = selectedOption.getAttribute('data-jurusan');
                infoCard.classList.add('active');
            } else {
                infoCard.classList.remove('active');
            }
        });
        
        // Script untuk format gaji
        document.getElementById('gaji').addEventListener('input', function() {
            const gajiValue = this.value;
            const gajiDisplay = document.getElementById('gaji-display');
            
            if (gajiValue) {
                const formattedGaji = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(gajiValue);
                
                gajiDisplay.textContent = formattedGaji;
            } else {
                gajiDisplay.textContent = '';
            }
        });
        
        // Klik pada badge status untuk memilih opsi
        document.querySelectorAll('.status-badge').forEach(badge => {
            badge.addEventListener('click', function() {
                const statusText = this.textContent.trim();
                const selectElement = document.getElementById('status_pekerjaan');
                
                for (let i = 0; i < selectElement.options.length; i++) {
                    if (selectElement.options[i].text === statusText) {
                        selectElement.selectedIndex = i;
                        break;
                    }
                }
            });
        });
        
        // Efek animasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            const card = document.querySelector('.modern-card');
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 100);
        });
        
        // Validasi ukuran file
        document.querySelector('form').addEventListener('submit', function(e) {
            const fileInput = document.getElementById('foto');
            if (fileInput.files.length > 0) {
                const fileSize = fileInput.files[0].size / 1024 / 1024; // in MB
                if (fileSize > 2) {
                    e.preventDefault();
                    alert('Ukuran file melebihi 2MB. Silakan pilih file yang lebih kecil.');
                }
            }
        });
    </script>
</body>
</html>