@extends('layout.main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/PengajuanAnak.css') }}">

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
                                <!--Form Keluarga-->
                                <div class="col-12 col-sm-6">
                                    <div class="card" id="form-keluarga">
                                        <div class="card-title">
                                            <h4 class="text-center">Form Keluarga</h4>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col-12 text-center">
                                                    <i id="infoKK">*Setelah Input No. KK, harap <b>Check</b> terlebih dahulu,<br> apakah sudah terdaftar atau belum.</i>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">No. KK :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="No. Kartu Keluarga...">
                                                        <a href="" id="checkKK"><span class="input-group-text" id="input-group-text-KK">Check</span></a>
                                                    </div>
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
                                                    <input type="number" class="form-control" id="no_rek" name="no_rek" placeholder="No. Rekening...">
                                                </div>
                                            </div>
                                            <div class="InvBox"></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!--Form Anak-->
                                <div class="col-12 col-sm-6">
                                    <div class="card" id="form-anak">
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
                                                    <input type="text" class="form-control" id="nama_lengkap_calon_anak" name="nama_lengkap_calon_anak" placeholder="Nama Lengkap..." disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Nama Panggilan :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama_panggilan_calon_anak" name="nama_panggilan_calon_anak" placeholder="Nama Panggilan..." disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Agama :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <select class="form-select" id="agama_anak" name="agama_anak" required="" disabled>
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
                                                    <select class="form-select" id="jenis_kelamin_calon_anak" name="jenis_kelamin_calon_anak" required="" disabled>
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
                                                    <input type="text" class="form-control" id="tempat_lahir_calon_anak" name="tempat_lahir_calon_anak" placeholder="Tempat Lahir..." disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Tanggal Lahir :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="date" class="form-control" id="tanggal_lahir_calon_anak" name="tanggal_lahir_calon_anak" placeholder="Tanggal Lahir..." disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Kantor Cabang :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <select class="form-select" id="kacab" name="kacab" disabled>
                                                        <option disabled selected>-Pilih-</option>
                                                        @foreach($kantorCabangs as $kantorCabang)
                                                            <option value="{{ $kantorCabang->nama_kacab }}">{{ $kantorCabang->nama_kacab }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Wilayah Binaan :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <select class="form-select" id="wilayah_binaan" name="wilayah_binaan" disabled>
                                                        <option disabled selected>-Pilih-</option>
                                                        @foreach($wilayahBinaans as $wilayahBinaan)
                                                            <option value="{{ $wilayahBinaan->nama_wilbin }}">{{ $wilayahBinaan->nama_wilbin }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Shelter :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <select class="form-select" id="shelter" name="shelter" disabled>
                                                        <option disabled selected>-Pilih-</option>
                                                        @foreach($shelters as $shelter)
                                                            <option value="{{ $shelter->nama_shelter }}">{{ $shelter->nama_shelter }}</option>
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
                                                        <input type="text" class="form-control" id="jarak_ke_shelter" name="jarak_ke_shelter" placeholder="" disabled>
                                                        <span class="input-group-text">KM</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Anak Ke :</p>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <input type="number" class="form-control" id="anak_ke" name="anak_ke" placeholder="Anak ke..." disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Nama Sekolah :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" placeholder="Nama Sekolah..." disabled>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="number" class="form-control" id="kelas_sekolah" name="kelas_sekolah" placeholder="Kelas..." disabled>
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
                                                            <input type="text" class="form-control" id="nama_madrasah" name="nama_madrasah" placeholder="Nama Madrasah..." disabled>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="number" class="form-control" id="kelas_madrasah" name="kelas_madrasah" placeholder="Kelas..." disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Hobby :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="hobby" name="hobby" placeholder="Hobby..." disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Cita - cita :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="cita_cita" name="cita_cita" placeholder="Cita-cita..." disabled>
                                                </div>
                                            </div>
                                            <input type="hidden" class="form-control" id="status_binaan_anak" name="status_binaan_anak" value="{{ 0 }}">
                                            <input type="hidden" class="form-control" id="status_beasiswa_anak" name="status_beasiswa_anak" value="{{ 'Belum Validasi' }}">
                                        </div>
                                    </div>
                                </div>
                                    </div>
                                

                                    <div class="row">
                                <!--Form Ayah-->
                                <div class="col-12 col-sm-4">
                                    <div class="card" id="form-ayah">
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
                                                    <input type="text" class="form-control" id="nik_ayah" name="nik_ayah" placeholder="NIK KTP..." disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Nama Ayah Kandung :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Nama Lengkap..." disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Tempat Lahir :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="tempat_lahir_ayah" name="tempat_lahir_ayah" placeholder="Tempat Lahir(Kota)..." disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Tanggal Lahir :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="date" class="form-control" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah" placeholder="Tanggal Lahir..." disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Pekerjaan :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <select class="form-select" id="pekerjaan_ayah" name="pekerjaan_ayah" disabled>
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
                                                    <input type="text" id="pekerjaan_ayah_lainnya" name="pekerjaan_ayah" class="form-control" placeholder="isi Pekerjaan 'Lainnya'" disabled>
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
                                                        <input type="number" class="form-control" id="jumlah_tanggungan_ayah" name="jumlah_tanggungan_ayah" placeholder="" disabled>
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
                                                        <select class="form-select" id="pendapatan_ayah" name="pendapatan_ayah" disabled>
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
                                                    <select class="form-select" id="agama" name="agama" required="" disabled>
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
                                                    <textarea class="form-control" id="alamat_ayah" name="alamat_ayah" rows="3" placeholder="Alamat Lengkap..." disabled></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Form Ibu-->
                                <div class="col-12 col-sm-4">
                                    <div class="card" id="form-ibu">
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
                                                    <input type="text" class="form-control" id="nik_ibu" name="nik_ibu" placeholder="NIK KTP..." disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Nama Ibu Kandung :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Nama Lengkap..." disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Tempat Lahir :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="tempat_lahir_ibu" name="tempat_lahir_ibu" placeholder="Tempat Lahir(Kota)..." disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Tanggal Lahir :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="date" class="form-control" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu" placeholder="Tanggal Lahir..." disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Pekerjaan :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <select class="form-select" id="pekerjaan_ibu" name="pekerjaan_ibu" disabled>
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
                                                    <input type="text" id="pekerjaan_ibu_lainnya" name="pekerjaan_ibu" class="form-control" placeholder="isi Pekerjaan 'Lainnya'" disabled>
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
                                                        <select class="form-select" id="pendapatan_ibu" name="pendapatan_ibu" disabled>
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
                                                    <select class="form-select" id="agama" name="agama" required="" disabled>
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
                                                    <textarea class="form-control" id="alamat_ibu" name="alamat_ibu" rows="3" placeholder="Alamat Lengkap..." disabled></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Form Wali-->
                                <div class="col-12 col-sm-4">
                                    <div class="card" id="form-wali">
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
                                                    <input type="text" class="form-control" id="no_ktp_wali" name="no_ktp_wali" placeholder="NO. KTP..." disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Nama Lengkap :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama_lengkap_wali" name="nama_lengkap_wali" placeholder="Nama Lengkap..." disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Nama Panggilan :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="nama_panggilan_wali" name="nama_panggilan_wali" placeholder="Nama Panggilan..." disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Tempat Lahir :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" class="form-control" id="tempat_lahir_wali" name="tempat_lahir_wali" placeholder="Tempat Lahir(Kota)..." disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Tanggal Lahir :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <input type="date" class="form-control" id="tanggal_lahir_wali" name="tanggal_lahir_wali" placeholder="Tanggal Lahir..." disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-12 col-sm-4">
                                                    <p class="text-sm-end">Pekerjaan :</p>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <select class="form-select" id="pekerjaan_wali" name="pekerjaan_wali" disabled>
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
                                                    <input type="text" id="pekerjaan_wali_lainnya" name="pekerjaan_wali" class="form-control" placeholder="isi Pekerjaan 'Lainnya'" disabled>
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
                                                        <input type="number" class="form-control" id="jumlah_tanggungan_wali" name="jumlah_tanggungan_wali" placeholder="" disabled>
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
                                                        <select class="form-select" id="pendapatan_wali" name="pendapatan_wali" disabled>
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

<script src="{{ asset('javascript/sharedFunctions.js') }}"></script>
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

        $('#checkKK').on('click', function (e) {
            e.preventDefault(); // Mencegah aksi default dari tautan

            // Mendapatkan nilai nomor KK dari input
            var no_kk = $('#no_kk').val();
            var dataKeluargaId = $(this).data('data-keluarga-id');
            var noKk = $(this).data('no-kk');

            // Validasi input kosong
            if (no_kk.trim() === '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Isi terlebih dahulu',
                    showConfirmButton: false,
                    timer: 1200,
                });
                return; // Berhenti jika input kosong
            }
        
            // Mengirim permintaan AJAX ke server
            $.ajax({
                url: "{{ url('admin/checkKK') }}",
                method: 'POST',
                data: { 
                    no_kk: no_kk,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    if (response.exists) {

                        Swal.fire({
                            icon: 'info',
                            title: 'Keluarga sudah terdaftar',
                            text: 'Ingin Ajukan Anak?',
                            confirmButtonColor: '#FFC100',
                            cancelButtonColor: '#DCDCDC',
                            showCancelButton: true,
                            confirmButtonText: '<i class="bi bi-person-arms-up"></i> Ajukan Anak+',
                            cancelButtonText: 'Tutup'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                var dataKeluargaId = localStorage.getItem('dataKeluargaId');
                                var noKk = localStorage.getItem('noKk');
                                window.location.href = "{{ url('admin/anak/tambah/') }}" + "?dataKeluargaId=" + dataKeluargaId + "&noKk=" + noKk;
                                console.log(dataKeluargaId, noKk);
                            }
                        });
                    } else {
                        // Jika nomor KK belum terdaftar
                        Swal.fire({
                            icon: 'success',
                            title: 'Belum Terdaftar',
                            showConfirmButton: false,
                            timer: 1200,
                        });
                    }
                },
                error: function (error) {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi kesalahan saat memeriksa nomor KK',
                    });
                }
            });
        });

    });



    // // Membuat array dari ID formulir dalam urutan hierarki
    // const formIds = ['form-keluarga', 'form-anak', 'form-ayah', 'form-ibu', 'form-wali'];

    // // Menambahkan event listener untuk setiap input dalam formulir
    // formIds.forEach((formId, index) => {
    //     const form = document.getElementById(formId);
    //     const elements = form.querySelectorAll('input, select, textarea');

    //     elements.forEach(element => {
    //         element.addEventListener('input', function () {
    //             // Mengecek apakah semua input, select, dan textarea dalam formulir saat ini sudah terisi
    //             const isFormTerisi = cekFormTerisi(formId);

    //             if (isFormTerisi) {
    //                 // Menghapus atribut disabled pada formulir berikutnya (jika ada)
    //                 const nextFormId = formIds[index + 1];
    //                 if (nextFormId) {
    //                     document.getElementById(nextFormId).removeAttribute('disabled');
    //                     console.log(`Form ${formId} terisi. Mengaktifkan Form ${nextFormId}`);
    //                 }
    //             }
    //         });
    //     });
    // });

    // // Fungsi untuk memeriksa apakah semua input, select, dan textarea dalam formulir sudah terisi
    // function cekFormTerisi(idForm) {
    //     const elements = document.getElementById(idForm).querySelectorAll('input, select, textarea');
    //     for (let i = 0; i < elements.length; i++) {
    //         const element = elements[i];
    //         if (element.tagName.toLowerCase() === 'input' && element.type !== 'submit' && element.value.trim() === '') {
    //             // Jika ada input yang belum terisi, kembalikan false
    //             return false;
    //         } else if ((element.tagName.toLowerCase() === 'select' || element.tagName.toLowerCase() === 'textarea') && element.value.trim() === '') {
    //             // Jika ada select atau textarea yang belum terisi, kembalikan false
    //             return false;
    //         }
    //     }
    //     return true;
    // }



    var formOrder = ['form-keluarga', 'form-anak', 'form-ibu', 'form-ayah', 'form-wali'];

    // Menambahkan event listener pada setiap form untuk memantau perubahan pada elemen input
    formOrder.forEach(function(formId, index) {
        var currentForm = document.getElementById(formId);

        if (currentForm) {
            currentForm.addEventListener('input', function() {
                checkAndEnableForms();
            });
        }
    });

    // Fungsi untuk memeriksa dan menghapus atribut disabled pada semua form
    function checkAndEnableForms() {
        var enableNextForm = true;

        formOrder.forEach(function(formId) {
            var form = document.getElementById(formId);

            if (!form) {
                return;
            }

            var isFormValid = checkFormValidity(form);

            if (enableNextForm) {
                // Mengaktifkan form jika form sebelumnya valid
                enableForm(form);
                console.log(`Form ${formId} terisi. Mengaktifkan Form ${enableNextForm}`);
            } else {
                // Menonaktifkan form jika form sebelumnya tidak valid
                disableForm(form);
            }

            // Memeriksa apakah form saat ini tidak valid untuk menonaktifkan form berikutnya
            if (!isFormValid) {
                enableNextForm = false;
            }
        });
    }

    // ...

    // Fungsi umum untuk memeriksa validitas form
    function checkFormValidity(form) {
        var inputElements = form.querySelectorAll('input, select, textarea');

        return Array.from(inputElements).every(function(input) {
            return input.value.trim() !== '' || (input.type === 'checkbox' && input.checked);
        });
    }

    // Fungsi umum untuk menghapus atau menambah atribut disabled pada form
    function enableForm(form) {
        var inputElementsForm = form.querySelectorAll('input, select, textarea');

        inputElementsForm.forEach(function(input) {
            input.removeAttribute('disabled');
        });
    }

    function disableForm(form) {
    var inputElementsForm = form.querySelectorAll('input, select, textarea');

    inputElementsForm.forEach(function(input) {
        input.setAttribute('disabled', 'disabled'); // Menambahkan nilai 'disabled'
    });
}




