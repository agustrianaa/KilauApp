@extends('layout.main')
@section('content')


<div class="content-wrapper">
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="row text-center">
                <h1>DATA KELUARGA</h1>
            </div>
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title text-center">Data Keluarga</h2>
                    <button class="btn btn-primary float-end" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fas fa-filter"></i> Filter
                    </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="overflow-x:auto;">

                <!-- Filteerrrr -->
                <p class="d-inline-flex gap-1">
                    <!-- <button class="btn btn-primary float-end" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fas fa-filter"></i>
                    </button> -->
                </p>
                <!-- <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="a">Shelter</label>
                                    <select class="form-select" name="" id="fwilbin">
                                        <option value="">Seluruh</option>
                                        <option value="imy">Indramayu</option>
                                        <option value="smd">Sumedang</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                </div> -->

                    <!-- Tabel data keluarga -->
                    <table class="table table-bordered"  id="data-keluarga">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>No KK</th>
                            <th>Kepala Keluarga</th>
                            <th>Wilayah Binaan</th>
                            <th style="width: 150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    </table>
                </div>

                <!-- Button tambah data keluarga -->
                <div class="pull-right mb-2">
                    <a class="btn btn-primary" onClick="add_datakeluarga()" href="javascript:void(0)"> Tambahkan Data Keluarga</a>
                </div>

                <!-- Modal Data Keluarga -->
                <div class="modal fade" id="modal-datakeluarga" aria-hidden="true" aria-labelledby="label-datakeluarga" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="label-datakeluarga">Tambah Data Keluarga</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="javascript:void(0)" id="formdataKeluarga" name="formdataKeluarga" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="id">
                                    <div class="form-group">
                                        <label for="no_kk" class="col-sm-2 control-label">No KK</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="No Kartu Keluarga..." maxlength="50" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="control-label">Kepala Keluarga</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="kepala_keluarga" name="kepala_keluarga" placeholder="Kepala Keluarga..." maxlength="50" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" control-label">Wilayah Binaan</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="wilbin" name="wilbin" placeholder="Wilayah Binaan..." required="">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <!-- Tambahkan event click untuk membuka modal-ayah -->
                                <button class="btn btn-primary" id="btn-next-ayah">Selanjutnya</button>
                            </div>
                        </div>
                    </div>
                </div><!-- End Modal 1 -->

                <!-- Modal Ayah -->
                <div class="modal fade" id="modal-ayah" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Modal Ayah</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- FORM MODAL AYAH -->
                            <form action="javascript:void(0)" id="form-ayah" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="id">
                                <div class="form-group">
                                    <label for="nik" class="">NIK</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK Ayah" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="control-label">Nama Lengkap</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="" maxlength="50" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label">Tempat, Tanggal Lahir</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="" required="">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >Agama</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" id="agama" name="agama" aria-placeholder="pilih agama"  required>
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
                                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="" required="">
                                    </div>
                                </div>
                            </form>
                            </div>
                            <div class="modal-footer">
                                <!-- click untuk menutup modal-ayah dan menampilkan modal-datakeluarga  -->
                                <button class="btn btn-primary" id="btn-back-datakeluarga">Kembali</button>
                                <!-- Tambahkan event click untuk membuka modal-ibu -->
                                <button class="btn btn-primary" id="btn-next-ibu">Selanjutnya</button>
                            </div>
                        </div>
                    </div>
                </div><!-- End Modal 2 -->

                <!-- Modal Ibu -->
                <div class="modal fade" id="modal-ibu" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalToggleLabel3">Modal Ibu</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- FORM DATA IBU -->
                            <form action="javascript:void(0)" id="form-ibu" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id" value="1">
                                <div class="form-group">
                                    <label for="no_kk" class="control-label">NIK</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="nik-ibu" name="nik" placeholder="Masukkan NIK..."  maxlength="50" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="control-label">Nama Lengkap</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="" " maxlength="50" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label">Tempat, Tanggal Lahir</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="" required="">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="" required="">
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
                                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="" required="">
                                    </div>
                                </div>
                            </form>
                            </div>
                            <div class="modal-footer">
                                <!-- Tambahkan event click untuk menutup modal-ibu dan menampilkan modal-ayah -->
                                <button class="btn btn-primary" id="btn-back-ayah">Kembali</button>
                                <!-- Tambahkan event click untuk menutup modal-ibu dan menampilkan tombol "Save" -->
                                <button type="submit" class="btn btn-success" id="btn-save">Save</button>
                            </div>
                        </div>
                    </div>
                </div><!-- End Modal 3 -->

            </div>
        </div>
    </div>
