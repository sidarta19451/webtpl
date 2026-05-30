<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Agenda</title>
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
        
        .current-photo {
            text-align: center;
            margin-top: 15px;
        }
        
        .current-photo img {
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
            max-width: 200px;
            max-height: 200px;
            object-fit: cover;
        }
        
        .current-photo img:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
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
        
        .date-container {
            background: linear-gradient(135deg, #f8f9fc 0%, #e9ecef 100%);
            padding: 20px;
            border-radius: 15px;
            border: 2px solid #e3e6f0;
        }
        
        .activity-type-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-left: 10px;
        }
        
        .badge-kegiatan {
            background-color: rgba(78, 115, 223, 0.1);
            color: var(--primary-color);
        }
        
        .badge-kemahasiswaan {
            background-color: rgba(28, 200, 138, 0.1);
            color: var(--success-color);
        }
        
        .activity-option {
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 5px;
            transition: all 0.2s;
        }
        
        .activity-option:hover {
            background-color: #f0f4ff;
        }
        
        .activity-select {
            max-height: 300px;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-calendar-alt floating-icon"></i>
                        <h4 class="card-title">Update Data Agenda</h4>
                        <p class="text-center mb-0 mt-2 opacity-75">Perbarui jadwal dan informasi agenda</p>
                    </div>
                    
                    <div class="form-container">
                        <form action="{{ route('agenda.update', $agenda) }}" method="POST" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            
                            <!-- Kegiatan Section -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="fas fa-tasks me-2"></i>Pilih Kegiatan
                                </h5>
                                
                                <div class="mb-4">
                                    <label class="form-label">
                                        <i class="fas fa-list-alt"></i>Kegiatan
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="fas fa-list-alt text-primary"></i>
                                        </span>
                                        <select name="kegiatan" class="form-control activity-select" required>
                                            <option value="">Pilih Kegiatan</option>
                                            @foreach($kegiatan as $kg)
                                                <option value="kegiatan-{{ $kg->id }}" {{ $agenda->kegiatan_type == 'kegiatan' && $agenda->kegiatan_id == $kg->id ? 'selected' : '' }}>
                                                    <span class="activity-type-badge badge-kegiatan">Kegiatan</span> {{ $kg->judul }}
                                                </option>
                                            @endforeach
                                            @foreach($kemahasiswaan as $km)
                                                <option value="kemahasiswaan-{{ $km->id }}" {{ $agenda->kegiatan_type == 'kemahasiswaan' && $agenda->kemahasiswaan_id == $km->id ? 'selected' : '' }}>
                                                    <span class="activity-type-badge badge-kemahasiswaan">{{ $km->sub_kategori }}</span> {{ $km->judul }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-2">
                                        <small class="text-muted">
                                            Pilih kegiatan dari daftar yang tersedia:
                                            <span class="activity-type-badge badge-kegiatan">Kegiatan</span>
                                            <span class="activity-type-badge badge-kemahasiswaan">Kemahasiswaan</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Tanggal Section -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="fas fa-calendar me-2"></i>Jadwal Kegiatan
                                </h5>
                                
                                <div class="date-container">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">
                                                <i class="fas fa-play-circle"></i>Tanggal Mulai
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="fas fa-calendar-day text-primary"></i>
                                                </span>
                                                <input type="date" name="tanggal_mulai" class="form-control" value="{{ $agenda->tanggal_mulai }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">
                                                <i class="fas fa-flag-checkered"></i>Tanggal Selesai
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="fas fa-calendar-check text-primary"></i>
                                                </span>
                                                <input type="date" name="tanggal_selesai" class="form-control" value="{{ $agenda->tanggal_selesai }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Foto Section -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="fas fa-image me-2"></i>Foto Dokumentasi
                                </h5>
                                
                                <div class="file-upload-container">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            <i class="fas fa-camera"></i>Foto
                                        </label>
                                        <div class="file-input-wrapper">
                                            <button type="button" class="file-input-button">
                                                <i class="fas fa-cloud-upload-alt me-2"></i>Pilih Foto Baru
                                            </button>
                                            <input type="file" name="foto" class="form-control" accept="image/png,image/jpg,image/jpeg">
                                        </div>
                                        <p class="small text-muted mt-2">Format yang didukung: JPG, JPEG, PNG. Maksimal 5MB.</p>
                                    </div>
                                    
                                    @if($agenda->foto)
                                        <div class="current-photo">
                                            <p class="mb-2 fw-bold">Foto saat ini:</p>
                                            <img src="{{ asset('storage/' . $agenda->foto) }}" alt="Foto Agenda" class="img-fluid">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="action-buttons">
                                <a href="{{ route('agenda.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Kembali
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save me-2"></i>Update Agenda
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
        
        // Add visual feedback for date inputs
        const dateInputs = document.querySelectorAll('input[type="date"]');
        dateInputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.parentElement.style.borderColor = 'var(--primary-color)';
                this.parentElement.parentElement.style.backgroundColor = '#f0f4ff';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.parentElement.style.borderColor = '#e3e6f0';
                this.parentElement.parentElement.style.backgroundColor = '';
            });
        });
        
        // Highlight selected option in the dropdown
        const selectElement = document.querySelector('select[name="kegiatan"]');
        selectElement.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            if (selectedOption.value) {
                this.style.borderLeft = '4px solid var(--primary-color)';
            } else {
                this.style.borderLeft = '';
            }
        });
        
        // Initialize selected option highlighting
        document.addEventListener('DOMContentLoaded', function() {
            if (selectElement.value) {
                selectElement.style.borderLeft = '4px solid var(--primary-color)';
            }
        });
    </script>
</body>
</html>