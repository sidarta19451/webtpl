<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Dosen</title>
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
        
        .profile-card {
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: none;
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        
        .profile-card:hover {
            transform: translateY(-5px);
        }
        
        .profile-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem 1.5rem;
            position: relative;
        }
        
        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        
        .profile-badge {
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
        
        .link-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .link-badge:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
        
        .link-section {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }
        
        @media (max-width: 768px) {
            .profile-header {
                text-align: center;
            }
            
            .profile-badges {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="profile-card">
                    <!-- Header Profil -->
                    <div class="profile-header">
                        <div class="row align-items-center">
                            <div class="col-md-3 text-center text-md-start mb-3 mb-md-0">
                                <img src="{{ $dosen->foto ? asset('storage/' . $dosen->foto) : asset('template/img/undraw_profile.svg') }}" 
                                     alt="Foto Dosen" class="profile-avatar">
                            </div>
                            <div class="col-md-9">
                                <h2 class="mb-2">{{ $dosen->nama }}</h2>
                                <p class="mb-3">{{ $dosen->jabatan }} - {{ $dosen->jurusan }}</p>
                                <div class="profile-badges d-flex flex-wrap">
                                    <span class="profile-badge"><i class="fas fa-id-card me-1"></i> {{ $dosen->nidn }}</span>
                                    <span class="profile-badge"><i class="fas fa-envelope me-1"></i> {{ $dosen->email }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Informasi Dosen -->
                    <div class="p-4">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="info-card">
                                    <h4 class="section-title">Informasi Pribadi</h4>
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-id-card"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">NIDN</h6>
                                            <p class="mb-0 text-muted">{{ $dosen->nidn }}</p>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Nama Lengkap</h6>
                                            <p class="mb-0 text-muted">{{ $dosen->nama }}</p>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Email</h6>
                                            <p class="mb-0 text-muted">{{ $dosen->email }}</p>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-graduation-cap"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Jurusan</h6>
                                            <p class="mb-0 text-muted">{{ $dosen->jurusan }}</p>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-briefcase"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Jabatan</h6>
                                            <p class="mb-0 text-muted">{{ $dosen->jabatan }}</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Link Eksternal -->
                                <div class="info-card">
                                    <h4 class="section-title">Link Eksternal</h4>
                                    <div class="link-section">
                                        @if($dosen->link_google_scholar)
                                        <a href="{{ $dosen->link_google_scholar }}" target="_blank" class="link-badge text-white" style="background-color: #4285F4;">
                                            <i class="fab fa-google me-2"></i> Google Scholar
                                        </a>
                                        @endif
                                        
                                        @if($dosen->link_sinta)
                                        <a href="{{ $dosen->link_sinta }}" target="_blank" class="link-badge text-white" style="background-color: #34A853;">
                                            <i class="fas fa-graduation-cap me-2"></i> Sinta
                                        </a>
                                        @endif
                                        
                                        @if($dosen->link_scopus)
                                        <a href="{{ $dosen->link_scopus }}" target="_blank" class="link-badge text-white" style="background-color: #E63829;">
                                            <i class="fas fa-book me-2"></i> Scopus
                                        </a>
                                        @endif
                                        
                                        @if($dosen->link_penelitian && is_array($dosen->link_penelitian))
                                            @foreach($dosen->link_penelitian as $link)
                                            <a href="{{ $link }}" target="_blank" class="link-badge text-white" style="background-color: #F59E0B;">
                                                <i class="fas fa-link me-2"></i> Penelitian {{ $loop->iteration }}
                                            </a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Sidebar Informasi -->
                            <div class="col-md-4">
                                <div class="info-card text-center">
                                    <div class="mb-3">
                                        <i class="fas fa-user-tie display-4 text-primary"></i>
                                    </div>
                                    <h5>Status Dosen</h5>
                                    <p class="text-muted">Aktif Mengajar</p>
                                </div>
                                
                                <div class="info-card">
                                    <h6 class="section-title">Kontak</h6>
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-outline-primary btn-modern">
                                            <i class="fas fa-envelope me-2"></i> Kirim Email
                                        </button>
                                        <button class="btn btn-outline-success btn-modern">
                                            <i class="fas fa-phone me-2"></i> Hubungi
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="info-card">
                                    <h6 class="section-title">Statistik</h6>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Publikasi</span>
                                        <span class="fw-bold">24</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Penelitian</span>
                                        <span class="fw-bold">12</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Pengabdian</span>
                                        <span class="fw-bold">8</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Tombol Aksi -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('dosen.index') }}" class="btn btn-outline-secondary btn-modern">
                                <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar
                            </a>
                            <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn btn-primary btn-modern">
                                <i class="fas fa-edit me-2"></i> Edit Profil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>