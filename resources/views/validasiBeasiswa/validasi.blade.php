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
                                    <b>Nama</b><a class="float-right">{{$validasi->nama_lengkap}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Sekolah</b> <a class="float-right">{{$validasi->nama_sekolah}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Kelas</b> <a class="float-right">{{$validasi->kelas_sekolah}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Shelter</b> <a class="float-right">{{$validasi->shelter}}</a>
                                </li>
                            </ul>
                            
                            <a href="{{ route('admin.calonAnakBinaanDetail', ['id' => $id]) }}" class="btn btn-primary btn-block"><b>Detail</b></a>
                                
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
                            @php 

                                $beasiswaAnak = \App\Models\Beasiswa::where('anak_id',$id)->first();
                                $anak = App\Models\Anak::find('id_anaks');
                            @endphp
                            @if(isset($beasiswaAnak) && $beasiswaAnak->id)
                                <form method="POST" action="{{ route('admin.update-validasi', ['id' => $beasiswaAnak->id]) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @else
                                <form method="POST" action="{{ route('admin.save-validasi', ['id' => $id])}}" enctype="multipart/form-data">
                                @endif
                                @csrf

                                <div class="form-group">
                                    <label for="status_beasiswa" id="status_beasiswa"></label>
                                    <div class="form-check">
                                        <input type="radio" name="status_beasiswa" class="form-check-input" id="pb" value="PB"><h5>Ya, Layak Menerima Beasiswa</h5> 'Penerimaan Beasiswa(PB)'
                                    </div>
                                    <br>
                                    <div class="form-check">
                                        <input type="radio" name="status_beasiswa" class="form-check-input" id="bcpb" value="BCPB"><h5>Ditangguhkan, Data Belum Lengkap</h5> 'Calon Bakal Penerimaan Beasiswa (CBPB)'
                                    </div>
                                    <br>
                                    <div class="form-check">
                                        <input type="radio" name="status_beasiswa" class="form-check-input" id="npb" value="NPB"><h5>Tidak, tidak dapat menerima Beasiswa</h5> 'Non Penerima Beasiswa (NPB)'
                                    </div>
                                    
                              <button type="submit" class="btn btn-success btn-sm">Validasi</button>
                              
                                </div>
                                @if(isset($beasiswaAnak))
                                    <button type="submit" class="btn btn-success btn-sm">Validasi</button>
                                @else
                                    <button type="submit" class="btn btn-success btn-sm">Validasi</button>
                                @endif
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


@endsection
