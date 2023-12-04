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

            <li class="nav-item nav-item-active">
            <a href="{{ route('admin.calonanakbinaanIndex') }}" class="nav-link">
                <i class="bi bi-person-fill-add"></i>{{-- icon --}}
                <p class="pl-1">
                    Data Calon Anak Binaan
                </p>
            </a>
            </li>

            <li class="nav-item">
            <a href="{{ route('admin.TestView') }}" class="nav-link">
                <i class="bi bi-person-video3"></i>{{-- icon --}}
                <p class="pl-1">
                    Data Anak Binaan
                </p>
            </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.surveyAnak') }}" class="nav-link">
                    <i class="bi bi-input-cursor-text"></i>{{-- icon --}}
                    <p class="pl-1">
                        Survey Anak
                    </p>
                </a>
            </li>

            <li class="nav-item">
            <a href="{{ route('admin.validasi-survey') }}" class="nav-link">
                <i class="bi bi-person-vcard"></i>{{-- icon --}}
                <p class="pl-1">
                    Validasi Survey
                </p>
            </a>
            </li>

            <li class="nav-item">
            <a href="{{ route('admin.aju-donatur') }}" class="nav-link">
            <i class="fas fa-hand-holding-heart"></i>{{-- icon --}}
                <p class="pl-1">
                    Pengajuan Donatur
                </p>
            </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.tutor') }}" class="nav-link">
                <i class="fas fa-chalkboard-teacher"></i>{{-- icon --}}
                    <p class="pl-1">
                        Tutor
                    </p>
                </a>
            </li>
<!-- 
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
            </li> -->

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