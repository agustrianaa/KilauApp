<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" >
  <link href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet">


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/summernote/summernote-bs4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('images/LogoKilau2.png') }}" alt="LogoKilau" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin.index') }}" class="nav-link">Data User</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('lte/dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('lte/dist/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('lte/dist/img/user3-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('images/LogoKilau2.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
                  </svg>
                  <p class="pl-1">Home</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.index') }}" class="nav-link">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
                  </svg>
                  <p class="pl-1">
                    Data User
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.ajax-crud-datatable') }}" class="nav-link">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
                  </svg>
                  <p class="pl-1">
                    Data Anak Binaan
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('datasurvey') }}" class="nav-link">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-plus" viewBox="0 0 16 16">
                    <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
                    <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z"/>
                    <path d="M8.5 6.5a.5.5 0 0 0-1 0V8H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V9H10a.5.5 0 0 0 0-1H8.5V6.5Z"/>
                  </svg>
                  <p class="pl-1">
                    Survey
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.a') }}" class="nav-link">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-excel-fill" viewBox="0 0 16 16">
                    <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5.884 4.68 8 7.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 8l2.233 2.68a.5.5 0 0 1-.768.64L8 8.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 8 5.116 5.32a.5.5 0 1 1 .768-.64z"/>
                  </svg>
                  <p class="pl-1">
                    Halaman Prototype
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.students') }}" class="nav-link">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
                    <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z"/>
                  </svg>
                  <p class="pl-1">
                    Filter
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.posts.index') }}" class="nav-link">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mailbox2" viewBox="0 0 16 16">
                    <path d="M9 8.5h2.793l.853.854A.5.5 0 0 0 13 9.5h1a.5.5 0 0 0 .5-.5V8a.5.5 0 0 0-.5-.5H9v1z"/>
                    <path d="M12 3H4a4 4 0 0 0-4 4v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V7a4 4 0 0 0-4-4zM8 7a3.99 3.99 0 0 0-1.354-3H12a3 3 0 0 1 3 3v6H8V7zm-3.415.157C4.42 7.087 4.218 7 4 7c-.218 0-.42.086-.585.157C3.164 7.264 3 7.334 3 7a1 1 0 0 1 2 0c0 .334-.164.264-.415.157z"/>
                  </svg>
                  <p class="pl-1">
                    Posts
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.acc.index') }}" class="nav-link">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-check" viewBox="0 0 16 16">
                    <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
                    <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z"/>
                    <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3Z"/>
                  </svg>
                  <p class="pl-1">
                    Acc
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                  </svg>
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Anak Binaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Data Anak Binaan</li>
                    </ol>
                </div>
            </div><!-- End row -->
        </div><!-- End container-fluid -->
    </div>
    <!-- End content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right mb-2">
                        <a class="btn btn-primary" onClick="add()" href="javascript:void(0)">Tambah Data+</a>
                    </div>
                </div>
                <div class="col-lg-12 mt-4">
                  <h3>Filter</h3>
                </div>
                <div class="col-lg-12">
                  <div class="row align-items-end">
                    <div class="col-lg-2 mb-2">
                      <label>Agama</label>
                        <select class="form-select" id="fagama">
                          <option value="">-Pilih-</option>
                          <option value="Islam">Islam</option>
                          <option value="Kristen Protestan">Kristen Protestan</option>
                          <option value="Kristen Katolik">Kristen Katolik</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Buddha"> Buddha</option>
                          <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div class="col-lg-2 mb-2">
                      <label>Jenis Kelamin</label>
                        <select class="form-select" id="fjenis_kelamin">
                          <option value="">-Pilih-</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-lg-2 mb-2">
                      <label>Status Binaan</label>
                        <select class="form-select" id="fstatus_binaan">
                          <option value="">-Pilih-</option>
                          <option value="PB">PB</option>
                          <option value="NPB">NPB</option>
                          <option value="CPB">CPB</option>
                          <option value="BCPB">BCPB</option>
                        </select>
                    </div>
                    <div class="col-lg-1 mb-2">
                      <button type="button" class="btn btn-outline-danger" id="resetfilters">Reset</button>
                    </div>
                  </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
          <div class="card">
            <div class="card-body">
              <div class="table-responsive text-nowrap">
                <table class="table table-bordered" id="ajax-crud-datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Agama</th>
                            <th>TTL</th>
                            <th>Jenis Kelamin</th>
                            <th>Anak Ke</th>
                            <th>Kepala Keluarga</th>
                            <th>Status Binaan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="tambah-modal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Anak Binaan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="javascript:void(0)" id="tabeldataForm" name="tabeldataForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Nama</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama..." maxlength="50" required="">
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="name" class="col-sm-2 control-label">Agama</label>
                              <div class="col-sm-12">
                                  <select class="form-select" id="agama" name="agama" required="">
                                    <option value="" disabled selected>-Pilih-</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha"> Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="name" class="col-sm-2 control-label text-nowrap">Tempat dan Tanggal Lahir</label>
                              <div class="col-sm-12">
                                <div class="row">
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" id="teml" name="teml" placeholder="Tempat Lahir..." required="">
                                  </div>
                                  <div class="col-md-6">
                                      <input type="date" class="form-control" id="tgll" name="tgll" required="">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="name" class="col-sm-2 control-label">Jenis Kelamin</label>
                              <div class="col-sm-12">
                                  <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required="">
                                    <option value="" disabled selected>-Pilih-</option>
                                      <option value="Laki-Laki">Laki-Laki</option>
                                      <option value="Perempuan">Perempuan</option>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="name" class="col-sm-2 control-label">Anak Ke</label>
                              <div class="col-sm-12">
                                  <input type="number" class="form-control" id="anak_ke" name="anak_ke" placeholder="Anak Ke..." required="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="name" class="col-sm-2 control-label text-nowrap">Kepala Keluarga</label>
                              <div class="col-sm-12">
                                  <input type="text" class="form-control" id="kepala_keluarga" name="kepala_keluarga" placeholder="Kepala Keluarga..." required="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="name" class="col-sm-2 control-label">Status Binaan</label>
                              <div class="col-sm-12">
                                  <select class="form-select" id="status_binaan" name="status_binaan" required="">
                                    <option value="" disabled selected>-Pilih-</option>
                                    <option value="PB">PB</option>
                                    <option value="NPB">NPB</option>
                                    <option value="CPB">CPB</option>
                                    <option value="BCPB">BCPB</option>
                                  </select>
                              </div>
                            </div>
                            <div class="col-sm-offset-2 col-sm-10"><br/>
                                <button type="submit" class="btn btn-primary" id="btn-save">Save</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer"></div>
                </div>
            </div>
        </div><!-- End Modal -->
    </section><!-- End Main content -->
