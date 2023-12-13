@extends('layout.main')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing+Script">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">

<link rel="stylesheet" href="{{ asset('css/calonAnakBinaan.css') }}">
<link rel="stylesheet" href="{{ asset('css/AnakBinaan.css') }}">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Anak Binaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Data Anak Binaan</li>
                    </ol>
                </div>
            </div><!-- End row -->
        </div><!-- End container-fluid -->
    </div>
    <!-- End content-header -->

    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-6" id="openFilter">
                        <button type="button" class="btn btn-success mx-1 mb-2" id="tombolbukafilter">Buka Filter <i class="bi bi-funnel-fill"></i></button>
                    </div>
                    <div class="col-6 tutupFilter" id="closeFilter">
                        <button type="button" class="btn btn-danger mx-1 mb-2" id="tombolTutupFilter">Tutup Filter <i class="bi bi-funnel-fill"></i><i class="bi bi-x"></i></button>
                    </div>
                    <div class="col-6">
                        <div class="float-end mr-5">
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" id="tombolDropDown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Export
                                </button>
                                <ul class="dropdown-menu">
                                    <li><button class="dropdown-item" id="btn-export-excel">Excel (.xlsx) </button></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><button class="dropdown-item" id="btn-export-csv">CSV (.csv)</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- Card Untuk Filter ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <div class="card filters" id="filterCard">
                <form>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-3">
                                        <label class="form-label select-label">Kantor Cabang</label>
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label select-label">Wilayah Binaan</label>
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label select-label">Shelter</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">

                                    <!-- Filter -->
                                    <div class="col-lg-3">
                                        <select id="kantorCabang" class="form-select" multiple="multiple" style="width: 300px; height:100px;">
                                            @foreach($wilayah as $kantorCabang)
                                                <option value="{{ $kantorCabang->nama_kacab }}" data-kantor-id="{{ $kantorCabang->id_kacab }}">
                                                    {{ $kantorCabang->nama_kacab }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <select id="wilayahBinaan" class="form-select" multiple="multiple" style="width: 300px;">
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <select id="shelterFilter" class="form-select" multiple="multiple" style="width: 300px;">
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <button type="button" class="btn btn-outline-info" id="filterSemua"><i class="bi bi-funnel"></i> Filter</button>
                                        <button type="reset" class="btn btn-outline-danger" id="resetFilter"><i class="bi bi-exclamation-lg"></i> Reset</button>
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kk sembunyi" id="cariNomorKK">
                        <hr>
                        <div class="card-body">
                            <div class="col-12">
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <div class="float-end">
                                            <b>No. KK :</b>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" class="form-control" id="formcariKK" name="inputCariKK">
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-4 text-center">
                                        <button class="btn btn-warning" id="btncariKK">Cari</button>
                                        <button class="btn btn-outline-danger" id="resetKK">Reset</button>
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
                        <table class="table table-bordered text-center" id="AnakBinaanTable">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Nama</th>
                                    <th>Agama</th>
                                    <th>Kacab</th>
                                    <th>Wilbin</th>
                                    <th>Shelter</th>
                                    <th>No. KK</th>
                                    <th>Kepala Keluarga</th>
                                    <th>Anak Ke</th>
                                    <th>Status Keaktifan</th>
                                    <th>Status Survey</th>
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
            var selectedShel = $('#shelterFilter').val();
            var valuekk = $('#formcariKK').val();

            $('#AnakBinaanTable').DataTable({
                processing : true,
                // searching : false,
                serverSide : true,
                ajax : {
                    url : "{{ url('admin/AnakBinaan') }}",
                    data: {
                        kacab : selectedKacab,
                        wilbin : selectedWil,
                        shelters : selectedShel,
                        noKK : valuekk,
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
                    { data: 'nama_lengkap_anak', name: 'nama_lengkap_anak'},
                    { data: 'agamaAnak', name: 'agamaAnak'},
                    { data: 'kacab', name: 'kacab'},
                    { data: 'wilayah_binaan', name: 'wilayah_binaan'},
                    { data: 'shelter', name: 'shelter'},
                    { data: 'no_kk', name: 'no_kk'},
                    { data: 'nama_ayah', name: 'nama_ayah'},
                    { data: 'anak_ke', name: 'anak_ke'},
                    {
                        data: 'status_aktif',
                        name: 'status_aktif',
                        render: function(data, type, row) {
                            if (data === null) {
                                return '<button type="button" onclick="tampil(' + row.id_anaks + ')" class="btn btn-sm btn-info">Tambah Status</button>';
                            } else {
                                return data ? 
                                'Aktif | <button type="button" title="Nonaktifkan" onclick="nonaktifkan(' + row.id_anaks + ')" class="btn btn-sm btn-outline-danger"><i class="bi bi-x"></i></button>'
                                    : 
                                'Tidak Aktif | <button type="button" title="Aktifkan" onclick="aktifkan(' + row.id_anaks + ')" class="btn btn-sm btn-outline-info"><i class="bi bi-check2"></i></button>';
                            }
                        }
                    },
                    { data: 'survey_status', name: 'survey_status'},
                    { data: 'action', name: 'action', orderable: false},
                ],
                order: [[0, 'asc']],
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
                },
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

        // Fungsi-fungsi untuk menangani klik pada tombol
        function fungsiExportExcel() {
            var currentDate = new Date();
            var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            var formattedDate = currentDate.toLocaleDateString('id-ID', options);

            // Ambil nilai dari elemen Select2
            var selectedValuesKacab = $('#kantorCabang').val();
            var selectedValuesStringKacab = selectedValuesKacab ? selectedValuesKacab.join(', ') : 'Kantor Cabang';

            var selectedValuesWilbin = $('#wilayahBinaan').val();
            var selectedValuesStringWilbin = selectedValuesWilbin ? selectedValuesWilbin.join(', ') : 'Wilayah Binaan';

            var selectedValuesShelter = $('#shelterFilter').val();
            var selectedValuesStringShelter = selectedValuesShelter ? selectedValuesShelter.join(', ') : 'Shelter';

            // Buat judul file Excel
            var excelTitle = "Data_" + formattedDate;

            // Inisialisasi DataTable dan ambil data yang sudah terfilter
            var table = $('#AnakBinaanTable').DataTable();
            var filteredData = table.rows({ search: 'applied' }).data().toArray();

            // Buat objek Excel menggunakan library SheetJS
            var judul = "Laporan Data Anak (" + formattedDate + ")";
            var ws = XLSX.utils.json_to_sheet(filteredData, {
                header: ['ID_Keluarga', 'id_anaks', 'no_kk', 'nama_lengkap_anak', 'agamaAnak', 'kacab', 'wilayah_binaan', 'shelter', 'nama_ayah', 'anak_ke', 'status_aktif', 'DiBuat', 'DiUbah'],
                origin: 'D9',
            });
        
            // Tambahkan judul ke file Excel
            XLSX.utils.sheet_add_aoa(ws, [[judul]], {origin: 'G4'});
            // Tambahkan nilai selectedValuesStringKacab ke worksheet di sel G5
            var startingRow = 5; // Baris awal untuk menambahkan judul kondisional

            // Tambahkan judul kondisional berdasarkan nilai
            if (selectedValuesStringKacab) {
                XLSX.utils.sheet_add_aoa(ws, [['Kacab: ' + selectedValuesStringKacab]], { origin: 'G' + startingRow });
                startingRow++;
            }
            if (selectedValuesStringWilbin) {
                XLSX.utils.sheet_add_aoa(ws, [['Wilbin: ' + selectedValuesStringWilbin]], { origin: 'G' + startingRow });
                startingRow++;
            }
            if (selectedValuesStringShelter) {
                XLSX.utils.sheet_add_aoa(ws, [['Shelter: ' + selectedValuesStringShelter]], { origin: 'G' + startingRow });
            }
        
            // Buat file Excel menggunakan workbook dan worksheet yang telah dibuat
            var wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');
        
            // Simpan file Excel
            XLSX.writeFile(wb, 'laporan_data_anak.xlsx');
        }

        $('#btn-export-excel').click(function () {
            fungsiExportExcel();
        });

        function fungsiExportCSV() {
            var table = $('#AnakBinaanTable').DataTable();
            var filteredData = table.rows({ search: 'applied' }).data().toArray();

            // Buat objek worksheet dari data yang sudah terfilter
            var ws = XLSX.utils.json_to_sheet(filteredData, {
                header: ['ID_Keluarga', 'id_anaks', 'no_kk', 'nama_lengkap_anak', 'agamaAnak', 'kacab', 'wilayah_binaan', 'shelter', 'nama_ayah', 'anak_ke', 'status_aktif', 'DiBuat', 'DiUbah']
            });
        
            // Konversi worksheet ke format CSV
            var csv = XLSX.utils.sheet_to_csv(ws);
        
            // Simpan file CSV
            var blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
            var link = document.createElement("a");
            var url = URL.createObjectURL(blob);
            link.href = url;
            link.setAttribute("download", "laporan_data_anak.csv");
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        $('#btn-export-csv').click(function () {
            fungsiExportCSV();
        });
    

        // Mengirim nilai Select2 Shelter ke server saat tombol filter ditekan
        $('#filterSemua').click(function () {
            // Mendapatkan nilai yang ter-filter
            selectedKacab = $('#kantorCabang').val();
            selectedWil = $('#wilayahBinaan').val();
            selectedShel = $('#shelterFilter').val();
                
            // Merusak DataTable dan memuat data dengan nilai yang ter-filter
            $('#AnakBinaanTable').DataTable().destroy();
            loadData(selectedKacab, selectedWil, selectedShel);
        });


        $('#btncariKK').click(function (event) {
            event.preventDefault(); // Mencegah aksi default formulir (refresh halaman)

            var valuekk = $('#formcariKK').val();

            $('#AnakBinaanTable').DataTable().destroy();
            loadData(valuekk);
        });

        function resetFilter() {
            // Hapus semua nilai yang dipilih di Select2
            $('#kantorCabang').val(null).trigger('change');
            $('#wilayahBinaan').val(null).trigger('change');
            $('#shelterFilter').val(null).trigger('change');

            // Destroy tabel data (gantilah '#tabelData' dengan ID atau kelas tabel Anda)
            $('#AnakBinaanTable').DataTable().destroy();

            // Misalnya, inisialisasi kembali tabel dengan ID 'AnakBinaanTable'
            loadData();
        }

        function resetFilterKK() {
            // Hapus semua nilai yang dipilih di Select2
            $('#formcariKK').val(null).trigger('change');

            // Destroy tabel data (gantilah '#tabelData' dengan ID atau kelas tabel Anda)
            $('#AnakBinaanTable').DataTable().destroy();

            // Misalnya, inisialisasi kembali tabel dengan ID 'AnakBinaanTable'
            loadData();
        }

        $('#resetFilter').click(function () {
            resetFilter();
        });

        $('#resetKK').click(function () {
            event.preventDefault();
            resetFilterKK();
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
                    var oTable = $('#AnakBinaanTable').DataTable();
                    oTable.ajax.reload(false);
                });
            }
        })
    }

    //Menghapus data keluarga
    function delete_datakeluarga(id){
        if (confirm("Are you sure you want to delete")==true) {
            var id = id;
            $.ajax({
                type:"POST",
                url: "{{ url('admin/calonAnakBinaanDelete') }}",
                data: {id:id},
                dataType: 'json',
                success: function(res) {
                    var oTable = $('#AnakBinaanTable').DataTable();
                    oTable.ajax.reload(false); //agar tidak perlu refresh halaman
                }
            });
        }
    }

    //menampilkan detail data keluarga
    function detailDatakeluarga(id, id_anaks){

        window.location.href = `{{ url('admin/calonAnakBinaanDetail') }}/${id}/${id_anaks}`;
    }
    
    function tampil(id_anaks) {
        Swal.fire({
            title: 'Pilih Opsi',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3F74E5',
            cancelButtonColor: '#FFC100',
            confirmButtonText: 'Aktif',
            cancelButtonText: 'Tidak Aktif',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.updateStatusAktif') }}",
                    data: {
                        id_anaks: id_anaks,
                        status_aktif: 1,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 700,
                            });
                            // Reload DataTable setelah berhasil mengupdate
                            $('#AnakBinaanTable').DataTable().ajax.reload();
                        } else {
                            Swal.showValidationMessage(data.message);
                            console.log('ErrorUpdate:', data.message);
                        }
                    },
                    error: function (error) {
                        Swal.fire({
                            title: 'Gagal!',
                            text: 'Gagal mengupdate status anak. Periksa Konsol',
                            icon: 'error',
                        });
                        console.log('Error:', error);
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.updateStatusAktif') }}",
                    data: {
                        id_anaks: id_anaks,
                        status_aktif: 0,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 700,
                            });
                            // Reload DataTable setelah berhasil mengupdate
                            $('#AnakBinaanTable').DataTable().ajax.reload();
                        } else {
                            Swal.showValidationMessage(data.message);
                            console.log('ErrorUpdate:', data.message);
                        }
                    },
                    error: function (error) {
                        Swal.fire({
                            title: 'Gagal!',
                            text: 'Gagal mengupdate status anak. Periksa Konsol',
                            icon: 'error',
                        });
                        console.log('Error:', error);
                    }
                });
            }
        });
    }

    function aktifkan(id_anaks) {
        $.ajax({
            type: "POST",
            url: "{{ route('admin.updateStatusAktif') }}",
            data: {
                id_anaks: id_anaks,
                status_aktif: 1,
                _token: "{{ csrf_token() }}"
            },
            success: function (data) {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 700,
                    });
                    // Reload DataTable setelah berhasil mengupdate
                    $('#AnakBinaanTable').DataTable().ajax.reload();
                } else {
                    console.log('ErrorUpdate:', data.message);
                }
            },
            error: function (error) {
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Gagal mengupdate status anak. Periksa Konsol',
                    icon: 'error',
                });
                console.log('Error:', error);
            }
        });
    }

    function nonaktifkan(id_anaks) {
        $.ajax({
            type: "POST",
            url: "{{ route('admin.updateStatusAktif') }}",
            data: {
                id_anaks: id_anaks,
                status_aktif: 0,
                _token: "{{ csrf_token() }}"
            },
            success: function (data) {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 700,
                    });
                    // Reload DataTable setelah berhasil mengupdate
                    $('#AnakBinaanTable').DataTable().ajax.reload();
                } else {
                    console.log('ErrorUpdate:', data.message);
                }
            },
            error: function (error) {
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Gagal mengupdate status anak. Periksa Konsol',
                    icon: 'error',
                });
                console.log('Error:', error);
            }
        });
    }


</script>

@endsection
