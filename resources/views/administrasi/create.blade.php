<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Administrasi</title>
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
        
        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -10px;
            margin-left: -10px;
        }
        
        .form-col {
            padding-right: 10px;
            padding-left: 10px;
            flex: 1 0 0%;
        }
        
        @media (max-width: 768px) {
            .form-col {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
        
        .textarea-counter {
            font-size: 0.875rem;
            color: #6c757d;
            text-align: right;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <div class="modern-card">
                    <div class="card-header-custom text-center">
                        <h2 class="mb-0"><i class="fas fa-file-alt me-2"></i>Tambah Data Administrasi</h2>
                        <p class="mb-0 mt-2 opacity-75">Isi formulir berikut untuk menambahkan data administrasi baru</p>
                    </div>
                    <div class="card-body-custom">
                        <form action="{{ route('administrasi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-section">
                                <div class="section-title">
                                    <i class="fas fa-folder-open"></i>
                                    <span>Kategori Dokumen</span>
                                </div>
                                
                                <div class="mb-4">
                                    <label class="form-label">
                                        <i class="fas fa-tags"></i>
                                        Sub Kategori
                                    </label>
                                    <div class="input-group-icon">
                                        <i class="fas fa-tags input-icon"></i>
                                        <select name="sub_kategori" class="form-select" required>
                                            <option value="">Pilih Sub Kategori</option>
                                            <option value="sop">SOP</option>
                                            <option value="surat-menyurat">Surat-Menyurat</option>
                                            <option value="cuti kuliah">Cuti Kuliah</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <label class="form-label">
                                        <i class="fas fa-heading"></i>
                                        Judul Dokumen
                                    </label>
                                    <div class="input-group-icon">
                                        <i class="fas fa-heading input-icon"></i>
                                        <input type="text" name="judul" class="form-control" placeholder="Masukkan judul dokumen" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-section">
                                <div class="section-title">
                                    <i class="fas fa-align-left"></i>
                                    <span>Detail Dokumen</span>
                                </div>
                                
                                <div class="mb-4">
                                    <label class="form-label">
                                        <i class="fas fa-file-alt"></i>
                                        Deskripsi
                                    </label>
                                    <textarea name="deskripsi" class="form-control" rows="4" placeholder="Masukkan deskripsi dokumen" id="deskripsi-textarea"></textarea>
                                    <div class="textarea-counter">
                                        <span id="char-count">0</span>/500 karakter
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-section">
                                <div class="section-title">
                                    <i class="fas fa-paperclip"></i>
                                    <span>Lampiran File</span>
                                </div>
                                
                                <div class="mb-4">
                                    <label class="form-label">
                                        <i class="fas fa-file-upload"></i>
                                        File Dokumen
                                    </label>
                                    <div class="file-upload-container">
                                        <input type="file" name="file" class="form-control" id="file-upload" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                                        <label for="file-upload" class="file-upload-label">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <span id="file-text">Pilih file atau seret ke sini</span>
                                        </label>
                                    </div>
                                    <div class="file-preview" id="file-preview">
                                        <div class="d-flex align-items-center">
                                            <i class="file-icon fas fa-file"></i>
                                            <div>
                                                <div id="file-name" class="fw-bold"></div>
                                                <div id="file-size" class="text-muted small"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted mt-2">Format yang didukung: PDF, DOC, DOCX, JPG, JPEG, PNG. Maksimal ukuran: 5MB</small>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between mt-5 pt-3">
                                <a href="{{ route('administrasi.index') }}" class="btn btn-secondary-modern btn-modern">
                                    <i class="fas fa-arrow-left me-2"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-success-modern btn-modern">
                                    <i class="fas fa-save me-2"></i> Simpan Data
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
        // Script untuk menampilkan nama file yang dipilih
        document.getElementById('file-upload').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const fileName = file.name;
                const fileSize = (file.size / 1024 / 1024).toFixed(2); // Convert to MB
                
                document.getElementById('file-text').textContent = fileName;
                document.getElementById('file-name').textContent = fileName;
                document.getElementById('file-size').textContent = fileSize + ' MB';
                
                // Tampilkan preview
                document.getElementById('file-preview').classList.add('active');
                
                // Tentukan ikon berdasarkan jenis file
                const fileIcon = document.querySelector('.file-icon');
                if (fileName.endsWith('.pdf')) {
                    fileIcon.className = 'file-icon fas fa-file-pdf';
                    fileIcon.style.color = '#e74c3c';
                } else if (fileName.endsWith('.doc') || fileName.endsWith('.docx')) {
                    fileIcon.className = 'file-icon fas fa-file-word';
                    fileIcon.style.color = '#2b579a';
                } else if (fileName.endsWith('.jpg') || fileName.endsWith('.jpeg') || fileName.endsWith('.png')) {
                    fileIcon.className = 'file-icon fas fa-file-image';
                    fileIcon.style.color = '#27ae60';
                } else {
                    fileIcon.className = 'file-icon fas fa-file';
                    fileIcon.style.color = '#4361ee';
                }
            } else {
                document.getElementById('file-text').textContent = 'Pilih file atau seret ke sini';
                document.getElementById('file-preview').classList.remove('active');
            }
        });
        
        // Script untuk menghitung karakter pada textarea
        const textarea = document.getElementById('deskripsi-textarea');
        const charCount = document.getElementById('char-count');
        
        textarea.addEventListener('input', function() {
            const count = textarea.value.length;
            charCount.textContent = count;
            
            if (count > 500) {
                charCount.style.color = '#e74c3c';
            } else {
                charCount.style.color = '#6c757d';
            }
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
            const fileInput = document.getElementById('file-upload');
            if (fileInput.files.length > 0) {
                const fileSize = fileInput.files[0].size / 1024 / 1024; // in MB
                if (fileSize > 5) {
                    e.preventDefault();
                    alert('Ukuran file melebihi 5MB. Silakan pilih file yang lebih kecil.');
                }
            }
        });
    </script>
</body>
</html>