<!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (request()->is("pembimbing-akademik")) ? 'active' : '' }}">
        <a class="nav-link py-0" href="{{ route('pembimbing-akademik.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <div class="sidebar-heading">
        Pembimbing Akademik
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item {{ (request()->is("pembimbing-akademik/data-mahasiswa*")) ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('pembimbing-akademik.data-mahasiswa') }}">
            <i class="fas fa-fw fa-address-book"></i>
            <span>Data Mahasiswa</span>
        </a>
    </li>

    <li class="nav-item {{ (request()->is("pembimbing-akademik/log-aktivitas*")) ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('pembimbing-akademik.log-aktivitas') }}">
            <i class="fas fa-fw fa-envelope-open-text"></i>
            <span>Log Aktivitas</span></a>
    </li>

    <li class="nav-item {{ (request()->is("pembimbing-akademik/dokumen-mahasiswa*")) ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('pembimbing-akademik.dokumen-mahasiswa') }}">
            <i class="fas fa-fw fa-envelope-open-text"></i>
            <span>Dokumen Mahasiswa</span></a>
    </li>

    <li class="nav-item {{ (request()->is("pembimbing-akademik/dokumen-kp*")) ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('pembimbing-akademik.dokumen-kp') }}">
            <i class="fas fa-fw fa-envelope-open-text"></i>
            <span>Dokumen KP</span></a>
    </li>

    <li class="nav-item {{ (request()->is("pembimbing-akademik/penilaian-mahasiswa*")) ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('pembimbing-akademik.penilaian-mahasiswa') }}">
            <i class="fas fa-fw fa-envelope-open-text"></i>
            <span>Penilaian Mahasiswa</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        User
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item {{ (request()->is("pembimbing-akademik/profil*")) ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('pembimbing-akademik.profil') }}">
            <i class="fas fa-fw fa-envelope-open-text"></i>
            <span>Profil</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ (request()->is("pembimbing-akademik/ubah-password*")) ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('pembimbing-akademik.ubah-password') }}">
            <i class="fas fa-fw fa-key"></i>
            <span>Ubah Password</span></a>
    </li>