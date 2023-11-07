@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="row text-center">
                    <h1>INI HALAMAN PENGAJUAN DONATUR</h1>
                </div>

                <div class="card">
                    <div class="card-header">
                        Pengajuan Donatur
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered" id="pengajuanDonatur">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Agama</th>
                                        <th>Status Beasiswa</th>
                                        <th>Hasil Survey</th>
                                        <th>Donatur</th>
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

<script type="text/javascript">
    $(document).ready( function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#pengajuanDonatur').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.aju-donatur')}}",
            columns: [
                {data: 'no', name: 'no'},
                {data: 'nama_lengkap', name: 'nama_lengkap'},
                {data: 'agama', name: 'agama'},
                {data: 'status_beasiswa', name: 'status_beasiswa'},
                {data: 'hsurvey', name: 'hsurvey', orderlable: false, serachabel: false},
                {data: 'donatur', name: 'donatur', orderlable: false, serachabel: false},
                {data: 'action', name: 'action', orderlable: false, orderlable: false},
            ],
            order: [[0, 'asc']],
            paging: true,
            pageLength: 10,
            language: {
                "emptyTable" : "Data Kosong...."
            }
        });
    });

    function DonaturFunc(id){
        window.location.href = "{{ url('admin/')}}" + id;
    }

    function tambahDonatur(id){
        window.location.href = "{{ url('admin/pengajuan') }}/" +id;
    }
</script>


@endsection