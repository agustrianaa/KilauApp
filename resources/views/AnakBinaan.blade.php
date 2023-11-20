@extends('layout.main')
@section('content')

<link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


<style>
    .card.filters {
        display: none;
    }
    .col-lg-12.bukaFilter {
        display: none;
    }
    .col-lg-12.tutupFilter {
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
        font-size: 18px;
        transition: 0.1s;
    }
    .kk.sembunyi {
        display: none;
    }
    .btn.btn-warning.bukaKKbtn {
        display: none;
    }
    .btn.btn-danger.tutupKKbtn {
        display: none;
    }
    .form-group.saam {
        display: none;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Test Anak Binaan</h1>
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
            <div class="col-lg-12" id="openFilter">
                <button type="button" class="btn btn-success mx-1 mb-2" id="tombolbukafilter">Buka Filter <i class="bi bi-funnel-fill"></i></button>
            </div>
            <div class="col-lg-12 tutupFilter" id="closeFilter">
                <button type="button" class="btn btn-danger mx-1 mb-2" id="tombolTutupFilter">Tutup Filter <i class="bi bi-funnel-fill"></i><i class="bi bi-x"></i></button>
            </div>
        </div>
            <!-- Card Untuk Filter ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <div class="card filters" id="filterCard">
                <form>
                    <div class="card-body">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-2">
                                    <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
                                        <option value="AL">Alabama</option>
                                        ...
                                        <option value="WY">Wyoming</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-2">
                                    <div class="float-start">
                                        <button type="button" class="btn btn-warning" id="bukaKK">Cari No. KK</button>
                                        <button type="button" class="btn btn-danger tutupKKbtn" id="tutupKK">Tutup Cari No. KK</button>
                                    </div>
                                </div>
                                <div class="col-2"></div>
                                <div class="col-4">
                                    <div class="text-center">
                                        <button type="button" class="btn btn-outline-info" id="filterSemua">Filter</button>
                                        <button type="reset" id="resetFilter" class="btn btn-outline-danger">Reset</button>
                                    </div>
                                </div>
                                <div class="col-4"></div>
                            </div>
                        </div>
                    </div>
                    <div class="kk sembunyi" id="cariNomorKK">
                        <hr>
                        <div class="card-body">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="float-end">
                                            <b>No. KK :</b>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" class="form-control" id="inputCariKK" name="inputCariKK">
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </form>

            </div>
            <!-- End card filter~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <!-- Tabel data keluarga -->
                        <table class="table table-bordered" id="AnakBinaanTable">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Nama</th>
                                    <th style="width: 80px">Shelter</th>
                                    <th>No. KK</th>
                                    <th>Kepala Keluarga</th>
                                    <th style="width: 30px">Anak Ke</th>
                                    <th style="width: 50px">Status Binaan</th>
                                    <th style="width: 150px">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

        </div>
</section>
</div>

<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>

<script type="text/javascript">

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        load_data();

        function load_data(){
            var filterShelter = $('#filterShelter').val();

            $('#AnakBinaanTable').DataTable({
                processing : true,
                serverSide : true,
                ajax : {
                    url : "{{ url('admin/Test') }}",
                    data: {
                        shelter : filterShelter,
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
                    { data: 'nama_lengkap_anak', name: 'nama_lengkap_anak'},
                    { data: 'shelter', name: 'shelter'},
                    { data: 'no_kk', name: 'no_kk'},
                    { data: 'nama_ayah', name: 'nama_ayah'},
                    { data: 'anak_ke', name: 'anak_ke'},
                    {
                        data: 'status_binaan',
                        name: 'status_binaan',
                        render: function(data, type, row) {
                            return data == 1 ? 'Aktif' : 'Belum validasi';
                        }
                    },
                    { data: 'action', name: 'action', orderable: false},
                ],
                order: [[0, 'desc']],
                language: {
                    "emptyTable": "Data Kosong..."
                }
            });
        }

        // Tombol "Filter" ditekan
        $('#filterSemua').click(function () {
            // Meng-"destroy" tabel lama
            $('#AnakBinaanTable').DataTable().destroy();

            // Memuat data dengan filter
            load_data();
        });

        // Fungsi untuk mereset filter dan mengembalikan tabel ke kondisi semula
        function resetFilter() {
            // Mengosongkan nilai filter Shelter
            $('#filterShelter').val(null).trigger('change');
        
            // Meng-"destroy" tabel lama
            $('#AnakBinaanTable').DataTable().destroy();
        
            // Memuat data tanpa filter
            load_data();
        }

        // Menambahkan event click pada tombol Reset
        $('#resetFilter').click(function () {
            resetFilter();
        });

    });

    var filterCard = $("#filterCard");
    var openFilter = $("#openFilter");
    var closeFilter = $("#closeFilter");

    // Tombol Buka Filter diklik
    $("#tombolbukafilter").click(function () {
        // Menghapus class "filters"
        filterCard.removeClass("filters");
        openFilter.addClass("bukaFilter");
        closeFilter.removeClass("tutupFilter");
    });
    $("#tombolTutupFilter").click(function () {
        // Menghapus class "filters"
        filterCard.addClass("filters");
        openFilter.removeClass("bukaFilter");
        closeFilter.addClass("tutupFilter");
    });

    var cariNomorKK = $("#cariNomorKK");
    var tutupKK = $("#tutupKK");
    var bukaKK = $("#bukaKK");
    $('#bukaKK').click(function() {
        cariNomorKK.removeClass("sembunyi");
        tutupKK.removeClass("tutupKKbtn");
        bukaKK.addClass("bukaKKbtn");
    });
    $('#tutupKK').click(function() {
        cariNomorKK.addClass("sembunyi");
        tutupKK.addClass("tutupKKbtn");
        bukaKK.removeClass("bukaKKbtn");
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
                    timer: 900,
                    showConfirmButton: false
                }).then(function() {
                    var oTable = $('#AnakBinaanTable').DataTable();
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
                    var oTable = $('#AnakBinaanTable').DataTable();
                    oTable.ajax.reload(false); //agar tidak perlu refresh halaman
                }
            });
        }
    }

    //menampilkan detail data keluarga
    function detailDatakeluarga(id, id_anaks){

        window.location.href = `{{ url('admin/calonAnakBinaanDetail') }}/${id}/${id_anaks}`;
    }
</script>
@endsection
