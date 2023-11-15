@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="row text-center">
                    <h1>INI HALAMAN PENGAJUAN DONATUR</h1>
                </div>
                <div id="updateDonatur">
                    Perbarui Donatur Anak Binaan
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
                                        <th style="width: 3%;">No</th>
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
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#pengajuanDonatur').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.aju-donatur')}}",
            columns: [{
                    data: 'no',
                    name: 'no',
                    className: 'text-center'
                },
                {
                    data: 'nama_lengkap',
                    name: 'nama_lengkap'
                },
                {
                    data: 'agama',
                    name: 'agama'
                },
                {
                    data: 'status_beasiswa',
                    name: 'status_beasiswa',
                    className: 'text-center',
                    width: '15%'
                },
                {
                    data: 'hsurvey',
                    name: 'hsurvey',
                    className: 'text-center',
                    orderlable: false,
                    serachabel: false
                },
                {
                    data: 'donatur',
                    name: 'donatur',
                    className: 'text-center',
                    orderlable: false,
                    serachabel: false
                },
                {
                    data: 'action',
                    name: 'action',
                    className: 'text-center',
                    width: '10%',
                    orderlable: false,
                    orderlable: false
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

    function DonaturFunc(id) {
        window.location.href = "{{ url('admin/')}}" + id;
    }

    function tambahDonatur(id) {
        window.location.href = "{{ url('admin/pengajuan') }}/" + id;
    }

    function editDonatur(id) {
        $.ajax({
            url: '/admin/pengajuan/' + id,
            type: 'GET',
            success: function(data) {
                // $('#updateDonatur').html(data);
                window.location.href = '/admin/pengajuan/' + id;
                var newDiv = document.createElement('div');
                newDiv.id = 'updateDonatur';
                newDiv.textContent = 'Perbarui Donatur Anak Binaan';
            },
            error: function(xhr, status, error) {
                // Tangani kesalahan jika ada
                console.error('Error:', error);
            }
        });
    }

    function hapusDonatur(id){
        if (confirm("Ingin Mengahapus Data?") == true) {
            var donaturId = id;
            //ajax
            $.ajax({
                type: "POST",
                url: "{{ route('admin.hapus-donatur') }}",
                data: { id: id },
                dataType: 'json',
                success: function(res){
                    Swal.fire(
                        'Terhapus!',
                        'Data berhasil dihapus.',
                        'success'
                    );

                    var oTable = $('#pengajuanDonatur').dataTable();
                    oTable.fnDraw(false);
                }
            });
        }
    }
</script>


@endsection