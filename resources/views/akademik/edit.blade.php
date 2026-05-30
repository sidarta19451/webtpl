<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Akademik</title>
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
        
        .form-container {
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
        
        .btn-success {
            background: linear-gradient(135deg, var(--success-color), #17a673);
            border: none;
            border-radius: 10px;
            padding: 12px 25px;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 6px rgba(28, 200, 138, 0.3);
        }
        
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 10px rgba(28, 200, 138, 0.4);
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
        
        .current-file {
            background-color: white;
            padding: 15px;
            border-radius: 10px;
            border-left: 4px solid var(--success-color);
            margin-top: 15px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        
        .file-icon {
            font-size: 1.5rem;
            margin-right: 10px;
            color: var(--primary-color);
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
        
        .category-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-left: 10px;
        }
        
        .badge-kalender {
            background-color: rgba(78, 115, 223, 0.1);
            color: var(--primary-color);
        }
        
        .badge-panduan {
            background-color: rgba(28, 200, 138, 0.1);
            color: var(--success-color);
        }
        
        .badge-skripsi {
            background-color: rgba(246, 194, 62, 0.1);
            color: var(--warning-color);
        }
        
        .badge-magang {
            background-color: rgba(231, 74, 59, 0.1);
            color: var(--danger-color);
        }
        
        .category-option {
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 5px;
            transition: all 0.2s;
        }
        
        .category-option:hover {
            background-color: #f0f4ff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-graduation-cap floating-icon"></i>
                        <h4 class="card-title">Update Data Akademik</h4>
                        <p class="text-center mb-0 mt-2 opacity-75">Perbarui informasi dan dokumen akademik</p>
                    </div>
                    
                    <div class="form-container">
                        <form action="{{ route('akademik.update', $akademik->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <!-- Kategori Section -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="fas fa-tags me-2"></i>Kategori Dokumen
                                </h5>
                                
                                <div class="mb-4">
                                    <label class="form-label">
                                        <i class="fas fa-folder"></i>Sub Kategori
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="fas fa-folder text-primary"></i>
                                        </span>
                                        <select name="sub_kategori" class="form-control" required>
                                            <option value="">Pilih Sub Kategori</option>
                                            <option value="kalender akademik" {{ $akademik->sub_kategori == 'kalender akademik' ? 'selected' : '' }}>Kalender Akademik</option>
                                            <option value="panduan studi" {{ $akademik->sub_kategori == 'panduan studi' ? 'selected' : '' }}>Panduan Studi</option>
                                            <option value="skripsi" {{ $akademik->sub_kategori == 'skripsi' ? 'selected' : '' }}>Skripsi</option>
                                            <option value="magang" {{ $akademik->sub_kategori == 'magang' ? 'selected' : '' }}>Magang</option>
                                        </select>
                                    </div>
                                    <div class="mt-2">
                                        <small class="text-muted">
                                            Pilih kategori yang sesuai dengan dokumen:
                                            <span class="category-badge badge-kalender">Kalender Akademik</span>
                                            <span class="category-badge badge-panduan">Panduan Studi</span>
                                            <span class="category-badge badge-skripsi">Skripsi</span>
                                            <span class="category-badge badge-magang">Magang</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Informasi Dokumen Section -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="fas fa-info-circle me-2"></i>Informasi Dokumen
                                </h5>
                                
                                <div class="mb-4">
                                    <label class="form-label">
                                        <i class="fas fa-heading"></i>Judul
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="fas fa-heading text-primary"></i>
                                        </span>
                                        <input type="text" name="judul" class="form-control" required value="{{ $akademik->judul }}" placeholder="Masukkan judul dokumen">
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <label class="form-label">
                                        <i class="fas fa-align-left"></i>Deskripsi
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="fas fa-align-left text-primary"></i>
                                        </span>
                                        <textarea name="deskripsi" class="form-control" rows="4" placeholder="Masukkan deskripsi dokumen">{{ $akademik->deskripsi }}</textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- File Upload Section -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="fas fa-file-upload me-2"></i>File Dokumen
                                </h5>
                                
                                <div class="file-upload-container">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            <i class="fas fa-file"></i>File (PDF, DOC, DOCX, JPG, PNG)
                                        </label>
                                        <div class="file-input-wrapper">
                                            <button type="button" class="file-input-button">
                                                <i class="fas fa-cloud-upload-alt me-2"></i>Pilih File Baru
                                            </button>
                                            <input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx,.jpg,.png">
                                        </div>
                                        <p class="small text-muted mt-2">Format yang didukung: PDF, DOC, DOCX, JPG, PNG. Maksimal 5MB.</p>
                                    </div>
                                    
                                    @if($akademik->file_path)
                                        <div class="current-file">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-file-pdf file-icon"></i>
                                                <div>
                                                    <p class="mb-1 fw-bold">File saat ini:</p>
                                                    <a href="{{ Storage::url($akademik->file_path) }}" target="_blank" class="text-decoration-none">
                                                        <i class="fas fa-external-link-alt me-1"></i>{{ basename($akademik->file_path) }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="action-buttons">
                                <a href="{{ route('akademik.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Kembali
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save me-2"></i>Update Data
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
        document.querySelector('input[name="file"]').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name || 'Tidak ada file dipilih';
            document.querySelector('.file-input-button').innerHTML = 
                `<i class="fas fa-file me-2"></i>${fileName}`;
        });
        
        // Update category badges based on selection
        document.querySelector('select[name="sub_kategori"]').addEventListener('change', function(e) {
            const selectedOption = e.target.options[e.target.selectedIndex];
            const categoryText = selectedOption.textContent;
            
            // Highlight the selected category in the description
            const badges = document.querySelectorAll('.category-badge');
            badges.forEach(badge => {
                badge.style.opacity = '0.5';
            });
            
            if (categoryText === 'Kalender Akademik') {
                document.querySelector('.badge-kalender').style.opacity = '1';
            } else if (categoryText === 'Panduan Studi') {
                document.querySelector('.badge-panduan').style.opacity = '1';
            } else if (categoryText === 'Skripsi') {
                document.querySelector('.badge-skripsi').style.opacity = '1';
            } else if (categoryText === 'Magang') {
                document.querySelector('.badge-magang').style.opacity = '1';
            }
        });
        
        // Initialize category badge highlighting on page load
        document.addEventListener('DOMContentLoaded', function() {
            const selectedCategory = document.querySelector('select[name="sub_kategori"]').value;
            const badges = document.querySelectorAll('.category-badge');
            badges.forEach(badge => {
                badge.style.opacity = '0.5';
            });
            
            if (selectedCategory === 'kalender akademik') {
                document.querySelector('.badge-kalender').style.opacity = '1';
            } else if (selectedCategory === 'panduan studi') {
                document.querySelector('.badge-panduan').style.opacity = '1';
            } else if (selectedCategory === 'skripsi') {
                document.querySelector('.badge-skripsi').style.opacity = '1';
            } else if (selectedCategory === 'magang') {
                document.querySelector('.badge-magang').style.opacity = '1';
            }
        });
    </script>
</body>
</html>