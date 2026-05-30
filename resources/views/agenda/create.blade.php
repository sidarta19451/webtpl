<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Agenda</title>
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
        
        .btn-success-modern {
            background: linear-gradient(135deg, var(--success), #3a86ff);
            color: white;
            box-shadow: 0 4px 15px rgba(76, 201, 240, 0.3);
        }
        
        .btn-success-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(76, 201, 240, 0.4);
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
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #e9ecef;
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
        
        .date-input-group {
            position: relative;
        }
        
        .date-input-group .form-control {
            padding-left: 45px;
        }
        
        .date-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
            z-index: 5;
        }
        
        .kegiatan-option-group {
            margin-left: 10px;
            font-size: 0.875rem;
            color: #6c757d;
        }
        
        .option-category {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-right: 8px;
        }
        
        .option-category-kegiatan {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary);
        }
        
        .option-category-kemahasiswaan {
            background-color: rgba(76, 201, 240, 0.1);
            color: var(--success);
        }
        
        .date-range-container {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <div class="modern-card">
                    <div class="card-header-custom text-center">
                        <h2 class="mb-0"><i class="fas fa-calendar-plus me-2"></i>Tambah Data Agenda</h2>
                        <p class="mb-0 mt-2 opacity-75">Isi formulir berikut untuk menambahkan agenda baru</p>
                    </div>
                    <div class="card-body-custom">
                        <form action="{{ route('agenda.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-section">
                                <div class="section-title">
                                    <i class="fas fa-tasks"></i>
                                    <span>Detail Kegiatan</span>
                                </div>
                                
                                <div class="mb-4">
                                    <label class="form-label">
                                        <i class="fas fa-calendar-check"></i>
                                        Kegiatan
                                    </label>
                                    <div class="input-group-icon">
                                        <i class="fas fa-calendar-check input-icon"></i>
                                        <select name="kegiatan" class="form-select" required id="kegiatan-select">
                                            <option value="">Pilih Kegiatan</option>
                                            @foreach($kegiatan as $kg)
                                                <option value="kegiatan-{{ $kg->id }}">
                                                    <span class="option-category option-category-kegiatan">Kegiatan</span>
                                                    {{ $kg->judul }}
                                                </option>
                                            @endforeach
                                            @foreach($kemahasiswaan as $km)
                                                <option value="kemahasiswaan-{{ $km->id }}">
                                                    <span class="option-category option-category-kemahasiswaan">Kemahasiswaan</span>
                                                    {{ $km->judul }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-section">
                                <div class="section-title">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span>Waktu Pelaksanaan</span>
                                </div>
                                
                                <div class="date-range-container">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">
                                                <i class="fas fa-play-circle"></i>
                                                Tanggal Mulai
                                            </label>
                                            <div class="date-input-group">
                                                <i class="fas fa-calendar-day date-icon"></i>
                                                <input type="date" name="tanggal_mulai" class="form-control" id="tanggal-mulai">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">
                                                <i class="fas fa-flag-checkered"></i>
                                                Tanggal Selesai
                                            </label>
                                            <div class="date-input-group">
                                                <i class="fas fa-calendar-day date-icon"></i>
                                                <input type="date" name="tanggal_selesai" class="form-control" id="tanggal-selesai">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mt-2">
                                        <small class="text-muted" id="date-range-display">Pilih tanggal mulai dan selesai untuk melihat durasi</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-section">
                                <div class="section-title">
                                    <i class="fas fa-images"></i>
                                    <span>Dokumentasi</span>
                                </div>
                                
                                <div class="mb-4">
                                    <label class="form-label">
                                        <i class="fas fa-camera"></i>
                                        Foto Kegiatan
                                    </label>
                                    <div class="file-upload-container">
                                        <input type="file" name="foto" class="form-control" id="foto-upload" accept="image/png,image/jpg,image/jpeg">
                                        <label for="foto-upload" class="file-upload-label">
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
                                    <small class="form-text text-muted mt-2">Format yang didukung: JPG, JPEG, PNG. Maksimal ukuran: 5MB</small>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between mt-5 pt-3">
                                <a href="{{ route('agenda.index') }}" class="btn btn-secondary-modern btn-modern">
                                    <i class="fas fa-arrow-left me-2"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-success-modern btn-modern">
                                    <i class="fas fa-save me-2"></i> Simpan Agenda
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
                    <h5 class="modal-title" id="imagePreviewModalLabel">Pratinjau Gambar</h5>
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
        document.getElementById('foto-upload').addEventListener('change', function(e) {
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
        
        // Script untuk menghitung durasi antara tanggal mulai dan selesai
        function calculateDateRange() {
            const startDate = document.getElementById('tanggal-mulai').value;
            const endDate = document.getElementById('tanggal-selesai').value;
            
            if (startDate && endDate) {
                const start = new Date(startDate);
                const end = new Date(endDate);
                
                if (start > end) {
                    document.getElementById('date-range-display').innerHTML = 
                        '<span class="text-danger"><i class="fas fa-exclamation-triangle me-1"></i>Tanggal selesai tidak boleh sebelum tanggal mulai</span>';
                    return;
                }
                
                const diffTime = Math.abs(end - start);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1; // +1 to include both start and end dates
                
                document.getElementById('date-range-display').innerHTML = 
                    `Durasi kegiatan: <strong>${diffDays} hari</strong> (dari ${formatDate(start)} hingga ${formatDate(end)})`;
            } else if (startDate || endDate) {
                document.getElementById('date-range-display').innerHTML = 
                    'Silakan pilih kedua tanggal untuk melihat durasi';
            } else {
                document.getElementById('date-range-display').innerHTML = 
                    'Pilih tanggal mulai dan selesai untuk melihat durasi';
            }
        }
        
        function formatDate(date) {
            const options = { day: 'numeric', month: 'long', year: 'numeric' };
            return date.toLocaleDateString('id-ID', options);
        }
        
        document.getElementById('tanggal-mulai').addEventListener('change', calculateDateRange);
        document.getElementById('tanggal-selesai').addEventListener('change', calculateDateRange);
        
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
            
            // Set minimum date to today for date inputs
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('tanggal-mulai').min = today;
            document.getElementById('tanggal-selesai').min = today;
        });
        
        // Validasi ukuran file
        document.querySelector('form').addEventListener('submit', function(e) {
            const fileInput = document.getElementById('foto-upload');
            if (fileInput.files.length > 0) {
                const fileSize = fileInput.files[0].size / 1024 / 1024; // in MB
                if (fileSize > 5) {
                    e.preventDefault();
                    alert('Ukuran file melebihi 5MB. Silakan pilih file yang lebih kecil.');
                }
            }
            
            // Validasi tanggal
            const startDate = document.getElementById('tanggal-mulai').value;
            const endDate = document.getElementById('tanggal-selesai').value;
            
            if (startDate && endDate) {
                const start = new Date(startDate);
                const end = new Date(endDate);
                
                if (start > end) {
                    e.preventDefault();
                    alert('Tanggal selesai tidak boleh sebelum tanggal mulai.');
                }
            }
        });
    </script>
</body>
</html>