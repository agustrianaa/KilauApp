@extends('layout.main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <div class="content-wrapper">
        <section class="content">

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Detail Anak <i>{{ $dataAnak ? $dataAnak->nama_lengkap : 'Data Kosong' }}</i></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Detail Anak</li>
                            </ol>
                        </div>
                    </div><!-- End row -->
                </div><!-- End container-fluid -->
            </div>
            <!-- End content-header -->

            <div class="container-fluid">
                <div class="row">
                    <!-- CARD DATA ANAK -->
                    <div class="col-md-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="https://i.pinimg.com/564x/69/87/1f/69871fc9c6ddf63be8262c48297d7136.jpg" alt="User profile picture">
                                </div>
                                <p class="text-center">{{ $dataAnak ? $dataAnak->nama_lengkap : 'Data Kosong' }}</p>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Kelamin</b> <div class="float-right">{{ $dataAnak ? $dataAnak->jenis_kelamin : 'Data Kosong' }}</div>
                                    </li>
                                    <li class="list-group-item">
                                        <b>TTL</b> <div class="float-right">{{ $dataAnak ? $dataAnak->tempat_lahir : 'Data Kosong' }}, {{ $dataAnak ? $dataAnak->tanggal_lahir : 'Data Kosong' }}</div>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Sekolah</b> <div class="float-right">{{ $dataAnak ? $dataAnak->nama_sekolah : 'Data Kosong' }}</div>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Kelas</b> <div class="float-right">{{ $dataAnak ? $dataAnak->kelas_sekolah : 'Data Kosong' }}</div>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Shelter</b> <div class="float-right">{{ $dataKeluarga ? $dataKeluarga->shelter : 'Data Kosong' }}</div>
                                    </li>
                                </ul>
                                <div class="float-end">
                                    <button type="button" class="btn btn-success text-white" data-toggle="modal" data-target="#modal_dataAnak" data-id="{{ $dataAnak ? $dataAnak->id_anaks : '' }}"><i class="bi bi-pencil-square"></i> Edit</button>
                                </div>
                                <!-- Untuk ke data lengkap anak -->

                                <!-- Modal Data Anak -->
                                <div class="modal fade" id="modal_dataAnak" tabindex="-1" role="dialog" aria-labelledby="LabelAnak">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="col-12 text-center mt-3">
                                                <h3>Edit Data Anak</h3>
                                            </div>
                                            <hr class="text-body-tertiary">
                                            <div class="modal-body">
                                                <!-- Isi konten modal di sini -->
                                                <form>
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id_anaks" id="id_anaks" value="{{ $dataAnak ? $dataAnak->id_anaks : '' }}">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label class="control-label">Nama Lengkap</label>
                                                            <input type="text" class="form-control" id="namaLengkapAnak" name="namaLengkapAnak" placeholder="" value="{{ $dataAnak ? $dataAnak->nama_lengkap : 'Data Kosong' }}" maxlength="50" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label class="control-label">Nama Panggilan</label>
                                                            <input type="text" class="form-control" id="namaPanggilanAnak" name="namaPanggilanAnak" placeholder="" value="{{ $dataAnak ? $dataAnak->nama_panggilan : 'Data Kosong' }}" maxlength="50" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-2">
                                                            <label class="control-label">Anak ke</label>
                                                            <input type="number" class="form-control" id="AnakKe" name="AnakKe" placeholder="" value="{{ $dataAnak ? $dataAnak->anak_ke : 'Data Kosong' }}" maxlength="50" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label class="control-label">Jenis Kelamin</label>
                                                            <select class="form-select" id="jenisKelaminAnak" name="jenisKelaminAnak" required="">
                                                                <option value="" disabled selected {{ $dataAnak->jenis_kelamin == '' ? 'selected' : '' }}>-Pilih-</option>
                                                                <option value="Laki-Laki" {{ $dataAnak->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                                                <option value="Perempuan" {{ $dataAnak->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">

                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Tempat Lahir</label>
                                                                    <input type="text" class="form-control" id="tempat_lahirAnak" name="tempat_lahirAnak" placeholder=""value="{{ $dataAnak ? $dataAnak->tempat_lahir : 'Data Kosong' }}" required="">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Tanggal Lahir</label>
                                                                    <input type="date" class="form-control" id="tanggal_lahirAnak" name="tanggal_lahirAnak" placeholder="" value="{{ $dataAnak ? $dataAnak->tanggal_lahir : 'Data Kosong' }}" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label class="control-label">Nama Sekolah</label>
                                                                    <input type="text" class="form-control" id="namaSekolah" name="namaSekolah" placeholder="" value="{{ $dataAnak ? $dataAnak->nama_sekolah : 'Data Kosong' }}" maxlength="50" required="">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="control-label">Kelas</label>
                                                                    <input type="number" class="form-control" id="kelasSekolah" name="kelasSekolah" placeholder="" value="{{ $dataAnak ? $dataAnak->kelas_sekolah : 'Data Kosong' }}" maxlength="50" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label class="control-label">Nama Madrasah</label>
                                                                    <input type="text" class="form-control" id="namaMadrasah" name="namaMadrasah" placeholder="" value="{{ $dataAnak ? $dataAnak->nama_madrasah : 'Data Kosong' }}" maxlength="50" required="">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="control-label">Kelas</label>
                                                                    <input type="number" class="form-control" id="kelasMadrasah" name="kelasMadrasah" placeholder="" value="{{ $dataAnak ? $dataAnak->kelas_madrasah : 'Data Kosong' }}" maxlength="50" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label class="control-label">Hobby</label>
                                                            <input type="text" class="form-control" id="hobbyAnak" name="hobbyAnak" placeholder="" value="{{ $dataAnak ? $dataAnak->hobby : 'Data Kosong' }}" maxlength="50" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label class="control-label">Cita - cita</label>
                                                            <input type="text" class="form-control" id="citaCitaAnak" name="citaCitaAnak" placeholder="" value="{{ $dataAnak ? $dataAnak->cita_cita : 'Data Kosong' }}" maxlength="50" required="">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                <button type="button" data-dismiss="modal" class="btn btn-primary" id="btn-simpan-anak">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                            </div>
                        </div>
                    </div>

                    <!-- Data Keluarga, Ayah, Ibu -->
                    <div class="col-md-9">
                        <div class="card" >

                            <div class="card-body">
                                <div class="float-start m-1">
                                    <a href="{{ route('admin.calonanakbinaanIndex') }}" class="btn btn-outline-warning shadow-sm"><i class="bi bi-arrow-left"></i> Kembali</a>
                                </div>
                                <div class="text-center">
                                    <h3>Data Keluarga </h3>
                                <h6>No KK : {{$dataKeluarga->no_kk}}</h6>
                                </div>
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
                                        <li class="nav-item">
                                            <a class="nav-link" href="#tab_dataWali" data-toggle="pill" role="tab" aria-selected="false">Data Wali</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body" >
                                    <div class="tab-content" >
                                        <!-- Data Keluarga -->
                                        <div class="tab-pane fade show active" id="tab_dataKeluarga" aria-labelledby="custom-tabs-two-home-tab">
                                                {{-- <div class="post">
                                                    <div class="user-block"> --}}
                                                        <ul class="list-group list-group-unbordered">
                                                            <li class="list-group-item">
                                                                <div class="col-sm-12">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="">
                                                                                <b>Kantor Cabang</b>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="float-start">
                                                                                <b>: </b> {{ $dataKeluarga ? $dataKeluarga->kacab : 'Data Kosong' }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="col-sm-12">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="">
                                                                                <b>No. Kartu Keluarga</b>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="float-start">
                                                                                <b>: </b> {{ $dataKeluarga ? $dataKeluarga->no_kk : 'Data Kosong' }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="col-sm-12">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="">
                                                                                <b>Anak Ke</b>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="float-start">
                                                                                <b>: </b> {{ $dataAnak ? $dataAnak->anak_ke : 'Data Kosong' }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="col-sm-12">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="">
                                                                                <b>Alamat KK</b>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="float-start">
                                                                                <b>: </b> {{ $dataKeluarga ? $dataKeluarga->alamat_kk : 'Data Kosong' }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="col-sm-12">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="">
                                                                                <b>Wilayah Binaan</b>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="float-start">
                                                                                <b>: </b> {{ $dataKeluarga ? $dataKeluarga->wilayah_binaan : 'Data Kosong' }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="col-sm-12">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="">
                                                                                <b>Shelter</b>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="float-start">
                                                                                <b>: </b> {{ $dataKeluarga ? $dataKeluarga->shelter : 'Data Kosong' }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="col-sm-12">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="">
                                                                                <b>Jarak ke Shelter</b>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="float-start">
                                                                                <b>: </b> {{ $dataKeluarga ? $dataKeluarga->jarak_ke_shelter : 'Data Kosong' }} KM
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="col-sm-12">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="">
                                                                                <b>No. Telephone</b>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="float-start">
                                                                                <b>: </b> {{ $dataKeluarga ? $dataKeluarga->no_telp : 'Data Kosong' }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="col-sm-12">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="">
                                                                                <b>No. Rekening</b>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="float-start">
                                                                                <b>: </b> {{ $dataKeluarga ? $dataKeluarga->no_rek : 'Data Kosong' }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <button type="button" class="btn btn-success float-right btn-md" data-toggle="modal" data-target="#modal_dataKeluarga" data-id="{{ $dataKeluarga ? $dataKeluarga->id : '' }}"><i class="bi bi-pencil-square"></i> Edit</button>
                                                    {{-- </div>
                                                </div> --}}
                                        </div>

                                        <!-- Modal Data Keluarga -->
                                        <div class="modal fade" id="modal_dataKeluarga" tabindex="-1" role="dialog" aria-labelledby="LabelKeluarga">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="col-12 text-center mt-3">
                                                        <h3>Edit Data Keluarga</h3>
                                                    </div>
                                                    <hr class="text-body-tertiary">
                                                    <div class="modal-body">
                                                        <!-- Isi konten modal di sini -->
                                                        <form >
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="id" id="id" value="{{ $dataKeluarga ? $dataKeluarga->id : '' }}">
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label class="control-label">Kantor Cabang</label>
                                                                    <select class="form-select" id="kacab" name="kacab">
                                                                        <option disabled selected {{ $dataKeluarga->kacab == '' ? 'selected' : '' }}>Kantor Cabang...</option>
                                                                        <option value="Indramayu" {{ $dataKeluarga->kacab == 'Indramayu' ? 'selected' : '' }}>Indramayu</option>
                                                                        <option value="Bandung" {{ $dataKeluarga->kacab == 'Bandung' ? 'selected' : '' }}>Bandung</option>
                                                                        <option value="Sumedang" {{ $dataKeluarga->kacab == 'Sumedang' ? 'selected' : '' }}>Sumedang</option>
                                                                        <option value="Bogor" {{ $dataKeluarga->kacab == 'Bogor' ? 'selected' : '' }}>Bogor</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label class="control-label">No. Kartu Keluarga</label>
                                                                    <input type="text" class="form-control" id="nomorkk" name="nomorkk" placeholder="" value="{{ $dataKeluarga ? $dataKeluarga->no_kk : 'Data Kosong' }}" maxlength="50" required="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label class="control-label">Wilayah Binaan</label>
                                                                    <select class="form-select" id="wilayah_binaan" name="wilayah_binaan">
                                                                        <option disabled selected {{ $dataKeluarga->wilayah_binaan == '' ? 'selected' : '' }}>Wilayah Binaan...</option>
                                                                        <option value="Indramayu" {{ $dataKeluarga->wilayah_binaan == 'Indramayu' ? 'selected' : '' }}>Indramayu</option>
                                                                        <option value="Bandung" {{ $dataKeluarga->wilayah_binaan == 'Bandung' ? 'selected' : '' }}>Bandung</option>
                                                                        <option value="Sumedang" {{ $dataKeluarga->wilayah_binaan == 'Sumedang' ? 'selected' : '' }}>Sumedang</option>
                                                                        <option value="Bogor" {{ $dataKeluarga->wilayah_binaan == 'Bogor' ? 'selected' : '' }}>Bogor</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label class="control-label">Shelter</label>
                                                                    <select class="form-select" id="shelter" name="shelter">
                                                                        <option disabled selected {{ $dataKeluarga->shelter == '' ? 'selected' : '' }}>Pilih Shelter...</option>
                                                                        <option value="Indramayu" {{ $dataKeluarga->shelter == 'Indramayu' ? 'selected' : '' }}>Indramayu</option>
                                                                        <option value="Bandung" {{ $dataKeluarga->shelter == 'Bandung' ? 'selected' : '' }}>Bandung</option>
                                                                        <option value="Sumedang" {{ $dataKeluarga->shelter == 'Sumedang' ? 'selected' : '' }}>Sumedang</option>
                                                                        <option value="Bogor" {{ $dataKeluarga->shelter == 'Bogor' ? 'selected' : '' }}>Bogor</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-3 text-nowrap">
                                                                    <label class="control-label">Jarak ke Shelter</label>
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control" id="jarakShelter" name="jarakShelter" placeholder="" value="{{ $dataKeluarga ? $dataKeluarga->jarak_ke_shelter : 'Data Kosong' }}" required="">
                                                                        <span class="input-group-text">KM</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label class="control-label">No. Telephone</label>
                                                                    <input type="number" class="form-control" id="no_telp" name="no_telp" placeholder="" value="{{ $dataKeluarga ? $dataKeluarga->no_telp : 'Data Kosong' }}" required="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label class="control-label">No. Rekening</label>
                                                                    <input type="text" class="form-control" id="no_rek" name="no_rek" placeholder="" value="{{ $dataKeluarga ? $dataKeluarga->no_rek : 'Data Kosong' }}" required="">
                                                                </div>
                                                            </div>

                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                        <button type="button" data-dismiss="modal" class="btn btn-primary" id="btn-simpan-keluarga">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>

                                        <!-- Data Ayah -->
                                        <div class="tab-pane fade" id="tab_dataAyah">
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="">
                                                                    <b>NIK</b>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="float-start">
                                                                    <b>: </b> {{ $dataAyah ? $dataAyah->nik : 'Data Kosong' }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="">
                                                                    <b>Nama Lengkap</b>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="float-start">
                                                                    <b>: </b> {{ $dataAyah ? $dataAyah->nama : 'Data Kosong' }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="">
                                                                    <b>Tempat, Tanggal Lahir</b>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="float-start">
                                                                    <b>: </b> {{ $dataAyah ? $dataAyah->tempat_lahir : 'Data Kosong' }}, {{ $dataAyah ? $dataAyah->tanggal_lahir : 'Data Kosong' }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="">
                                                                    <b>Pekerjaan</b>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="float-start">
                                                                    <b>: </b> {{ $dataAyah ? $dataAyah->pekerjaan : 'Data Kosong' }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="">
                                                                    <b>Jumlah Tanggungan</b>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="float-start">
                                                                    <b>: </b> {{ $dataAyah ? $dataAyah->jumlah_tanggungan : 'Data Kosong' }} Anak
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="">
                                                                    <b>Pendapatan</b>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="float-start">
                                                                    <b>: </b> {{ $dataAyah ? $dataAyah->pendapatan : 'Data Kosong' }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="">
                                                                    <b>Agama</b>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="float-start">
                                                                    <b>: </b> {{ $dataAyah ? $dataAyah->agama : 'Data Kosong' }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="">
                                                                    <b>Alamat</b>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="float-start">
                                                                    <b>: </b> {{ $dataAyah ? $dataAyah->alamat : 'Data Kosong' }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <button type="button" class="btn btn-success float-right btn-md" data-toggle="modal" data-target="#modal_dataAyah" data-id="{{ $dataAyah ? $dataAyah->id_ayahs : '' }}"><i class="bi bi-pencil-square"></i> Edit</button>
                                        </div>

                                        <!-- Modal Data Ayah -->
                                        <div class="modal fade" id="modal_dataAyah" tabindex="-1" role="dialog" aria-labelledby="LabelAyah">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="col-12 text-center mt-3">
                                                        <h3>Edit Data Ayah</h3>
                                                    </div>
                                                    <hr class="text-body-tertiary">
                                                    <div class="modal-body">
                                                        <!-- Isi konten modal di sini -->
                                                        <form>
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="id_ayahs" id="id_ayahs" value="{{ $dataAyah ? $dataAyah->id_ayahs : '' }}">
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label for="nik" class="control-label">NIK</label>
                                                                    <input type="text" class="form-control" id="nikAyah" name="nikAyah" placeholder="Masukkan NIK..." value="{{ $dataAyah ? $dataAyah->nik : 'Data Kosong' }}"  maxlength="50" required="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label class="control-label">Nama Lengkap</label>
                                                                    <input type="text" class="form-control" id="namaAyah" name="namaAyah" placeholder="" value="{{ $dataAyah ? $dataAyah->nama : 'Data Kosong' }}" maxlength="50" required="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label class="control-label">Tempat Lahir</label>
                                                                            <input type="text" class="form-control" id="tempat_lahirAyah" name="tempat_lahirAyah" placeholder=""value="{{ $dataAyah ? $dataAyah->tempat_lahir : 'Data Kosong' }}" required="">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label class="control-label">Tanggal Lahir</label>
                                                                            <input type="date" class="form-control" id="tanggal_lahirAyah" name="tanggal_lahirAyah" placeholder="" value="{{ $dataAyah ? $dataAyah->tanggal_lahir : 'Data Kosong' }}" required="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label class="control-label">Pekerjaan</label>
                                                                    <select class="form-select" id="pekerjaanAyah" name="pekerjaanAyah">
                                                                        <option disabled selected {{ $dataAyah->pekerjaan == '' ? 'selected' : '' }}>Pilih Pekerjaan...</option>
                                                                        <option value="Petani" {{ $dataAyah->pekerjaan == 'Petani' ? 'selected' : '' }}>Petani</option>
                                                                        <option value="Nelayan" {{ $dataAyah->pekerjaan == 'Nelayan' ? 'selected' : '' }}>Nelayan</option>
                                                                        <option value="Peternak" {{ $dataAyah->pekerjaan == 'Peternak' ? 'selected' : '' }}>Peternak</option>
                                                                        <option value="PNS NON Dosen/Guru" {{ $dataAyah->pekerjaan == 'PNS NON Dosen/Guru' ? 'selected' : '' }}>PNS NON Dosen/Guru</option>
                                                                        <option value="Guru PNS" {{ $dataAyah->pekerjaan == 'Guru PNS' ? 'selected' : '' }}>Guru PNS</option>
                                                                        <option value="Guru NON PNS" {{ $dataAyah->pekerjaan == 'Guru NON PNS' ? 'selected' : '' }}>Guru NON PNS</option>
                                                                        <option value="PNS/TNI/POLRI" {{ $dataAyah->pekerjaan == 'PNS/TNI/POLRI' ? 'selected' : '' }}>PNS/TNI/POLRI</option>
                                                                        <option value="Guru NON PNS" {{ $dataAyah->pekerjaan == 'Guru NON PNS' ? 'selected' : '' }}>Karyawan Swasta</option>
                                                                        <option value="Buruh" {{ $dataAyah->pekerjaan == 'Buruh' ? 'selected' : '' }}>Buruh</option>
                                                                        <option value="Wiraswasta" {{ $dataAyah->pekerjaan == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                                                        <option value="Wirausaha" {{ $dataAyah->pekerjaan == 'Wirausaha' ? 'selected' : '' }}>Wirausaha</option>
                                                                        <option value="Pedagang Kecil" {{ $dataAyah->pekerjaan == 'Pedagang Kecil' ? 'selected' : '' }}>Pedagang Kecil</option>
                                                                        <option value="Pedagang Besar" {{ $dataAyah->pekerjaan == 'Pedagang Besar' ? 'selected' : '' }}>Pedagang Besar</option>
                                                                        <option value="Pensiunan" {{ $dataAyah->pekerjaan == 'Pensiunan' ? 'selected' : '' }}>Pensiunan</option>
                                                                        <option value="Tidak Bekerja" {{ $dataAyah->pekerjaan == 'Tidak Bekerja' ? 'selected' : '' }}>Tidak Bekerja</option>
                                                                        <option value="Sudah Meninggal" {{ $dataAyah->pekerjaan == 'Sudah Meninggal' ? 'selected' : '' }}>Sudah Meninggal</option>
                                                                        {{-- <option value="">Lainnya</option> --}}
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-3 text-nowrap">
                                                                    <div class="input-group">
                                                                        <label class="control-label">Jumlah Tanggungan</label>
                                                                        <input type="number" class="form-control" id="tanggunganAyah" name="tanggunganAyah" placeholder="" value="{{ $dataAyah ? $dataAyah->jumlah_tanggungan : 'Data Kosong' }}" required="">
                                                                        <span class="input-group-text">Anak</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label class="control-label">Pendapatan</label>
                                                                    <select class="form-select" id="pendapatanAyah" name="pendapatanAyah">
                                                                        <option disabled selected {{ $dataAyah->pendapatan == '' ? 'selected' : '' }}>Pilih Penghasilan...</option>
                                                                        <option value="Dibawah Rp.500.000,-" {{ $dataAyah->pendapatan == 'Dibawah Rp.500.000,-' ? 'selected' : '' }}>Dibawah Rp.500.000,-</option>
                                                                        <option value="Rp.500.000,- s/d Rp.1.500.000,-" {{ $dataAyah->pendapatan == 'Rp.500.000,- s/d Rp.1.500.000,-' ? 'selected' : '' }}>Rp.500.000,- s/d Rp.1.500.000,-</option>
                                                                        <option value="Rp.1.500.000,- s/d Rp.2.500.000,-" {{ $dataAyah->pendapatan == 'Rp.1.500.000,- s/d Rp.2.500.000,-' ? 'selected' : '' }}>Rp.1.500.000,- s/d Rp.2.500.000,-</option>
                                                                        <option value="Rp.2.500.000,- s/d Rp.3.500.000,-" {{ $dataAyah->pendapatan == 'Rp.2.500.000,- s/d Rp.3.500.000,-' ? 'selected' : '' }}>Rp.2.500.000,- s/d Rp.3.500.000,-</option>
                                                                        <option value="Rp.3.000.000,- s/d Rp.5.000.000,-" {{ $dataAyah->pendapatan == 'Rp.3.000.000,- s/d Rp.5.000.000,-' ? 'selected' : '' }}>Rp.3.000.000,- s/d Rp.5.000.000,-</option>
                                                                        <option value="Rp.5.000.000,- s/d Rp.7.000.000,-" {{ $dataAyah->pendapatan == 'Rp.5.000.000,- s/d Rp.7.000.000,-' ? 'selected' : '' }}>Rp.5.000.000,- s/d Rp.7.000.000,-</option>
                                                                        <option value="Rp.7.000.000,- s/d Rp.10.000.000,-" {{ $dataAyah->pendapatan == 'Rp.7.000.000,- s/d Rp.10.000.000,-' ? 'selected' : '' }}>Rp.7.000.000,- s/d Rp.10.000.000,-</option>
                                                                        <option value="Diatas Rp.10.000.000,-" {{ $dataAyah->pendapatan == 'Diatas Rp.10.000.000,-' ? 'selected' : '' }}>Diatas Rp.10.000.000,-</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label class="control-label">Agama</label>
                                                                    <select class="form-select" id="agamaAyah" name="agamaAyah" aria-placeholder="pilih agama" required>
                                                                        <option value="" disabled {{ $dataAyah->agama == '' ? 'selected' : '' }}>Pilih Agama</option>
                                                                        <option value="Islam" {{ $dataAyah->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                                                        <option value="Kristen" {{ $dataAyah->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                                                        <option value="Katolik" {{ $dataAyah->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                                                        <option value="Hindu" {{ $dataAyah->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                                                        <option value="Buddha" {{ $dataAyah->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                                                        <option value="Konghucu" {{ $dataAyah->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label class="control-label">Alamat</label>
                                                                    <textarea class="form-control" id="alamatAyah" name="alamatAyah" rows="3">{{ $dataAyah ? $dataAyah->alamat : 'Data Kosong' }}</textarea>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                        <button type="button" data-dismiss="modal" class="btn btn-primary" id="btn-simpan-ayah">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

                                        <!-- Data Ibu -->
                                        <div class="tab-pane fade" id="tab_dataIbu">
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="">
                                                                    <b>NIK</b>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="float-start">
                                                                    <b>: </b> {{ $dataIbu ? $dataIbu->nik : 'Data Kosong' }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="">
                                                                    <b>Nama Lengkap</b>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="float-start">
                                                                    <b>: </b> {{ $dataIbu ? $dataIbu->nama : 'Data Kosong' }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="">
                                                                    <b>Tempat, Tanggal Lahir</b>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="float-start">
                                                                    <b>: </b> {{ $dataIbu ? $dataIbu->tempat_lahir : 'Data Kosong' }}, {{ $dataIbu ? $dataIbu->tanggal_lahir : 'Data Kosong' }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="">
                                                                    <b>Pekerjaan</b>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="float-start">
                                                                    <b>: </b> {{ $dataIbu ? $dataIbu->pekerjaan : 'Data Kosong' }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="">
                                                                    <b>Pendapatan</b>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="float-start">
                                                                    <b>: </b> {{ $dataIbu ? $dataIbu->pendapatan : 'Data Kosong' }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="">
                                                                    <b>Agama</b>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="float-start">
                                                                    <b>: </b> {{ $dataIbu ? $dataIbu->agama : 'Data Kosong' }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="">
                                                                    <b>Alamat</b>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="float-start">
                                                                    <b>: </b> {{ $dataIbu ? $dataIbu->alamat : 'Data Kosong' }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <button type="button" class="btn btn-success float-right btn-md" data-toggle="modal" data-target="#modal_dataIbu" data-id="{{ $dataIbu ? $dataIbu->id_ibus : '' }}"><i class="bi bi-pencil-square"></i> Edit</button>
                                        </div>

                                        <!-- Modal Data Ibu -->
                                        <div class="modal fade" id="modal_dataIbu" tabindex="-1" role="dialog" aria-labelledby="LabelIbu">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="col-12 text-center mt-3">
                                                        <h3>Edit Data Ibu</h3>
                                                    </div>
                                                    <hr class="text-body-tertiary">
                                                    <div class="modal-body">
                                                        <!-- Isi konten modal di sini -->
                                                        <form >
                                                            @csrf
                                                            @method('PUT')
                                                        <input type="hidden" name="id_ibus" id="id_ibus" value="{{ $dataIbu ? $dataIbu->id_ibus : '' }}">
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label for="nomor_kk" class="control-label">NIK</label>
                                                                    <input type="text" class="form-control" id="nikIbu" name="nikIbu" placeholder="Masukkan NIK..." value="{{ $dataIbu ? $dataIbu->nik : 'Data Kosong' }}"  maxlength="50" required="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label class="control-label">Nama Lengkap</label>
                                                                    <input type="text" class="form-control" id="namaIbu" name="namaIbu" placeholder="" value="{{ $dataIbu ? $dataIbu->nama : 'Data Kosong' }}" maxlength="50" required="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label class="control-label">Tempat Lahir</label>
                                                                            <input type="text" class="form-control" id="tempat_lahirIbu" name="tempat_lahirIbu" placeholder=""value="{{ $dataIbu ? $dataIbu->tempat_lahir : 'Data Kosong' }}" required="">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label class="control-label">Tanggal Lahir</label>
                                                                            <input type="date" class="form-control" id="tanggal_lahirIbu" name="tanggal_lahirIbu" placeholder="" value="{{ $dataIbu ? $dataIbu->tanggal_lahir : 'Data Kosong' }}" required="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label class="control-label">Pekerjaan</label>
                                                                    <select class="form-select" id="pekerjaanIbu" name="pekerjaanIbu">
                                                                        <option disabled selected {{ $dataIbu->pekerjaan == '' ? 'selected' : '' }}>Pilih Pekerjaan...</option>
                                                                        <option value="Petani" {{ $dataIbu->pekerjaan == 'Petani' ? 'selected' : '' }}>Petani</option>
                                                                        <option value="Nelayan" {{ $dataIbu->pekerjaan == 'Nelayan' ? 'selected' : '' }}>Nelayan</option>
                                                                        <option value="Peternak" {{ $dataIbu->pekerjaan == 'Peternak' ? 'selected' : '' }}>Peternak</option>
                                                                        <option value="PNS NON Dosen/Guru" {{ $dataIbu->pekerjaan == 'PNS NON Dosen/Guru' ? 'selected' : '' }}>PNS NON Dosen/Guru</option>
                                                                        <option value="Guru PNS" {{ $dataIbu->pekerjaan == 'Guru PNS' ? 'selected' : '' }}>Guru PNS</option>
                                                                        <option value="Guru NON PNS" {{ $dataIbu->pekerjaan == 'Guru NON PNS' ? 'selected' : '' }}>Guru NON PNS</option>
                                                                        <option value="PNS/TNI/POLRI" {{ $dataIbu->pekerjaan == 'PNS/TNI/POLRI' ? 'selected' : '' }}>PNS/TNI/POLRI</option>
                                                                        <option value="Guru NON PNS" {{ $dataIbu->pekerjaan == 'Guru NON PNS' ? 'selected' : '' }}>Karyawan Swasta</option>
                                                                        <option value="Buruh" {{ $dataIbu->pekerjaan == 'Buruh' ? 'selected' : '' }}>Buruh</option>
                                                                        <option value="Wiraswasta" {{ $dataIbu->pekerjaan == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                                                        <option value="Wirausaha" {{ $dataIbu->pekerjaan == 'Wirausaha' ? 'selected' : '' }}>Wirausaha</option>
                                                                        <option value="Pedagang Kecil" {{ $dataIbu->pekerjaan == 'Pedagang Kecil' ? 'selected' : '' }}>Pedagang Kecil</option>
                                                                        <option value="Pedagang Besar" {{ $dataIbu->pekerjaan == 'Pedagang Besar' ? 'selected' : '' }}>Pedagang Besar</option>
                                                                        <option value="Pensiunan" {{ $dataIbu->pekerjaan == 'Pensiunan' ? 'selected' : '' }}>Pensiunan</option>
                                                                        <option value="Tidak Bekerja" {{ $dataIbu->pekerjaan == 'Tidak Bekerja' ? 'selected' : '' }}>Tidak Bekerja</option>
                                                                        <option value="Sudah Meninggal" {{ $dataIbu->pekerjaan == 'Sudah Meninggal' ? 'selected' : '' }}>Sudah Meninggal</option>
                                                                        {{-- <option value="">Lainnya</option> --}}
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label class="control-label">Pendapatan</label>
                                                                    <select class="form-select" id="pendapatanIbu" name="pendapatanIbu">
                                                                        <option disabled selected {{ $dataIbu->pendapatan == '' ? 'selected' : '' }}>Pilih Penghasilan...</option>
                                                                        <option value="Dibawah Rp.500.000,-" {{ $dataIbu->pendapatan == 'Dibawah Rp.500.000,-' ? 'selected' : '' }}>Dibawah Rp.500.000,-</option>
                                                                        <option value="Rp.500.000,- s/d Rp.1.500.000,-" {{ $dataIbu->pendapatan == 'Rp.500.000,- s/d Rp.1.500.000,-' ? 'selected' : '' }}>Rp.500.000,- s/d Rp.1.500.000,-</option>
                                                                        <option value="Rp.1.500.000,- s/d Rp.2.500.000,-" {{ $dataIbu->pendapatan == 'Rp.1.500.000,- s/d Rp.2.500.000,-' ? 'selected' : '' }}>Rp.1.500.000,- s/d Rp.2.500.000,-</option>
                                                                        <option value="Rp.2.500.000,- s/d Rp.3.500.000,-" {{ $dataIbu->pendapatan == 'Rp.2.500.000,- s/d Rp.3.500.000,-' ? 'selected' : '' }}>Rp.2.500.000,- s/d Rp.3.500.000,-</option>
                                                                        <option value="Rp.3.000.000,- s/d Rp.5.000.000,-" {{ $dataIbu->pendapatan == 'Rp.3.000.000,- s/d Rp.5.000.000,-' ? 'selected' : '' }}>Rp.3.000.000,- s/d Rp.5.000.000,-</option>
                                                                        <option value="Rp.5.000.000,- s/d Rp.7.000.000,-" {{ $dataIbu->pendapatan == 'Rp.5.000.000,- s/d Rp.7.000.000,-' ? 'selected' : '' }}>Rp.5.000.000,- s/d Rp.7.000.000,-</option>
                                                                        <option value="Rp.7.000.000,- s/d Rp.10.000.000,-" {{ $dataIbu->pendapatan == 'Rp.7.000.000,- s/d Rp.10.000.000,-' ? 'selected' : '' }}>Rp.7.000.000,- s/d Rp.10.000.000,-</option>
                                                                        <option value="Diatas Rp.10.000.000,-" {{ $dataIbu->pendapatan == 'Diatas Rp.10.000.000,-' ? 'selected' : '' }}>Diatas Rp.10.000.000,-</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label class="control-label">Agama</label>
                                                                    <select class="form-control" id="agamaIbu" name="agamaIbu" aria-placeholder="pilih agama" required>
                                                                        <option value="" disabled {{ $dataIbu->agama == '' ? 'selected' : '' }}>Pilih Agama</option>
                                                                        <option value="Islam" {{ $dataIbu->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                                                        <option value="Kristen" {{ $dataIbu->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                                                        <option value="Katolik" {{ $dataIbu->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                                                        <option value="Hindu" {{ $dataIbu->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                                                        <option value="Buddha" {{ $dataIbu->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                                                        <option value="Konghucu" {{ $dataIbu->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label class="control-label">Alamat</label>
                                                                    <textarea class="form-control" id="alamatIbu" name="alamatIbu" rows="3">{{ $dataIbu ? $dataIbu->alamat : 'Data Kosong' }}</textarea>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                        <button type="button" data-dismiss="modal" class="btn btn-primary" id="btn-simpan-ibu">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

                                        <!-- Data Wali -->
                                        <div class="tab-pane fade" id="tab_dataWali">
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="">
                                                                    <b>No. KTP</b>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="float-start">
                                                                    <b>: </b> {{ $dataWali ? $dataWali->no_ktp : 'Data Kosong' }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="">
                                                                    <b>Nama Lengkap</b>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="float-start">
                                                                    <b>: </b> {{ $dataWali ? $dataWali->nama_lengkap : 'Data Kosong' }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="">
                                                                    <b>Nama Panggilan</b>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="float-start">
                                                                    <b>: </b> {{ $dataWali ? $dataWali->nama_panggilan : 'Data Kosong' }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="">
                                                                    <b>Tempat, Tanggal Lahir</b>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="float-start">
                                                                    <b>: </b> {{ $dataWali ? $dataWali->tempat_lahir : 'Data Kosong' }}, {{ $dataWali ? $dataWali->tanggal_lahir : 'Data Kosong' }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="">
                                                                    <b>Pekerjaan</b>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="float-start">
                                                                    <b>: </b> {{ $dataWali ? $dataWali->pekerjaan : 'Data Kosong' }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="">
                                                                    <b>Jumlah Tanggungan</b>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="float-start">
                                                                    <b>: </b> {{ $dataWali ? $dataWali->jumlah_tanggungan : 'Data Kosong' }} Anak
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="">
                                                                    <b>Pendapatan</b>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="float-start">
                                                                    <b>: </b> {{ $dataWali ? $dataWali->pendapatan : 'Data Kosong' }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <button type="button" class="btn btn-success float-right btn-md" data-toggle="modal" data-target="#modal_dataWali" data-id="{{ $dataWali ? $dataWali->id_walis : '' }}"><i class="bi bi-pencil-square"></i> Edit</button>
                                        </div>

                                        <!-- Modal Data Wali -->
                                        <div class="modal fade" id="modal_dataWali" tabindex="-1" role="dialog" aria-labelledby="LabelIbu">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="col-12 text-center mt-3">
                                                        <h3>Edit Data Wali</h3>
                                                    </div>
                                                    <hr class="text-body-tertiary">
                                                    <div class="modal-body">
                                                        <!-- Isi konten modal di sini -->
                                                        <form >
                                                            @csrf
                                                            @method('PUT')
                                                        <input type="hidden" name="id_walis" id="id_walis" value="{{ $dataWali ? $dataWali->id_walis : '' }}">
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label for="nomor_kk" class="control-label">No. KTP</label>
                                                                    <input type="text" class="form-control" id="noKtpWali" name="noKtpWali" placeholder="Masukkan NIK..." value="{{ $dataWali ? $dataWali->no_ktp : 'Data Kosong' }}"  maxlength="50" required="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label class="control-label">Nama Lengkap</label>
                                                                    <input type="text" class="form-control" id="namaLengkapWali" name="namaLengkapWali" placeholder="" value="{{ $dataWali ? $dataWali->nama_lengkap : 'Data Kosong' }}" maxlength="50" required="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Nama Panggilan</label>
                                                                <div class="col-sm-12">
                                                                    <input type="text" class="form-control" id="namaPanggilanWali" name="namaPanggilanWali" placeholder="" value="{{ $dataWali ? $dataWali->nama_panggilan : 'Data Kosong' }}" maxlength="50" required="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label class="control-label">Tempat Lahir</label>
                                                                            <input type="text" class="form-control" id="tempat_lahirWali" name="tempat_lahirWali" placeholder=""value="{{ $dataWali ? $dataWali->tempat_lahir : 'Data Kosong' }}" required="">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label class="control-label">Tanggal Lahir</label>
                                                                            <input type="date" class="form-control" id="tanggal_lahirWali" name="tanggal_lahirWali" placeholder="" value="{{ $dataWali ? $dataWali->tanggal_lahir : 'Data Kosong' }}" required="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label class="control-label">Pekerjaan</label>
                                                                    <select class="form-select" id="pekerjaanWali" name="pekerjaanWali">
                                                                        <option disabled selected {{ $dataWali->pekerjaan == '' ? 'selected' : '' }}>Pilih Pekerjaan...</option>
                                                                        <option value="Petani" {{ $dataWali->pekerjaan == 'Petani' ? 'selected' : '' }}>Petani</option>
                                                                        <option value="Nelayan" {{ $dataWali->pekerjaan == 'Nelayan' ? 'selected' : '' }}>Nelayan</option>
                                                                        <option value="Peternak" {{ $dataWali->pekerjaan == 'Peternak' ? 'selected' : '' }}>Peternak</option>
                                                                        <option value="PNS NON Dosen/Guru" {{ $dataWali->pekerjaan == 'PNS NON Dosen/Guru' ? 'selected' : '' }}>PNS NON Dosen/Guru</option>
                                                                        <option value="Guru PNS" {{ $dataWali->pekerjaan == 'Guru PNS' ? 'selected' : '' }}>Guru PNS</option>
                                                                        <option value="Guru NON PNS" {{ $dataWali->pekerjaan == 'Guru NON PNS' ? 'selected' : '' }}>Guru NON PNS</option>
                                                                        <option value="PNS/TNI/POLRI" {{ $dataWali->pekerjaan == 'PNS/TNI/POLRI' ? 'selected' : '' }}>PNS/TNI/POLRI</option>
                                                                        <option value="Guru NON PNS" {{ $dataWali->pekerjaan == 'Guru NON PNS' ? 'selected' : '' }}>Karyawan Swasta</option>
                                                                        <option value="Buruh" {{ $dataWali->pekerjaan == 'Buruh' ? 'selected' : '' }}>Buruh</option>
                                                                        <option value="Wiraswasta" {{ $dataWali->pekerjaan == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                                                        <option value="Wirausaha" {{ $dataWali->pekerjaan == 'Wirausaha' ? 'selected' : '' }}>Wirausaha</option>
                                                                        <option value="Pedagang Kecil" {{ $dataWali->pekerjaan == 'Pedagang Kecil' ? 'selected' : '' }}>Pedagang Kecil</option>
                                                                        <option value="Pedagang Besar" {{ $dataWali->pekerjaan == 'Pedagang Besar' ? 'selected' : '' }}>Pedagang Besar</option>
                                                                        <option value="Pensiunan" {{ $dataWali->pekerjaan == 'Pensiunan' ? 'selected' : '' }}>Pensiunan</option>
                                                                        <option value="Tidak Bekerja" {{ $dataWali->pekerjaan == 'Tidak Bekerja' ? 'selected' : '' }}>Tidak Bekerja</option>
                                                                        <option value="Sudah Meninggal" {{ $dataWali->pekerjaan == 'Sudah Meninggal' ? 'selected' : '' }}>Sudah Meninggal</option>
                                                                        {{-- <option value="">Lainnya</option> --}}
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-3 text-nowrap">
                                                                    <div class="input-group">
                                                                        <label class="control-label">Jumlah Tanggungan</label>
                                                                        <input type="number" class="form-control" id="jumlahTanggunganWali" name="jumlahTanggunganWali" placeholder="" value="{{ $dataWali ? $dataWali->jumlah_tanggungan : 'Data Kosong' }}" required="">
                                                                        <span class="input-group-text">Anak</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <label class="control-label">Pendapatan</label>
                                                                    <select class="form-select" id="pendapatanWali" name="pendapatanWali">
                                                                        <option disabled selected {{ $dataWali->pendapatan == '' ? 'selected' : '' }}>Pilih Penghasilan...</option>
                                                                        <option value="Dibawah Rp.500.000,-" {{ $dataWali->pendapatan == 'Dibawah Rp.500.000,-' ? 'selected' : '' }}>Dibawah Rp.500.000,-</option>
                                                                        <option value="Rp.500.000,- s/d Rp.1.500.000,-" {{ $dataWali->pendapatan == 'Rp.500.000,- s/d Rp.1.500.000,-' ? 'selected' : '' }}>Rp.500.000,- s/d Rp.1.500.000,-</option>
                                                                        <option value="Rp.1.500.000,- s/d Rp.2.500.000,-" {{ $dataWali->pendapatan == 'Rp.1.500.000,- s/d Rp.2.500.000,-' ? 'selected' : '' }}>Rp.1.500.000,- s/d Rp.2.500.000,-</option>
                                                                        <option value="Rp.2.500.000,- s/d Rp.3.500.000,-" {{ $dataWali->pendapatan == 'Rp.2.500.000,- s/d Rp.3.500.000,-' ? 'selected' : '' }}>Rp.2.500.000,- s/d Rp.3.500.000,-</option>
                                                                        <option value="Rp.3.000.000,- s/d Rp.5.000.000,-" {{ $dataWali->pendapatan == 'Rp.3.000.000,- s/d Rp.5.000.000,-' ? 'selected' : '' }}>Rp.3.000.000,- s/d Rp.5.000.000,-</option>
                                                                        <option value="Rp.5.000.000,- s/d Rp.7.000.000,-" {{ $dataWali->pendapatan == 'Rp.5.000.000,- s/d Rp.7.000.000,-' ? 'selected' : '' }}>Rp.5.000.000,- s/d Rp.7.000.000,-</option>
                                                                        <option value="Rp.7.000.000,- s/d Rp.10.000.000,-" {{ $dataWali->pendapatan == 'Rp.7.000.000,- s/d Rp.10.000.000,-' ? 'selected' : '' }}>Rp.7.000.000,- s/d Rp.10.000.000,-</option>
                                                                        <option value="Diatas Rp.10.000.000,-" {{ $dataWali->pendapatan == 'Diatas Rp.10.000.000,-' ? 'selected' : '' }}>Diatas Rp.10.000.000,-</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                        <button type="button" data-dismiss="modal" class="btn btn-primary" id="btn-simpan-wali">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var idAnak;
        $('#modal_dataAnak').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget);
            idAnak = button.data('id_anaks');
        });

        function getDataAnak(){
            var idAnak = $('#id_anaks').val();
            var namaLengkapAnak = $('#namaLengkapAnak').val();
            var namaPanggilanAnak = $('#namaPanggilanAnak').val();
            var AnakKe = $('#AnakKe').val();
            var jenisKelaminAnak = $('#jenisKelaminAnak').val();
            var tempat_lahirAnak = $('#tempat_lahirAnak').val();
            var tanggal_lahirAnak = $('#tanggal_lahirAnak').val();
            var namaSekolah = $('#namaSekolah').val();
            var kelasSekolah = $('#kelasSekolah').val();
            var namaMadrasah = $('#namaMadrasah').val();
            var kelasMadrasah = $('#kelasMadrasah').val();
            var hobbyAnak = $('#hobbyAnak').val();
            var citaCitaAnak = $('#citaCitaAnak').val();

            $.ajax({
                method : 'PUT',
                url : "/admin/calonAnakBinaanEditAnak/" + idAnak,
                data: {
                    nama_lengkap : namaLengkapAnak,
                    nama_panggilan : namaPanggilanAnak,
                    anak_ke : AnakKe,
                    jenis_kelamin : jenisKelaminAnak,
                    tempat_lahir : tempat_lahirAnak,
                    tanggal_lahir : tanggal_lahirAnak,
                    nama_sekolah : namaSekolah,
                    kelas_sekolah : kelasSekolah,
                    nama_madrasah : namaMadrasah,
                    kelas_madrasah : kelasMadrasah,
                    hobby : hobbyAnak,
                    cita_cita : citaCitaAnak,
                },
                success: function (data) {
                    console.log(data);
                    $('#modal_dataAnak').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Update!',
                        // text: 'Data berhasil diperbarui',
                        showConfirmButton: false,
                        timer: 800
                    });
                    // Memuat ulang halaman
                    // Menunggu 1 detik (1000 ms) sebelum memuat ulang halaman
                    setTimeout(function() {
                        location.reload();
                    }, 1000); // Ganti 1000 dengan jumlah milidetik yang Anda inginkan.
                },
                error: function (error){
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan!',
                        // text: 'Terjadi kesalahan saat memperbarui data',
                        showConfirmButton: false,
                        timer: 900
                    });
                    console.log('Error', error);
                }
            })
        }
        $('#btn-simpan-anak').on('click', function(){
            getDataAnak();
        });


        // JS DATA KELUARGA
        var idKeluarga;
        $('#modal_dataKeluarga').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget);
            idKeluarga = button.data('id');
        });

        function getDataKeluarga(){
            var kacab = $('#kacab').val();
            var nomorkk = $('#nomorkk').val();
            var wilayah_binaan = $('#wilayah_binaan').val();
            var shelter = $('#shelter').val();
            var jarakShelter = $('#jarakShelter').val();
            var no_telp = $('#no_telp').val();
            var no_rek = $('#no_rek').val();

            $.ajax({
                method : 'PUT',
                url : "/admin/calonAnakBinaanEdit/" + idKeluarga,
                data: {
                    kacab : kacab,
                    no_kk : nomorkk,
                    wilayah_binaan : wilayah_binaan,
                    shelter : shelter,
                    jarak_ke_shelter : jarakShelter,
                    no_telp : no_telp,
                    no_rek : no_rek,
                },
                success: function (data) {
                    console.log(data);

                    $('#modal_dataKeluarga').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Update!',
                        // text: 'Data berhasil diperbarui',
                        showConfirmButton: false,
                        timer: 800
                    });
                    // Memuat ulang halaman
                    // Menunggu 1 detik (1000 ms) sebelum memuat ulang halaman
                    setTimeout(function() {
                        location.reload();
                    }, 1000); // Ganti 1000 dengan jumlah milidetik yang Anda inginkan.
                },
                error: function (error){
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan!',
                        // text: 'Terjadi kesalahan saat memperbarui data',
                        showConfirmButton: false,
                        timer: 900
                    });
                    console.log('Error', error);
                }
            })
        }
        $('#btn-simpan-keluarga').on('click', function(){
            getDataKeluarga();
        });

 //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        var idAyah;
        $('#modal_dataAyah').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget);
            idAyah = button.data('id_ayahs');
        });

        function getDataAyah(){
            var idAyah = $('#id_ayahs').val();
            var nikAyah = $('#nikAyah').val();
            var namaAyah = $('#namaAyah').val();
            var tempat_lahirAyah = $('#tempat_lahirAyah').val();
            var tanggal_lahirAyah = $('#tanggal_lahirAyah').val();
            var pekerjaanAyah = $('#pekerjaanAyah').val();
            var tanggunganAyah = $('#tanggunganAyah').val();
            var pendapatanAyah = $('#pendapatanAyah').val();
            var agamaAyah = $('#agamaAyah').val();
            var alamatAyah = $('#alamatAyah').val();

            $.ajax({
                method : 'PUT',
                url : "/admin/calonAnakBinaanEditAyah/" + idAyah,
                data: {
                    nik : nikAyah,
                    nama : namaAyah,
                    tempat_lahir : tempat_lahirAyah,
                    tanggal_lahir : tanggal_lahirAyah,
                    pekerjaan : pekerjaanAyah,
                    jumlah_tanggungan : tanggunganAyah,
                    pendapatan : pendapatanAyah,
                    agama : agamaAyah,
                    alamat : alamatAyah,
                },
                success: function (data) {
                    console.log(data);
                    $('#modal_dataAyah').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Update!',
                        // text: 'Data berhasil diperbarui',
                        showConfirmButton: false,
                        timer: 800
                    });
                    // Memuat ulang halaman
                    // Menunggu 1 detik (1000 ms) sebelum memuat ulang halaman
                    setTimeout(function() {
                        location.reload();
                    }, 1000); // Ganti 1000 dengan jumlah milidetik yang Anda inginkan.
                },
                error: function (error){
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan!',
                        // text: 'Terjadi kesalahan saat memperbarui data',
                        showConfirmButton: false,
                        timer: 900
                    });
                    console.log('Error', error);
                }
            })
        }
        $('#btn-simpan-ayah').on('click', function(){
            getDataAyah();
        });

        var idIbu;
        $('#modal_dataIbu').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget);
            idIbu = button.data('id_ibus');
        });

        function getDataIbu(){
            var idIbu = $('#id_ibus').val();
            var nikIbu = $('#nikIbu').val();
            var namaIbu = $('#namaIbu').val();
            var tempat_lahirIbu = $('#tempat_lahirIbu').val();
            var tanggal_lahirIbu = $('#tanggal_lahirIbu').val();
            var pekerjaanIbu = $('#pekerjaanIbu').val();
            var pendapatanIbu = $('#pendapatanIbu').val();
            var agamaIbu = $('#agamaIbu').val();
            var alamatIbu = $('#alamatIbu').val();

            $.ajax({
                method : 'PUT',
                url : "/admin/calonAnakBinaanEditIbu/" + idIbu,
                data: {
                    nik : nikIbu,
                    nama : namaIbu,
                    tempat_lahir : tempat_lahirIbu,
                    tanggal_lahir : tanggal_lahirIbu,
                    pekerjaan : pekerjaanIbu,
                    pendapatan : pendapatanIbu,
                    agama : agamaIbu,
                    alamat : alamatIbu,
                },
                success: function (data) {
                    console.log(data);
                    $('#modal_dataIbu').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Update!',
                        // text: 'Data berhasil diperbarui',
                        showConfirmButton: false,
                        timer: 800
                    });
                    // Memuat ulang halaman
                    // Menunggu 1 detik (1000 ms) sebelum memuat ulang halaman
                    setTimeout(function() {
                        location.reload();
                    }, 1000); // Ganti 1000 dengan jumlah milidetik yang Anda inginkan.
                },
                error: function (error){
                    console.log('Error', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan!',
                        // text: 'Terjadi kesalahan saat memperbarui data',
                        showConfirmButton: false,
                        timer: 900
                    });
                }
            })
        }
        $('#btn-simpan-ibu').on('click', function(){
            getDataIbu();
        });


        var idWali;
        $('#modal_dataWali').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget);
            idWali = button.data('id_walis');
        });

        function getDataWali(){
            var idWali = $('#id_walis').val();
            var noKtpWali = $('#noKtpWali').val();
            var namaLengkapWali = $('#namaLengkapWali').val();
            var namaPanggilanWali = $('#namaPanggilanWali').val();
            var tempat_lahirWali = $('#tempat_lahirWali').val();
            var tanggal_lahirWali = $('#tanggal_lahirWali').val();
            var pekerjaanWali = $('#pekerjaanWali').val();
            var jumlahTanggunganWali = $('#jumlahTanggunganWali').val();
            var pendapatanWali = $('#pendapatanWali').val();

            $.ajax({
                method : 'PUT',
                url : "/admin/calonAnakBinaanEditWali/" + idWali,
                data: {
                    no_ktp : noKtpWali,
                    nama_lengkap : namaLengkapWali,
                    nama_panggilan : namaPanggilanWali,
                    tempat_lahir : tempat_lahirWali,
                    tanggal_lahir : tanggal_lahirWali,
                    pekerjaan : pekerjaanWali,
                    jumlah_tanggungan : jumlahTanggunganWali,
                    pendapatan : pendapatanWali,
                },
                success: function (data) {
                    console.log(data);
                    $('#modal_dataWali').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Update!',
                        // text: 'Data berhasil diperbarui',
                        showConfirmButton: false,
                        timer: 800
                    });
                    // Memuat ulang halaman
                    // Menunggu 1 detik (1000 ms) sebelum memuat ulang halaman
                    setTimeout(function() {
                        location.reload();
                    }, 1000); // Ganti 1000 dengan jumlah milidetik yang Anda inginkan.
                },
                error: function (error){
                    console.log('Error', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan!',
                        // text: 'Terjadi kesalahan saat memperbarui data',
                        showConfirmButton: false,
                        timer: 900
                    });
                }
            })
        }
        $('#btn-simpan-wali').on('click', function(){
            getDataWali();
        });


        /* -------------------------------------------------------------------------------------------------------------------------------- */
        // JS IBU
//         var idIbu;
//         $('#modal_dataIbu').on('show.bs.modal', function(event){
//             var button = $(event.relatedTarget);
//             idIbu = button.data('id_ibus');
//         });

//         // Bisa dibilang mengambil data yaa ges yaa
//         function getDataIbu(){
//             var idIbu = $('#id_ibus').val();
//             var nikIbu = $('#nikIbu').val();
//             var namaIbu = $('#namaIbu').val();
//             var tempat_lahirIbu = $('#tempat_lahirIbu').val();
//             var tanggal_lahirIbu = $('#tanggal_lahirIbu').val();
//             var agamaIbu = $('#agamaIbu').val();
//             var alamatIbu = $('#alamatIbu').val();

//             $.ajax({
//                 method: 'PUT',
//                 url: "/admin/calonAnakBinaanEdit/" + idIbu,
//                 data: {
//                     nik : nikIbu,
//                     nama : namaIbu,
//                     tempat_lahir : tempat_lahirIbu,
//                     tanggal_lahir : tanggal_lahirIbu,
//                     agama : agamaIbu,
//                     alamat : alamatIbu,
//                 },
//                 success: function (data){
//                     console.log(data);
//                     $('#modal_dataIbu').modal('hide');
//                     // Memuat ulang halaman
//                     location.reload();
//                 },
//                 error: function (error){
//                     console.log('Error', error)
//                 }
//             });
//         }

//         // fungsi tombol simpan dalam model
//         $('#btn-simpan-ibu').on('click', function(){
//             getDataIbu();
//         });
    });
</script>

<script>

</script>


@endsection
