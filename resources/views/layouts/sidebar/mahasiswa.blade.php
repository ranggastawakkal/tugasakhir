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
    <li class="nav-item {{ (request()->is("mahasiswa/surat-pengantar")) ? 'active' : '' }}">
        <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapseSuratPengantar" aria-expanded="true" aria-controls="collapseSuratPengantar">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Surat Pengantar</span>
        </a>
        <div id="collapseSuratPengantar" class="collapse mt-2" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('mahasiswa.daftar-pengajuan.index') }}">Daftar Pengajuan SP</a>
                <a class="collapse-item" href="{{ route('mahasiswa.buat-pengajuan.index') }}">Buat Pengajuan SP</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ (request()->is("mahasiswa/pembimbing")) ? 'active' : '' }}">
        <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapsePembimbing" aria-expanded="true" aria-controls="collapsePembimbing">
            <i class="fas fa-fw fa-users"></i>
            <span>Pembimbing</span>
        </a>
        <div id="collapsePembimbing" class="collapse mt-2" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('mahasiswa.pembimbing.akademik.index') }}">Pembimbing Akademik</a>
            <a class="collapse-item" href="{{ route('mahasiswa.pembimbing.lapangan.index') }}">Pembimbing Lapangan</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ (request()->is("mahasiswa/kerja-praktek")) ? 'active' : '' }}">
        <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapseKerjaPraktek" aria-expanded="true" aria-controls="collapseKerjaPraktek">
            <i class="fas fa-fw fa-database"></i>
            <span>Kerja Praktek</span>
        </a>
        <div id="collapseKerjaPraktek" class="collapse mt-2" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('mahasiswa.kerja-praktek.data.index') }}">Data Kerja Praktek</a>
                <a class="collapse-item" href="{{ route('mahasiswa.kerja-praktek.dokumen.index') }}">Dokumen</a>
            </div>
        </div>
    </li>

 

    <!-- Nav Item - Charts -->
    <li class="nav-item {{ (request()->is("mahasiswa/template-laporan")) ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('mahasiswa.template-laporan.index') }}">
            <i class="fas fa-fw fa-envelope-open-text"></i>
            <span>Template Laporan</span></a>
    </li>


    <li class="nav-item {{ (request()->is("mahasiswa/log")) ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('mahasiswa.log-activity.index') }}">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Log Activity</span>
        </a>
    </li>

    

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        User
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item {{ (request()->is("mahasiswa/profil")) ? 'active' : '' }}">
            <a class="nav-link pb-0" href="{{ route('mahasiswa.profil.index') }}">
                <i class="fas fas fa-fw fa-user"></i>
                <span>Profil</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ (request()->is("mahasiswa/ubah-password")) ? 'active' : '' }}">
            <a class="nav-link pb-0" href="{{ route('mahasiswa.ubah-password.index') }}">
                <i class="fas fa-fw fa-key"></i>
                <span>Ubah Password</span></a>
    </li>