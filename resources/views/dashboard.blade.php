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
  .breadcrumb.float-sm-right li {
    color: black;
  }
  /* Atur lebar dan tinggi notifikasi */
.swal2-popup {
    background-color: rgb(255, 255, 255);
    border-radius: 30px;
    width: 500px; /* Ganti dengan lebar yang diinginkan */
    height: auto; /* Sesuaikan dengan kebutuhan, atau biarkan otomatis */
}
/* Atur font size untuk judul */
.swal2-title {
    font-size: 20px; /* Ganti dengan ukuran font yang diinginkan */
}
/* Atur font size untuk teks */
.swal2-content {
    font-size: 16px; /* Ganti dengan ukuran font yang diinginkan */
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
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $totalCalonAnakBinaan }}</h3>

            <p>Data Calon Anak Binaan</p>
          </div>
          <div class="icon">
            <i class="bi bi-people-fill"></i>{{-- icon --}}
          </div>
          <a href="{{ route('admin.calonanakbinaanIndex') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">

            <h3>{{ $totalAnakBinaan }}</h3>

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
            <h3 class="text-white">{{ $totalBelumValidasi }}</h3>

            <p class="text-white">Data yang belum Validasi Beasiswa</p>
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
            <h3>{{ $totalSudahValidasi }}</h3>

            <p>Data yang sudah Validasi Beasiswa</p>
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


      <section class="col-lg-12 connectedSortable">
        <div class="card">
          <div class="card-body">
            <div class="card-body">
              <div class="text-center">
                <h3>Tambahkan Keluarga / Anak</h3>
                <button onclick="tampilkanSweetAlert()" class="btn btn-outline-success">Tambah+</button>
              </div>
            </div>
          </div>
        </div>
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

  <script>
    function tampilkanSweetAlert() {
        // Munculkan SweetAlert2
        Swal.fire({
            title: 'Pilih Opsi',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3F74E5',
            cancelButtonColor: '#FFC100',
            confirmButtonText: '<i class="bi bi-people-fill"></i> Keluarga Baru+',
            cancelButtonText: '<i class="bi bi-person-arms-up"></i> Ajukan Anak+',
        }).then((result) => {
            // Arahkan ke halaman berdasarkan pilihan
            if (result.isConfirmed) {
                window.location.href = '{{ route('admin.pengajuanForm') }}';
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                window.location.href = '{{ route('admin.anak.tambah') }}';
            }
        });
    }
  </script>
@endsection