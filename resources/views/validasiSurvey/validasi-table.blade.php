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
        });

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

    function tambahKelayakan(id) {
            window.location.href = "{{ url('admin/validasi') }}/" + id;
        }

    function editFunc(id) {
        window.location.href = "{{ url('admin/') }}/" + id;
    }
</script>
@endsection