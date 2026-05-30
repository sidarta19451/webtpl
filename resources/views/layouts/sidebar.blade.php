<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{route ('mahasiswa.index')}}">List Data</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li> --}}

    <!-- Nav Item - Data Dosen & Data Mahasiswa -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
            aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-folder"></i>
            <span>SDM</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('dosen.index') }}">List Data Dosen</a>
                <a class="collapse-item" href="{{ route('mahasiswa.index') }}">List Data Mahasiswa</a>
                <a class="collapse-item" href="{{ route('admin.index') }}">List Data Staff</a>
            </div>
        </div>
    </li>
    
    <!-- Nav Item - Data Mahasiswa -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsesiswa"
            aria-expanded="true" aria-controls="collapsesiswa">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Data Mahasiswa</span>
        </a>
        <div id="collapsesiswa" class="collapse" aria-labelledby="headingsiswa"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('mahasiswa.index') }}">List Data Mahasiswa</a>
            </div>
        </div>
    </li> --}}

    {{-- Nav Item - Data Project --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-university"></i>
            <span>MAHASISWA</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('project.index') }}">List Data Project</a>
                <a class="collapse-item" href="{{ route('profil_prodi.index') }}">List Data Profil Prodi</a>
            </div>
        </div>
    </li>

    {{-- Nav Item - Data Profil Prodi --}}
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsesix"
            aria-expanded="true" aria-controls="collapsesix">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Data Profil Prodi</span>
        </a>
        <div id="collapsesix" class="collapse" aria-labelledby="headingsix"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('profil_prodi.index') }}">List Data Profil Prodi</a>
            </div>
        </div>
    </li> --}}

    {{-- Nav Item - Data Informasi --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsedelapan"
            aria-expanded="true" aria-controls="collapsedelapan">
            <i class="fas fa-fw fa-info-circle"></i>
            <span>INFORMASI</span>
        </a>
        <div id="collapsedelapan" class="collapse" aria-labelledby="headingdelapan"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('kurikulum.index') }}">List Data Kurikulum</a>
                <a class="collapse-item" href="{{ route('pengumuman.index') }}">List Data Pengumuman</a>
                <a class="collapse-item" href="{{ route('berita.index') }}">List Data Berita</a>
                <a class="collapse-item" href="{{ route('agenda.index') }}">List Data Agenda</a>
            </div>
        </div>
    </li>


    {{-- Nav Item - Data Berita --}}
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
            aria-expanded="true" aria-controls="collapseFour">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Data Berita</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('berita.index') }}">List Data Berita</a>
            </div>
        </div>
    </li> --}}

    {{-- Nav Item - Data Berita --}}
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsenine"
            aria-expanded="true" aria-controls="collapsenine">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Data Agenda</span>
        </a>
        <div id="collapsenine" class="collapse" aria-labelledby="headingnine"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('agenda.index') }}">List Data Agenda</a>
            </div>
        </div>
    </li> --}}

    {{-- Nav Item - Data Kurikulum --}}
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
            aria-expanded="true" aria-controls="collapseFive">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>AKADEMIK</span>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('kurikulum.index') }}">List Data Mata Kuliah</a>
            </div>
        </div>
    </li> --}}

    {{-- Nav Item - Data Kegiatan & Data Galeri --}}
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseseven"
            aria-expanded="true" aria-controls="collapseseven">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>KEGIATAN</span>
        </a>
        <div id="collapseseven" class="collapse" aria-labelledby="headingseven"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('kegiatan.index') }}">List Data Kegiatan</a>
                <a class="collapse-item" href="{{ route('galeri.index') }}">List Data Galeri</a>
            </div>
        </div>
    </li> --}}

    {{-- Nav Item - Data Galeri --}}
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseten"
            aria-expanded="true" aria-controls="collapseten">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Data Galeri</span>
        </a>
        <div id="collapseten" class="collapse" aria-labelledby="headingten"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('galeri.index') }}">List Data Galeri</a>
            </div>
        </div>
    </li> --}}

    {{-- Nav Item - Data Penelitian & Data PKM --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseeleven"
            aria-expanded="true" aria-controls="collapseeleven">
            <i class="fas fa-fw fa-microscope"></i>
            <span>RISET & PKM</span>
        </a>
        <div id="collapseeleven" class="collapse" aria-labelledby="headingeleven"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('penelitian.index') }}">List Data Penelitian</a>
                <a class="collapse-item" href="{{ route('pkm.index') }}">List Data PKM</a>
            </div>
        </div>
    </li>

    {{-- Nav Item - Data PKM --}}
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsetwelve"
            aria-expanded="true" aria-controls="collapsetwelve">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Data PKM</span>
        </a>
        <div id="collapsetwelve" class="collapse" aria-labelledby="headingtwelve"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('pkm.index') }}">List Data PKM</a>
            </div>
        </div>
    </li> --}}

    {{-- Nav Item - PERATURAN --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseakademik"
            aria-expanded="true" aria-controls="collapseakademik">
            <i class="fas fa-fw fa-book"></i>
            <span>PERATURAN</span>
        </a>
        <div id="collapseakademik" class="collapse" aria-labelledby="headingakademik"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('akademik.index') }}">List Data Akademik</a>
                <a class="collapse-item" href="{{ route('kemahasiswaan.index') }}">List Data Kemahasiswaan</a>
                <a class="collapse-item" href="{{ route('administrasi.index') }}">List Data Administrasi</a>
                <a class="collapse-item" href="{{ route('keuangan.index') }}">List Data Keuangan</a>
            </div>
        </div>
    </li>

    {{-- Nav Item - Data Alumni --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsealumni"
            aria-expanded="true" aria-controls="collapsealumni">
            <i class="fas fa-fw fa-graduation-cap"></i>
            <span>ALUMNI</span>
        </a>
        <div id="collapsealumni" class="collapse" aria-labelledby="headingalumni"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('alumni.index') }}">List Data Alumni</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

</ul>
