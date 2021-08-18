<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-globe"></i>
        </div>
        <div class="sidebar-brand-text mx-3">KPPM - FRI</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">
    @if (Str::length(Auth::guard('admin')->user()) > 0)
        @include('layouts/sidebar/admin')
    @endif

    @if (Str::length(Auth::guard('mahasiswa')->user()) > 0)
        @include('layouts/sidebar/mahasiswa')
    @endif

    @if (Str::length(Auth::guard('pembimbing-akademik')->user()) > 0)
        @include('layouts/sidebar/pembimbing-akademik')
    @endif

    @if (Str::length(Auth::guard('pembimbing-lapangan')->user()) > 0)
        @include('layouts/sidebar/pembimbing-lapangan')
    @endif

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