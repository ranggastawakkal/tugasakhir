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
    <li class="nav-item">
        <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapsePembimbing" aria-expanded="true" aria-controls="collapsePembimbing">
            <i class="fas fa-fw fa-address-book"></i>
            <span>Data Mahasiswa</span>
        </a>
        <div id="collapsePembimbing" class="collapse mt-2" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">Input Mahasiswa</a>
                <a class="collapse-item" href="#">Data Mahasiswa</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link pb-0" href="#">
            <i class="fas fa-fw fa-envelope-open-text"></i>
            <span>Log Aktivitas</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link pb-0" href="#">
            <i class="fas fa-fw fa-envelope-open-text"></i>
            <span>Penilaian</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link pb-0" href="#">
            <i class="fas fa-fw fa-envelope-open-text"></i>
            <span>Laporan KP</span></a>
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