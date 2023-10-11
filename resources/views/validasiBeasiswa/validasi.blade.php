@extends('layout.main')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="row text-center">
                    <h1>Kelayakan Penerimaan Beasiswa</h1>
                </div>

                <div class="col-md-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h2 class="card-title">Profile Anak Binaan</h2>
                        </div>
                        <div class="card-body box-profile">
                            <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="https://i.pinimg.com/564x/69/87/1f/69871fc9c6ddf63be8262c48297d7136.jpg" alt="User profile picture">
                            </div>
                            <p class="text-muted text-center">Perempuan</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Nama</b><a class="float-right">{{$validasi->name}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Kelas</b> <a class="float-right">1</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Shelter</b> <a class="float-right">Banyuasih</a>
                                </li>
                            </ul>
                            <a href="{{ route('admin.tabeldataview', ['id' => $id]) }}" class="btn btn-primary btn-block"><b>Detail</b></a>
                                
                        </div>
                    </div>
                </div>
                
                <div class="col-md-9">
                    <div class="card card-primary">
                        <!-- <div class="card-header p-2">
                            <hr>
                        </div> -->
                        <div class="card-body">
                            <h4>Apakah anak binaan ini telah memenuhi kriteria penerimaan beasiswa?</h4> <hr>
                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input">
                                    <label for="" class="form-check-label" checked><h5>Ya, Layak Menerima Beasiswa</h5> 'Penerimaan Beasiswa(PB)'</label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input">
                                    <label for="" class="form-check-label" checked><h5>Ditangguhkan, Data Belum Lengkap</h5> 'Calon Bakal Penerimaan Beasiswa (CBPB)'</label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input">
                                    <label for="" class="form-check-label" checked><h5>Tidak, tidak dapat menerima Beasiswa</h5> 'Non Penerima Beasiswa (NPB)'</label>
                                </div>
                                <a href="" class="btn btn-primary float-right btn-lg"> Validasi </a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection