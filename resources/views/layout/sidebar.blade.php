<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-Perpus</div>
    </a>

    <hr class="sidebar-divider">

    <!-- ✅ Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- ✅ Data Buku -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('buku.index') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Data Buku</span>
        </a>
    </li>

    <!-- ✅ Data Anggota -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('anggota') }}">
            <i class="fas fa-users"></i>
            <span>Data Anggota</span>
        </a>
    </li>

    <!-- ✅ Data Peminjaman -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('peminjaman.admin') }}">
            <i class="fas fa-fw fa-book-reader"></i>
            <span>Data Peminjaman</span>
        </a>
    </li>

    <!-- ✅ Pengembalian -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pengembalian.admin') }}">
            <i class="fas fa-fw fa-arrow-left"></i>
            <span>Pengembalian</span>
        </a>
    </li>

    <!-- ✅ LAPORAN (INI YANG WAJIB DIGANTI) -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('laporan.admin') }}">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Laporan</span>
        </a>
    </li>

    <!-- ✅ Logout -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
