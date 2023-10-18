@extends('layout.main')
@section('content')

<style>
  .small-box .icon>i {
    font-size: 65px;
    position: absolute;
    right: 15px;
    top: 0px;
    color: rgb(255, 255, 255);
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
  }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"><b>Dashboard</b></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard v1</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $totaldatakeluarga }}</h3>

            <p>Data Keluarga</p>
          </div>
          <div class="icon">
            <i class="bi bi-people-fill"></i>{{-- icon --}}
          </div>
          <a href="{{ route('admin.datakeluarga') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">

            <h3>{{ $totalData }}</h3>

            <p>Data Anak Binaan</p>
          </div>
          <div class="icon">
            <i class="bi bi-person-video3"></i>{{-- icon --}}
          </div>
          <a href="{{ route('admin.AnakBinaan') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>-</h3>

            <p>Data Calon Anak Binaan</p>
          </div>
          <div class="icon">
            <i class="bi bi-person-fill-add"></i>{{-- icon --}}
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>65</h3>

            <p>Unique Visitors</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-6 connectedSortable">
        <div class="card">
          <div class="card-body">
            <div class="card-body text-center">
              <a href="{{ route('admin.pengajuanForm') }}" class="btn btn-outline-info">Pengajuan Anak+</a>
            </div>
          </div>
        </div>

      </section>
      <!-- /.Left col -->
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <section class="col-lg-6 connectedSortable">

  
      </section>
      <!-- right col -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
      @if(session('alert'))
      <script>
          Swal.fire({
              title: '{{ session('alert.title') }}',
              text: '{{ session('alert.text') }}',
              icon: '{{ session('alert.icon') }}',
          });
      </script>
      @endif
    </div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->


</section>
<!-- /.content -->
  <div>
@endsection