@extends('layout.main')
@section('content')

<div class="content-wrapper">
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="row text-center">
                <h1>INI HALAMAN VALIDASI BEASISWA</h1>
            </div>
            
            <div class="card">

                <div class="card-header">
                <h2 class="card-title text-center">Validasi Beasiswa</h2>
                </div>

                <div class="card-body" style="overflow-x:auto;">
                    <table class="table table-bordered" id="validasi-beasiswa">
                    <thead>
                        <tr>
                            <th style="width: 10px"> No </th>
                            <th> Nama</th>
                            <th> Agama </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                </div>

                </table>
            </div>
        </div>
    </div>
    </section>
</div>

<script type="text/javascript">
    $(document).ready( function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#validasi-beasiswa').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.validasi-beasiswa')}}",
            columns: [
                { data: 'id', name: 'id'},
                { data: 'name', name: 'name'},
                { data: 'agama', name: 'agama'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            order: [[0, 'desc']]
        })
    });
</script>
@endsection