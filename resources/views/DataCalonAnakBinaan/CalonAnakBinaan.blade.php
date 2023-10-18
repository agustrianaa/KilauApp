@extends('layout.main')
@section('content')

<style>
    .float-end.mt-3 a {
        text-decoration: none;
        color: black;
    }

    .float-end.mt-3 a:hover {
        color: rgb(99, 64, 188);
    }

    *::selection {
        background: rgb(173, 141, 255);
        color: #fff;
    }

    .content-wrapper.mr-1 {
        background-color: rgb(242, 242, 242);
    }

</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<div class="content-wrapper mr-1">
    <section class="content ml-1">
        <div class="container-fluid">
            <div class="row">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 mt-2">
                            <h1 class="float-start">Data Calon Anak Binaan</h1>
                        </div>
                        <div class="col-lg-6 mt-2">
                            <h5 class="float-end mt-3">
                                <a class="" href="{{ route('admin.dashboard') }}">Home</a>
                                    /
                                <a href="">Data Calon Anak Binaan</a>
                            </h5>
                        </div>
                    </div>
                    <div class="col-lg-12 margin-tb">
                        <h1 class="float-start"><button class="btn btn-info">Tambah Data Calon Anak+</button></h1>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-info table-striped" id="calonAnakBinaan">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>TTL</th>
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
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.all.min.js"></script>

<script type="text/javascript">
        $(document).ready( function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

                $('#calonAnakBinaan').DataTable({
                processing: true,
                serverSide: true,
                url : "{{ url('admin/calonAnakBinaan') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'nama_lengkap', name: 'nama_lengkap' },
                    { data: 'TTL', name: 'TTL' },
                    { data: 'shelter', name: 'shelter' },
                    { data: 'action', name: 'action', orderable: false },
                ],
                order: [[0, 'asc']],
                paging: true,
                pageLength: 10 // Menyeting jumlah entri yang ditampilkan menjadi 10
            });


        });

        function editFunction(data_keluarga_id) {
            $.ajax({
              url: "calonAnakBinaan/" + data_keluarga_id,
              type: 'PUT',
              data: data_keluarga_id,
              success: function() {
                var oTable = $('#calonAnakBinaan').DataTable();
                oTable.ajax.reload(false);
              }
          })
        }

        function detailFunction(id) {
            // Navigate to the view page with the record's ID as a query parameter
            window.location.href = "{{ url('admin/calonAnakBinaanDetail/') }}/" + id;
        }
</script>

@endsection
