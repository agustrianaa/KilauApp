@extends('layout.main')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h2 class="text-center">DATA DETAIL KELUARGA YA WOI</h2>
                <hr>
                <!-- CARD DATA ANAK -->
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="https://i.pinimg.com/564x/69/87/1f/69871fc9c6ddf63be8262c48297d7136.jpg" alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">{{$dataKeluarga -> kepala_keluarga}}</h3> <!--CONTOH SAHAJA-->
                            <p class="text-muted text-center">Perempuan</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Kelas</b> <a class="float-right">1</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Shelter</b> <a class="float-right">Banyuasih</a>
                                </li>
                            </ul>
                            <!-- Untuk ke data lengkap anak -->
                            <a href="#" class="btn btn-primary btn-block"><b>Detail</b></a> 
                        </div>
                    </div>
                </div>

                <!-- Data Keluarga, Ayah, Ibu -->
                <div class="col-md-9">
                    <div class="card" >
                        <div class="card-body text-center">
                            <h3>Data Keluarga </h3>
                            <h6>No KK : {{$dataKeluarga->no_kk}}</h6>
                        </div>
                        <div class="card card-primary card-tabs">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#tab_dataKeluarga" data-toggle="pill" role="tab" aria-selected="true" >Data Keluarga</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tab_dataAyah" data-toggle="pill" role="tab" aria-selected="false">Data Ayah</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tab_dataIbu" data-toggle="pill" role="tab" aria-selected="false">Data Ibu</a>
                                    </li>
                                </ul> 
                            </div>
                            <div class="card-body" >
                                <div class="tab-content" >
                                    <!-- Data Keluarga -->
                                    <div class="tab-pane fade show active" id="tab_dataKeluarga" aria-labelledby="custom-tabs-two-home-tab">
                                        <div class="post">
                                            <div class="user-block">
                                                <p>Ini adalah data keluarga yang lengkap</p>
                                                <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                        <b>Kantor Cabang</b> <a class="float-right">{{ $dataKeluarga ? $dataKeluarga->kacab : 'Data Kosong' }}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Wilayah Binaan</b> <a class="float-right">{{ $dataKeluarga ? $dataKeluarga->wilbin : 'Data Kosong' }}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Shelter</b> <a class="float-right">{{ $dataKeluarga ? $dataKeluarga->shelter : 'Data Kosong' }}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>No Telp</b> <a class="float-right">{{ $dataKeluarga ? $dataKeluarga->no_telp : 'Data Kosong' }}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>No Rek</b> <a class="float-right">{{ $dataKeluarga ? $dataKeluarga->no_rek : 'Data Kosong' }}</a>
                                                    </li>
                                                </ul>
                                                <button type="button" class="btn btn-primary float-right btn-lg"><i class="fas fa-edit"></i>Edit</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Data Ayah -->
                                    <div class="tab-pane fade" id="tab_dataAyah">
                                        <p>Ini adalah data Ayah yang lengkap</p>
                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>NIK</b> <a class="float-right">{{ $dataAyah ? $dataAyah->nik : 'Data Kosong' }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Nama Lengkap</b> <a class="float-right">{{ $dataAyah ? $dataAyah->nama : 'Data Kosong' }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Tempat, Tanggal Lahir</b> <a class="float-right">{{ $dataAyah ? $dataAyah->tempat_lahir : 'Data Kosong' }}, {{ $dataAyah ? $dataAyah->tanggal_lahir : 'Data Kosong' }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Agama</b> <a class="float-right">{{ $dataAyah ? $dataAyah->agama : 'Data Kosong' }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Alamat</b> <a class="float-right">{{ $dataAyah ? $dataAyah->alamat : 'Data Kosong' }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Penghasilan</b> <a class="float-right">Field masih kosong</a>
                                            </li>
                                        </ul>
                                        <button type="button" class="btn btn-primary float-right btn-lg"><i class="fas fa-edit"></i>Edit</button>
                                    </div>

                                    <!-- Data Ibu -->
                                    <div class="tab-pane fade" id="tab_dataIbu">
                                        <p>Ini adalah data Ibu yang lengkap</p>
                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>NIK</b> <a class="float-right">{{ $dataIbu ? $dataIbu->nik : 'Data Kosong' }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Nama Lengkap</b> <a class="float-right">{{ $dataIbu ? $dataIbu->nama : 'Data Kosong' }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Tempat, Tanggal Lahir</b> <a class="float-right">{{ $dataIbu ? $dataIbu->tempat_lahir : 'Data Kosong' }}, {{ $dataIbu ? $dataIbu->tanggal_lahir : 'Data Kosong' }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Agama</b> <a class="float-right">{{ $dataIbu ? $dataIbu->agama : 'Data Kosong' }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Alamat</b> <a class="float-right">{{ $dataIbu ? $dataIbu->alamat : 'Data Kosong' }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Penghasilan</b> <a class="float-right">Field Belum ada</a>
                                            </li>
                                        </ul>
                                        <button type="button" class="btn btn-primary float-right btn-lg"><i class="fas fa-edit"></i>Edit</button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection