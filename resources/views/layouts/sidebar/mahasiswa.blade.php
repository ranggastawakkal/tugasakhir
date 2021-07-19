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
        <a class="nav-link pb-0" href="#">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Dokumen KP</span>
        </a>
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