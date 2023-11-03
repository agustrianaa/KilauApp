@extends('layout.main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card" >
                <div class="card-body text-center">
                    <h2>Form Survey </h2>
                </div>
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#tab_asset" data-toggle="pill" role="tab" aria-selected="true">Asset</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tab_kesehatan" data-toggle="pill" role="tab" aria-selected="false">Kesehatan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tab_ibadahDanSosial" data-toggle="pill" role="tab" aria-selected="false">Ibadah & Sosial</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tab_lainnya" data-toggle="pill" role="tab" aria-selected="false">Lainnya</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tab_dataSurvey" data-toggle="pill" role="tab" aria-selected="false">Data Survey</a>
                            </li>
                        </ul>
                    </div>
                    <form action="{{ route('admin.surveyStore') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body" >
                        <div class="tab-content" >
                            <!-- Data Asset -->
                            <div class="tab-pane fade show active" id="tab_asset">
                                <div class="post">
                                    <div class="user-block">
                                        <ul class="list-group list-group-unbordered mb-3 text-nowrap">
                                            <input type="hidden" name="keluarga_id" id="keluarga_id" value="{{ $id }}">
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <b>Kepemilikan Tanah</b>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="text-center"><b>:</b></div>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="kep_tanah" id="kep_tanah1" value="Ya">
                                                            <label class="form-check-label" for="kep_tanah1">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="kep_tanah" id="kep_tanah2" value="Tidak">
                                                            <label class="form-check-label" for="kep_tanah2">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <b>Kepemilikan Rumah</b>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="text-center"><b>:</b></div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <select class="form-select form-select-sm" name="kep_rumah" id="kep_rumah" aria-label="Small select example">
                                                            <option disabled selected>Pilih Kepemilikan Rumah...</option>
                                                            <option value="Hak Milik">Hak Milik</option>
                                                            <option value="Sewa">Sewa</option>
                                                            <option value="Orang Tua">Orang Tua</option>
                                                            <option value="Saudara">Saudara</option>
                                                            <option value="Kerabat">Kerabat</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="pl-4 pt-4">
                                                    <h5><b>Kondisi Rumah</b></h5>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <b>Lantai</b>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="text-center"><b>:</b></div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <select name="lantai" id="lantai1" class="form-select form-select-sm selectlantai">
                                                            <option disabled selected>Pilih Lantai...</option>
                                                            <option value="Keramik">Keramik</option>
                                                            <option value="Ubin">Ubin</option>
                                                            <option value="Marmer">Marmer</option>
                                                            <option value="Kayu">Kayu</option>
                                                            <option value="Tanah">Tanah</option>
                                                            <option value="">Lainnya</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="text" name="lantai" id="lantai2" class="form-control form-control-sm lantailainnya" placeholder="Isi jika 'lainnya'" disabled>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <b>Dinding</b>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="text-center"><b>:</b></div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <select name="dinding" id="dinding1" class="form-select form-select-sm selectdinding">
                                                            <option disabled selected>Pilih Dinding...</option>
                                                            <option value="Tembok">Tembok</option>
                                                            <option value="Kayu">Kayu</option>
                                                            <option value="Papan">Papan</option>
                                                            <option value="Geribik">Geribik</option>
                                                            <option value="">Lainnya</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="text" name="dinding" id="dinding2" class="form-control form-control-sm dindinglainnya" placeholder="Isi jika 'lainnya'" disabled>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <b>Kepemilikan Kendaraan</b>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="text-center"><b>:</b></div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" name="kep_kendaraan" id="opsiSepeda" value="Sepeda">
                                                            <label class="form-check-label" for="opsiSepeda">Sepeda</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" name="kep_kendaraan" id="opsiMotor" value="Motor">
                                                            <label class="form-check-label" for="opsiMotor">Motor</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" name="kep_kendaraan" id="opsiMobil" value="Mobil">
                                                            <label class="form-check-label" for="opsiMobil">Mobil</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <b>Kepemilikan Elektronik</b>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="text-center"><b>:</b></div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <select name="kep_elektronik" id="kep_elektronik" class="form-select form-select-sm">
                                                            <option disabled selected>Pilih Elektronik...</option>
                                                            <option value="Handphone">Handphone</option>
                                                            <option value="Radio">Radio</option>
                                                            <option value="Televisi">Televisi</option>
                                                            <option value="Kulkas">Kulkas</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>

                            <!-- Data Kesehatan -->
                            <div class="tab-pane fade" id="tab_kesehatan">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <b>Sumber Air Bersih</b>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="text-center"><b>:</b></div>
                                            </div>
                                            <div class="col-sm-2">
                                                <select name="sumber_air" id="sumber_air1" class="form-select form-select-sm sumberselect">
                                                    <option disabled selected>Pilih Sumber...</option>
                                                    <option value="Sumur">Sumur</option>
                                                    <option value="Sungai">Sungai</option>
                                                    <option value="PDAM">PDAM</option>
                                                    <option value="">Lainnya</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" name="sumber_air" id="sumber_air2" class="form-control form-control-sm sumberlainnya" placeholder="Isi jika 'lainnya'" disabled>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <b>Jamban & Saluran Limbah</b>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="text-center"><b>:</b></div>
                                            </div>
                                            <div class="col-sm-2">
                                                <select name="jamban" id="jamban1" class="form-select form-select-sm limbahselect">
                                                    <option disabled selected>Pilih Saluran...</option>
                                                    <option value="Sungai">Sungai</option>
                                                    <option value="Septiktank">Septiktank</option>
                                                    <option value="">Lainnya</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" name="jamban" id="jamban2" class="form-control form-control-sm limbahlainnya" placeholder="Isi jika 'lainnya'" disabled>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <b>Tempat Pembuangan Sampah</b>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="text-center"><b>:</b></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tempat_sampah" id="tempat_sampah1" value="TPS">
                                                    <label class="form-check-label" for="tempat_sampah1">TPS</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tempat_sampah" id="tempat_sampah2" value="Sungai">
                                                    <label class="form-check-label" for="tempat_sampah2">Sungai</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tempat_sampah" id="tempat_sampah2" value="Pekarangan">
                                                    <label class="form-check-label" for="tempat_sampah2">Pekarangan</label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <b>Terdapat Perokok?</b>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="text-center"><b>:</b></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="perokok" id="perokok1" value="Ya">
                                                    <label class="form-check-label" for="perokok1">Ya</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="perokok" id="perokok2" value="Tidak">
                                                    <label class="form-check-label" for="perokok2">Tidak</label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <b>Terdapat Konsumen Miras?</b>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="text-center"><b>:</b></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="miras" id="miras1" value="Ya">
                                                    <label class="form-check-label" for="miras1">Ya</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="miras" id="miras2" value="Tidak">
                                                    <label class="form-check-label" for="miras2">Tidak</label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <b>Terdapat Persediaan P3K?</b>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="text-center"><b>:</b></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="p3k" id="p3k1" value="Ya">
                                                    <label class="form-check-label" for="p3k1">Ya</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="p3k" id="p3k2" value="Tidak">
                                                    <label class="form-check-label" for="p3k2">Tidak</label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <b>Makan Buah dan Sayur Setiap Hari?</b>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="text-center"><b>:</b></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="makan_sayur" id="makan_sayur1" value="Ya">
                                                    <label class="form-check-label" for="makan_sayur1">Ya</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="makan_sayur" id="makan_sayur2" value="Tidak">
                                                    <label class="form-check-label" for="makan_sayur2">Tidak</label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

                            <!-- Data Ibadah & Sosial -->
                            <div class="tab-pane fade" id="tab_ibadahDanSosial">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <b>Shalat 5 Waktu</b>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="text-center"><b>:</b></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sholat" id="sholat1" value="Lengkap">
                                                    <label class="form-check-label" for="sholat1">Lengkap</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sholat" id="sholat2" value="Kadang-kadang">
                                                    <label class="form-check-label" for="sholat2">Kadang-kadang</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sholat" id="sholat2" value="Tidak Pernah">
                                                    <label class="form-check-label" for="sholat2">Tidak Pernah</label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <b>Membaca Al-Qur'an</b>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="text-center"><b>:</b></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="baca_quran" id="baca_quran1" value="Lancar">
                                                    <label class="form-check-label" for="baca_quran1">Lancar</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="baca_quran" id="baca_quran2" value="Terbata-bata">
                                                    <label class="form-check-label" for="baca_quran2">Terbata-bata</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="baca_quran" id="baca_quran2" value="Tidak Bisa">
                                                    <label class="form-check-label" for="baca_quran2">Tidak Bisa</label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <b>Majlis Taklim</b>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="text-center"><b>:</b></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="majelis_taklim" id="majelis_taklim1" value="Rutin">
                                                    <label class="form-check-label" for="majelis_taklim1">Rutin</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="majelis_taklim" id="majelis_taklim2" value="Jarang">
                                                    <label class="form-check-label" for="majelis_taklim2">Jarang</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="majelis_taklim" id="majelis_taklim2" value="Tidak Pernah">
                                                    <label class="form-check-label" for="majelis_taklim2">Tidak Pernah</label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <b>Pengurus Organisasi</b>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="text-center"><b>:</b></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="pengurus_organisasi" id="pengurus_organisasi1" value="Ya">
                                                    <label class="form-check-label" for="pengurus_organisasi1">Ya</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="pengurus_organisasi" id="pengurus_organisasi2" value="Tidak">
                                                    <label class="form-check-label" for="pengurus_organisasi2">Tidak</label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                            <!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

                            <!-- Data Lainnya -->
                            <div class="tab-pane fade" id="tab_lainnya">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <b>Status Anak</b>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="text-center"><b>:</b></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status_anak" id="status_anak1" value="Yatim">
                                                    <label class="form-check-label" for="status_anak1">Yatim</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status_anak" id="status_anak2" value="Dhuafa">
                                                    <label class="form-check-label" for="status_anak2">Dhuafa</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status_anak" id="status_anak2" value="Non Dhuafa">
                                                    <label class="form-check-label" for="status_anak2">Non Dhuafa</label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <b>Biaya Pendidikan Anak/Bulan</b>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="text-center"><b>:</b></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Rp.</span>
                                                    <input type="text" name="biaya_pendidikan" id="biaya_pendidikan" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <b>Bantuan Rutin dari Lembaga Formal Lainnya</b>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="text-center"><b>:</b></div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="bantuan_lembaga_formal" id="bantuan_lembaga_formal1" value="Ya">
                                                    <label class="form-check-label" for="bantuan_lembaga_formal1">Ya</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="bantuan_lembaga_formal" id="bantuan_lembaga_formal2" value="Tidak">
                                                    <label class="form-check-label" for="bantuan_lembaga_formal2">Tidak</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="text-center"><b>Sebesar</b></div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-text">Rp.</span>
                                                    <input type="text" name="bantuan_lembaga_formal" id="bantuan_lembaga_formal3" class="form-control sebesar" placeholder="Isi jika 'Ya'" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

                            <!-- Data Survey -->
                            <div class="tab-pane fade" id="tab_dataSurvey">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <b>Resume Diskripstif, Kondisi Calon Penerima Manfaat</b>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="text-center"><b>:</b></div>
                                            </div>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="resume" id="resume" rows="3" placeholder="Resume Diskripstif, Kondisi Calon Penerima Manfaat"></textarea>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <b>Petugas Survey</b>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="text-center"><b>:</b></div>
                                            </div>
                                            <div class="col-sm-3">
                                                <input class="form-control form-control-sm" name="petugas_survey" id="petugas_survey" placeholder="Nama Lengkap Petugas Survey">
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="float-start">
                                    <button type="reset" class="btn btn-danger mx-2"><i class="bi bi-exclamation-circle-fill"></i> Reset Semua Input</button>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="text-center">
                                    <a href="{{ route('admin.AnakBinaan') }}" class="btn btn-warning mx-2"><i class="bi bi-arrow-left"></i> Kembali</a>
                                    <button type="submit" class="btn btn-primary mx-2"><i class="bi bi-send-check-fill"></i> Simpan</button>
                                </div>
                            </div>
                            <div class="col-lg-4">
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            </div>
    </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!-- Script untuk Option Radio Bantuan Rutin dari Lembaga Formal Lainnya -->
<script>
    window.addEventListener("load", function () {
        // Mengambil elemen radio buttons
        var yaRadio = document.getElementById("bantuan_lembaga_formal1");
        var tidakRadio = document.getElementById("bantuan_lembaga_formal2");

        // Mengambil elemen input
        var inputSebesar = document.querySelector(".sebesar");

        // Menambahkan event listener pada radio buttons
        yaRadio.addEventListener("change", function () {
            inputSebesar.removeAttribute("disabled");
        });

        tidakRadio.addEventListener("change", function () {
            inputSebesar.setAttribute("disabled", "disabled");
        });
    });
</script>

<!-- Script untuk Select Option Sumber Air -->
<script>
    window.addEventListener("load", function () {
        // Mengambil elemen select dan input
        var selectSumberAir = document.querySelector(".sumberselect");
        var inputSumberLainnya = document.querySelector(".sumberlainnya");

        // Menambahkan event listener pada elemen select
        selectSumberAir.addEventListener("change", function () {
            if (selectSumberAir.value === "") {
                inputSumberLainnya.removeAttribute("disabled");
            } else {
                inputSumberLainnya.setAttribute("disabled", "disabled");
            }
        });
    });
</script>

<!-- Script untuk Select Option Pembuangan Limbah -->
<script>
    window.addEventListener("load", function () {
        // Mengambil elemen select dan input
        var selectLimbah = document.querySelector(".limbahselect");
        var inputLimbahLainnya = document.querySelector(".limbahlainnya");

        // Menambahkan event listener pada elemen select
        selectLimbah.addEventListener("change", function () {
            if (selectLimbah.value === "") {
                inputLimbahLainnya.removeAttribute("disabled");
            } else {
                inputLimbahLainnya.setAttribute("disabled", "disabled");
            }
        });
    });
</script>

<!-- Script untuk Select Option Lantai -->
<script>
    window.addEventListener("load", function () {
        // Mengambil elemen select dan input
        var selectLantai = document.querySelector(".selectlantai");
        var inputLantaiLainnya = document.querySelector(".lantailainnya");

        // Menambahkan event listener pada elemen select
        selectLantai.addEventListener("change", function () {
            if (selectLantai.value === "") {
                inputLantaiLainnya.removeAttribute("disabled");
            } else {
                inputLantaiLainnya.setAttribute("disabled", "disabled");
            }
        });
    });
</script>

<!-- Script untuk Select Option Dinding -->
<script>
    window.addEventListener("load", function () {
        // Mengambil elemen select dan input
        var selectDinding = document.querySelector(".selectdinding");
        var inputDindingLainnya = document.querySelector(".dindinglainnya");

        // Menambahkan event listener pada elemen select
        selectDinding.addEventListener("change", function () {
            if (selectDinding.value === "") {
                inputDindingLainnya.removeAttribute("disabled");
            } else {
                inputDindingLainnya.setAttribute("disabled", "disabled");
            }
        });
    });
</script>

<script>
    function simpanData() {
    // Mengambil nilai-nilai yang dipilih berdasarkan ID
    var selectedKendaraan = [];

    if (document.getElementById("opsiSepeda").checked) {
        selectedKendaraan.push(document.getElementById("opsiSepeda").value);
    }

    if (document.getElementById("opsiMotor").checked) {
        selectedKendaraan.push(document.getElementById("opsiMotor").value);
    }

    if (document.getElementById("opsiMobil").checked) {
        selectedKendaraan.push(document.getElementById("opsiMobil").value);
    }

    // Menggabungkan nilai-nilai yang dipilih menjadi satu baris teks
    var resultText = selectedKendaraan.join(", ");

    // Mengirim nilai-nilai yang dipilih ke server (melalui AJAX)
    $.ajax({
        type: "POST",
        url: "/admin/surveyStore",
        data: {
            kep_kendaraan: resultText // Mengirim hasil sebagai satu baris teks ke controller
        },
        success: function(response) {
            // Handle respon dari server (jika diperlukan)
        }
    });
}

</script>


{{-- <script>
    // Fungsi untuk menangkap nilai saat semua checkbox dicentang
    function checkAll() {
        // Mengambil semua elemen checkbox
        var checkboxes = document.getElementsByName("kep_kendaraan");

        // Mengambil elemen hasil
        var result = document.getElementById("result");

        // Memeriksa apakah semua checkbox dicentang
        var allChecked = true;
        for (var i = 0; i < checkboxes.length; i++) {
            if (!checkboxes[i].checked) {
                allChecked = false;
                break;
            }
        }

        // Jika semua checkbox dicentang, tangkap nilai
        if (allChecked) {
            var values = [];
            for (var i = 0; i < checkboxes.length; i++) {
                values.push(checkboxes[i].value);
            }
            result.textContent = "Dipilih: " + values.join(", ");
        } else {
            result.textContent = ""; // Kosongkan nilai jika checkbox tidak dicentang semua
        }
    }

    // Menghubungkan fungsi checkAll() dengan setiap checkbox
    var checkboxes = document.getElementsByName("kep_kendaraan");
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].addEventListener("change", checkAll);
    }
</script> --}}

@endsection
