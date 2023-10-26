@extends('layout.main')
@section('content')

<div class="content-wrapper">
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="row text-center">
                <h1>INI HALAMAN VALIDASI ANAK BINAAN</h1>
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

        $('#validasiSurvey').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.validasi-survey')}}",
            columns: [
                {data: 'id', name: 'id'},
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
        })

        // function kelayakanFunc(id){
        //     window.location.href = "{{ url('admin/validasi') }}/" + id;
        // }

        function tambahKelayakan(id){
            window.location.href = "{{ url('admin/layak') }}/" + id;
        }
    });

</script>
@endsection