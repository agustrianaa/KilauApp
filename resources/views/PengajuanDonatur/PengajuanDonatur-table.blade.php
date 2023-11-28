@extends('layout.main')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing+Script">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
<link rel="stylesheet" href="{{ asset('css/calonAnakBinaan.css') }}">

<div class="content-wrapper">
    <section class="content">
        <div class="content-header">
            <h1 class="m-0">Pengajuan Donatur</h1>
        </div>
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="container mb-3">
                    <div class="card h-100">
                        <div class="card-header">filter wilayah</div>
                    <div class="row mt-3 ml-3">
                        
                        <div class="col-3" style="margin-bottom: 10px;">
                            <select name="fkacab" id="fkacab" multiple="multiple" class="form-control">
                                @foreach($data as $kacab)
                                <option value="{{$kacab->kacab}}">{{$kacab->kacab}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <select name="fkacab" id="fwilbin" multiple="multiple" class="form-control">
                            @foreach($data as $wilbin)
                                <option value="{{$wilbin->wilbin}}">{{$wilbin->wilbin}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <select name="fkacab" id="fshelter" multiple="multiple" class="form-control" >
                            @foreach($data as $shelter)
                                <option value="{{$shelter->shelter}}">{{$shelter->shelter}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-1">
                        <button type="button" class="btn btn-outline-info" id="all_fwilayah">Filter</button>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- TABLE -->
                <div class="card">
                    <div class="card-header">
                        <!-- <div class="d-flex flex-row"> -->
                        <div class="row">
                            <div class="col-3">
                                <label for="">Beasiswa</label><br>
                                <select class="form-select" name="fbeasiswa" id="fbeasiswa" style="width: 100%;">
                                    <option value="#" disabled selected>Pilih Status Beasiswa</option>
                                    <option value="">Semua</option>
                                    <option value="cpb">CPB</option>
                                    <option value="npb">NPB</option>
                                </select>
                            </div>

                            <div class="col-3 ">
                                <label for="">Wilayah</label><br>
                                <select class="form-select" name="" id="fwilayah" style="width: 100%;">
                                    <option value="#" disabled selected>Pilih Wilayah</option>
                                    <option value="">Semua</option>
                                    <option value="wilayah1">Wilayah 1</option>
                                    <option value="wilayah2">Wilayah 2</option>
                                </select>
                            </div>
                        </div>
                        <!-- </div> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover" id="pengajuanDonatur">
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
                                    <button type="button" class="btn btn-secondary" . id="btnTutupModal">Tutup</button>
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

        load_data();

        function load_data() {
            var fkacab = $('#fkacab').val();
            var fwilbin = $('#fwilbin').val();
            var fshelter = $('#fshelter').val();
            console.log(fkacab, fwilbin, fshelter);

            var fbeasiswa = $('#fbeasiswa').val();

            $('#pengajuanDonatur').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.aju-donatur')}}",
                    data: {
                        status_beasiswa: fbeasiswa,
                    }
                },
                columns: [{
                        data: 'no',
                        name: 'no',
                        className: 'text-center',

                    },
                    {
                        data: 'nama_lengkap',
                        name: 'nama_lengkap',
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
        }



        $('#fbeasiswa').on('change', function() {
            $('#pengajuanDonatur').DataTable().destroy();
            load_data();
        });

        $('#btnTutupModal').on('click', function() {
            $('#profilDonaturModal').modal('hide');
        });

        $('#fkacab').select2({
            placeholder: 'Pilih Kantor Cabang...',
            width: '100%', // Menetapkan lebar dropdown
            allowClear: true,
        });
        $('#fwilbin').select2({
            placeholder: 'Pilih Wilayah Binaan...',
            width: '100%', // Menetapkan lebar dropdown
            allowClear: true,
        });
        $('#fshelter').select2({
            placeholder: 'Pilih Shelter...',
            width: '100%', // Menetapkan lebar dropdown
            allowClear: true,
        });

        $('#fkacab').on('change', function(){
            var filter = $(this).val('data');
            $('#fwilbin').empty();
            $('#shelter').empty();

            var kacab = [];
                    for (var i = 0; i < filter.length; i++) {
                        kacab.push(filter[i].text);
                    }
            // load_data();
        });

        $('#fwilbin').on('change', function(){
            var filter = $(this).val();
            $('#shelter').empty();
            // $('#fwilbin').empty();

            var kacab = [];
                    for (var i = 0; i < filter.length; i++) {
                        kacab.push(filter[i].text);
                    }
            // load_data();
        });
        

        $('#all_fwilayah').click(function(){
            var fkacab = $('#fkacab').val('data');
            var fwilbin = $('#fwilbin').val('data');
            var fshelter = $('#fshelter').val('data');
            $('#pengajuanDonatur').DataTable().destroy();
            load_data(fkacab, fwilbin, fshelter);
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
                $('#profilDonaturModal').find('.modal-body').html('<table class="table"> <tr> <td> Nama Donatur </td> <td>' + ': ' + data.name + '</td> </tr> <tr> <td> ' + 'Alamat  </td> <td>' + ': ' + data.alamat + ' </td> </tr><tr> <td> ' + 'No HP  </td> <td>' + ': ' + data.no_hp + ' </td> </tr><tr> <td> ' + 'Bank  </td> <td>' + ': ' + data.nama_bank + ', ' + data.no_rek + ' </td> </tr>' + '</table>');
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