</section>
</div>

    <!-- UNTUK MODAL -->
<script>
    // Tampilkan modal-ayah dari modal-datakeluarga
    document.getElementById("btn-next-ayah").addEventListener("click", function () {
        $('#modal-datakeluarga').modal('hide');
        $('#modal-ayah').modal('show');
    });

    // Tampilkan modal-ibu dari modal-ayah
    document.getElementById("btn-next-ibu").addEventListener("click", function () {
        $('#modal-ayah').modal('hide');
        $('#modal-ibu').modal('show');
    });

    // Kembali ke modal-datakeluarga dari modal-ayah
    document.getElementById("btn-back-datakeluarga").addEventListener("click", function () {
        $('#modal-ayah').modal('hide');
        $('#modal-datakeluarga').modal('show');
    });

    // Kembali ke modal-ayah dari modal-ibu
    document.getElementById("btn-back-ayah").addEventListener("click", function () {
        $('#modal-ibu').modal('hide');
        $('#modal-ayah').modal('show');
    });

</script>

<script>
    // Tampilkan modal-ayah dan sembunyikan modal-datakeluarga
    document.getElementById("btn-next").addEventListener("click", function () {
        $('#modal-datakeluarga').modal('hide');
        $('#modal-ayah').modal('show');
    });

    // Kembali ke modal-datakeluarga dari modal-ayah
    document.getElementById("btn-back").addEventListener("click", function () {
        $('#modal-ayah').modal('hide');
        $('#modal-datakeluarga').modal('show');
    });
</script>

    <!-- SCRIPT AJAAAAAAAX -->
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        // untuk collapse filteeerrrr
        $('collapseExample').hide();
        $("button").click(function(){
            $("#collapseExample").toggle();
        });

        load_data();

        function load_data(){
            var fwilbin = $('#fwilbin').val();

            $('#data-keluarga').DataTable({
                processing : true,
                serverSide : true,
                ajax : {
                    url : "{{ url('admin/datakeluarga') }}",
                    data: {
                        wilbin : fwilbin,
                    }
                },

                columns : [
                    { data: 'id', name: 'id'},
                    { data: 'no_kk', name: 'no_kk'},
                    { data: 'kepala_keluarga', name: 'kepala_keluarga'},
                    { data: 'wilbin', name: 'wilbin'},
                    { data: 'action', name: 'action', orderable: false},
                ],
                order: [[0, 'desc']],
            });
        }

        //filter daerah wilayah binaan
        $('#fwilbin').on('change', function(){
            $('#data-keluarga').DataTable().destroy();
            load_data();
        });

    });

    //Menambahkan data keluarga
    function add_datakeluarga(){
        $('#formdataKeluarga').trigger("reset");
        $('#modalKeluarga').html("Tambahkan Data Keluarga");
        $('#modal-datakeluarga').modal('show');
        $('#id').val('');
    }

    //Menghapus data keluarga
    function delete_datakeluarga(id){
        if (confirm("Are you sure you want to delete")==true) {
            var id = id;
            $.ajax({
                type:"POST",
                url: "{{ url('admin/delete-datakeluarga') }}",
                data: {id:id},
                dataType: 'json',
                success: function(res) {
                    var oTable = $('#data-keluarga').DataTable();
                    oTable.ajax.reload(false); //agar tidak perlu refresh halaman
                }
            });
        }
    }

    //menampilkan detail data keluarga
    function detailDatakeluarga(id){
        var url = "{{ route('admin.detail-datakeluarga', ':id') }}";
        url = url.replace(':id', id);
        
        // Redirect ke halaman baru
        window.location.href = url;
    }

    $('#formdataKeluarga').submit(function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "{{ url('admin/save-datakeluarga') }}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                // $("#modal-ayah").modal('hide');
                var oTable = $('#data-keluarga').DataTable();
                oTable.ajax.reload(false);
                $("#btn-save").html('Submit');
                $("#btn-save").attr("disabled", false);
            },
            error: function(data){
                console.log(data);
            }
        })
    });
</script>
@endsection