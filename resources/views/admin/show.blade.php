<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Admin</title>
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
                                <img src="{{ $admin->foto ? asset('storage/' . $admin->foto) : asset('template/img/undraw_profile.svg') }}" 
                                     alt="Foto Admin" class="profile-avatar">
                            </div>
                            <div class="col-md-9">
                                <h2 class="mb-2">{{ $admin->nama }}</h2>
                                <p class="mb-3">{{ $admin->bagian }}</p>
                                <div class="profile-badges d-flex flex-wrap">
                                    <span class="profile-badge"><i class="fas fa-envelope me-1"></i> {{ $admin->email }}</span>
                                    <span class="profile-badge"><i class="fas fa-phone me-1"></i> {{ $admin->no_tlp }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Informasi Admin -->
                    <div class="p-4">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="info-card">
                                    <h4 class="section-title">Informasi Pribadi</h4>
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Nama Lengkap</h6>
                                            <p class="mb-0 text-muted">{{ $admin->nama }}</p>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-briefcase"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Bagian</h6>
                                            <p class="mb-0 text-muted">{{ $admin->bagian }}</p>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Email</h6>
                                            <p class="mb-0 text-muted">{{ $admin->email }}</p>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">No. Telepon</h6>
                                            <p class="mb-0 text-muted">{{ $admin->no_tlp }}</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Aktivitas Terbaru -->
                                <div class="info-card">
                                    <h4 class="section-title">Aktivitas Terbaru</h4>
                                    <div class="list-group list-group-flush">
                                        <div class="list-group-item d-flex align-items-center px-0">
                                            <div class="bg-primary bg-opacity-10 p-2 rounded me-3">
                                                <i class="fas fa-user-plus text-primary"></i>
                                            </div>
                                            <div>
                                                <p class="mb-0 fw-semibold">Menambahkan pengguna baru</p>
                                                <small class="text-muted">2 jam yang lalu</small>
                                            </div>
                                        </div>
                                        <div class="list-group-item d-flex align-items-center px-0">
                                            <div class="bg-success bg-opacity-10 p-2 rounded me-3">
                                                <i class="fas fa-edit text-success"></i>
                                            </div>
                                            <div>
                                                <p class="mb-0 fw-semibold">Memperbarui data dosen</p>
                                                <small class="text-muted">Kemarin, 15:32</small>
                                            </div>
                                        </div>
                                        <div class="list-group-item d-flex align-items-center px-0">
                                            <div class="bg-info bg-opacity-10 p-2 rounded me-3">
                                                <i class="fas fa-file-export text-info"></i>
                                            </div>
                                            <div>
                                                <p class="mb-0 fw-semibold">Mengekspor laporan bulanan</p>
                                                <small class="text-muted">3 hari yang lalu</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Sidebar Informasi -->
                            <div class="col-md-4">
                                <!-- Statistik -->
                                <div class="stats-card mb-4" style="border-left: 4px solid #4361ee;">
                                    <div class="stats-icon" style="background-color: rgba(67, 97, 238, 0.1); color: #4361ee;">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="stats-number">24</div>
                                    <div class="stats-label">Pengguna Terdaftar</div>
                                </div>
                                
                                <div class="stats-card mb-4" style="border-left: 4px solid #4ade80;">
                                    <div class="stats-icon" style="background-color: rgba(74, 222, 128, 0.1); color: #4ade80;">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                    <div class="stats-number">42</div>
                                    <div class="stats-label">Dosen Aktif</div>
                                </div>
                                
                                <div class="stats-card mb-4" style="border-left: 4px solid #f59e0b;">
                                    <div class="stats-icon" style="background-color: rgba(245, 158, 11, 0.1); color: #f59e0b;">
                                        <i class="fas fa-cog"></i>
                                    </div>
                                    <div class="stats-number">12</div>
                                    <div class="stats-label">Pengaturan Sistem</div>
                                </div>
                                
                                <!-- Akses Cepat -->
                                <div class="info-card">
                                    <h6 class="section-title">Akses Cepat</h6>
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-outline-primary btn-modern">
                                            <i class="fas fa-user-plus me-2"></i> Tambah Pengguna
                                        </button>
                                        <button class="btn btn-outline-success btn-modern">
                                            <i class="fas fa-file-export me-2"></i> Ekspor Data
                                        </button>
                                        <button class="btn btn-outline-info btn-modern">
                                            <i class="fas fa-cog me-2"></i> Pengaturan Sistem
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Tombol Aksi -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('admin.index') }}" class="btn btn-outline-secondary btn-modern">
                                <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar
                            </a>
                            <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-primary btn-modern">
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