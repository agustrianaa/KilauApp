@extends('layout.main')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing+Script">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">

<link rel="stylesheet" href="{{ asset('css/calonAnakBinaan.css') }}">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Calon Anak Binaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Data Calon Anak Binaan</li>
                    </ol>
                </div>
            </div><!-- End row -->
        </div><!-- End container-fluid -->
    </div>
    <!-- End content-header -->

    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12" id="openFilter">
                <button type="button" class="btn btn-success mx-1 mb-2" id="tombolbukafilter">Buka Filter <i class="bi bi-funnel-fill"></i></button>
            </div>
            <div class="col-lg-12 tutupFilter" id="closeFilter">
                <button type="button" class="btn btn-danger mx-1 mb-2" id="tombolTutupFilter">Tutup Filter <i class="bi bi-funnel-fill"></i><i class="bi bi-x"></i></button>
            </div>
        </div>
            <!-- Card Untuk Filter ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <div class="card filters" id="filterCard">
                <form>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <label class="form-label select-label">Kantor Cabang</label>
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label select-label">Wilayah Binaan</label>
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label select-label">Shelter</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">

                                    <!-- Filter -->
                                    <div class="col-lg-4">
                                        <select id="kantorCabang" class="form-select" multiple="multiple" style="width: 300px; height:100px;">
                                            @foreach($wilayah as $kantorCabang)
                                                <option value="{{ $kantorCabang->nama_kacab }}" data-kantor-id="{{ $kantorCabang->id_kacab }}">
                                                    {{ $kantorCabang->nama_kacab }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <select id="wilayahBinaan" class="form-select" multiple="multiple" style="width: 300px;">
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <select id="shelterFilter" class="form-select" multiple="multiple" style="width: 300px;">
                                        </select>
                                    </div>
                                    <!-- End Filter -->

                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <hr class="garis">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="float-start">
                                            <button type="button" class="btn btn-outline-warning" id="bukaKK">Cari No. KK</button>
                                            <button type="button" class="btn btn-danger tutupKKbtn" id="tutupKK">Tutup Cari No. KK</button>
                                        </div>
                                    </div>
                                    <div class="col-2"></div>
                                    <div class="col-4">
                                        <div class="text-center">
                                            <button type="button" class="btn btn-outline-info" id="filterSemua">Filter</button>
                                            <button type="reset" class="btn btn-outline-danger" id="resetFilter">Reset</button>
                                        </div>
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kk sembunyi" id="cariNomorKK">
                        <hr>
                        <div class="card-body">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="float-end">
                                            <b>No. KK :</b>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" class="form-control" id="inputCariKK" name="inputCariKK">
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </form>
            </div>
            <!-- End card filter~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <!-- Tabel data keluarga -->
                        <table class="table table-bordered" id="CalonAnakBinaanTable">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Nama</th>
                                    <th>Agama</th>
                                    <th>Kacab</th>
                                    <th>Wilbin</th>
                                    <th>No. KK</th>
                                    <th>Kepala Keluarga</th>
                                    <th>Anak Ke</th>
                                    <th>Status Binaan</th>
                                    <th style="width: 150px">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

        </div>
</section>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
@if(session('alert'))
    <script>
        Swal.fire({
            title: '{{ session('alert.title') }}',
            text: '{{ session('alert.text') }}',
            icon: '{{ session('alert.icon') }}',
        });
    </script>
@endif

<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        loadData();

        function loadData() {
            var selectedKacab = $('#kantorCabang').val();
            var selectedWil = $('#wilayahBinaan').val();
            console.log(selectedKacab, selectedWil);

            $('#CalonAnakBinaanTable').DataTable({
                processing : true,
                // searching : false,
                serverSide : true,
                ajax : {
                    url : "{{ url('admin/calonAnakBinaan') }}",
                    data: {
                        kacab : selectedKacab,
                        wilbin : selectedWil,
                    },
                },
                columns : [
                    {
                        data: null,
                        name: 'id',
                        render: function(data, type, row, meta) {
                            return meta.row + 1; // Menggunakan nomor baris sebagai nomor urut
                        }
                    },
                    { data: 'nama_lengkap_calon_anak', name: 'nama_lengkap_calon_anak'},
                    { data: 'agamaAnak', name: 'agamaAnak'},
                    { data: 'kacab', name: 'kacab'},
                    { data: 'wilayah_binaan', name: 'wilayah_binaan'},
                    { data: 'no_kk', name: 'no_kk'},
                    { data: 'nama_ayah', name: 'nama_ayah'},
                    { data: 'anak_ke', name: 'anak_ke'},
                    {
                        data: 'status_binaan',
                        name: 'status_binaan',
                        render: function(data, type, row) {
                            return data == 1 ? 'Aktif' : 'Belum validasi';
                        }
                    },
                    { data: 'action', name: 'action', orderable: false},
                ],
                order: [[0, 'desc']],
                language: {
                    "emptyTable": "Data Kosong...",
                    "info": "Menampilkan _START_ sampai _END_, dari _TOTAL_ data",
                    "lengthMenu": "Tampilkan _MENU_ data/halaman",
                    "search": "Cari:",
                    "infoFiltered": "(disaring dari total _MAX_ data)",
                    "zeroRecords": "Tidak ada data yang cocok...",
                    "loadingRecords": "Memuat...",
                    "processing": "Memproses...",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    },
                }
            });
        }

        $('#kantorCabang').select2({
            placeholder: 'Pilih Shelter...', // Teks placeholder
            // tokenSeparators: [',', ' '], // Menentukan pemisah token (bisa disesuaikan)
            width: '100%', // Menetapkan lebar dropdown
            allowClear: true, // Mengaktifkan tombol "Hapus" untuk menghapus nilai yang dipilih
        });

        $('#wilayahBinaan').select2({
            width: '100%', // Menetapkan lebar dropdown
            placeholder: 'Pilih Wilayah...', // Teks placeholder
            allowClear: true, // Mengaktifkan tombol "Hapus" untuk menghapus nilai yang dipilih
        });

        $('#shelterFilter').select2({
            width: '100%', // Menetapkan lebar dropdown
            placeholder: 'Pilih Wilayah...', // Teks placeholder
            allowClear: true, // Mengaktifkan tombol "Hapus" untuk menghapus nilai yang dipilih
        });


        $('#kantorCabang').on('change', function() {
            // Membersihkan opsi pada dropdown kedua
            $('#wilayahBinaan').empty();

            // Mengisi ulang opsi pada dropdown kedua berdasarkan nilai yang dipilih pada dropdown pertama
            $(this).find('option:selected').each(function() {
                var kantorId = $(this).data('kantor-id');
                console.log('Selected Kantor ID:', kantorId);
            
                // Menggunakan AJAX untuk mengambil data wilayah binaan berdasarkan kacab_id
                $.ajax({
                    url: '{{ route('admin.cariWilayahBinaan', ['kantorId' => ':kantorId']) }}'.replace(':kantorId', kantorId),
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
                            
                                $('#wilayahBinaan').append('<option value="' + subValue.nama_wilbin + '" data-wilbin-id="' + subValue.id_wilbin +'">' + subValue.nama_wilbin + '</option>');
                            });
                        } else {
                            console.log('Invalid data format:', data);
                        }
                    
                        // Pengaktifan ulang Select2 pada dropdown #wilayahBinaan
                        $('#wilayahBinaan').trigger('change');
                    },
                    error: function(error) {
                        console.log('Terjadi error pada:', error);
                    }
                });
            });
        });

        $('#wilayahBinaan').on('change', function() {
            // Membersihkan opsi pada dropdown kedua
            $('#shelterFilter').empty();

            // Mengisi ulang opsi pada dropdown kedua berdasarkan nilai yang dipilih pada dropdown pertama
            $(this).find('option:selected').each(function() {
                var wilbinId = $(this).data('wilbin-id');
                console.log('Selected Wilbin ID:', wilbinId);
            
                // Menggunakan AJAX untuk mengambil data wilayah binaan berdasarkan kacab_id
                $.ajax({
                    url: '{{ route('admin.cariShelters', ['wilbinId' => ':wilbinId']) }}'.replace(':wilbinId', wilbinId),
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
                            
                                $('#shelterFilter').append('<option value="' + subValue.nama_shelter + '" data-wilbin-id="' + subValue.id_shelter +'">' + subValue.nama_shelter + '</option>');
                            });
                        } else {
                            console.log('Invalid data format:', data);
                        }
                    
                        // Pengaktifan ulang Select2 pada dropdown #shelterFilter
                        $('#shelterFilter').trigger('change');
                    },
                    error: function(error) {
                        console.log('Terjadi error pada:', error);
                    }
                });
            });
        });


        // Mengirim nilai Select2 Shelter ke server saat tombol filter ditekan
        $('#filterSemua').click(function () {
            var selectedKacab = $('#kantorCabang').val();
            var selectedWil = $('#wilayahBinaan').val();

            $('#CalonAnakBinaanTable').DataTable().destroy();
            loadData(selectedKacab, selectedWil);
        });


        function resetFilter() {
            // Hapus semua nilai yang dipilih di Select2
            $('#kantorCabang').val(null).trigger('change');

            // Destroy tabel data (gantilah '#tabelData' dengan ID atau kelas tabel Anda)
            $('#CalonAnakBinaanTable').DataTable().destroy();

            // Misalnya, inisialisasi kembali tabel dengan ID 'CalonAnakBinaanTable'
            loadData();
        }

        $('#resetFilter').click(function () {
            resetFilter();
        });

    }); // End Ajax

    // Fungsi Buka Atau Tutup Filter
    var filterCard = $("#filterCard");
    var openFilter = $("#openFilter");
    var closeFilter = $("#closeFilter");

    // Tombol Buka Filter diklik
    $("#tombolbukafilter").click(function () {
        // Menghapus class "filters"
        filterCard.removeClass("filters");
        openFilter.addClass("bukaFilter");
        closeFilter.removeClass("tutupFilter");
    });
    $("#tombolTutupFilter").click(function () {
        // Menghapus class "filters"
        filterCard.addClass("filters");
        openFilter.removeClass("bukaFilter");
        closeFilter.addClass("tutupFilter");
    });

    var cariNomorKK = $("#cariNomorKK");
    var tutupKK = $("#tutupKK");
    var bukaKK = $("#bukaKK");
    $('#bukaKK').click(function() {
        cariNomorKK.removeClass("sembunyi");
        tutupKK.removeClass("tutupKKbtn");
        bukaKK.addClass("bukaKKbtn");
    });
    $('#tutupKK').click(function() {
        cariNomorKK.addClass("sembunyi");
        tutupKK.addClass("tutupKKbtn");
        bukaKK.removeClass("bukaKKbtn");
    });


    function validasiAnak(id_anaks) {
        $.ajax({
            url: "calonAnakBinaan/" + id_anaks,
            type: 'PUT',
            data: id_anaks,
            success: function() {
            Swal.fire({
                    icon: 'success',
                    title: 'Berhasil Validasi',
                    text: 'Data telah divalidasi.',
                    timer: 900,
                    showConfirmButton: false
                }).then(function() {
                    var oTable = $('#CalonAnakBinaanTable').DataTable();
                    oTable.ajax.reload(false);
                });
            }
        })
    }

    //Menghapus data keluarga
    function delete_datakeluarga(id) {
        Swal.fire({
            title: 'Apakah yakin?',
            text: "Data akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/calonAnakBinaanDelete') }}",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        Swal.fire({
                            title: 'Berhasil dihapus!',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1200,
                        });
                        // Tambahan: Reload DataTable setelah menghapus
                        $('#CalonAnakBinaanTable').DataTable().ajax.reload();
                    },
                    error: function (data) {
                        Swal.fire({
                            title: 'Gagal!',
                            text: 'Gagal menghapus Kantor Cabang. Periksa Konsol',
                            icon: 'error',
                        });
                        console.log('Error:', data);
                    }
                });
            }
        });
    }
    //Menghapus data keluarga
    // function delete_datakeluarga(id){
    //     if (confirm("Are you sure you want to delete")==true) {
    //         var id = id;
    //         $.ajax({
    //             type:"POST",
    //             url: "{{ url('admin/calonAnakBinaanDelete') }}",
    //             data: {id:id},
    //             dataType: 'json',
    //             success: function(res) {
    //                 var oTable = $('#CalonAnakBinaanTable').DataTable();
    //                 oTable.ajax.reload(false); //agar tidak perlu refresh halaman
    //             }
    //         });
    //     }
    // }

    //menampilkan detail data keluarga
    function detailDatakeluarga(id, id_anaks){

        window.location.href = `{{ url('admin/calonAnakBinaanDetail') }}/${id}/${id_anaks}`;
    }
</script>
@endsection
