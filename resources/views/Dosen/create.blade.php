<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Dosen</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #4cc9f0;
            --card-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            --input-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        body {
            background-color: #f5f7fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .modern-card {
            border: none;
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        
        .modern-card:hover {
            transform: translateY(-5px);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1.5rem;
            border-bottom: none;
        }
        
        .card-body {
            padding: 2rem;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }
        
        .form-control, .form-select {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 1px solid #e1e5ee;
            transition: all 0.3s;
            box-shadow: var(--input-shadow);
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.15);
        }
        
        .btn-modern {
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
        }
        
        .btn-primary-modern {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
        }
        
        .btn-primary-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(67, 97, 238, 0.3);
        }
        
        .btn-secondary-modern {
            background: #6c757d;
            color: white;
        }
        
        .btn-secondary-modern:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }
        
        .btn-success-modern {
            background: linear-gradient(135deg, #4cc9f0, #4895ef);
            color: white;
        }
        
        .btn-success-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(76, 201, 240, 0.3);
        }
        
        .btn-danger-modern {
            background: linear-gradient(135deg, #f72585, #b5179e);
            color: white;
        }
        
        .btn-danger-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(247, 37, 133, 0.3);
        }
        
        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #e9ecef;
        }
        
        .link-item {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1rem;
            border-left: 4px solid var(--accent-color);
        }
        
        .input-group-modern {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            z-index: 5;
        }
        
        .input-with-icon {
            padding-left: 45px;
        }
        
        .floating-label {
            position: relative;
            margin-bottom: 1.5rem;
        }
        
        .floating-label .form-control {
            height: calc(3.5rem + 2px);
            padding: 1rem 0.75rem;
        }
        
        .floating-label label {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            padding: 1rem 0.75rem;
            pointer-events: none;
            border: 1px solid transparent;
            transform-origin: 0 0;
            transition: opacity .1s ease-in-out, transform .1s ease-in-out;
            color: #6c757d;
        }
        
        .floating-label .form-control:focus ~ label,
        .floating-label .form-control:not(:placeholder-shown) ~ label {
            opacity: .65;
            transform: scale(.85) translateY(-0.75rem) translateX(0.15rem);
        }
        
        @media (max-width: 768px) {
            .card-body {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="modern-card">
                    <div class="card-header text-center">
                        <h2 class="mb-0"><i class="fas fa-user-plus me-2"></i>Tambah Data Dosen</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dosen.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="section-title">
                                <i class="fas fa-id-card me-2"></i>Informasi Pribadi
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="input-group-modern">
                                        <i class="fas fa-id-badge input-icon"></i>
                                        <input type="text" name="nidn" class="form-control input-with-icon" 
                                        placeholder="Masukkan NIDN (10 angka)" 
                                        pattern="\d{10}" 
                                        title="NIDN harus terdiri dari tepat 10 angka" 
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 10)" 
                                        required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-group-modern">
                                        <i class="fas fa-user input-icon"></i>
                                        <input type="text" name="nama" class="form-control input-with-icon @error('nama') is-invalid @enderror" 
                                            placeholder="Masukkan Nama Lengkap" value="{{ old('nama') }}" required>
                                    </div>
                                    @error('nama')
                                        <div class="text-danger mt-1" style="font-size: 0.85rem;"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="input-group-modern">
                                        <i class="fas fa-envelope input-icon"></i>
                                        <input type="email" name="email" class="form-control input-with-icon @error('email') is-invalid @enderror" 
                                            placeholder="Masukkan Email" value="{{ old('email') }}" required>
                                    </div>
                                    @error('email')
                                        <div class="text-danger mt-1" style="font-size: 0.85rem;"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-group-modern">
                                        <i class="fas fa-graduation-cap input-icon"></i>
                                        <input type="text" name="jurusan" class="form-control input-with-icon" placeholder="Masukkan Jurusan" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="input-group-modern">
                                        <i class="fas fa-briefcase input-icon"></i>
                                        <input type="text" name="jabatan" class="form-control input-with-icon" placeholder="Masukkan Jabatan" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-group-modern">
                                        <i class="fas fa-camera input-icon"></i>
                                        <input type="file" name="foto" class="form-control input-with-icon">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="section-title mt-5">
                                <i class="fas fa-link me-2"></i>Link Akademik
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <div class="input-group-modern">
                                        <i class="fab fa-google input-icon"></i>
                                        <input type="url" name="link_google_scholar" class="form-control input-with-icon" placeholder="Link Google Scholar">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="input-group-modern">
                                        <i class="fas fa-book input-icon"></i>
                                        <input type="url" name="link_sinta" class="form-control input-with-icon" placeholder="Link Sinta">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="input-group-modern">
                                        <i class="fas fa-search input-icon"></i>
                                        <input type="url" name="link_scopus" class="form-control input-with-icon" placeholder="Link Scopus">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="section-title mt-5">
                                <i class="fas fa-flask me-2"></i>Link Penelitian
                            </div>
                            
                            <div id="link-penelitian-container">
                                <div class="link-item">
                                    <div class="row align-items-center">
                                        <div class="col-md-10">
                                            <div class="input-group-modern">
                                                <i class="fas fa-link input-icon"></i>
                                                <input type="url" name="link_penelitian[]" class="form-control input-with-icon" placeholder="https://example.com/research-link">
                                            </div>
                                        </div>
                                        <div class="col-md-2 text-end">
                                            <button type="button" class="btn btn-danger-modern btn-modern remove-link-penelitian">
                                                <i class="fas fa-trash me-1"></i> Hapus
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="text-center mt-4">
                                <button type="button" class="btn btn-primary-modern btn-modern me-2" id="add-link-penelitian">
                                    <i class="fas fa-plus me-1"></i> Tambah Link Penelitian
                                </button>
                            </div>
                            
                            <div class="d-flex justify-content-between mt-5">
                                <a href="{{ route('dosen.index') }}" class="btn btn-secondary-modern btn-modern">
                                    <i class="fas fa-arrow-left me-1"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-success-modern btn-modern">
                                    <i class="fas fa-save me-1"></i> Simpan Data
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
        document.getElementById('add-link-penelitian').addEventListener('click', function() {
            const container = document.getElementById('link-penelitian-container');
            const div = document.createElement('div');
            div.className = 'link-item';
            div.innerHTML = `
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <div class="input-group-modern">
                            <i class="fas fa-link input-icon"></i>
                            <input type="url" name="link_penelitian[]" class="form-control input-with-icon" placeholder="https://example.com/research-link">
                        </div>
                    </div>
                    <div class="col-md-2 text-end">
                        <button type="button" class="btn btn-danger-modern btn-modern remove-link-penelitian">
                            <i class="fas fa-trash me-1"></i> Hapus
                        </button>
                    </div>
                </div>
            `;
            container.appendChild(div);
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-link-penelitian') || 
                e.target.closest('.remove-link-penelitian')) {
                const button = e.target.classList.contains('remove-link-penelitian') ? 
                              e.target : e.target.closest('.remove-link-penelitian');
                button.closest('.link-item').remove();
            }
        });
    </script>
</body>
</html>