</div><!-- End content-wrapper -->
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.all.min.js"></script>

<script type="text/javascript">
    $(document).ready( function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        load_data();

        function load_data(){
          var fagama = $('#fagama').val();
          var fjenis_kelamin = $('#fjenis_kelamin').val();
          var fstatus_binaan = $('#fstatus_binaan').val();

          $('#ajax-crud-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url : "{{ url('admin/ajax-crud-datatable') }}",
              data: {
                agama : fagama,
                jenis_kelamin : fjenis_kelamin,
                status_binaan : fstatus_binaan,
              }
            },
            columns: [
                { data: 'id', name: 'id'},
                { data: 'name', name: 'name'},
                { data: 'agama', name: 'agama'},
                { data: 'ttl', name: 'ttl'},
                { data: 'jenis_kelamin', name: 'jenis_kelamin'},
                { data: 'anak_ke', name: 'anak_ke'},
                { data: 'kepala_keluarga', name: 'kepala_keluarga'},
                { data: 'status_binaan', name: 'status_binaan'},
                { data: 'action', name: 'action', orderable: false},
            ],
            order: [[0, 'asc']],
            paging: true,
            pageLength: 10 // Menyeting jumlah entri yang ditampilkan menjadi 10
        });
        }

        $('#fagama').on('change', function(){
            $('#ajax-crud-datatable').DataTable().destroy()
            load_data()
        })
        $('#fjenis_kelamin').on('change', function(){
            $('#ajax-crud-datatable').DataTable().destroy()
            load_data()
        })
        $('#fstatus_binaan').on('change', function(){
            $('#ajax-crud-datatable').DataTable().destroy()
            load_data()
        })

        $('#resetfilters').click(function() {
            // Mengatur nilai-nilai semua elemen select ke nilai kosong
            $('#fagama').val('');
            $('#fjenis_kelamin').val('');
            $('#fstatus_binaan').val('');

            // Memuat ulang data dengan filter kosong
            $('#ajax-crud-datatable').DataTable().destroy();
            load_data();
        });
    });

    function add(){
        $('#tabeldataForm').trigger("reset");
        $('#TambahModal').html("Tambah Data");
        $('#tambah-modal').modal('show');
        $('#id').val('');
        // Reset nilai-nilai input tambahan seperti Agama, TTL, Jenis Kelamin, Anak Ke, Kepala Keluarga, dan Status Binaan
        $('#agama').val('');
        $('#teml').val('');
        $('#tgll').val('');
        $('#jenis_kelamin').val('');
        $('#anak_ke').val('');
        $('#kepala_keluarga').val('');
        $('#status_binaan').val('');
    }

    function viewFunc(id) {
      // Navigate to the view page with the record's ID as a query parameter
      window.location.href = "{{ url('admin/tabeldataview/') }}/" + id;
    }

    function editFunc(id){
        $.ajax({
            type: "POST",
            url: "{{ url('admin/tabeldataedit') }}",
            data: { id: id},
            dataType: 'json',
            success: function(res){
                console.log(res);
                $('#TambahModal').html("Edit Data");
                $('#tambah-modal').modal('show');
                $('#id').val(res.id);
                $('#name').val(res.name);
                $('#address').val(res.address);
                $('#email').val(res.email);
                // Isi nilai-nilai input tambahan seperti Agama, TTL, Jenis Kelamin, Anak Ke, Kepala Keluarga, dan Status Binaan
                $('#agama').val(res.agama);
                $('#teml').val(res.teml);
                $('#tgll').val(res.tgll);
                $('#jenis_kelamin').val(res.jenis_kelamin);
                $('#anak_ke').val(res.anak_ke);
                $('#kepala_keluarga').val(res.kepala_keluarga);
                $('#status_binaan').val(res.status_binaan);
            }
        });
    }

    function deleteFunc(id){
        if (confirm("Ingin Mengahapus Data?") == true) {
            var id = id;
            //ajax
            $.ajax({
                type: "POST",
                url: "{{ url('admin/tabeldatadelete') }}",
                data: { id: id },
                dataType: 'json',
                success: function(res){
                    var oTable = $('#ajax-crud-datatable').dataTable();
                    oTable.fnDraw(false);
                }
            });
        }
    }

    $('#tabeldataForm').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "{{ url('admin/tabeldatastore') }}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
              Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Data berhasil ditambahkan!',
                showConfirmButton: false,
                timer: 1500 // Durasi pesan SweetAlert ditampilkan dalam milidetik (ms)
              });
                $("#tambah-modal").modal('hide');
                var oTable = $('#ajax-crud-datatable').dataTable();
                oTable.fnDraw(false);
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
  </script>


<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- ChartJS -->
<script src="{{ asset('lte/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('lte/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('lte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('lte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('lte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('lte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('lte/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('lte/dist/js/pages/dashboard.js') }}"></script>

</body>
</html>
