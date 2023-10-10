<style>
    /* Warna Icon Menu sidebar */
    .nav-item .nav-link {
        color: black;
    }


    /* Bar Menu Sidebar */
    .nav-sidebar>.nav-item {
        margin-bottom: 0;
        transition: 0.1s;
    }

    .nav-sidebar>.nav-item:hover {
        background-color: rgb(243, 243, 243);
        box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);
        transition: 0.1s;
    }

    .nav-sidebar>.nav-item.active {
        background-color: rgb(243, 243, 243);
        box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.4);
        transition: 0.5s;
    }

    .nav-sidebar>.nav-item:active {
        background-color: rgb(243, 243, 243);
        box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.4);
        transition: 0.5s;
    }


    /* Logo User Login */
    .sidebar .info a {
        text-decoration: none;
        color: black;
        font-size: 18px;
    }

    .sidebar .info a:hover {
        color: blue;
    }


    /* Logo Sidebar Top */
    .LogoSidebarTop a {
        text-decoration: none;
        color: black;
    }

    .LogoSidebarTop a:hover {
        color: rgb(72, 93, 142);
    }
</style>
<!-- ... Kode HTML Anda ... -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar bg-white elevation-2">
<!-- Brand Logo -->
<div class="LogoSidebarTop">
    <a href="{{ route('admin.menu') }}" class="brand-link">
        <img src="{{ asset('images/LogoKilau2.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-2" style="opacity: .8">
        <span class="brand-text">Kilau Admin</span>
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

            <li class="nav-item">
            <a href="{{ route('admin.datakeluarga') }}" class="nav-link">
                <i class="bi bi-people-fill"></i>{{-- icon --}}
                <p class="pl-1">
                    Data Keluarga
                </p>
            </a>
            </li>

            <li class="nav-item nav-item-active">
            <a href="{{ route('admin.calonanakbinaan') }}" class="nav-link">
                <i class="bi bi-person-fill-add"></i>{{-- icon --}}
                <p class="pl-1">
                    Data Calon Anak Binaan
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