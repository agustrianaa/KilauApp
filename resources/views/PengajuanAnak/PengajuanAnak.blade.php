@extends('layout.main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
    .mb-2.tombolsubmit{
        justify-content: center;
        align-content: center;
    }

    .row.mb-2.pekerjaanibu{
        display: none;
    }

    .row.mb-2.pekerjaanayah{
        display: none;
    }

    .row.mb-2.pekerjaanwali{
        display: none;
    }
    .breadcrumb-item a {
    text-decoration: none;
    color: black;
    transition: 0.1s;
    }

    .breadcrumb-item a:hover {
        text-decoration: none;
        color: rgb(0, 136, 255);
        transition: 0.1s;
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
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active">Pengajuan Anak</li>
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

                    <form action="{{ route('admin.pengajuanFormStore') }}" method="POST">
                    @csrf
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
                                                    <input type="text" class="form-control" id="nama_lengkap_calon_anak" name="nama_lengkap_calon_anak" placeholder="Nama Lengkap...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Nama Panggilan :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama_panggilan_calon_anak" name="nama_panggilan_calon_anak" placeholder="Nama Panggilan...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Agama :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <select class="form-select" id="agama_anak" name="agama_anak" required="">
                                                        <option value="" disabled selected>-Pilih-</option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Kristen">Kristen</option>
                                                        <option value="Katolik">Katolik</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Budha">Budha</option>
                                                        <option value="Konghucu">Konghucu</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Jenis Kelamin :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <select class="form-select" id="jenis_kelamin_calon_anak" name="jenis_kelamin_calon_anak" required="">
                                                        <option value="" disabled selected>-Pilih-</option>
                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Tempat Lahir :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="tempat_lahir_calon_anak" name="tempat_lahir_calon_anak" placeholder="Tempat Lahir...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Tanggal Lahir :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="date" class="form-control" id="tanggal_lahir_calon_anak" name="tanggal_lahir_calon_anak" placeholder="Tanggal Lahir...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Wilayah Binaan :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <select class="form-select" id="wilayah_binaan" name="wilayah_binaan">
                                                        <option disabled selected>-Pilih-</option>
                                                        @foreach($wilayah as $kantorCabang)
                                                            @if($kantorCabang->dataWilBin)
                                                                <option value="{{ $kantorCabang->dataWilBin->nama_wilbin }}">
                                                                    {{ $kantorCabang->dataWilBin->nama_wilbin }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Shelter :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <select class="form-select" id="shelter" name="shelter">
                                                        <option disabled selected>-Pilih-</option>
                                                        @foreach($wilayah as $kantorCabang)
                                                            @if($kantorCabang->dataWilBin)
                                                                <option value="{{ $kantorCabang->dataWilBin->dataShelter->nama_shelter }}">
                                                                    {{ $kantorCabang->dataWilBin->dataShelter->nama_shelter }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Jarak ke Shelter :</p>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="jarak_ke_shelter" name="jarak_ke_shelter" placeholder="">
                                                        <span class="input-group-text">KM</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Anak Ke :</p>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <input type="number" class="form-control" id="anak_ke" name="anak_ke" placeholder="Anak ke...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Nama Sekolah :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" placeholder="Nama Sekolah...">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="kelas_sekolah" name="kelas_sekolah" placeholder="Kelas...">
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
                                                            <input type="text" class="form-control" id="nama_madrasah" name="nama_madrasah" placeholder="Nama Madrasah...">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="kelas_madrasah" name="kelas_madrasah" placeholder="Kelas...">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Hobby :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="hobby" name="hobby" placeholder="Hobby...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Cita - cita :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="cita_cita" name="cita_cita" placeholder="Cita-cita...">
                                                </div>
                                            </div>
                                            <input type="hidden" class="form-control" id="status_binaan_anak" name="status_binaan_anak" value="{{ 0 }}">
                                            <input type="hidden" class="form-control" id="status_beasiswa_anak" name="status_beasiswa_anak" value="{{ 'Belum Validasi' }}">
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
                                                    <p class="text-sm-end">Kantor Cabang :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <select class="form-select" id="kacab" name="kacab">
                                                        <option disabled selected>-Pilih-</option>
                                                        @foreach($wilayah as $kantorCabang)
                                                            <option value="{{ $kantorCabang->nama_kacab }}">
                                                                {{ $kantorCabang->nama_kacab }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">No. KK :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="No. Kartu Keluarga...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Alamat Lengkap :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <textarea class="form-control" id="alamat_kk" name="alamat_kk" rows="3" placeholder="Alamat Lengkap..."></textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Kepala Keluarga :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="kepala_keluarga" name="kepala_keluarga" placeholder="Nama Kepala Keluarga...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">No HP :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="number" class="form-control" id="no_telp" name="no_telp" placeholder="No. HP...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">No Rekening :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="no_rek" name="no_rek" placeholder="No. Rekening...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    </div>
                                

                                    <div class="row">
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
                                                    <p class="text-sm-end">Nik Ayah :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nik_ayah" name="nik_ayah" placeholder="NIK KTP...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Nama Ayah Kandung :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Nama Lengkap...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Tempat Lahir :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="tempat_lahir_ayah" name="tempat_lahir_ayah" placeholder="Tempat Lahir(Kota)...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Tanggal Lahir :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="date" class="form-control" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah" placeholder="Tanggal Lahir...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Pekerjaan :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <select class="form-select" id="pekerjaan_ayah" name="pekerjaan_ayah">
                                                        <option disabled selected>Pilih Pekerjaan...</option>
                                                        <option value="Petani">Petani</option>
                                                        <option value="Nelayan">Nelayan</option>
                                                        <option value="Peternak">Peternak</option>
                                                        <option value="PNS NON Dosen/Guru">PNS NON Dosen/Guru</option>
                                                        <option value="Guru PNS">Guru PNS</option>
                                                        <option value="Guru NON PNS">Guru NON PNS</option>
                                                        <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                                                        <option value="Guru NON PNS">Karyawan Swasta</option>
                                                        <option value="Buruh">Buruh</option>
                                                        <option value="Wiraswasta">Wiraswasta</option>
                                                        <option value="Wirausaha">Wirausaha</option>
                                                        <option value="Pedagang Kecil">Pedagang Kecil</option>
                                                        <option value="Pedagang Besar">Pedagang Besar</option>
                                                        <option value="Pensiunan">Pensiunan</option>
                                                        <option value="Tidak Bekerja">Tidak Bekerja</option>
                                                        <option value="Sudah Meninggal">Sudah Meninggal</option>
                                                        <option value="">Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-2 pekerjaanayah" id="pekerjaanayahinput">
                                                <div class="col-12 col-sm-4">
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <!-- Input untuk menangkap Mengisi Value "Lainnya" -->
                                                    <input type="text" id="pekerjaan_ayah_lainnya" name="pekerjaan_ayah" class="form-control" placeholder="isi Pekerjaan 'Lainnya'">
                                                    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

                                                    <!-- Input untuk menangkap Value Select Option -->
                                                    <input type="hidden" id="pekerjaan_ayah_selected" name="pekerjaan_ayah">
                                                    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Jumlah Tanggungan :</p>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="input-group mb-3">
                                                        <input type="number" class="form-control" id="jumlah_tanggungan_ayah" name="jumlah_tanggungan_ayah" placeholder="">
                                                        <span class="input-group-text">Jiwa</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Pendapatan Perbulan :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <div class="input-group mb-3">
                                                        <select class="form-select" id="pendapatan_ayah" name="pendapatan_ayah">
                                                            <option disabled selected>Pilih Penghasilan...</option>
                                                            <option value="Dibawah Rp.500.000,-">Dibawah Rp.500.000,-</option>
                                                            <option value="Rp.500.000,- s/d Rp.1.500.000,-">Rp.500.000,- s/d Rp.1.500.000,-</option>
                                                            <option value="Rp.1.500.000,- s/d Rp.2.500.000,-">Rp.1.500.000,- s/d Rp.2.500.000,-</option>
                                                            <option value="Rp.2.500.000,- s/d Rp.3.500.000,-">Rp.2.500.000,- s/d Rp.3.500.000,-</option>
                                                            <option value="Rp.3.000.000,- s/d Rp.5.000.000,-">Rp.3.000.000,- s/d Rp.5.000.000,-</option>
                                                            <option value="Rp.5.000.000,- s/d Rp.7.000.000,-">Rp.5.000.000,- s/d Rp.7.000.000,-</option>
                                                            <option value="Rp.7.000.000,- s/d Rp.10.000.000,-">Rp.7.000.000,- s/d Rp.10.000.000,-</option>
                                                            <option value="Diatas Rp.10.000.000,-">Diatas Rp.10.000.000,-</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Agama :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <select class="form-select" id="agama" name="agama" required="">
                                                        <option value="" disabled selected>Pilih Agama</option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Kristen">Kristen</option>
                                                        <option value="Katolik">Katolik</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Buddha">Buddha</option>
                                                        <option value="Konghucu">Konghucu</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Alamat :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <textarea class="form-control" id="alamat_ayah" name="alamat_ayah" rows="3" placeholder="Alamat Lengkap..."></textarea>
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
                                                    <p class="text-sm-end">Nik Ibu :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nik_ibu" name="nik_ibu" placeholder="NIK KTP...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Nama Ibu Kandung :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Nama Lengkap...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Tempat Lahir :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="tempat_lahir_ibu" name="tempat_lahir_ibu" placeholder="Tempat Lahir(Kota)...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Tanggal Lahir :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="date" class="form-control" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu" placeholder="Tanggal Lahir...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Pekerjaan :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <select class="form-select" id="pekerjaan_ibu" name="pekerjaan_ibu">
                                                        <option disabled selected>Pilih Pekerjaan...</option>
                                                        <option value="Petani">Petani</option>
                                                        <option value="Nelayan">Nelayan</option>
                                                        <option value="Peternak">Peternak</option>
                                                        <option value="PNS NON Dosen/Guru">PNS NON Dosen/Guru</option>
                                                        <option value="Guru PNS">Guru PNS</option>
                                                        <option value="Guru NON PNS">Guru NON PNS</option>
                                                        <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                                                        <option value="Guru NON PNS">Karyawan Swasta</option>
                                                        <option value="Buruh">Buruh</option>
                                                        <option value="Wiraswasta">Wiraswasta</option>
                                                        <option value="Wirausaha">Wirausaha</option>
                                                        <option value="Pedagang Kecil">Pedagang Kecil</option>
                                                        <option value="Pedagang Besar">Pedagang Besar</option>
                                                        <option value="Pensiunan">Pensiunan</option>
                                                        <option value="Tidak Bekerja">Tidak Bekerja</option>
                                                        <option value="Sudah Meninggal">Sudah Meninggal</option>
                                                        <option value="">Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-2 pekerjaanibu" id="pekerjaanibuinput">
                                                <div class="col-12 col-sm-4">
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <!-- Input untuk menangkap Mengisi Value "Lainnya" -->
                                                    <input type="text" id="pekerjaan_ibu_lainnya" name="pekerjaan_ibu" class="form-control" placeholder="isi Pekerjaan 'Lainnya'">
                                                    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

                                                    <!-- Input untuk menangkap Value Select Option -->
                                                    <input type="hidden" id="pekerjaan_ibu_selected" name="pekerjaan_ibu">
                                                    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Pendapatan Perbulan :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <div class="input-group mb-3">
                                                        <select class="form-select" id="pendapatan_ibu" name="pendapatan_ibu">
                                                            <option disabled selected>Pilih Penghasilan...</option>
                                                            <option value="Dibawah Rp.500.000,-">Dibawah Rp.500.000,-</option>
                                                            <option value="Rp.500.000,- s/d Rp.1.500.000,-">Rp.500.000,- s/d Rp.1.500.000,-</option>
                                                            <option value="Rp.1.500.000,- s/d Rp.2.500.000,-">Rp.1.500.000,- s/d Rp.2.500.000,-</option>
                                                            <option value="Rp.2.500.000,- s/d Rp.3.500.000,-">Rp.2.500.000,- s/d Rp.3.500.000,-</option>
                                                            <option value="Rp.3.000.000,- s/d Rp.5.000.000,-">Rp.3.000.000,- s/d Rp.5.000.000,-</option>
                                                            <option value="Rp.5.000.000,- s/d Rp.7.000.000,-">Rp.5.000.000,- s/d Rp.7.000.000,-</option>
                                                            <option value="Rp.7.000.000,- s/d Rp.10.000.000,-">Rp.7.000.000,- s/d Rp.10.000.000,-</option>
                                                            <option value="Diatas Rp.10.000.000,-">Diatas Rp.10.000.000,-</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Agama :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <select class="form-select" id="agama" name="agama" required="">
                                                        <option value="" disabled selected>Pilih Agama</option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Kristen">Kristen</option>
                                                        <option value="Katolik">Katolik</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Buddha">Buddha</option>
                                                        <option value="Konghucu">Konghucu</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Alamat :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <textarea class="form-control" id="alamat_ibu" name="alamat_ibu" rows="3" placeholder="Alamat Lengkap..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Form Wali-->
                                <div class="col-12 col-sm-4">
                                    <div class="card">
                                        <div class="card-title">
                                            <h4 class="text-center">Form Wali (Jika ada)</h4>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">No. KTP :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="no_ktp_wali" name="no_ktp_wali" placeholder="NO. KTP...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Nama Lengkap :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama_lengkap_wali" name="nama_lengkap_wali" placeholder="Nama Lengkap...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Nama Panggilan :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama_panggilan_wali" name="nama_panggilan_wali" placeholder="Nama Panggilan...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Tempat Lahir :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="tempat_lahir_wali" name="tempat_lahir_wali" placeholder="Tempat Lahir(Kota)...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Tanggal Lahir :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="date" class="form-control" id="tanggal_lahir_wali" name="tanggal_lahir_wali" placeholder="Tanggal Lahir...">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Pekerjaan :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <select class="form-select" id="pekerjaan_wali" name="pekerjaan_wali">
                                                        <option disabled selected>Pilih Pekerjaan...</option>
                                                        <option value="Petani">Petani</option>
                                                        <option value="Nelayan">Nelayan</option>
                                                        <option value="Peternak">Peternak</option>
                                                        <option value="PNS NON Dosen/Guru">PNS NON Dosen/Guru</option>
                                                        <option value="Guru PNS">Guru PNS</option>
                                                        <option value="Guru NON PNS">Guru NON PNS</option>
                                                        <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                                                        <option value="Guru NON PNS">Karyawan Swasta</option>
                                                        <option value="Buruh">Buruh</option>
                                                        <option value="Wiraswasta">Wiraswasta</option>
                                                        <option value="Wirausaha">Wirausaha</option>
                                                        <option value="Pedagang Kecil">Pedagang Kecil</option>
                                                        <option value="Pedagang Besar">Pedagang Besar</option>
                                                        <option value="Pensiunan">Pensiunan</option>
                                                        <option value="Tidak Bekerja">Tidak Bekerja</option>
                                                        <option value="Sudah Meninggal">Sudah Meninggal</option>
                                                        <option value="">Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-2 pekerjaanwali" id="pekerjaanwaliinput">
                                                <div class="col-12 col-sm-4">
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <!-- Input untuk menangkap Mengisi Value "Lainnya" -->
                                                    <input type="text" id="pekerjaan_wali_lainnya" name="pekerjaan_wali" class="form-control" placeholder="isi Pekerjaan 'Lainnya'">
                                                    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

                                                    <!-- Input untuk menangkap Value Select Option -->
                                                    <input type="hidden" id="pekerjaan_wali_selected" name="pekerjaan_wali">
                                                    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Jumlah Tanggungan :</p>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="input-group mb-3">
                                                        <input type="number" class="form-control" id="jumlah_tanggungan_wali" name="jumlah_tanggungan_wali" placeholder="">
                                                        <span class="input-group-text">Jiwa</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Pendapatan Perbulan :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <div class="input-group mb-3">
                                                        <select class="form-select" id="pendapatan_wali" name="pendapatan_wali">
                                                            <option disabled selected>Pilih Penghasilan...</option>
                                                            <option value="Dibawah Rp.500.000,-">Dibawah Rp.500.000,-</option>
                                                            <option value="Rp.500.000,- s/d Rp.1.500.000,-">Rp.500.000,- s/d Rp.1.500.000,-</option>
                                                            <option value="Rp.1.500.000,- s/d Rp.2.500.000,-">Rp.1.500.000,- s/d Rp.2.500.000,-</option>
                                                            <option value="Rp.2.500.000,- s/d Rp.3.500.000,-">Rp.2.500.000,- s/d Rp.3.500.000,-</option>
                                                            <option value="Rp.3.000.000,- s/d Rp.5.000.000,-">Rp.3.000.000,- s/d Rp.5.000.000,-</option>
                                                            <option value="Rp.5.000.000,- s/d Rp.7.000.000,-">Rp.5.000.000,- s/d Rp.7.000.000,-</option>
                                                            <option value="Rp.7.000.000,- s/d Rp.10.000.000,-">Rp.7.000.000,- s/d Rp.10.000.000,-</option>
                                                            <option value="Diatas Rp.10.000.000,-">Diatas Rp.10.000.000,-</option>
                                                        </select>
                                                    </div>
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
                                <button type="submit" class="btn btn-outline-primary" id="tombol-save"><i class="bi bi-send-fill"></i> Submit</button>
                            </div>
                        </div>
                    </form>
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

<script type="text/javascript">

    // Kondisi "Lainnya" dari input pekerjaan_ayah
    $(document).ready(function () {
        $("#pekerjaan_ayah").change(function () {
            var selectedValue = $(this).val(); // Mendapatkan nilai yang dipilih    

            if (selectedValue === "") {
                $("#pekerjaanayahinput").removeClass("pekerjaanayah");
            } else {
                $("#pekerjaanayahinput").addClass("pekerjaanayah");
                $("#pekerjaan_ayah_selected").val(selectedValue);
            }
        });

        $("#pekerjaan_ayah_lainnya").on('input', function() {
            var lainnyaValue = $(this).val();
            // Update the hidden input value when the user types in "Lainnya"
            $("#pekerjaan_ayah_selected").val(lainnyaValue);
        });
    });

    // Kondisi "Lainnya" dari input pekerjaan_ibu
    $(document).ready(function () {
        // Ketika elemen "select" dengan ID "pekerjaan_ibu" berubah
        $("#pekerjaan_ibu").change(function () {
            var selectedValue = $(this).val(); // Mendapatkan nilai yang dipilih    

            if (selectedValue === "") {
                // Jika "Lainnya" dipilih, hapus class "pekerjaanibu" pada elemen "row mb-2 pekerjaanibu"
                $("#pekerjaanibuinput").removeClass("pekerjaanibu");
            } else {
                // Jika selain "Lainnya" dipilih, tambahkan kembali class "pekerjaanibu" pada elemen "row mb-2 pekerjaanibu"
                $("#pekerjaanibuinput").addClass("pekerjaanibu");
                $("#pekerjaan_ibu_selected").val(selectedValue);
            }
        });

        $("#pekerjaan_ibu_lainnya").on('input', function() {
            var lainnyaValue = $(this).val();
            // Update the hidden input value when the user types in "Lainnya"
            $("#pekerjaan_ibu_selected").val(lainnyaValue);
        });
    });

    // Kondisi "Lainnya" dari input pekerjaan_wali
    $(document).ready(function () {
        $("#pekerjaan_wali").change(function () {
            var selectedValue = $(this).val(); // Mendapatkan nilai yang dipilih    

            if (selectedValue === "") {
                $("#pekerjaanwaliinput").removeClass("pekerjaanwali");
            } else {
                $("#pekerjaanwaliinput").addClass("pekerjaanwali");
                $("#pekerjaan_wali_selected").val(selectedValue);
            }
        });

        $("#pekerjaan_wali_lainnya").on('input', function() {
            var lainnyaValue = $(this).val();
            // Update the hidden input value when the user types in "Lainnya"
            $("#pekerjaan_wali_selected").val(lainnyaValue);
        });
    });
</script>


@endsection
