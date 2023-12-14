@extends('layout.main')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="row text-center">
                    <h1>Kelayakan Penerimaan Beasiswa</h1>
                </div>

                <!-- DATA SURVEY -->
                <div class="col-12 col-sm-6">
                    <div class="card card-primary card-tabs">
                        <h4 class="text-center"><i class="fas fa-edit"></i>   Data Survey</h4>
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-asset-tab" data-toggle="pill" href="#custom-tabs-one-asset" role="tab" aria-controls="custom-tabs-one-asset" aria-selected="false">Asset</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-sehat-tab" data-toggle="pill" href="#custom-tabs-one-sehat" role="tab" aria-controls="custom-tabs-one-sehat" aria-selected="false">Kesehatan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-sosial-tab" data-toggle="pill" href="#custom-tabs-one-sosial" role="tab" aria-controls="custom-tabs-one-sosial" aria-selected="false">Ibadah & Sosial</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-dsb-tab" data-toggle="pill" href="#custom-tabs-one-dsb" role="tab" aria-controls="custom-tabs-one-dsb" aria-selected="false">Lainnya</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-survei-tab" data-toggle="pill" href="#custom-tabs-one-survei" role="tab" aria-controls="custom-tabs-one-survei" aria-selected="false">Data Survey</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="">
                                <div class="tab-pane fade show active" id="custom-tabs-one-asset" role="tabpanel" aria-labelledby="custom-tabs-one-asset-tab">
                                    Ini data Asset
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item ">
                                            <b>Kepemilikan Tanah</b> <div class="float-right">{{ $validasi ? $validasi-> kep_tanah : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Kepemilikan Rumah</b> <div class="float-right">{{ $validasi ? $validasi->kep_rumah : 'Data Kosong' }}</div>
                                        </li> <br>
                                        <h7>KONDISI RUMAH</h7>
                                        <li class="list-group-item">
                                            <b>Lantai</b> <div class="float-right">{{ $validasi ? $validasi->lantai : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Dinding</b> <div class="float-right">{{ $validasi ? $validasi->dinding : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Kepemilikan Kendaraan</b>
                                            <div class="float-right">
                                            @if ($validasi)
                                                {!! implode(', ', $validasi->kep_kendaraan) !!}
                                            @else
                                                Data Kosong
                                            @endif</div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Kepemilikan Elektronik</b> <div class="float-right">{{ $validasi ? $validasi->kep_elektronik : 'Data Kosong' }}</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-sehat" role="tabpanel" aria-labelledby="custom-tabs-one-sehat-tab">
                                    Ini dara kesehatan
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item ">
                                            <b>Sumber Air</b> <div class="float-right">{{ $validasi ? $validasi->sumber_air : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Jamban dan Saluran Limbah</b> <div class="float-right">{{ $validasi ? $validasi->jamban : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Tempat Pembuangan Sampah</b> <div class="float-right">{{ $validasi ? $validasi->tempat_sampah : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Terdapat Perokok</b> <div class="float-right">{{ $validasi ? $validasi->perokok : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Terdapat Konsumen Miras</b> <div class="float-right">{{ $validasi ? $validasi->miras : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Terdapat Persediaan Obat P3K</b> <div class="float-right">{{ $validasi ? $validasi->p3k : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Makan Buah dan Sayur Setiap Hari</b> <div class="float-right">{{ $validasi ? $validasi->makan_sayur : 'Data Kosong' }}</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-sosial" role="tabpanel" aria-labelledby="custom-tabs-one-sosial-tab">
                                    Ini data Ibadah dan Sosial
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item ">
                                            <b>Sholat 5 Waktu</b> <div class="float-right">{{ $validasi ? $validasi->sholat : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Membaca Al-Qur`an</b> <div class="float-right">{{ $validasi ? $validasi->baca_quran : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Majelis Taklim</b> <div class="float-right">{{ $validasi ? $validasi->majelis_taklim : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Pengurus Organisasi</b> <div class="float-right">{{ $validasi ? $validasi->pengurus_organisasi : 'Data Kosong' }}</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-dsb" role="tabpanel" aria-labelledby="custom-tabs-one-dsb-tab">
                                    Ini data lainnya
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item ">
                                            <b>Status Anak </b> <div class="float-right">{{ $validasi ? $validasi->status_anak : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Biaya Pendidikan Anak /Bulan</b> <div class="float-right">{{ $validasi ? $validasi->biaya_pendidikan : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Bantuan Rutin dari Lemabaga Formal Lainnya</b> <div class="float-right">{{ $validasi ? $validasi->bantuan_lembaga_formal : 'Data Kosong' }}</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-survei" role="tabpanel" aria-labelledby="custom-tabs-one-survei-tab">
                                    Ini data Survey
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item ">
                                            <b>Resume </b> <div class="float-right">{{ $validasi ? $validasi->resume : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Petugas Survey</b> <div class="float-right">{{ $validasi ? $validasi->petugas_survey : 'Data Kosong' }}</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <!-- /.card -->
                    </div>
                </div>


                <!-- DATA PENGAJUAN -->
                <div class="col-12 col-sm-6">
                    <div class="card card-primary card-tabs">
                        <h4 class="text-center"><i class="fas fa-edit"></i>   Data Pengajuan</h4>
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-keluarga-tab" data-toggle="pill" href="#custom-tabs-one-keluarga" role="tab" aria-controls="custom-tabs-one-keluarga" aria-selected="true">Keluarga</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-ekonomi-tab" data-toggle="pill" href="#custom-tabs-one-ekonomi" role="tab" aria-controls="custom-tabs-one-ekonomi" aria-selected="false">Ekonomi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-ayah-tab" data-toggle="pill" href="#custom-tabs-one-ayah" role="tab" aria-controls="custom-tabs-one-ayah" aria-selected="false">Ayah</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-ibu-tab" data-toggle="pill" href="#custom-tabs-one-ibu" role="tab" aria-controls="custom-tabs-one-ibu" aria-selected="false">Ibu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-wali-tab" data-toggle="pill" href="#custom-tabs-one-wali" role="tab" aria-controls="custom-tabs-one-wali" aria-selected="false">Wali</a>
                            </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-keluarga" role="tabpanel" aria-labelledby="custom-tabs-one-keluarga-tab">
                                    Ini data Keluarga
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item ">
                                            <b>No Kartu Keluarga</b> <div class="float-right">{{ $dataKeluarga ? $dataKeluarga->no_kk : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item ">
                                            <b>Nama Kepala Keluarga</b> <div class="float-right">{{ $dataKeluarga ? $dataKeluarga->kepala_keluarga : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item ">
                                            <b>Alamat Sesuai KK</b> <div class="float-right">{{ $dataKeluarga ? $dataKeluarga->alamat_kk : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Status OrangTua Anak</b> <div class="float-right">{{ $dataKeluarga ? $dataKeluarga->status_ortu : 'Data Kosong' }}</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-ekonomi" role="tabpanel" aria-labelledby="custom-tabs-one-ekonomi-tab">
                                    Ini data Ekonomi
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item ">
                                            <b>No Rekening</b> <div class="float-right">{{ $dataKeluarga ? $dataKeluarga->no_rek : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item ">
                                            <b>a.n. Rekening</b> <div class="float-right">{{ $dataKeluarga ? $dataKeluarga->an_rek : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>No Telepon/HP</b> <div class="float-right">{{ $dataKeluarga ? $dataKeluarga->no_telp : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>a.n. Telepon/HP</b> <div class="float-right">{{ $dataKeluarga ? $dataKeluarga->an_tlp : 'Data Kosong' }}</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-ayah" role="tabpanel" aria-labelledby="custom-tabs-one-ayah-tab">
                                    Ini data Ayah
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item ">
                                            <b>NIK Ayah</b> <div class="float-right">{{ $dataAyah ? $dataAyah->nik : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item ">
                                            <b>Nama Ayah</b> <div class="float-right">{{ $dataAyah ? $dataAyah->nama : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Agama Ayah</b> <div class="float-right">{{ $dataAyah ? $dataAyah->agama : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Status Ayah</b> <div class="float-right"></div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Penghasilan Ayah</b> <div class="float-right">{{ $dataAyah ? $dataAyah->pendapatan : 'Data Kosong' }}</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-ibu" role="tabpanel" aria-labelledby="custom-tabs-one-ibu-tab">
                                    Ini data Ibu
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item ">
                                            <b>NIK Ibu</b> <div class="float-right">{{ $dataIbu ? $dataIbu->nik : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item ">
                                            <b>Nama Ibu</b> <div class="float-right">{{ $dataIbu ? $dataIbu->nama : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Agama Ibu</b> <div class="float-right">{{ $dataIbu ? $dataIbu->agama : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Status Ibu</b> <div class="float-right"></div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Penghasilan Ibu</b> <div class="float-right">{{ $dataIbu ? $dataIbu->pendapatan : 'Data Kosong' }}</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-wali" role="tabpanel" aria-labelledby="custom-tabs-one-wali-tab">
                                    Ini data Wali
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item ">
                                            <b>NIK Wali</b> <div class="float-right">{{ $dataWali ? $dataWali->nik : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item ">
                                            <b>Nama Wali</b> <div class="float-right">{{ $dataWali ? $dataWali->nama : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Agama Wali</b> <div class="float-right">{{ $dataWali ? $dataWali->agama : 'Data Kosong' }}</div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Status Wali</b> <div class="float-right"></div>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Penghasilan Wali</b> <div class="float-right">{{ $dataWali ? $dataWali->pendapatan : 'Data Kosong' }}</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <!-- /.card -->
                    </div>
                </div>

                <!-- OPTION KELAYAKAN -->
                <div class="card card-primary card-tabs">
                    <div class="card-header card-light">
                    <h5 class="text-center">Data Survey</h5>
                    </div>
                    <div class="card-body">
                        <h5> Hasil Survey   *</h5> <hr>
                        @php
                            $survery = \App\Models\SurveyKeluarga::where('keluarga_id', $id)->first();
                        @endphp
                        <form method="POST" action="{{ route('admin.save-validasi', ['id' => $id] )}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="status" class="form-check-input" id="layak" value="layak" @if ($status === 'layak') checked @endif>
                                    <label class="form-check-label" for="pb" style="margin-right: 10px;"><h5>Layak</h5> 'Penerimaan Beasiswa(PB) dan Anak Binaan'</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="status" class="form-check-input" id="ditangguhkan" value="Ditangguhkan" @if ($status === 'Ditangguhkan') checked @endif>
                                    <label class="form-check-label" for="pb" ><h5>Tidak Mencukupi</h5> 'Ditangguhkan'</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="status" class="form-check-input" id="ckp_layak" value="cukup layak" @if ($status === 'cukup layak') checked @endif>
                                    <label class="form-check-label" for="pb" ><h5>Tidak Layak</h5> 'Non Penerimaan Beasiswa(NPB) dan Anak Binaan'</label>
                                </div>

                                <br><br>
                                <label for="ketSurvey">Keterangan Hasil Survey</label>
                                <textarea name="ket" id="ket" class="form-control" cols="30" rows="6">{{ $ket }}</textarea>

                                <br>
                                <button type="submit" class="btn btn-success btn-sm">Validasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


@endsection
