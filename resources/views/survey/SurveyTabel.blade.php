@extends('layout.main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <h4> Survey Tabel</h4>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered" id="tabelsurvey">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No. KK</th>
                                        <th>Kepala Keluarga</th>
                                        <th>KaCab</th>
                                        <th>WilBin</th>
                                        <th>Shelter</th>
                                        <th>Action</th>
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
            $('#tabelsurvey').DataTable({
                searching: true,
                serverSide: true,
                ajax: {
                    url: 'surveyAnak',
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
                        {data: 'kepala_keluarga', name: 'kepala_keluarga'},
                        {data: 'kacab', name: 'kacab'},
                        {data: 'wilayah_binaan', name: 'wilayah_binaan'},
                        {data: 'shelter', name: 'kacab'},
                        {data: 'action', name: 'action'}
                    ],
                order: [[0, 'asc']],
                paging: true,
                pageLength: 10,
                language: {
                    "emptyTable": "Data Kosong..."
                }
            });
        });
</script>

@endsection
