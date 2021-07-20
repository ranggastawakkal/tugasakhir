
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
<li class="nav-item {{ (request()->is("admin/data/*")) ? 'active' : '' }}">
    <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapseData" aria-expanded="true" aria-controls="collapseData">
        <i class="fas fa-fw fa-database"></i>
        <span>Data</span>
    </a>
    <div id="collapseData" class="collapse mt-2" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ (request()->is("admin/data/mahasiswa")) ? 'active' : '' }}" href="{{ route('admin.data.mahasiswa') }}">Mahasiswa</a>
            <a class="collapse-item {{ (request()->is("admin/data/pembimbing-akademik")) ? 'active' : '' }}" href="{{ route('admin.data.pembimbing-akademik') }}">Pembimbing Akademik</a>
            <a class="collapse-item {{ (request()->is("admin/data/pembimbing-lapangan")) ? 'active' : '' }}" href="{{ route('admin.data.pembimbing-lapangan') }}">Pembimbing Lapangan</a>
            <a class="collapse-item {{ (request()->is("admin/data/program-studi")) ? 'active' : '' }}" href="{{ route('admin.data.program-studi') }}">Program Studi</a>
            <a class="collapse-item {{ (request()->is("admin/data/kelas")) ? 'active' : '' }}" href="{{ route('admin.data.kelas') }}">Kelas</a>
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
    <a class="nav-link pb-0" href="{{ route('admin.template-laporan') }}">
        <i class="fas fa-fw fa-envelope-open-text"></i>
        <span>Template Laporan</span></a>
</li>

<li class="nav-item {{ (request()->is("admin/dokumen-kp")) ? 'active' : '' }}">
    <a class="nav-link pb-0" href="{{ route('admin.dokumen-kp') }}">
        <i class="fas fa-fw fa-envelope-open-text"></i>
        <span>Dokumen KP</span></a>
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