<style>
    .nav-item .nav-link {
        color: black;
    }
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar bg-white elevation-2">
<!-- Brand Logo -->
<a href="{{ route('admin.menu') }}" class="brand-link">
    <img src="{{ asset('images/LogoKilau2.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-2" style="opacity: .8">
    <span class="brand-text font-weight-light">Kilau Admin</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="{{ asset('lte/dist/img/test-1-removebg-preview.png') }}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
    </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
        <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
        </button>
        </div>
    </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
            <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="bi bi-bar-chart-line-fill"></i>{{-- icon --}}
                <p class="pl-1">
                    Dashboard
                </p>
            </a>
            </li>

            <li class="nav-item">
            <a href="{{ route('admin.index') }}" class="nav-link">
                <i class="bi bi-person-vcard"></i>{{-- icon --}}
                <p class="pl-1">
                    Data User
                </p>
            </a>
            </li>

            <li class="nav-item">
            <a href="{{ route('admin.datakeluarga') }}" class="nav-link">
                <i class="bi bi-people-fill"></i>{{-- icon --}}
                <p class="pl-1">
                    Data Keluarga
                </p>
            </a>
            </li>

            <li class="nav-item">
            <a href="{{ route('admin.tabeldata') }}" class="nav-link">
                <i class="bi bi-person-video3"></i>{{-- icon --}}
                <p class="pl-1">
                    Data Anak Binaan
                </p>
            </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.a') }}" class="nav-link">
                    <i class="bi bi-gear"></i>{{-- icon --}}
                    <p class="pl-1">
                        Halaman Prototype
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('datasurvey') }}" class="nav-link">
                    <i class="bi bi-clipboard2-plus-fill"></i>{{-- icon --}}
                    <p class="pl-1">
                        Survey
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.posts.index') }}" class="nav-link">
                    <i class="bi bi-mailbox"></i>{{-- icon --}}
                    <p class="pl-1">
                        Posts
                    </p>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('admin.acc.index') }}" class="nav-link">
                    <i class="bi bi-clipboard2-check-fill"></i>{{-- icon --}}
                    <p class="pl-1">
                        Acc
                    </p>
                </a>
            </li>

            <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
                <i class="bi bi-box-arrow-left"></i>{{-- icon --}}
                <p class="pl-1">
                    Logout
                </p>
            </a>
            </li>
        </li>
    </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>