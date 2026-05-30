<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Admin</title>
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
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
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
        
        .profile-image-container {
            text-align: center;
            margin-bottom: 20px;
            padding: 20px;
            background: linear-gradient(135deg, #f8f9fc 0%, #e9ecef 100%);
            border-radius: 15px;
            border: 2px dashed #d1d3e2;
            transition: all 0.3s;
        }
        
        .profile-image-container:hover {
            border-color: var(--primary-color);
            background: linear-gradient(135deg, #f0f4ff 0%, #e2e8ff 100%);
        }
        
        .profile-image {
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
            max-width: 150px;
            max-height: 150px;
            object-fit: cover;
        }
        
        .profile-image:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        
        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            margin-top: 15px;
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
        
        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e3e6f0;
        }
        
        @media (max-width: 768px) {
            .form-col {
                flex: 0 0 100%;
                max-width: 100%;
                margin-bottom: 20px;
            }
            
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
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-user-cog floating-icon"></i>
                        <h4 class="card-title">Update Data Admin</h4>
                        <p class="text-center mb-0 mt-2 opacity-75">Perbarui informasi akun administrator</p>
                    </div>
                    
                    <div class="form-container">
                        <form action="{{ route('admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            
                            <div class="profile-image-container">
                                @if ($admin->foto)
                                    <img src="{{ asset('storage/' . $admin->foto) }}" class="profile-image mb-3" alt="Foto Profil">
                                @else
                                    <div class="mb-3">
                                        <i class="fas fa-user-circle" style="font-size: 80px; color: #d1d3e2;"></i>
                                    </div>
                                @endif
                                <div class="file-input-wrapper">
                                    <button type="button" class="file-input-button">
                                        <i class="fas fa-camera me-2"></i>Pilih Foto Baru
                                    </button>
                                    <input type="file" name="foto" class="form-control">
                                </div>
                                <p class="small text-muted mt-2">Format: JPG, PNG. Maksimal 2MB</p>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-col">
                                    <div class="mb-4">
                                        <label class="form-label">
                                            <i class="fas fa-user"></i>Nama Lengkap
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="fas fa-user text-primary"></i>
                                            </span>
                                            <input type="text" name="nama" class="form-control" required value="{{ $admin->nama }}" placeholder="Masukkan nama lengkap">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-col">
                                    <div class="mb-4">
                                        <label class="form-label">
                                            <i class="fas fa-envelope"></i>Email
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="fas fa-envelope text-primary"></i>
                                            </span>
                                            <input type="email" name="email" class="form-control" required value="{{ $admin->email }}" placeholder="contoh@email.com">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-col">
                                    <div class="mb-4">
                                        <label class="form-label">
                                            <i class="fas fa-briefcase"></i>Bagian
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="fas fa-briefcase text-primary"></i>
                                            </span>
                                            <select name="bagian" class="form-control" required>
                                                <option value="">Pilih Bagian</option>
                                                <option value="Administrasi" {{ $admin->bagian == 'Administrasi' ? 'selected' : '' }}>Administrasi</option>
                                                <option value="Keuangan" {{ $admin->bagian == 'Keuangan' ? 'selected' : '' }}>Keuangan</option>
                                                <option value="Akademik" {{ $admin->bagian == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                                                <option value="IT" {{ $admin->bagian == 'IT' ? 'selected' : '' }}>IT</option>
                                                <option value="SDM" {{ $admin->bagian == 'SDM' ? 'selected' : '' }}>SDM</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-col">
                                    <div class="mb-4">
                                        <label class="form-label">
                                            <i class="fas fa-phone"></i>No. Telepon
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="fas fa-phone text-primary"></i>
                                            </span>
                                            <input type="text" name="no_tlp" class="form-control" required value="{{ $admin->no_tlp }}" placeholder="Contoh: 08123456789">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="action-buttons">
                                <a href="{{ route('admin.index') }}" class="btn btn-secondary">
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
        document.querySelector('input[name="foto"]').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name || 'Tidak ada file dipilih';
            document.querySelector('.file-input-button').innerHTML = 
                `<i class="fas fa-file-image me-2"></i>${fileName}`;
        });
    </script>
</body>
</html>