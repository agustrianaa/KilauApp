@extends('layout.main')
@section('content')

<div class="content-wrapper background">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Tutor</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-reset text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item active">Data Tutor</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
        <a class="btn btn-success mb-2" onClick="add()" href="javascript:void(0)"><i class="bi bi-plus"></i> Tambah data</a>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover" id="tutor">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Pendidikan</th>
                                    <th>Email</th>
                                    <th>No HP</th>
                                    <th>Mata Pelajaran</th>
                                    <!-- <th>Detail</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#tutor').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.tutor')}}",

            columns: [{
                    data: 'no',
                    name: 'no'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'pendidikan',
                    name: 'pendidikan'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'no_hp',
                    name: 'no_hp'
                },
                {
                    data: 'mapel',
                    name: 'mapel'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
            ],
            order: [
                [0, 'asc']
            ],
            paging: true,
            pageLength: 10,
            language: {
                "emptyTable": "Data Kosong...."
            }
        });
    });

    function add(){
        window.location.href = "{{ route('admin.add-tutor') }}"
    }
</script>

@endsection