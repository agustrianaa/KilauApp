@extends('layout.main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<style>
    .card.filters {
    display: none
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Calon Anak Binaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Data Calon Anak Binaan</li>
                    </ol>
                </div>
            </div><!-- End row -->
        </div><!-- End container-fluid -->
    </div>
    <!-- End content-header -->

    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <button type="button" class="btn btn-success mx-1 mb-2" id="tombolbukafilter">Buka Filter</button>
            </div>
        </div>
            <!-- Card Untuk Filter ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <div class="card filters" id="filterCard">
                <div class="card-header">
                    <div class="card-title">
                        <h4><b>Filter</b></h4>
                    </div>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                            </li>
                        </ul>
                    </div> 
                </div>
                <div class="card-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="form-label select-label">Agama</label>
                                <select class="form-select" id="fagama" multiple="multiple">
                                    <option value="" disabled selected>-Pilih-</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha"> Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <label class="form-label select-label">Agama</label>
                                <select class="form-select" id="fagama" multiple="multiple">
                                    <option value="" disabled selected>-Pilih-</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha"> Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <label class="form-label select-label">Agama</label>
                                <select class="form-select" id="fagama" multiple="multiple">
                                    <option value="" disabled selected>-Pilih-</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha"> Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <button type="button" class="btn btn-outline-info">Filter</button>
                        <button type="button" class="btn btn-outline-danger">Reset</button>
                    </div>
                </div>
            </div>
            <!-- End card filter~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <!-- Tabel data keluarga -->
                        <table class="table table-bordered" id="CalonAnakBinaanTable">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Nama</th>
                                    <th>Shelter</th>
                                    <th>No. KK</th>
                                    <th>Kepala Keluarga</th>
                                    <th>Anak Ke</th>
                                    <th style="width: 150px">Action</th>          
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
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
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="text-center">Form Keluarga</h4>
                                                    <hr>
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
                                                        <label class="control-label">Kantor Cabang</label>
                                                        <div class="col-sm-12">
                                                            <select class="form-select" id="kacab" name="kacab" required="">
                                                                <option value="" disabled selected>Pilih Kantor</option>
                                                                <option value="Bandung">Bandung</option>
                                                                <option value="Sumedang">Sumedang</option>
                                                                <option value="Indramayu">Indramayu</option>
                                                                <option value="Bogor">Bogor</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Wilayah Cabang</label>
                                                        <div class="col-sm-12">
                                                            <select class="form-select" id="wilbin" name="wilbin" required="">
                                                                <option value="" disabled selected>Pilih Wilayah</option>
                                                                <option value="Bandung">Bandung</option>
                                                                <option value="Sumedang">Sumedang</option>
                                                                <option value="Indramayu">Indramayu</option>
                                                                <option value="Bogor">Bogor</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Shelter</label>
                                                        <div class="col-sm-12">
                                                            <select class="form-select" id="shelter" name="shelter" required="">
                                                                <option value="" disabled selected>Pilih Shelter</option>
                                                                <option value="Bandung">Bandung</option>
                                                                <option value="Sumedang">Sumedang</option>
                                                                <option value="Indramayu">Indramayu</option>
                                                                <option value="Bogor">Bogor</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <!-- Form Ayah -->
                                        <div class="col-12 col-sm-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="text-center">Form Ayah</h4>
                                                    <hr>
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
                                                        <label class="control-label">Tempat, Tanggal Lahir</label>
                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="" required="">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder=""  required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Agama</label>
                                                        <div class="col-sm-12">
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
                                        </div>

                                        <!-- Form Ibu -->
                                        <div class="col-12 col-sm-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="text-center">Form Ibu</h4>
                                                    <hr>
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
                                                        <label class="control-label">Tempat, Tanggal Lahir</label>
                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="" required="">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder=""  required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Agama</label>
                                                        <div class="col-sm-12">
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

            $('#CalonAnakBinaanTable').DataTable({
                processing : true,
                serverSide : true,
                ajax : {
                    url : "{{ url('admin/calonAnakBinaan') }}",
                    data: {
                        wilayah_binaan : fwilbin,
                    }
                },

                columns : [
                    { 
                        data: null,
                        name: 'id',
                        render: function(data, type, row, meta) {
                            return meta.row + 1; // Menggunakan nomor baris sebagai nomor urut
                        }
                    },
                    { data: 'nama_lengkap_calon_anak', name: 'nama_lengkap_calon_anak'},
                    { data: 'shelter', name: 'shelter'},
                    { data: 'no_kk', name: 'no_kk'},
                    { data: 'nama_ayah', name: 'nama_ayah'},
                    { data: 'anak_ke', name: 'anak_ke'},
                    { data: 'action', name: 'action', orderable: false},
                ],
                order: [[0, 'asc']],
                language: {
                    "emptyTable": "Data Kosong..."
                }
            });
        }

        //filter daerah wilayah binaan
        $('#fwilbin').on('change', function(){
            $('#CalonAnakBinaanTable').DataTable().destroy();
            load_data();
        });

    });

    $(document).ready(function () {
        var filterCard = $("#filterCard");
        
        // Tombol Buka Filter diklik
        $("#tombolbukafilter").click(function () {
            if (filterCard.hasClass("filters")) {
                // Menghapus class "filters"
                filterCard.removeClass("filters");
            } else {
                // Menambahkan kembali class "filters"
                filterCard.addClass("filters");
            }
        });
    });

    function validasiAnak(anak_id) {
        $.ajax({
            url: "calonAnakBinaan/" + anak_id,
            type: 'PUT',
            data: anak_id,
            success: function() {
            Swal.fire({
                    icon: 'success',
                    title: 'Berhasil Validasi',
                    text: 'Data telah divalidasi.',
                    timer: 2000,
                    showConfirmButton: false
                }).then(function() {
                    var oTable = $('#CalonAnakBinaanTable').DataTable();
                    oTable.ajax.reload(false);
                });
            }
        })
    }

    //Menghapus data keluarga
    function delete_datakeluarga(id){
        if (confirm("Are you sure you want to delete")==true) {
            var id = id;
            $.ajax({
                type:"POST",
                url: "{{ url('admin/calonAnakBinaanDelete') }}",
                data: {id:id},
                dataType: 'json',
                success: function(res) {
                    var oTable = $('#CalonAnakBinaanTable').DataTable();
                    oTable.ajax.reload(false); //agar tidak perlu refresh halaman
                }
            });
        }
    }

    //menampilkan detail data keluarga
    function detailDatakeluarga(id){
        // Mendapatkan URL dengan menggunakan route() function dari Laravel
        var url = "{{ route('admin.calonAnakBinaanDetail', ':id') }}";
        url = url.replace(':id', id);
        
        // Redirect ke halaman baru
        window.location.href = url;
    }

    $('#formdataKeluarga').submit(function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "{{ url('admin/save-calonAnakBinaan') }}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#modal-datakeluarga").modal('hide');
                var oTable = $('#CalonAnakBinaanTable').DataTable();
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