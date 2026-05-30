<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Dosen</title>
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
            background-color: #f8f9fc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            transition: all 0.3s;
        }
        
        .card:hover {
            box-shadow: 0 0.5rem 2rem 0 rgba(58, 59, 69, 0.2);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary-color), #6f42c1);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 1.5rem;
        }
        
        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #d1d3e2;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 8px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), #6f42c1);
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        
        .btn-secondary {
            background-color: var(--secondary-color);
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-secondary:hover {
            background-color: #717384;
            transform: translateY(-2px);
        }
        
        .btn-success {
            background: linear-gradient(135deg, var(--success-color), #17a673);
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        
        .btn-danger {
            background: linear-gradient(135deg, var(--danger-color), #be2617);
            border: none;
            border-radius: 10px;
            padding: 8px 15px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .profile-image {
            border-radius: 10px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
            transition: all 0.3s;
        }
        
        .profile-image:hover {
            transform: scale(1.05);
        }
        
        .link-penelitian-item {
            margin-bottom: 15px;
            padding: 15px;
            border-radius: 10px;
            background-color: #f8f9fc;
            border-left: 4px solid var(--primary-color);
            transition: all 0.3s;
        }
        
        .link-penelitian-item:hover {
            background-color: #eef2f7;
        }
        
        .section-title {
            color: var(--primary-color);
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-weight: 700;
        }
        
        .form-section {
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 25px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
        }
        
        .icon-wrapper {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(78, 115, 223, 0.1);
            margin-right: 10px;
        }
        
        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
            margin-top: 30px;
        }
        
        @media (max-width: 768px) {
            .action-buttons {
                flex-direction: column;
            }
            
            .action-buttons .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div class="icon-wrapper">
                        <i class="fas fa-user-edit text-primary"></i>
                    </div>
                    <div>
                        <h4 class="m-0">Update Data Dosen</h4>
                        <p class="m-0 mt-1 opacity-75">Perbarui informasi dosen dengan data terbaru</p>
                    </div>
                </div>
            </div>
            
            <div class="card-body p-4">
                <form action="{{ route('dosen.update', $dosen->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    
                    <!-- Informasi Pribadi Section -->
                    <div class="form-section">
                        <h5 class="section-title">
                            <i class="fas fa-id-card me-2"></i>Informasi Pribadi
                        </h5>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nidn" class="form-label">NIDN</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-id-badge text-primary"></i>
                                    </span>
                                    <input type="text" id="nidn" name="nidn" class="form-control" required value="{{ $dosen->nidn }}">
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-user text-primary"></i>
                                    </span>
                                    <input type="text" id="nama" name="nama" class="form-control" required value="{{ $dosen->nama }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-envelope text-primary"></i>
                                    </span>
                                    <input type="email" id="email" name="email" class="form-control" required value="{{ $dosen->email }}">
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-graduation-cap text-primary"></i>
                                    </span>
                                    <input type="text" id="jurusan" name="jurusan" class="form-control" required value="{{ $dosen->jurusan }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-briefcase text-primary"></i>
                                    </span>
                                    <input type="text" id="jabatan" name="jabatan" class="form-control" required value="{{ $dosen->jabatan }}">
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="foto" class="form-label">Foto Profil</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-camera text-primary"></i>
                                    </span>
                                    <input type="file" id="foto" name="foto" class="form-control">
                                </div>
                                @if($dosen->foto)
                                    <div class="mt-2">
                                        <p class="mb-1 small text-muted">Foto saat ini:</p>
                                        <img src="{{ asset('storage/' .$dosen->foto) }}" class="profile-image" width="100" alt="Foto Profil">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <!-- Link Akademik Section -->
                    <div class="form-section">
                        <h5 class="section-title">
                            <i class="fas fa-link me-2"></i>Link Akademik
                        </h5>
                        
                        <div class="mb-3">
                            <label for="link_google_scholar" class="form-label">Google Scholar</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-graduation-cap text-primary"></i>
                                </span>
                                <input type="url" id="link_google_scholar" name="link_google_scholar" class="form-control" placeholder="https://scholar.google.com/citations?user=username" value="{{ $dosen->link_google_scholar }}">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="link_sinta" class="form-label">Sinta</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-book text-primary"></i>
                                </span>
                                <input type="url" id="link_sinta" name="link_sinta" class="form-control" placeholder="https://sinta.kemdikbud.go.id/authors/profile/..." value="{{ $dosen->link_sinta }}">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="link_scopus" class="form-label">Scopus</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-search text-primary"></i>
                                </span>
                                <input type="url" id="link_scopus" name="link_scopus" class="form-control" placeholder="https://www.scopus.com/authid/detail.uri?authorId=..." value="{{ $dosen->link_scopus }}">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Link Penelitian Section -->
                    <div class="form-section">
                        <h5 class="section-title">
                            <i class="fas fa-flask me-2"></i>Link Penelitian
                        </h5>
                        
                        <div id="link-penelitian-container">
                            @if($dosen->link_penelitian && is_array($dosen->link_penelitian))
                                @foreach($dosen->link_penelitian as $link)
                                    <div class="link-penelitian-item">
                                        <label class="form-label">Link Penelitian</label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text bg-light">
                                                <i class="fas fa-link text-primary"></i>
                                            </span>
                                            <input type="url" name="link_penelitian[]" class="form-control" placeholder="https://example.com/research-link" value="{{ $link }}">
                                            <button type="button" class="btn btn-danger remove-link-penelitian">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="link-penelitian-item">
                                    <label class="form-label">Link Penelitian</label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text bg-light">
                                            <i class="fas fa-link text-primary"></i>
                                        </span>
                                        <input type="url" name="link_penelitian[]" class="form-control" placeholder="https://example.com/research-link">
                                        <button type="button" class="btn btn-danger remove-link-penelitian">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        
                        <button type="button" class="btn btn-outline-primary mt-3" id="add-link-penelitian">
                            <i class="fas fa-plus me-2"></i>Tambah Link Penelitian
                        </button>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <a href="{{ route('dosen.index') }}" class="btn btn-secondary">
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

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.getElementById('add-link-penelitian').addEventListener('click', function() {
            const container = document.getElementById('link-penelitian-container');
            const div = document.createElement('div');
            div.className = 'link-penelitian-item';
            div.innerHTML = `
                <label class="form-label">Link Penelitian</label>
                <div class="input-group mb-2">
                    <span class="input-group-text bg-light">
                        <i class="fas fa-link text-primary"></i>
                    </span>
                    <input type="url" name="link_penelitian[]" class="form-control" placeholder="https://example.com/research-link">
                    <button type="button" class="btn btn-danger remove-link-penelitian">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;
            container.appendChild(div);
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-link-penelitian') || 
                e.target.parentElement.classList.contains('remove-link-penelitian')) {
                const button = e.target.classList.contains('remove-link-penelitian') ? 
                              e.target : e.target.parentElement;
                button.closest('.link-penelitian-item').remove();
            }
        });
    </script>
</body>
</html>