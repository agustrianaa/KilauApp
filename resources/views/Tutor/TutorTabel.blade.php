@extends('layout.main')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing+Script">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
<link rel="stylesheet" href="{{ asset('css/calonAnakBinaan.css') }}">

<div class="content-wrapper background">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <!-- <div class="container-fluid"> -->
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
        <!-- </div> -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col sm-6">
                    <a class="btn btn-success mb-2" onClick="add()" href="javascript:void(0)"><i class="bi bi-plus"></i> Tambah data</a>
                    <!-- <a href="#" class="btn btn-info mb-2 mr-2">Filter</a> -->
                </div>

                <!-- FILTER -->
                <div class="col-sm-6">
                    <!-- <a href="#" class="btn btn-info float-sm-right"><i class="bi bi-funnel-fill"></i>Filter</a> -->
                    <div class="col-lg-12" id="openFilter">
                        <button type="button" class="btn btn-info float-sm-right" id="tombolbukafilter">Buka Filter <i class="bi bi-funnel-fill"></i></button>
                    </div>
                    <div class="col-lg-12 tutupFilter" id="closeFilter">
                        <button type="button" class="btn btn-danger float-sm-right" id="tombolTutupFilter">Tutup Filter <i class="bi bi-funnel-fill"></i><i class="bi bi-x"></i></button>
                    </div>
                </div>

                <!-- Card Filter -->
                <div class="container mb-2">
                    <div class="card filters h-100" id="filterCard">
                        <div class="row mt-3 ml-3">
                            <div class="col-3">
                                <label for="">Kantor Cabang</label>
                                <select name="fkacab" id="fkacab" multiple="multiple" class="form-control">
                                    @foreach($wilayah as $kacab)
                                    <option value="{{ $kacab->id_kacab }}" data-kantor-id="{{ $kacab->id_kacab }}">
                                        {{ $kacab->nama_kacab }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="">Wilayah Binaan</label>
                                <select name="fwilbin" id="fwilbin" multiple="multiple" class="form-control">
                                    <!-- <option value="a">TanjungSari</option> -->
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="">Shelter</label>
                                <select name="fshelter" id="fshelter" multiple="multiple" class="form-control">
                                    <!-- <option value="s">Sukaasih</option> -->
                                </select>
                            </div>
                            <div class="col-1 "> <br>
                                <button type="button " class="btn btn-outline-info" id="all_fwilayah">Filter</button>
                            </div>
                            <div class="col-1"> <br>
                                <button type="reset" class="btn btn-outline-danger" id="resetFwilayah">Reset</button>
                            </div>
                            <div class="col-3">
                                <label for="">Mata Pelajaran</label>
                                <select name="fmapel" id="fmapel" class="form-control" style="width: 100%;">
                                    <option value="#" disabled selected>Pilih Mata Pelajaran</option>
                                    <option value="a">IPA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TABEL DATA -->
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover" id="tutor">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Pendidikan</th>
                                        <th>Mata Pelajaran</th>
                                        <th>No HP</th>
                                        <th>Shelter</th>
                                        <!-- <th>Detail</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Modal Untuk detail data Tutor -->
            <div class="modal fade" id="tutorModal" tabindex="-1" aria-labelledby="tutorModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="tutorModalLabel">Biodata Tutor</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="tutorDetail"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Untuk Edit data Tutor -->
            <div class="modal fade" id="editTutorModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editModalLabel">Biodata Tutor</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:void(0)" id="EditTutor" method="PUT">
                                <div class="form-group row">
                                    <label for="namaTutor" class="col-sm-2 col-form-label">Nama Tutor</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="editNama" name="nama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pendidikanTutor" class="col-sm-2 col-form-label">Pendidikan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="editPendidikan" name="pendidikan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="emailTutor" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="editEmail" name="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="noHpTutor" class="col-sm-2 col-form-label">No Hp</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="editNoHp" name="no_hp">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamatTutor" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="editAlamat" name="alamat">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mapelTutor" class="col-sm-2 col-form-label">Mata Pelajran</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="editMapel" name="mapel">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="wilayah">Wilayah : </label>
                                    <div class="col-3">
                                        <label for="kacab">Kacab</label>
                                        <select name="kacab" id="editKacab" class="form-control">
                                            <option value="a">Sumedang</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label for="wilbin">Wilayah Binaan</label>
                                        <select name="wilbin" id="editWilbin" class="form-control">
                                            <option value="a">sumedang</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label for="shelter">Shelter</label>
                                        <select name="shelter" id="editShelter" class="form-control">
                                            <option value="b">Sukaasih</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-info">Simpan</button>
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

            $('#tutor').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.tutor')}}",
                    data: {
                        kacab_id: fkacab,
                        wilbin_id: fwilbin,
                        shelter_id: fshelter,
                    }
                },

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
                        data: 'mapel',
                        name: 'mapel'
                    },
                    {
                        data: 'no_hp',
                        name: 'no_hp'
                    },
                    {
                        data: 'nama_shelter',
                        name: 'nama_shelter'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
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

                                $('#fwilbin').append('<option value="' + subValue.id_wilbin + '" data-wilbin-id="' + subValue.id_wilbin + '">' + subValue.nama_wilbin + '</option>');
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

                                $('#fshelter').append('<option value="' + subValue.id_shelter + '" data-wilbin-id="' + subValue.id_shelter + '">' + subValue.nama_shelter + '</option>');
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
                // });
            });

            $('#all_fwilayah').click(function() {
                var fkacab = $('#fkacab').val();
                var fwilbin = $('#fwilbin').val();
                var fshelter = $('#fshelter').val();
                $('#tutor').DataTable().destroy();
                load_data(fkacab, fwilbin, fshelter);
            });

            $('#resetFwilayah').click(function() {
                $('#fkacab').val(null).trigger('change');
                $('#fwilbin').val(null).trigger('change');
                $('#fshelter').val(null).trigger('change');
                $('#tutor').DataTable().destroy();
                load_data();
            });
        });
    });

    function add() {
        window.location.href = "{{ route('admin.add-tutor') }}"
    }

    function viewTutor(id) {
        console.log('ID', id);
        var url = '/admin/viewTutor/' + id;

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log(response);
                var tutorData = response.tutor;

                $('#tutorDetail').html('<table class="table"> <tr> <td> <b>Nama Tutor</b> </td> <td>' + ': ' + tutorData.nama + '</td> </tr> <tr> <td>' +
                    '<b>pendidikan</b>  </td> <td>' + ': ' + tutorData.pendidikan + '</td> </tr> <tr> <td>' +
                    '<b>No HP</b> </td> <td>' + ': ' + tutorData.no_hp + '</td> </tr> <tr> <td>' +
                    '<b>Email</b> </td> <td>' + ': ' + tutorData.email + '</td> </tr> <tr> <td>' +
                    '<b>Alamat</b>  </td> <td>' + ': ' + tutorData.alamat + '</td> </tr> <tr> <td>' +
                    '<b>Mata Pelajaran</b>  </td> <td>' + ': ' + tutorData.mapel + '</td> </tr> <tr> <td>' +
                    '<b>Kantor Cabang</b>  </td> <td>' + ': ' + tutorData.kacab.nama_kacab + '</td> </tr> <tr> <td>' +
                    '<b>Wilayah Binaan</b>  </td> <td>' + ': ' + tutorData.wilbin.nama_wilbin + '</td> </tr> <tr> <td>' +
                    '<b>Shelter</b>  </td> <td>' + ': ' + tutorData.shelter.nama_shelter + '</td> </tr> <tr> <td>' +
                    '<b>Status</b> </td> <td' + ':' + tutorData.status + '</td> </tr> <tr> <td>' +
                    '<b>Foto</b>  </td> <td>' + ': ' + tutorData.foto + '</td> </tr>' +
                    '</table>')
                $('#tutorModal').modal('show');
            }
        })

    }

    function editTutor(id){
        // window.location.href = "{{ url('admin/addTutor') }}/" + id + "/editTutor";
        console.log('ID', id);
        $.ajax({
            type: 'GET',
            url : "{{ url('admin/editTutor')}}/" + id,
            success : function (data) {
                window.location.href = "{{ url('admin/editTutor') }}/" + id,
                $('#editNama').val(data.nama);
            $('#editPendidikan').val(data.pendidikan);
            }
        })
    }

    function hapusTutor(id) {
        console.log('ID:', id);
        if (confirm("Ingin Menghapus data?") == true) {
            // var id = id;
            // Ajax
            $.ajax({
                type: "POST",
                url: "{{ route('admin.delete-tutor') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(data) {
                    console.log('ini data id', data.id_tutor)
                    Swal.fire(
                        'Terhapus!',
                        'Data berhasil dihapus.',
                        'success'
                    );
                    var oTable = $('#tutor').DataTable();
                    oTable.ajax.reload();
                }
            });
        }
    }
</script>

@endsection