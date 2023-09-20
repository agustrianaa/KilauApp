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
                            <!-- <h3 class="profile-username text-center">{{$dataKeluarga -> kepala_keluarga}}</h3> CONTOH SAHAJA -->
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
                                        <button type="button" class="btn btn-primary float-right btn-lg" data-toggle="modal" data-target="#modal_dataAyah"><i class="fas fa-edit"></i>Edit</button>
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
                                        <button type="button" class="btn btn-primary float-right btn-lg" data-toggle="modal" data-target="#modal_dataIbu" data-id="{{ $dataIbu ? $dataIbu->id : '' }}"><i class="fas fa-edit" data-id=></i>Edit</button>
                                    </div>

                                    <!-- Modal Data Ibu -->
                                    <div class="modal fade" id="modal_dataIbu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                                                    <h4 class="modal-title" id="myModalLabel">Edit Data Ibu</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Isi konten modal di sini -->
                                                    <form >
                                                        @csrf
                                                        @method('PUT')
                                                    <input type="hidden" name="id" id="id" value="1">
                                                        <div class="form-group">
                                                            <label for="no_kk" class="control-label">NIK</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="nik-ibu" name="nik" placeholder="Masukkan NIK..." value="{{ $dataIbu ? $dataIbu->nik : 'Data Kosong' }}"  maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="control-label">Nama Lengkap</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="" value="{{ $dataIbu ? $dataIbu->nama : 'Data Kosong' }}" maxlength="50" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="control-label">Tempat, Tanggal Lahir</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder=""value="{{ $dataIbu ? $dataIbu->tempat_lahir : 'Data Kosong' }}" required="">
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="" value="{{ $dataIbu ? $dataIbu->tanggal_lahir : 'Data Kosong' }}" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Agama</label>
                                                            <div class="col-sm-12">
                                                                <select class="form-control" id="agama" name="agama" aria-placeholder="pilih agama" required>
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
                                                        <div class="form-group">
                                                            <label class="control-label">Alamat</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="" value="{{ $dataIbu ? $dataIbu->alamat : 'Data Kosong' }}" required="">
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

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function(){
        var idIbu;

        $('#modal_dataIbu').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget);
            idIbu = button.data('id');
        });

        //menampilkan nilai di form
        // $('#nik').val(dataIbu.nik);
        // $('#nama').val(dataIbu.nama);
        // $('#tempat_lahir').val(dataIbu.tempat_lahir);
        // $('#tanggal_lahir').val(dataIbu.tanggal_lahir);
        // $('#agama').val(dataIbu.agama);
        // $('#alamat').val(dataIbu.alamat);

        function updateDataIbu(){
            var nik = $('#nik').val();
            var nama = $('#nama').val();
            var tempat_lahir = $('#tempat_lahir').val();
            var tanggal_lahir = $('#tanggal_lahir').val();
            var agama = $('#agama').val();
            var alamat = $('#alamat').val();

            $.ajax({
                type: 'PUT',
                url: '/admin/updateibu/' + idIbu,
                data: {
                    _token: '{{ csrf_token() }}',
                    nik: nik,
                    nama: nama,
                    tempat_lahir: tempat_lahir,
                    tanggal_lahir: tanggal_lahir,
                    agama: agama,
                    alamat: alamat
                },
                success: function (data){
                    console.log(data);
                    $('#modal_dataIbu').modal('hide'); 
                },
                error: function (error){
                    console.log('Error', error)
                }
            });
        }

        // fungsi tombol simpan dalam model
        $('#btn-simpan-ibu').on('click', function(){
            updateDataIbu();
        });
    });
</script>

@endsection