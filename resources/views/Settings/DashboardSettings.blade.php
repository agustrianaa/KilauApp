@extends('layout.mainSettings')
@section('contentSettings')

<style>
  .small-box .icon>i {
    font-size: 65px;
    position: absolute;
    right: 15px;
    top: 0px;
    color: rgb(255, 255, 255);
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
  }
  .breadcrumb.float-sm-right li {
    color: black;
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
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <h1>Halaman Settings</h1>
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>-</h3>

            <p>Kantor Cabang</p>
          </div>
          <div class="icon">
            <i class="bi bi-buildings-fill"></i>{{-- icon --}}
          </div>
          <a href="{{ route('admin.KaCabView') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">

            <h3>-</h3>

            <p>Wilayah Binaan</p>
          </div>
          <div class="icon">
            <i class="bi bi-building"></i>{{-- icon --}}
          </div>
          <a href="{{ route('admin.WilBinView') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box" style="background-color: rgb(255,193,7); color: white;">
          <div class="inner">

            <h3>-</h3>

            <p>Shelter</p>
          </div>
          <div class="icon">
            <i class="bi bi-houses"></i>{{-- icon --}}
          </div>
          <a href="{{ route('admin.ShelterView') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>-</h3>

            <p>Data</p>
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

      <div class="col-12">
        <div class="row">
          <div class="col-6">
            <div class="card">
              <div class="card-body">
                <div class="text-center">
                  <!-- Contoh select box dengan opsi dari data provinsi yang diterima dari controller -->
                  <select name="province" class="form-select" id="province">
                    <option value="" disabled selected>Select Provinsi</option>
                    @foreach ($provinces as $province)
                    @php
                        $formattedName = ucwords(strtolower($province['name']));
                    @endphp
                        <option value="{{ $formattedName }}">{{ $formattedName }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="card">
              <div class="card-body">
                <div class="text-center">
                  <h2>Test2</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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