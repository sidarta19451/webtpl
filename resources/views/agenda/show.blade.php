<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Agenda</title>
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
        }
        
        body {
            background-color: #f5f7fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .agenda-card {
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: none;
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        
        .agenda-card:hover {
            transform: translateY(-5px);
        }
        
        .agenda-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem 1.5rem;
            position: relative;
        }
        
        .agenda-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        
        .agenda-badge {
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
            background: rgba(67, 97, 238, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: var(--primary-color);
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
            background: var(--primary-color);
            border-radius: 3px;
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
        
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .calendar-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            text-align: center;
        }
        
        .calendar-month {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 0.5rem;
        }
        
        .calendar-day {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            line-height: 1;
        }
        
        .calendar-year {
            font-size: 1rem;
            color: #6c757d;
            margin-top: 0.5rem;
        }
        
        .duration-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            text-align: center;
        }
        
        .duration-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
        }
        
        .duration-value {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .duration-label {
            font-size: 0.9rem;
            color: #6c757d;
        }
        
        @media (max-width: 768px) {
            .agenda-header {
                text-align: center;
            }
            
            .agenda-badges {
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
                <div class="agenda-card">
                    <!-- Header Agenda -->
                    <div class="agenda-header">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h2 class="mb-2">{{ $agenda->kegiatan_display }}</h2>
                                <div class="agenda-badges d-flex flex-wrap">
                                    <span class="agenda-badge"><i class="fas fa-calendar me-1"></i> {{ $agenda->tanggal_mulai }}</span>
                                    <span class="agenda-badge"><i class="fas fa-calendar-check me-1"></i> {{ $agenda->tanggal_selesai }}</span>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <span class="status-badge bg-success text-white">
                                    <i class="fas fa-check-circle me-1"></i> Aktif
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Informasi Agenda -->
                    <div class="p-4">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="info-card">
                                    <h4 class="section-title">Detail Kegiatan</h4>
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-tasks"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Kegiatan</h6>
                                            <p class="mb-0 text-muted">{{ $agenda->kegiatan_display }}</p>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-play-circle"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Tanggal Mulai</h6>
                                            <p class="mb-0 text-muted">{{ $agenda->tanggal_mulai }}</p>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-flag-checkered"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Tanggal Selesai</h6>
                                            <p class="mb-0 text-muted">{{ $agenda->tanggal_selesai }}</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Foto Agenda -->
                                <div class="info-card">
                                    <h4 class="section-title">Gambar Kegiatan</h4>
                                    <div class="text-center">
                                        @if($agenda->foto)
                                            <img src="{{ asset('storage/' . $agenda->foto) }}" alt="Foto agenda" class="agenda-image">
                                        @else
                                            <img src="{{ asset('template/img/undraw_profile.svg') }}" alt="Default Foto" class="agenda-image">
                                        @endif
                                    </div>
                                </div>
                                
                                <!-- Timeline Agenda -->
                                <div class="timeline-card">
                                    <h4 class="section-title">Timeline Kegiatan</h4>
                                    <div class="timeline-item">
                                        <div class="timeline-icon bg-primary text-white">
                                            <i class="fas fa-play"></i>
                                        </div>
                                        <div class="timeline-connector"></div>
                                        <div class="timeline-content">
                                            <h6 class="mb-1">Mulai Kegiatan</h6>
                                            <p class="mb-0 text-muted">{{ $agenda->tanggal_mulai }}</p>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-icon bg-warning text-white">
                                            <i class="fas fa-spinner"></i>
                                        </div>
                                        <div class="timeline-connector"></div>
                                        <div class="timeline-content">
                                            <h6 class="mb-1">Progress Kegiatan</h6>
                                            <p class="mb-0 text-muted">Sedang berlangsung</p>
                                            <div class="progress mt-2" style="height: 8px;">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-icon bg-success text-white">
                                            <i class="fas fa-flag"></i>
                                        </div>
                                        <div class="timeline-content">
                                            <h6 class="mb-1">Selesai Kegiatan</h6>
                                            <p class="mb-0 text-muted">{{ $agenda->tanggal_selesai }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Sidebar Informasi -->
                            <div class="col-md-4">
                                <!-- Kalender -->
                                <div class="calendar-card mb-4">
                                    <div class="calendar-month">NOVEMBER</div>
                                    <div class="calendar-day">15</div>
                                    <div class="calendar-year">2023</div>
                                    <div class="mt-3">
                                        <span class="badge bg-primary">Sedang Berlangsung</span>
                                    </div>
                                </div>
                                
                                <!-- Durasi -->
                                <div class="duration-card mb-4">
                                    <div class="duration-icon bg-info text-white">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div class="duration-value">5 Hari</div>
                                    <div class="duration-label">Durasi Kegiatan</div>
                                </div>
                                
                                <!-- Tindakan Cepat -->
                                <div class="info-card">
                                    <h6 class="section-title">Tindakan Cepat</h6>
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-outline-primary btn-modern">
                                            <i class="fas fa-share-alt me-2"></i> Bagikan
                                        </button>
                                        <button class="btn btn-outline-success btn-modern">
                                            <i class="fas fa-calendar-plus me-2"></i> Tambah ke Kalender
                                        </button>
                                        <button class="btn btn-outline-info btn-modern">
                                            <i class="fas fa-print me-2"></i> Cetak
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- Peserta -->
                                <div class="info-card mt-4">
                                    <h6 class="section-title">Peserta</h6>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="bg-primary bg-opacity-10 p-2 rounded me-3">
                                            <i class="fas fa-users text-primary"></i>
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-semibold">42 Peserta</p>
                                            <small class="text-muted">Terdaftar</small>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-success bg-opacity-10 p-2 rounded me-3">
                                            <i class="fas fa-user-check text-success"></i>
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-semibold">35 Konfirmasi</p>
                                            <small class="text-muted">Hadir</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Tombol Aksi -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('agenda.index') }}" class="btn btn-outline-secondary btn-modern">
                                <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar
                            </a>
                            <div>
                                <a href="{{ route('agenda.edit', $agenda->id) }}" class="btn btn-primary btn-modern">
                                    <i class="fas fa-edit me-2"></i> Edit Agenda
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