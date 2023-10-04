@extends('layout.main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<div class="content-wrapper">
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card mt-5">
                <div class="card-body" style="overflow-x:auto;">
                    <div class="card-title ml-2"><h4>Data Keluarga</h4></div>
                    <div class="float-right">
                        <button class="btn btn-warning mx-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                    </div>
                <hr class="mt-5">

                <!-- Filteerrrr -->
                <p class="d-inline-flex gap-1">
                    <!-- <button class="btn btn-primary float-end" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fas fa-filter"></i>
                    </button> -->
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="a">Shelter</label>
                                    <select class="form-select" name="" id="fwilbin">
                                        <option value="">Seluruh</option>
                                        <option value="imy">Indramayu</option>
                                        <option value="Sumedang">Sumedang</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                </div>

                    <!-- Button tambah data keluarga -->
                    <div class="pull-right mb-2">
                        <a class="btn btn-primary" onClick="add_datakeluarga()" href="javascript:void(0)"> Tambahkan Data Keluarga</a>
                    </div>

                    <div class="table-responsive text-nowrap">
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
                </div>

                

                <!-- Modal Data Keluarga -->
                <div class="modal fade" id="modal-datakeluarga" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Data Keluarga</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                
                                <form action="javascript:void(0)" id="formdataKeluarga" name="formdataKeluarga" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                    <!-- Form data Keluarga -->
                                        <div class="col-12 col-sm-4">
                                            <input type="hidden" name="id" id="id">
                                            <div class="form-group">
                                                <label for="no_kk" class=" control-label">No KK</label>
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
                                                <label class=" control-label">Kantor Cabang</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="kacab" name="kacab" placeholder="Wilayah Binaan..." required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class=" control-label">Wilayah Binaan</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="wilbin" name="wilbin" placeholder="Wilayah Binaan..." required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class=" control-label">Shelter</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="shelter" name="shelter" placeholder="Wilayah Binaan..." required="">
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <!-- Form Ayah -->
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group">
                                                <label class=" control-label">NIK</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="nik_ayah" name="nik_ayah" placeholder="" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class=" control-label">Nama Ayah</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Nama Ayah" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="control-label">Tempat, Tanggal Lahir</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="" required="">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder=""  required="">
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
                                            <div class="form-group">
                                                <label class="control-label">Pekerjaan</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Form Ibu -->
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group">
                                                <label class=" control-label">NIK</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="nik_ibu" name="nik_ibu" placeholder="" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class=" control-label">Nama Ibu</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Nama Ibu" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="control-label">Tempat, Tanggal Lahir</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder=""required="">
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
                                            <div class="form-group">
                                                <label class="control-label">Pekerjaan</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Button Save  -->
                                    <div class="col-sm-offset-2 col-sm-10"><br/>
                                        <button type="submit" class="btn btn-primary" id="btn-save">Save</button>
                                    </div>

                                    </form>
                                
                            </div>
                            <div class="modal-footer"></div>
                        </div>
                    </div>
                </div><!-- End Modal  -->

            </div>
        </div>
    </div>
</section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }),

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
                order: [[0, 'asc']],
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
        // $.get('admin/detail-keluarga/'+ id, function(data){
        //     $('#detail-container').html(data);
        // });
        // Mendapatkan URL dengan menggunakan route() function dari Laravel
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
                $("#modal-datakeluarga").modal('hide');
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