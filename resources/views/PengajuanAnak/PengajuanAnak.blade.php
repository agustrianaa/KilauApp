@extends('layout.main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
    .mb-2.tombolsubmit{
        justify-content: center;
        align-content: center; 
    }
</style>

<div class="content-wrapper background">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
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
                        <h4>Form Pengajuan Anak</h4>
                    </div>
                </div>
            </div>
            <div class="row">

                

                <div class="card">
                    <div class="card-body">
                        <div class="card-body text-nowrap">
                            <div class="row">

                                <!--Form Anak-->
                                <div class="col-12 col-sm-6">
                                    <div class="card">
                                        <div class="card-title">
                                            <h4 class="text-center">Form Anak</h4>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Nama Lengkap :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Nama Panggilan :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama" placeholder="Nama Panggilan...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Tempat Lahir :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama" placeholder="Tempat Lahir...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Tanggal Lahir :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="date" class="form-control" id="nama" placeholder="Tanggal Lahir...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Alamat Lengkap :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <textarea class="form-control" id="pesan" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Nama Sekolah :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="nama" placeholder="Nama Sekolah...">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="nama" placeholder="Kelas...">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Nama Madrasah :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="nama" placeholder="Nama Madrasah...">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="nama" placeholder="Kelas...">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Hobby :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama" placeholder="Hobby...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Cita - cita :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama" placeholder="Cita-cita...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Jarak ke Shelter :</p>
                                                </div>
                                                <div class="col-12 col-sm-2">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                        <span class="input-group-text">KM</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Form Keluarga-->
                                <div class="col-12 col-sm-6">
                                    <div class="card">
                                        <div class="card-title">
                                            <h4 class="text-center">Form Keluarga</h4>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">No. Kartu Keluarga :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Anak Ke :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama" placeholder="Anak ke...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Alamat KK :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama" placeholder="Alamat sesuai KK...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Kepala Keluarga :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama" placeholder="Nama Kepala Keluarga...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Form Ayah-->
                                <div class="col-12 col-sm-4">
                                    <div class="card">
                                        <div class="card-title">
                                            <h4 class="text-center">Form Ayah</h4>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Nama Ayah Kandung :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Pekerjaan :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Jumlah Tanggungan :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">Rp.</span>
                                                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                                        <span class="input-group-text">,-</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Pendapatan Perbulan :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">Rp.</span>
                                                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                                        <span class="input-group-text">,-</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Form Ibu-->
                                <div class="col-12 col-sm-4">
                                    <div class="card">
                                        <div class="card-title">
                                            <h4 class="text-center">Form Ibu</h4>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Nama Ibu Kandung :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Pekerjaan :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Pendapatan Perbulan :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">Rp.</span>
                                                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                                        <span class="input-group-text">,-</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Form Wali-->
                                <div class="col-12 col-sm-4">
                                    <div class="card">
                                        <div class="card-title">
                                            <h4 class="text-center">Form Wali(Jika ada)</h4>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">No. KTP :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Nama Lengkap :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Nama Panggilan :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama" placeholder="Nama Panggilan...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Tempat Lahir :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama" placeholder="Kota">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Tanggal Lahir :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="date" class="form-control" id="nama" placeholder="Tanggal Lahir...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Pekerjaan :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Jumlah Tanggungan :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">Rp.</span>
                                                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                                        <span class="input-group-text">,-</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Pendapatan Perbulan :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">Rp.</span>
                                                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                                        <span class="input-group-text">,-</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                <a href="" class="btn btn-outline-primary">Submit</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        
    </section><!-- End Main content -->
</div><!-- End content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.all.min.js"></script>

@endsection