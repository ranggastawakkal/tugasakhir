<!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (request()->is("pembimbing-lapangan")) ? 'active' : '' }}">
        <a class="nav-link py-0" href="{{ route('pembimbing-lapangan.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <div class="sidebar-heading">
        Pembimbing Lapangan
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item {{ (request()->is("pembimbing-lapangan/data-mahasiswa*")) ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('pembimbing-lapangan.data-mahasiswa') }}">
            <i class="fas fa-fw fa-address-book"></i>
            <span>Data Mahasiswa</span>
        </a>
    </li>

    <li class="nav-item {{ (request()->is("pembimbing-lapangan/log-aktivitas*")) ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('pembimbing-lapangan.log-aktivitas') }}">
            <i class="fas fa-fw fa-envelope-open-text"></i>
            <span>Log Aktivitas</span></a>
    </li>

    <li class="nav-item {{ (request()->is("pembimbing-lapangan/laporan-kp*")) ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('pembimbing-lapangan.laporan-kp') }}">
            <i class="fas fa-fw fa-envelope-open-text"></i>
            <span>Laporan KP</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ (request()->is("pembimbing-lapangan/dokumen-kp*")) ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('pembimbing-lapangan.dokumen-kp') }}">
            <i class="fas fa-fw fa-envelope-open-text"></i>
            <span>Dokumen KP</span></a>
    </li>

    <li class="nav-item {{ (request()->is("pembimbing-lapangan/penilaian-mahasiswa*")) ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('pembimbing-lapangan.penilaian-mahasiswa') }}">
            <i class="fas fa-fw fa-envelope-open-text"></i>
            <span>Penilaian Mahasiswa</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        User
    </div>

    <li class="nav-item {{ (request()->is("pembimbing-lapangan/profil*")) ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('pembimbing-lapangan.profil.index') }}">
            <i class="fas fa-fw fa-envelope-open-text"></i>
            <span>Profil</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ (request()->is("pembimbing-lapangan/ubah-password*")) ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('pembimbing-lapangan.ubah-password.index') }}">
            <i class="fas fa-fw fa-key"></i>
            <span>Ubah Password</span></a>
    </li>