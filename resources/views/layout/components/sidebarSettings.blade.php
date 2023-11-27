<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
<!-- ... Kode HTML Anda ... -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar bg-white elevation-2">
<!-- Brand Logo -->
<div class="LogoSidebarTop">
    <a href="{{ route('admin.menu') }}" class="brand-link">
        <i class="bi bi-house-fill ml-3"></i>
        <span class="brand-text">Menu</span>
    </a>
</div>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="{{ asset('images/LogoKilau2.png') }}" class="brand-image img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
        <a href="#" >{{ Auth::user()->name }}</a>{{-- <<<---Nama User Login --}}
    </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" style="color: black" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
        <button class="btn btn-sidebar">
            <i class="bi bi-search"></i>
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
            <a href="{{ route('admin.settingView') }}" class="nav-link">
                <i class="bi bi-bar-chart-line-fill"></i>{{-- icon --}}
                <p class="pl-1">
                    Dashboard
                </p>
            </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-geo-alt"></i>
                    <p>
                        Data Wilayah
                        <i class="right fas fa-angle-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item menu">
                        <a href="{{ route('admin.KaCabView') }}" class="nav-link">
                            <i class="bi bi-buildings-fill"></i>
                            <p>Kantor Cabang</p>
                        </a>
                    </li>
                    <li class="nav-item menu">
                        <a href="{{ route('admin.WilBinView') }}" class="nav-link">
                            <i class="bi bi-building"></i>
                            <p>Wilayah Binaan</p>
                        </a>
                    </li>
                    <li class="nav-item menu">
                        <a href="{{ route('admin.ShelterView') }}" class="nav-link">
                            <i class="bi bi-houses"></i>
                            <p>Shelter</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.menu') }}" class="nav-link">
                    <i class="bi bi-arrow-bar-left"></i>{{-- icon --}}
                    <p class="pl-1">
                        Menu
                    </p>
                </a>
            </li>
        </li>
    </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>


<script>
    $(document).ready(function () {
        // Ambil URL saat ini
        var currentUrl = window.location.href;

        // Loop melalui setiap tautan di sidebar
        $(".nav-sidebar .nav-link").each(function () {
            // Jika URL saat ini cocok dengan tautan ini, tandai sebagai aktif
            if (currentUrl === $(this).attr("href")) {
                $(this).closest(".nav-item").addClass("active");
            }
        });

        // Tambahkan event handler saat tautan di sidebar diklik
        $(".nav-sidebar .nav-link").on("click", function () {
            // Hapus kelas "active" dari semua item
            $(".nav-sidebar .nav-item").removeClass("active");
            
            // Tambahkan kembali kelas "active" ke item yang sedang diklik
            $(this).closest(".nav-item").addClass("active");
        });
    });
</script>

<!-- /.sidebar -->
</aside>