//     // Membuat array yang berisi ID form dalam urutan yang diinginkan
//     var formOrder = ['form-keluarga', 'form-anak', 'form-ibu', 'form-wali', 'form-ayah'];

//     // Menambahkan event listener pada setiap form untuk memantau perubahan pada elemen input
//     formOrder.forEach(function(formId, index) {
//         var currentForm = document.getElementById(formId);
//         var nextFormId = formOrder[index + 1]; // ID form berikutnya dalam urutan

//         if (currentForm && nextFormId) {
//             currentForm.addEventListener('input', function() {
//                 checkAndEnableNextForm(formId, nextFormId);
//             });
//         }
//     });
// // 
//     // Fungsi umum untuk memeriksa dan menghapus atribut disabled pada form berikutnya
//     function checkAndEnableNextForm(currentFormId, nextFormId) {
//         var currentForm = document.getElementById(currentFormId);
//         var nextForm = document.getElementById(nextFormId);

//         if (!currentForm || !nextForm) {
//             return; // Hentikan jika salah satu form tidak ditemukan
//         }

//         var isCurrentFormValid = checkFormValidity(currentForm);

//         if (isCurrentFormValid) {
//             enableNextForm(nextForm);
//         }
//     }

//     // Fungsi umum untuk memeriksa validitas form
//     function checkFormValidity(form) {
//         var inputElements = form.querySelectorAll('input, select, textarea');

