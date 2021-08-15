
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
            <a class="collapse-item {{ (request()->is("admin/data/mahasiswa*")) ? 'active' : '' }}" href="{{ route('admin.data.mahasiswa') }}">Mahasiswa</a>
            <a class="collapse-item {{ (request()->is("admin/data/pembimbing-akademik*")) ? 'active' : '' }}" href="{{ route('admin.data.pembimbing-akademik') }}">Pembimbing Akademik</a>
            <a class="collapse-item {{ (request()->is("admin/data/pembimbing-lapangan*")) ? 'active' : '' }}" href="{{ route('admin.data.pembimbing-lapangan') }}">Pembimbing Lapangan</a>
            <a class="collapse-item {{ (request()->is("admin/data/program-studi*")) ? 'active' : '' }}" href="{{ route('admin.data.program-studi') }}">Program Studi</a>
            <a class="collapse-item {{ (request()->is("admin/data/kelas*")) ? 'active' : '' }}" href="{{ route('admin.data.kelas') }}">Kelas</a>
            <a class="collapse-item {{ (request()->is("admin/data/kelompok-keahlian*")) ? 'active' : '' }}" href="{{ route('admin.data.kelompok-keahlian') }}">Kelompok Keahlian</a>
            <a class="collapse-item {{ (request()->is("admin/data/peminatan*")) ? 'active' : '' }}" href="{{ route('admin.data.peminatan') }}">Peminatan</a>
            <a class="collapse-item {{ (request()->is("admin/data/periode*")) ? 'active' : '' }}" href="{{ route('admin.data.periode') }}">Periode</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item {{ (request()->is("admin/learning-outcomes/*")) ? 'active' : '' }}">
    <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapseLearningOutcomes" aria-expanded="true" aria-controls="collapseLearningOutcomes">
        <i class="fas fa-fw fa-database"></i>
        <span>Learning Outcomes</span>
    </a>
    <div id="collapseLearningOutcomes" class="collapse mt-2" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ (request()->is("admin/learning-outcomes/plo*")) ? 'active' : '' }}" href="{{ route('learning-outcomes.plo') }}">PLO</a>
            <a class="collapse-item {{ (request()->is("admin/learning-outcomes/clo*")) ? 'active' : '' }}" href="{{ route('learning-outcomes.clo') }}">CLO</a>
            <a class="collapse-item {{ (request()->is("admin/learning-outcomes/sub-clo*")) ? 'active' : '' }}" href="{{ route('learning-outcomes.sub-clo') }}">Sub CLO</a>
            <a class="collapse-item {{ (request()->is("admin/learning-outcomes/bobot-nilai*")) ? 'active' : '' }}" href="{{ route('learning-outcomes.bobot-nilai') }}">Bobot Nilai</a>
        </div>
    </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item {{ (request()->is("admin/surat-pengantar*")) ? 'active' : '' }}">
    <a class="nav-link pb-0" href="{{ route('admin.surat-pengantar') }}">
        <i class="fas fa-fw fa-envelope-open-text"></i>
        <span>Surat Pengantar</span></a>
</li>

<li class="nav-item {{ (request()->is("admin/dokumen-kp*")) ? 'active' : '' }}">
    <a class="nav-link pb-0" href="{{ route('admin.dokumen-kp') }}">
        <i class="fas fa-fw fa-envelope-open-text"></i>
        <span>Dokumen KP</span></a>
</li>

<li class="nav-item {{ (request()->is("admin/dokumen-mahasiswa*")) ? 'active' : '' }}">
    <a class="nav-link pb-0" href="{{ route('admin.dokumen-mahasiswa') }}">
        <i class="fas fa-fw fa-envelope-open-text"></i>
        <span>Dokumen Mahasiswa</span></a>
</li>

<li class="nav-item {{ (request()->is("admin/kerja-praktek*")) ? 'active' : '' }}">
    <a class="nav-link pb-0" href="{{ route('kerja-praktek') }}">
        <i class="fas fa-fw fa-envelope-open-text"></i>
        <span>Kerja Praktek</span></a>
</li>

<li class="nav-item {{ (request()->is("admin/nilai-mahasiswa*")) ? 'active' : '' }}">
    <a class="nav-link pb-0" href="{{ route('admin.nilai-mahasiswa') }}">
        <i class="fas fa-fw fa-envelope-open-text"></i>
        <span>Nilai Mahasiswa</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider mt-3">

<!-- Heading -->
<div class="sidebar-heading">
    User
</div>

<!-- Nav Item - Charts -->
<li class="nav-item {{ (request()->is("admin/profil*")) ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('admin.profil') }}">
            <i class="fas fa-fw fa-envelope-open-text"></i>
            <span>Profil</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ (request()->is("admin/ubah-password*")) ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('admin.ubah-password') }}">
            <i class="fas fa-fw fa-key"></i>
            <span>Ubah Password</span></a>
    </li>