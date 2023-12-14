@extends('layout.main')
@section('content')

{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}

<div class="content-wrapper">
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="row text-center">
                <h1>INI HALAMAN VALIDASI ANAK BINAAN</h1>
            </div>


            <div class="row">
                <div class="col-sm-12 mb-2">
                    <h4 class="m-0">Filter Validasi Survey</h4>
                </div>
                {{-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item">Validasi Survey</li>
                    </ol>
                </div> --}}
                <div class="col-md-2 mb-1">
                    <input class="multiple-no_kk" name="no_kk" placeholder="no kk">
                </div>
                <div class="col-md-2 mb-1">
                    <input class="multiple-kepala_keluarga" name="kepala_keluarga" placeholder="kepala keluarga">
                </div>
                <div class="col-md-2 mb-1">
                    <input class="multiple-petugas_survey" name="petugas_survey" placeholder="petugas survey">
                </div>
                <div class="col-md-2 mb-1">
                    <input class="multiple-created_at" name="created_at" placeholder="created at">
                </div>
                <div class="col-md-2 mb-1">
                    <input class="multiple-kelayakan" name="kelayakan" placeholder="kelayakan">
                </div>
            </div>

            <div class="card">

                <div class="card-header">
                <h2 class="card-title text-center">Validasi Survey</h2>
                </div>

                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered" id="validasiSurvey">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> No KK</th>
                                <th> Kepala Keluarga </th>
                                <th> Petugas Survey </th>
                                <th> Tanggal Survey </th>
                                <th> Kelayakan </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</div>

{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
<script type="text/javascript">
    $(document).ready( function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        loadData();

        function loadData(){
            $('#validasiSurvey').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.validasi-survey')}}",
                columns: [
                    {
                        data: null,
                        name: 'id',
                        render: function(data, type, row, meta) {
                            return meta.row + 1; // Menggunakan nomor baris sebagai nomor urut
                        }
                    },
                    {data: 'no_kk', name: 'no_kk'},
                    {data: 'kepala_keluarga', name: 'kepala_keluarga'},
                    {data: 'petugas_survey', name: 'petugas_survey'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'kelayakan', name: 'kelayakan', orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                order: [[0, 'asc']],
                paging: true,
                pageLength: 10, // Menyeting jumlah entri yang ditampilkan menjadi 10
                language: {
                    "emptyTable": "Data Kosong..."
                }
            });
        }

        function setDataTabel(result) {
            var table = $('#validasiSurvey').DataTable();
                        var tbody = $('#validasiSurvey tbody');
                        tbody.empty();

                        // Populate the table with the updated data
                        for (var i = 0; i < result.data.length; i++) {
                            var rowData = result.data[i];
                            var rowHtml = '<tr>' +
                                '<td>' + (i + 1) + '</td>' +
                                '<td>' + rowData.no_kk + '</td>' +
                                '<td>' + rowData.kepala_keluarga + '</td>' +
                                '<td>' + rowData.petugas_survey + '</td>' +
                                '<td>' + rowData.created_at + '</td>' +
                                '<td>' + rowData.kelayakan + '</td>' +
                                '<td>' + rowData.action + '</td>' +
                                '</tr>';
                            tbody.append(rowHtml);
                        }
        }


        $('.multiple-no_kk').on('keyup', function() {
                var selectedNo_kk = $(this).val();

                $.ajax({
                    url: 'validasi-survey',
                    type: 'get',
                    data: {
                        no_kk: selectedNo_kk
                    },
                    success: function( result ) {
                        // console.log(result)

                        setDataTabel(result)


                    }
                })
            })
            $('.multiple-kepala_keluarga').on('keyup', function() {
                var selectedKepalaKeluarga = $(this).val();

                $.ajax({
                    url: "validasi-survey",
                    type: 'get',
                    data: {
                        kepala_keluarga: selectedKepalaKeluarga
                    },
                    success: function( result ) {
                        // console.log(result)

                        setDataTabel(result)
                    }
                })
            })
            $('.multiple-petugas_survey').on('keyup', function() {
                var selectedpetugasSurvey = $(this).val();

                $.ajax({
                    url: "validasi-survey",
                    type: 'get',
                    data: {
                        petugas_survey: selectedpetugasSurvey
                    },
                    success: function( result ) {
                        // console.log(result)



                        setDataTabel(result)
                    }
                })
            })
            $('.multiple-created_at').on('keyup', function() {
                var selectedcreated_at = $(this).val();

                $.ajax({
                    url: "validasi-survey",
                    type: 'get',
                    data: {
                        created_at: selectedcreated_at
                    },
                    success: function( result ) {
                        // console.log(result)

                        setDataTabel(result)
                    },
                })
            })
            $('.multiple-kelayakan').on('keyup', function() {
                var selectedkelayakan = $(this).val();

                $.ajax({
                    url: "validasi-survey",
                    type: 'get',
                    data: {
                        hsurvey: selectedkelayakan
                    },
                    success: function( result ) {
                        // console.log(result)


                        setDataTabel(result)
                    },
                })
            })

    });

    function deleteFunc(id){
        if (confirm("Ingin Mengahapus Data?") == true) {
            var id = id;
            //ajax
            $.ajax({
                type: "POST",
                url: "{{ url('admin/survey-delete') }}",
                data: { id: id },
                dataType: 'json',
                success: function(res){
                    Swal.fire(
                        'Terhapus!',
                        'Data berhasil dihapus.',
                        'success'
                    );

                    var oTable = $('#validasiSurvey').dataTable();
                    oTable.fnDraw(false);
                }
            });
        }
    }

    function kelayakanFunc(id) {
        window.location.href = "{{ url('admin/validasi') }}/" + id;
    }

    function tambahKelayakan(id) {
        window.location.href = "{{ url('admin/validasi') }}/" + id;
    }

    function editFunc(id) {
        window.location.href = "{{ url('admin/') }}/" + id;
    }
</script>
@endsection
