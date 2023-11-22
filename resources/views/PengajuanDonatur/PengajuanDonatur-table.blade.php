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


                    <!-- modal untuk profil donatur -->
                    <div class="modal fade" id="profilDonaturModal" tabindex="-1" role="dialog" aria-labelledby="profilDonaturLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="profilDonaturLabel">Profil Donatur</h5>
                                </div>
                                <div class="modal-body">
                                    <!-- isi nya ada di js -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary". id="btnTutupModal" >Tutup</button>
                                </div>
                            </div>
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
        $('#btnTutupModal').on('click', function () {
    $('#profilDonaturModal').modal('hide');
});
    });




    // Mengarah ke profile nya donatur
    function donaturFunc(id) {
        var url = '/admin/profile-donatur/' + id;
        // alert('Ini data Donatur');

        $.ajax({
            type: "GET",
            url: url,
            dataType: 'json',
            success: function(data) {
                $('#profilDonaturModal').find('.modal-body').html('<table class="table"> <tr> <td> Nama Donatur </td> <td>' + ': ' + data.name + '</td> </tr> <tr> <td> ' + 'Alamat  </td> <td>' + ': '+ data.alamat + ' </td> </tr><tr> <td> ' + 'No HP  </td> <td>' + ': '+ data.no_hp + ' </td> </tr><tr> <td> ' + 'Bank  </td> <td>' + ': '+ data.nama_bank + ', '+ data.no_rek + ' </td> </tr>' + '</table>');
                $('#profilDonaturModal').modal('show');
            },
            error: function(error) {
                console.log(error);
            }
        });
    }


    function noDonatur(id) {
        Swal.fire({
            icon: 'info',
            title: 'Belum Ada Donatur',
            text: 'Tambahkan donatur untuk melanjutkan.',
        });
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
            },
            error: function(xhr, status, error) {
                // Tangani kesalahan jika ada
                console.error('Error:', error);
            }
        });
    }

    function hapusDonatur(id) {
        if (confirm("Ingin Mengahapus Data?") == true) {
            var id = id;
            //ajax
            $.ajax({
                type: "PATCH",
                url: "{{ route('admin.hapus-donatur') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(data) {
                    console.log('ini dataid', data.doantur_id)
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