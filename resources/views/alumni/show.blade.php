<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Alumni - Teknik Perangkat Lunak</title>
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
            --alumni-color: #7209b7;
        }
        
        body {
            background-color: #f5f7fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .alumni-card {
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: none;
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        
        .alumni-card:hover {
            transform: translateY(-5px);
        }
        
        .alumni-header {
            background: linear-gradient(135deg, var(--alumni-color), #560bad);
            color: white;
            padding: 2rem 1.5rem;
            position: relative;
        }
        
        .alumni-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        
        .alumni-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 0.3rem 0.8rem;
            font-size: 0.8rem;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
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
            align-items: center;
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
            color: var(--alumni-color);
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
            background: var(--alumni-color);
            border-radius: 3px;
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
        
        .success-story {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 1.5rem;
            margin-top: 1rem;
            border-left: 4px solid var(--success-color);
            position: relative;
        }
        
        .success-story::before {
            content: '\f005';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            top: -10px;
            left: 15px;
            background: var(--success-color);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
        }
        
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .timeline-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            position: relative;
        }
        
        .timeline-item {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .timeline-item:last-child {
            margin-bottom: 0;
        }
        
        .timeline-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            z-index: 2;
        }
        
        .timeline-content {
            flex: 1;
        }
        
        .timeline-connector {
            position: absolute;
            left: 25px;
            top: 50px;
            bottom: -25px;
            width: 2px;
            background: #e9ecef;
            z-index: 1;
        }
        
        .timeline-item:last-child .timeline-connector {
            display: none;
        }
        
        .contact-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        .contact-item {
            display: flex;
            align-items: center;
            padding: 0.5rem 0;
        }
        
        .contact-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(67, 97, 238, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: var(--primary-color);
        }
        
        @media (max-width: 768px) {
            .alumni-header {
                text-align: center;
            }
            
            .alumni-badges {
                justify-content: center;
            }
            
            .timeline-item {
                flex-direction: column;
                text-align: center;
            }
            
            .timeline-icon {
                margin-right: 0;
                margin-bottom: 1rem;
            }
            
            .timeline-connector {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="alumni-card">
                    <!-- Header Profil Alumni -->
                    <div class="alumni-header">
                        <div class="row align-items-center">
                            <div class="col-md-3 text-center text-md-start mb-3 mb-md-0">
                                <img src="{{ $alumni->foto ? asset('storage/' . $alumni->foto) : asset('template/img/undraw_profile.svg') }}" 
                                     alt="Foto Alumni" class="alumni-avatar">
                            </div>
                            <div class="col-md-6">
                                <h2 class="mb-2">{{ $alumni->nama }}</h2>
                                <p class="mb-3">Alumni Teknik Perangkat Lunak</p>
                                <div class="alumni-badges d-flex flex-wrap">
                                    <span class="alumni-badge"><i class="fas fa-id-card me-1"></i> {{ $alumni->nim }}</span>
                                    <span class="alumni-badge"><i class="fas fa-graduation-cap me-1"></i> {{ $alumni->tahun_lulus }}</span>
                                    <span class="alumni-badge"><i class="fas fa-envelope me-1"></i> {{ $alumni->email }}</span>
                                </div>
                            </div>
                            <div class="col-md-3 text-center">
                                @if($alumni->status_pekerjaan)
                                    @if($alumni->status_pekerjaan == 'Bekerja')
                                        <span class="status-badge bg-success text-white">
                                            <i class="fas fa-briefcase me-1"></i> {{ $alumni->status_pekerjaan }}
                                        </span>
                                    @elseif($alumni->status_pekerjaan == 'Wirausaha')
                                        <span class="status-badge bg-primary text-white">
                                            <i class="fas fa-business-time me-1"></i> {{ $alumni->status_pekerjaan }}
                                        </span>
                                    @elseif($alumni->status_pekerjaan == 'Melanjutkan Studi')
                                        <span class="status-badge bg-info text-white">
                                            <i class="fas fa-user-graduate me-1"></i> {{ $alumni->status_pekerjaan }}
                                        </span>
                                    @elseif($alumni->status_pekerjaan == 'Belum Bekerja')
                                        <span class="status-badge bg-secondary text-white">
                                            <i class="fas fa-clock me-1"></i> {{ $alumni->status_pekerjaan }}
                                        </span>
                                    @else
                                        <span class="status-badge bg-warning text-white">
                                            <i class="fas fa-question me-1"></i> {{ $alumni->status_pekerjaan }}
                                        </span>
                                    @endif
                                @else
                                    <span class="status-badge bg-secondary text-white">
                                        <i class="fas fa-question me-1"></i> Belum ada informasi
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <!-- Informasi Alumni -->
                    <div class="p-4">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="info-card">
                                    <h4 class="section-title">Informasi Dasar</h4>
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-id-card"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">NIM</h6>
                                            <p class="mb-0 text-muted">{{ $alumni->nim }}</p>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Nama Lengkap</h6>
                                            <p class="mb-0 text-muted">{{ $alumni->nama }}</p>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Email</h6>
                                            <p class="mb-0 text-muted">{{ $alumni->email }}</p>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-graduation-cap"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Jurusan</h6>
                                            <p class="mb-0 text-muted">{{ $alumni->jurusan }}</p>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Tahun Lulus</h6>
                                            <p class="mb-0 text-muted">{{ $alumni->tahun_lulus }}</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Informasi Pekerjaan -->
                                @if($alumni->status_pekerjaan && $alumni->status_pekerjaan != 'Belum Bekerja')
                                <div class="info-card">
                                    <h4 class="section-title">Informasi Pekerjaan</h4>
                                    @if($alumni->nama_perusahaan)
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-building"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Perusahaan</h6>
                                            <p class="mb-0 text-muted">{{ $alumni->nama_perusahaan }}</p>
                                        </div>
                                    </div>
                                    @endif
                                    @if($alumni->jabatan)
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-user-tie"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Jabatan</h6>
                                            <p class="mb-0 text-muted">{{ $alumni->jabatan }}</p>
                                        </div>
                                    </div>
                                    @endif
                                    @if($alumni->lokasi_kerja)
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Lokasi Kerja</h6>
                                            <p class="mb-0 text-muted">{{ $alumni->lokasi_kerja }}</p>
                                        </div>
                                    </div>
                                    @endif
                                    @if($alumni->gaji)
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-money-bill-wave"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Gaji</h6>
                                            <p class="mb-0 text-muted">Rp {{ number_format($alumni->gaji, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                @endif
                                
                                <!-- Kisah Sukses -->
                                @if($alumni->kisah_sukses)
                                <div class="info-card">
                                    <h4 class="section-title">Kisah Sukses</h4>
                                    <div class="success-story">
                                        <p class="mb-0">{{ $alumni->kisah_sukses }}</p>
                                    </div>
                                </div>
                                @endif
                            </div>
                            
                            <!-- Sidebar Informasi -->
                            <div class="col-md-4">
                                <!-- Ringkasan Tracer Studi -->
                                <div class="stats-card mb-4" style="border-left: 4px solid #7209b7;">
                                    <div class="stats-icon" style="background-color: rgba(114, 9, 183, 0.1); color: #7209b7;">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                    <div class="stats-number">{{ $alumni->tahun_lulus }}</div>
                                    <div class="stats-label">Tahun Lulus</div>
                                </div>
                                
                                <div class="stats-card mb-4" style="border-left: 4px solid #4ade80;">
                                    <div class="stats-icon" style="background-color: rgba(74, 222, 128, 0.1); color: #4ade80;">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <div class="stats-number">
                                        @if($alumni->status_pekerjaan && $alumni->status_pekerjaan != 'Belum Bekerja')
                                            <i class="fas fa-check text-success"></i>
                                        @else
                                            <i class="fas fa-times text-danger"></i>
                                        @endif
                                    </div>
                                    <div class="stats-label">Sudah Bekerja</div>
                                </div>
                                
                                <div class="stats-card mb-4" style="border-left: 4px solid #38bdf8;">
                                    <div class="stats-icon" style="background-color: rgba(56, 189, 248, 0.1); color: #38bdf8;">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div class="stats-number">{{ now()->year - $alumni->tahun_lulus }}</div>
                                    <div class="stats-label">Tahun Setelah Lulus</div>
                                </div>
                                
                                <!-- Timeline Perjalanan -->
                                <div class="timeline-card mb-4">
                                    <h6 class="section-title">Perjalanan Karir</h6>
                                    <div class="timeline-item">
                                        <div class="timeline-icon bg-primary text-white">
                                            <i class="fas fa-graduation-cap"></i>
                                        </div>
                                        <div class="timeline-connector"></div>
                                        <div class="timeline-content">
                                            <h6 class="mb-1">Lulus Kuliah</h6>
                                            <p class="mb-0 text-muted">{{ $alumni->tahun_lulus }}</p>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-icon bg-success text-white">
                                            <i class="fas fa-briefcase"></i>
                                        </div>
                                        <div class="timeline-connector"></div>
                                        <div class="timeline-content">
                                            <h6 class="mb-1">Mulai Bekerja</h6>
                                            <p class="mb-0 text-muted">{{ $alumni->tahun_lulus + 1 }}</p>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-icon bg-info text-white">
                                            <i class="fas fa-chart-line"></i>
                                        </div>
                                        <div class="timeline-content">
                                            <h6 class="mb-1">Posisi Saat Ini</h6>
                                            <p class="mb-0 text-muted">{{ $alumni->jabatan ?: 'Sedang mencari' }}</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Kontak -->
                                <div class="contact-card">
                                    <h6 class="section-title">Kontak</h6>
                                    <div class="contact-item">
                                        <div class="contact-icon">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-semibold">{{ $alumni->email }}</p>
                                            <small class="text-muted">Email</small>
                                        </div>
                                    </div>
                                    <div class="contact-item">
                                        <div class="contact-icon">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-semibold">+62 812-3456-7890</p>
                                            <small class="text-muted">Telepon</small>
                                        </div>
                                    </div>
                                    <div class="contact-item">
                                        <div class="contact-icon">
                                            <i class="fab fa-linkedin"></i>
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-semibold">LinkedIn Profile</p>
                                            <small class="text-muted">LinkedIn</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Tombol Aksi -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('alumni.index') }}" class="btn btn-outline-secondary btn-modern">
                                <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar
                            </a>
                            <div>
                                <a href="{{ route('alumni.edit', $alumni->id) }}" class="btn btn-primary btn-modern">
                                    <i class="fas fa-edit me-2"></i> Edit Profil
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