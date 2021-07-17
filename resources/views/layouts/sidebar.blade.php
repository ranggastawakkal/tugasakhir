<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-globe"></i>
        </div>
        <div class="sidebar-brand-text mx-3">KP - FRI</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    @if (Str::length(Auth::guard('admin')->user()) > 0)
        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ (request()->is("admin")) ? 'active' : '' }}">
            <a class="nav-link py-0" href="{{ route('admin.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider mt-3">

        <!-- Heading -->
        <div class="sidebar-heading">
            Admin
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapseData" aria-expanded="true" aria-controls="collapseData">
                <i class="fas fa-fw fa-database"></i>
                <span>Data</span>
            </a>
            <div id="collapseData" class="collapse mt-2" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ (request()->is("admin/pembimbing-akademik")) ? 'active' : '' }}" href="#">Pembimbing Akademik</a>
                    <a class="collapse-item {{ (request()->is("admin/pembimbing-lapangan")) ? 'active' : '' }}" href="#">Pembimbing Lapangan</a>
                    <a class="collapse-item {{ (request()->is("admin/pembimbing-akademik")) ? 'active' : '' }}" href="#">Mahasiswa</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item {{ (request()->is("admin/surat-pengantar")) ? 'active' : '' }}">
            <a class="nav-link pb-0" href="{{ route('admin.surat-pengantar') }}">
                <i class="fas fa-fw fa-envelope-open-text"></i>
                <span>Surat Pengantar</span></a>
        </li>

        <li class="nav-item {{ (request()->is("admin/template-laporan")) ? 'active' : '' }}">
            <a class="nav-link pb-0" href="#">
                <i class="fas fa-fw fa-envelope-open-text"></i>
                <span>Template Laporan</span></a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapseDokumenKP" aria-expanded="true" aria-controls="collapseDokumenKP">
                <i class="fas fa-fw fa-file-alt"></i>
                <span>Dokumen Mahasiswa</span>
            </a>
            <div id="collapseDokumenKP" class="collapse mt-2" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item{{ (request()->is("admin/surat-diterima-kp")) ? 'active' : '' }}" href="cards.html">Surat Diterima KP</a>
                    <a class="collapse-item" href="buttons.html">Surat Telah Menjalani KP</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider mt-3">

        <!-- Heading -->
        <div class="sidebar-heading">
            User
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link pb-0" href="charts.html">
                <i class="fas fas fa-fw fa-user"></i>
                <span>Profil</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link pb-0" href="tables.html">
                <i class="fas fa-fw fa-key"></i>
                <span>Ubah Password</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider mt-3">

        <!-- Heading -->
        <div class="sidebar-heading">
            Menu Management
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link pb-0" href="charts.html">
                <i class="fas fa-fw fa-stream"></i>
                <span>Menu Header</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link pb-0" href="tables.html">
                <i class="fas fa-fw fa-list-ol"></i>
                <span>Menu</span></a>
        </li>
        
        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link pb-0" href="tables.html">
                <i class="fas fa-fw fa-list-ul"></i>
                <span>Sub Menu</span></a>
        </li>
    @endif

    @if (Str::length(Auth::guard('mahasiswa')->user()) > 0)
        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ (request()->is("mahasiswa")) ? 'active' : '' }}">
            <a class="nav-link py-0" href="{{ route('mahasiswa.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider mt-3">

        <div class="sidebar-heading">
            Mahasiswa
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapseSuratPengantar" aria-expanded="true" aria-controls="collapseSuratPengantar">
                <i class="fas fa-fw fa-database"></i>
                <span>Surat Pengantar</span>
            </a>
            <div id="collapseSuratPengantar" class="collapse mt-2" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="#">Daftar Pengajuan SP</a>
                    <a class="collapse-item" href="#">Buat Pengajuan SP</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapsePembimbing" aria-expanded="true" aria-controls="collapsePembimbing">
                <i class="fas fa-fw fa-file-alt"></i>
                <span>Pembimbing</span>
            </a>
            <div id="collapsePembimbing" class="collapse mt-2" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="#">Pembimbing Akademik</a>
                    <a class="collapse-item" href="#">Pembimbing Lapangan</a>
                    <a class="collapse-item" href="buttons.html">Surat Telah Menjalani KP</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item {{ (request()->is("mahasiswa/surat-pengantar")) ? 'active' : '' }}">
            <a class="nav-link pb-0" href="#">
                <i class="fas fa-fw fa-envelope-open-text"></i>
                <span>Template Laporan</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapseDokumen" aria-expanded="true" aria-controls="collapseDokumen">
                <i class="fas fa-fw fa-file-alt"></i>
                <span>Dokumen KP</span>
            </a>
            <div id="collapseDokumen" class="collapse mt-2" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="cards.html">Surat Diterima KP</a>
                    <a class="collapse-item" href="buttons.html">Surat Telah Menjalani KP</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider mt-3">

        <!-- Heading -->
        <div class="sidebar-heading">
            User
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link pb-0" href="charts.html">
                <i class="fas fas fa-fw fa-user"></i>
                <span>Profil</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link pb-0" href="tables.html">
                <i class="fas fa-fw fa-key"></i>
                <span>Ubah Password</span></a>
        </li>
    @endif


    {{-- <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (request()->is("mahasiswa")) ? 'active' : '' }}">
        <a class="nav-link py-0" href="{{ route('mahasiswa.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <div class="sidebar-heading">
        Pembimbing Akademik
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item {{ (request()->is("mahasiswa/surat-pengantar")) ? 'active' : '' }}">
        <a class="nav-link pb-0" href="#">
            <i class="fas fa-fw fa-envelope-open-text"></i>
            <span>Data Mahasiswa</span></a>
    </li>

    <li class="nav-item {{ (request()->is("mahasiswa/surat-pengantar")) ? 'active' : '' }}">
        <a class="nav-link pb-0" href="#">
            <i class="fas fa-fw fa-envelope-open-text"></i>
            <span>Log Aktivitas</span></a>
    </li>
    
    <li class="nav-item {{ (request()->is("mahasiswa/surat-pengantar")) ? 'active' : '' }}">
        <a class="nav-link pb-0" href="#">
            <i class="fas fa-fw fa-envelope-open-text"></i>
            <span>Penilaian</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapseDokumen" aria-expanded="true" aria-controls="collapseDokumen">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Dokumen KP</span>
        </a>
        <div id="collapseDokumen" class="collapse mt-2" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="cards.html">Surat Diterima KP</a>
                <a class="collapse-item" href="buttons.html">Surat Telah Menjalani KP</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        User
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="charts.html">
            <i class="fas fas fa-fw fa-user"></i>
            <span>Profil</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="tables.html">
            <i class="fas fa-fw fa-key"></i>
            <span>Ubah Password</span></a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link py-0" href="tables.html" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Log Out</span></a>
    </li>
    
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-3">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>