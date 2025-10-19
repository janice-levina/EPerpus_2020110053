<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-Perpus</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Data Buku -->
<li class="nav-item">
    <a class="nav-link" href="{{ url('/buku') }}">
        <i class="fas fa-fw fa-book"></i>
        <span>Data Buku</span></a>
</li>

    <!-- Nav Item - Data Anggota -->
 <li class="nav-item">
    <a class="nav-link" href="{{ route('anggota') }}">
        <i class="fas fa-users"></i>
        <span>Data Anggota</span></a>
</li>


    <!-- Nav Item - Peminjaman -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('peminjaman') }}">
        <i class="fas fa-fw fa-arrow-right"></i>
        <span>Peminjaman</span>
    </a>
</li>


    <!-- Nav Item - Pengembalian -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('pengembalian') }}">
        <i class="fas fa-fw fa-arrow-left"></i>
        <span>Pengembalian</span>
    </a>
</li>

    <!-- Nav Item - Laporan -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('laporan') }}">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>Laporan</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('logout') }}">
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span>
    </a>
</li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>


