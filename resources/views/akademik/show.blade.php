<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3a0ca3;
            --accent-color: #4cc9f0;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #4ade80;
            --info-color: #38bdf8;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --academic-color: #7209b7;
        }
        
        body {
            background-color: #f5f7fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .academic-card {
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: none;
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        
        .academic-card:hover {
            transform: translateY(-5px);
        }
        
        .academic-header {
            background: linear-gradient(135deg, var(--academic-color), #560bad);
            color: white;
            padding: 2rem 1.5rem;
            position: relative;
        }
        
        .academic-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            font-size: 2rem;
        }
        
        .info-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .info-card:hover {
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
        }
        
        .info-item {
            display: flex;
            align-items: flex-start;
            padding: 0.8rem 0;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .info-item:last-child {
            border-bottom: none;
        }
        
        .info-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(114, 9, 183, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: var(--academic-color);
            flex-shrink: 0;
        }
        
        .btn-modern {
            border-radius: 8px;
            padding: 0.6rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        .section-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--dark-color);
            position: relative;
            padding-bottom: 0.5rem;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--academic-color);
            border-radius: 3px;
        }
        
        .file-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }
        
        .file-card:hover {
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transform: translateY(-3px);
        }
        
        .file-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            background: rgba(114, 9, 183, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1.5rem;
            color: var(--academic-color);
            font-size: 1.5rem;
        }
        
        .file-info h5 {
            margin-bottom: 0.3rem;
            color: var(--dark-color);
        }
        
        .file-info p {
            margin-bottom: 0;
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .file-actions {
            margin-left: auto;
            display: flex;
            gap: 0.5rem;
        }
        
        .metadata-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        .metadata-item {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .metadata-item:last-child {
            border-bottom: none;
        }
        
        .metadata-label {
            font-weight: 500;
            color: #6c757d;
        }
        
        .metadata-value {
            font-weight: 600;
            color: var(--dark-color);
        }
        
        .description-box {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 1.5rem;
            margin-top: 1rem;
            border-left: 4px solid var(--academic-color);
        }
        
        .stats-card {
            text-align: center;
            padding: 1.5rem;
            border-radius: 12px;
            background: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        
        .stats-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
        }
        
        .stats-number {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .stats-label {
            font-size: 0.9rem;
            color: #6c757d;
        }
        
        .category-badge {
            display: inline-block;
            background: rgba(114, 9, 183, 0.1);
            color: var(--academic-color);
            border-radius: 20px;
            padding: 0.3rem 0.8rem;
            font-size: 0.8rem;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        
        @media (max-width: 768px) {
            .academic-header {
                text-align: center;
            }
            
            .file-card {
                flex-direction: column;
                text-align: center;
            }
            
            .file-icon {
                margin-right: 0;
                margin-bottom: 1rem;
            }
            
            .file-actions {
                margin-left: 0;
                margin-top: 1rem;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="academic-card">
                    <!-- Header Data Akademik -->
                    <div class="academic-header">
                        <div class="row align-items-center">
                            <div class="col-md-2 text-center text-md-start mb-3 mb-md-0">
                                <div class="academic-icon">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <h2 class="mb-2">{{ $akademik->judul }}</h2>
                                <div class="d-flex flex-wrap">
                                    <span class="category-badge">{{ $akademik->sub_kategori }}</span>
                                    <span class="category-badge">Data Akademik</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Informasi Data Akademik -->
                    <div class="p-4">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="info-card">
                                    <h4 class="section-title">Detail Informasi</h4>
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-tags"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Sub Kategori</h6>
                                            <p class="mb-0 text-muted">{{ $akademik->sub_kategori }}</p>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-heading"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Judul</h6>
                                            <p class="mb-0 text-muted">{{ $akademik->judul }}</p>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-align-left"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Deskripsi</h6>
                                            <div class="description-box">
                                                <p class="mb-0">{{ $akademik->deskripsi }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- File Dokumen -->
                                <div class="info-card">
                                    <h4 class="section-title">Dokumen Terkait</h4>
                                    @if($akademik->file_path)
                                    <div class="file-card">
                                        <div class="file-icon">
                                            <i class="fas fa-file-pdf"></i>
                                        </div>
                                        <div class="file-info">
                                            <h5>Dokumen Akademik</h5>
                                            <p>File terkait dengan data akademik ini</p>
                                        </div>
                                        <div class="file-actions">
                                            <a href="{{ Storage::url($akademik->file_path) }}" target="_blank" class="btn btn-primary btn-modern">
                                                <i class="fas fa-eye me-2"></i> Lihat
                                            </a>
                                            <a href="{{ Storage::url($akademik->file_path) }}" download class="btn btn-success btn-modern">
                                                <i class="fas fa-download me-2"></i> Unduh
                                            </a>
                                        </div>
                                    </div>
                                    @else
                                    <div class="text-center py-4">
                                        <i class="fas fa-file-excel display-4 text-muted mb-3"></i>
                                        <p class="text-muted">Tidak ada file yang dilampirkan</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Sidebar Informasi -->
                            <div class="col-md-4">
                                <!-- Statistik -->
                                <div class="stats-card mb-4" style="border-left: 4px solid #7209b7;">
                                    <div class="stats-icon" style="background-color: rgba(114, 9, 183, 0.1); color: #7209b7;">
                                        <i class="fas fa-file-alt"></i>
                                    </div>
                                    <div class="stats-number">156</div>
                                    <div class="stats-label">Dokumen Akademik</div>
                                </div>
                                
                                <div class="stats-card mb-4" style="border-left: 4px solid #4361ee;">
                                    <div class="stats-icon" style="background-color: rgba(67, 97, 238, 0.1); color: #4361ee;">
                                        <i class="fas fa-download"></i>
                                    </div>
                                    <div class="stats-number">342</div>
                                    <div class="stats-label">Total Unduhan</div>
                                </div>
                                
                                <div class="stats-card mb-4" style="border-left: 4px solid #4ade80;">
                                    <div class="stats-icon" style="background-color: rgba(74, 222, 128, 0.1); color: #4ade80;">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                    <div class="stats-number">1.2K</div>
                                    <div class="stats-label">Total Dilihat</div>
                                </div>
                                
                                <!-- Metadata -->
                                <div class="metadata-card mb-4">
                                    <h6 class="section-title">Metadata</h6>
                                    <div class="metadata-item">
                                        <span class="metadata-label">Status</span>
                                        <span class="metadata-value">
                                            <span class="badge bg-success">Aktif</span>
                                        </span>
                                    </div>
                                    <div class="metadata-item">
                                        <span class="metadata-label">Dibuat</span>
                                        <span class="metadata-value">15 Nov 2023</span>
                                    </div>
                                    <div class="metadata-item">
                                        <span class="metadata-label">Diperbarui</span>
                                        <span class="metadata-value">20 Nov 2023</span>
                                    </div>
                                    <div class="metadata-item">
                                        <span class="metadata-label">Jenis File</span>
                                        <span class="metadata-value">PDF</span>
                                    </div>
                                    <div class="metadata-item">
                                        <span class="metadata-label">Ukuran</span>
                                        <span class="metadata-value">3.2 MB</span>
                                    </div>
                                </div>
                                
                                <!-- Tindakan Cepat -->
                                <div class="metadata-card">
                                    <h6 class="section-title">Tindakan Cepat</h6>
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-outline-primary btn-modern">
                                            <i class="fas fa-share-alt me-2"></i> Bagikan
                                        </button>
                                        <button class="btn btn-outline-success btn-modern">
                                            <i class="fas fa-print me-2"></i> Cetak
                                        </button>
                                        <button class="btn btn-outline-info btn-modern">
                                            <i class="fas fa-history me-2"></i> Riwayat
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Tombol Aksi -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('akademik.index') }}" class="btn btn-outline-secondary btn-modern">
                                <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar
                            </a>
                            <div>
                                <a href="{{ route('akademik.edit', $akademik->id) }}" class="btn btn-primary btn-modern">
                                    <i class="fas fa-edit me-2"></i> Edit Data
                                </a>
                                <button class="btn btn-danger btn-modern">
                                    <i class="fas fa-trash me-2"></i> Hapus
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>