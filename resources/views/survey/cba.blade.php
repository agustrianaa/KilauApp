@extends('layout.main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
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
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Test</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item">Validasi Survey</li>
                    </ol>
                </div>
            </div><!-- End row -->
        </div><!-- End container-fluid -->
    </div>
    <!-- End content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered" id="tebal">
                                <thead>
                                    <tr>
                                        <th style="width: 40px; text-align: center;">No</th>
                                        <th style="text-align: center;">No. KK</th>
                                        <th style="text-align: center;">Kepala Keluarga</th>
                                        <th style="text-align: center;">KaCab</th>
                                        <th style="text-align: center;">WilBin</th>
                                        <th style="text-align: center;">Shelter</th>
                                        <th style="width: 160px;">Action</th>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>
    $(document).ready( function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $('#tebal').DataTable({
                searching: true,
                serverSide: true,
                ajax: {
                    url: 'Test',
                    type: 'GET',
                },
                columns: [
                        { 
                            data: null,
                            name: 'id',
                            render: function(data, type, row, meta) {
                                return meta.row + 1; // Menggunakan nomor baris sebagai nomor urut
                            }
                        },
                        {data: 'no_kk', name: 'no_kk'},
                        {data: 'nama_ayah', name: 'nama_ayah'},
                        {data: 'kacab', name: 'kacab'},
                        {data: 'wilayah_binaan', name: 'wilayah_binaan'},
                        {data: 'shelter', name: 'kacab'},
                        {data: 'action', name: 'action'}
                    ],
                order: [[0, 'desc']],
                paging: true,
                pageLength: 10,
                language: {
                    "emptyTable": "Data Kosong..."
                }
            });
        });
</script>

@endsection
