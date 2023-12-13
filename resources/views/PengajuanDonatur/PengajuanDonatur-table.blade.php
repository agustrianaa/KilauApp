@extends('layout.main')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing+Script">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
<link rel="stylesheet" href="{{ asset('css/calonAnakBinaan.css') }}">

<div class="content-wrapper background">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengajuan Donatur</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}" class="text-reset text-decoration-none">Home</a>
                        </li>
                        <!-- <li class="breadcrumb-item"><div href="{{ route('admin.tutor') }}" class="text-reset text-decoration-none">Data Tutor</div></li> -->
                        <li class="breadcrumb-item active">Data Anak</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12" id="openFilter">
                    <button type="button" class="btn btn-success mx-1 mb-2" id="tombolbukafilter">Buka Filter <i class="bi bi-funnel-fill"></i></button>
                </div>
                <div class="col-lg-12 tutupFilter" id="closeFilter">
                    <button type="button" class="btn btn-danger mx-1 mb-2" id="tombolTutupFilter">Tutup Filter <i class="bi bi-funnel-fill"></i><i class="bi bi-x"></i></button>
                </div>
                <div class="container mb-3">
                    <div class="card filters h-100" id="filterCard">
                        <!-- <div class="card-header">Filter Wilayah</div> -->
                        <div class="row mt-3 ml-3">
                            <div class="col-3" style="margin-bottom: 10px;">
                                <label for="">Kantor Cabang</label>
                                <select name="fkacab" id="fkacab" multiple="multiple" class="form-control">
                                    @foreach($wilayah as $kacab)
                                    <option value="{{ $kacab->nama_kacab }}" data-kantor-id="{{ $kacab->id_kacab }}">
                                        {{ $kacab->nama_kacab }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="">Wilayah Binaan</label>
                                <select id="fwilbin" multiple="multiple" class="form-control">
                                </select>
                            </div>

                            <div class="col-3">
                                <label for="">Shelter</label>
                                <select id="fshelter" multiple="multiple" class="form-control">
                                </select>
                            </div>
                            <div class="col-1 "> <br>
                                <button type="button " class="btn btn-outline-info" id="all_fwilayah">Filter</button>
                            </div>
                            <div class="col-1"> <br>
                                <button type="reset" class="btn btn-outline-danger" id="resetFwilayah">Reset</button>
                            </div>
                            <div class="col-3">
                                <label for="">Beasiswa</label>
                                <select class="form-select" name="fbeasiswa" id="fbeasiswa" style="width: 100%;">
                                    <option value="#" disabled selected>Pilih Status Beasiswa</option>
                                    <option value="">Semua</option>
                                    <option value="cpb">CPB</option>
                                    <option value="npb">NPB</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TABLE -->
                <div class="card">
                    <!-- <div class="card-header">
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
                        </div>
                    </div> -->
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
                        kacab: fkacab,
                        wilbin: fwilbin,
                        shelter: fshelter,
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

        var filterCard = $("#filterCard");
        var openFilter = $("#openFilter");
        var closeFilter = $("#closeFilter");
        $("#tombolbukafilter").click(function() {
            // Menghapus class "filters"
            filterCard.removeClass("filters");
            openFilter.addClass("bukaFilter");
            closeFilter.removeClass("tutupFilter");
        });
        $("#tombolTutupFilter").click(function() {
            // Menghapus class "filters"
            filterCard.addClass("filters");
            openFilter.removeClass("bukaFilter");
            closeFilter.addClass("tutupFilter");
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

        $('#fkacab').on('change', function() {
            // var filter = $(this).val('data');
            $('#fwilbin').empty();
            // $('#shelter').empty();

            $(this).find('option:selected').each(function() {
                var kantorId = $(this).data('kantor-id');
                console.log('Selected Kantor ID:', kantorId);

                $.ajax({
                    url: "{{ route('admin.cariWilayahBinaan', ['kantorId' => ':kantorId']) }}".replace(':kantorId', kantorId),
                    type: 'GET',
                    data: {
                        kantorId: kantorId
                    },
                    success: function(response) {
                        console.log('Terjadi response:', response);

                        var data = response.hasOwnProperty('data') ? response.data : response;

                        // Memastikan data adalah array sebelum menggunakan forEach
                        if (Array.isArray(data)) {
                            // Iterasi melalui data dan tambahkan opsi ke dropdown
                            data.forEach(function(subValue) {
                                console.log('subvalue log:', subValue.id_wilbin, subValue.nama_wilbin);

                                $('#fwilbin').append('<option value="' + subValue.nama_wilbin + '" data-wilbin-id="' + subValue.id_wilbin + '">' + subValue.nama_wilbin + '</option>');
                            });
                        } else {
                            console.log('Invalid data format:', data);
                        }

                        // Pengaktifan ulang Select2 pada dropdown #wilayahBinaan
                        $('#fwilbin').trigger('change');
                    },
                    error: function(error) {
                        console.log('Terjadi error pada:', error);
                    }
                });
            });
        });

        $('#fwilbin').on('change', function() {
            // Membersihkan opsi pada dropdown kedua
            $('#fshelter').empty();

            // Mengisi ulang opsi pada dropdown kedua berdasarkan nilai yang dipilih pada dropdown pertama
            $(this).find('option:selected').each(function() {
                var wilbinId = $(this).data('wilbin-id');
                console.log('Selected Wilbin ID:', wilbinId);

                // Menggunakan AJAX untuk mengambil data wilayah binaan berdasarkan kacab_id
                $.ajax({
                    url: "{{ route('admin.cariShelters', ['wilbinId' => ':wilbinId']) }}".replace(':wilbinId', wilbinId),
                    type: 'GET',
                    data: {
                        wilbinId: wilbinId
                    },
                    success: function(response) {
                        console.log('Terjadi response:', response);

                        var data = response.hasOwnProperty('data') ? response.data : response;

                        // Memastikan data adalah array sebelum menggunakan forEach
                        if (Array.isArray(data)) {
                            // Iterasi melalui data dan tambahkan opsi ke dropdown
                            data.forEach(function(subValue) {
                                console.log('subvalue log:', subValue.id_shelter, subValue.nama_shelter);

                                $('#fshelter').append('<option value="' + subValue.nama_shelter + '" data-wilbin-id="' + subValue.id_shelter + '">' + subValue.nama_shelter + '</option>');
                            });
                        } else {
                            console.log('Invalid data format:', data);
                        }

                        // Pengaktifan ulang Select2 pada dropdown #shelterFilter
                        $('#fshelter').trigger('change');
                    },
                    error: function(error) {
                        console.log('Terjadi error pada:', error);
                    }
                });
            });
        });

        $('#all_fwilayah').click(function() {
            var fkacab = $('#fkacab').val();
            var fwilbin = $('#fwilbin').val();
            var fshelter = $('#fshelter').val();
            $('#pengajuanDonatur').DataTable().destroy();
            load_data(fkacab, fwilbin, fshelter);
        });

        $('#resetFwilayah').click(function() {
            $('#fkacab').val(null).trigger('change');
            $('#fwilbin').val(null).trigger('change');
            $('#fshelter').val(null).trigger('change');
            $('#pengajuanDonatur').DataTable().destroy();
            load_data();
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
                $('#profilDonaturModal').find('.modal-body').html('<table class="table"> <tr> <td> Nama Donatur </td> <td>' + ': ' + data.name + '</td> </tr> <tr> <td> ' +
                    'Alamat  </td> <td>' + ': ' + data.alamat + ' </td> </tr><tr> <td> ' +
                    'No HP  </td> <td>' + ': ' + data.no_hp + ' </td> </tr><tr> <td> ' +
                    'Bank  </td> <td>' + ': ' + data.nama_bank + ', ' + data.no_rek + ' </td> </tr>' + '</table>');
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