//         return Array.from(inputElements).every(function(input) {
//             return input.value.trim() !== '' || (input.type === 'checkbox' && input.checked);
//         });
//     }

//     // Fungsi umum untuk menghapus atribut disabled pada form berikutnya
//     function enableNextForm(nextForm) {
//         var inputElementsNextForm = nextForm.querySelectorAll('input, select, textarea');

//         inputElementsNextForm.forEach(function(input) {
//             input.removeAttribute('disabled');
//         });
//     }


    // // Fungsi mengecek input Card "Form Keluarga", apakah sudah ter-isi atau belum, dan menghapus atribut disabled pada Card "Form Anak"
    // // Ganti 'form-keluarga' dengan ID atau kelas sesuai kebutuhan
    // var formKeluarga = document.getElementById('form-keluarga');

    // // Menambahkan event listener pada form-keluarga untuk memantau perubahan pada elemen input
    // formKeluarga.addEventListener('input', function() {
    //     checkAndEnableFormAnak();
    // });

    // function checkAndEnableFormAnak() {
    //     // Mengecek apakah semua input pada form-keluarga telah diisi
    //     var isFormKeluargaValid = checkFormValidity(formKeluarga);

    //     // Jika semua input di <!--Form Keluarga--> telah diisi, maka menghapus atribut disabled di <!--Form Anak-->
    //     if (isFormKeluargaValid) {
    //         enableFormAnak();
    //     }
    // }

    // function checkFormValidity(form) {
    //     // Mendapatkan semua elemen input, select, dan textarea di dalam form
    //     var inputElements = form.querySelectorAll('input, select, textarea');

    //     // Mengecek apakah semua input pada form telah diisi
    //     return Array.from(inputElements).every(function(input) {
    //         return input.value.trim() !== '' || (input.type === 'checkbox' && input.checked);
    //     });
    // }

    // function enableFormAnak() {
    //     // Ganti 'form-anak' dengan ID atau kelas sesuai kebutuhan
    //     var formAnak = document.getElementById('form-anak');

    //     // Mendapatkan semua elemen input, select, dan textarea di dalam form anak
    //     var inputElementsAnak = formAnak.querySelectorAll('input, select, textarea');

    //     // Menghapus atribut disabled pada semua input di <!--Form Anak-->
    //     inputElementsAnak.forEach(function(input) {
    //         input.removeAttribute('disabled');
    //     });
    // }


    // // Fungsi mengecek input Card "Form Anak", apakah sudah ter-isi atau belum, dan menghapus atribut disabled pada Card "Form Keluarga"
    // var formAnakCheck = document.getElementById('form-anak');

    // formAnakCheck.addEventListener('input', function() {
    //     checkAndEnableFormAyah();
    // });

    // function checkAndEnableFormAyah() {
    //     var isFormAnakValid = checkFormValidityAnak(formAnakCheck);

    //     if (isFormAnakValid) {
    //         enableFormAyah();
    //     }
    // }

    // function checkFormValidityAnak(form) {
    //     var inputElements = form.querySelectorAll('input, select, textarea');

    //     return Array.from(inputElements).every(function(input) {
    //         return input.value.trim() !== '' || (input.type === 'checkbox' && input.checked);
    //     });
    // }

    // function enableFormAyah() {
    //     var formAyah = document.getElementById('form-ayah');

    //     var inputElementsAyah = formAyah.querySelectorAll('input, select, textarea');

    //     inputElementsAyah.forEach(function(input) {
    //         input.removeAttribute('disabled');
    //     });
    // }



    
</script>





@endsection
