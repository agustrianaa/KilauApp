@extends('layout.mainSettings')
@section('contentSettings')

<style>
    #btntmbhKaCab {
        background-color: rgb(0, 119, 255);
        border: transparent;
    }
    #btntmbhKaCab:hover {
        background-color: rgb(0, 97, 207);
        border: transparent;
    }
    #tutupModalbtn {
        background-color: transparent;
        border-color: red;
        color: red;
        transition: 0.1s;
    }
    #tutupModalbtn:hover {
        background-color: red;
        border-color: red;
        color: white;
        transition: 0.1s;
    }
</style>

<div class="content-wrapper background">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Data Kantor Cabang</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="col-12 mb-2">
                        <div class="row">
                            <div class="col-6">
                                <a href="{{ route('admin.tambahKacabView') }}" class="btn btn-md btn-info text-white fw-bold" id="btntmbhKaCab">Tambah Kantor Cabang +</a>
                            </div>
                            <div class="col-6"></div>
                        </div>
                    </div>
                    <hr class="text-black mb-4">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered text-center" id="KacabTable">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">No</th>
                                    <th style="width: 250px">Nama Kantor Cabang</th>
                                    <th>No. Telp</th>
                                    <th>Alamat</th>
                                    <th>Provinsi</th>
                                    <th>Kabupaten</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th style="width: 50px;">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Modal Edit -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Kantor Cabang</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form id="editForm" method="POST">
                                @csrf
                                <div class="col-12">
                                    <div class="row">
                                        <input type="hidden" name="id_kacab" id="id_kacab">
                                        <div class="col-12 mb-3">
                                            <label for="editNamaKacab" class="form-label">Nama Kantor Cabang</label>
                                            <input type="text" class="form-control" id="editNamaKacab" name="nama_kacab">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="editNoTelpKacab" class="form-label">Nomor Telepon</label>
                                            <input type="text" class="form-control" id="editNoTelpKacab" name="no_telp">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="editAlamatKacab" class="form-label">Alamat</label>
                                            <input type="text" class="form-control" id="editAlamatKacab" name="alamat">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="editProvinsi" class="form-label">Provinsi</label>
                                            <input type="text" class="form-control" id="editProvinsi" name="provinsi">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="editKabupaten" class="form-label">Kabupaten</label>
                                            <input type="text" class="form-control" id="editKabupaten" name="kabupaten">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="editKecamatan" class="form-label">Kecamatan</label>
                                            <input type="text" class="form-control" id="editKecamatan" name="kecamatan">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="editKelurahan" class="form-label">Kelurahan</label>
                                            <input type="text" class="form-control" id="editKelurahan" name="kelurahan">
                                        </div>
        
                                        <div class="col-12">
                                            <div class="text-center">
                                                <button id="tutupModalbtn" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="button" class="btn btn-primary" onclick="updateKacab()">Simpan Perubahan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Modal -->

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

        $('#KacabTable').DataTable({
            processing : true,
            // searching : false,
            serverSide : true,
            ajax : {
                url : "{{ url('admin/Settings/Data_Wilayah/KaCab') }}",
            },
            columns : [
                {
                    data: null,
                    name: 'id',
                    render: function(data, type, row, meta) {
                        return meta.row + 1; // Menggunakan nomor baris sebagai nomor urut
                    }
                },
                { data: 'nama_kacab', name: 'nama_kacab'},
                { data: 'no_telp', name: 'no_telp'},
                { data: 'alamat', name: 'alamat'},
                { data: 'provinsi', name: 'provinsi'},
                { data: 'kabupaten', name: 'kabupaten'},
                { data: 'kecamatan', name: 'kecamatan'},
                { data: 'kelurahan', name: 'kelurahan'},
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
            },
        }); // End DataTable
    }); // End Ajax

    // function deleteKacab(id_kacab){
    //     if (confirm("Are you sure you want to delete")==true) {
    //         var id = id_kacab;
    //         $.ajax({
    //             type:"POST",
    //             url: "{{ url('admin/deleteKacab') }}",
    //             data: {id:id},
    //             dataType: 'json',
    //             success: function(res) {
    //                 var oTable = $('#CalonAnakBinaanTable').DataTable();
    //                 oTable.ajax.reload(false); //agar tidak perlu refresh halaman
    //             }
    //         });
    //     }
    // }

    function editKacab(id_kacab) {
        // Lakukan request AJAX untuk mendapatkan data kantor cabang berdasarkan ID
        $.ajax({
            type: "GET",
            url: "{{ route('admin.getKacab') }}",
            data: {
                id_kacab: id_kacab,
            },
            success: function (data) {
                // Isi modal dengan data dari response
                $('#editNamaKacab').val(data.nama_kacab);
                $('#editNoTelpKacab').val(data.no_telp);
                $('#editAlamatKacab').val(data.alamat);
                $('#editProvinsi').val(data.provinsi);
                $('#editKabupaten').val(data.kabupaten);
                $('#editKecamatan').val(data.kecamatan);
                $('#editKelurahan').val(data.kelurahan);

                // Tampilkan modal
                $('#editModal').modal('show');
            },
            error: function (data) {
                // Handle error jika diperlukan
            }
        });
    }

    // Fungsi untuk menyimpan perubahan setelah mengedit
    function updateKacab(id_kacab) {
        // Lakukan request AJAX untuk menyimpan perubahan
        $.ajax({
            type: "POST",
            url: "{{ url('admin//updateKacab/{id_kacab}') }}",
            data: $('#editForm').serialize(),
            success: function (data) {
                $('#editModal').modal('hide');
            },
            error: function (data) {
                // Handle error jika diperlukan
                console.log(data.responseText);
            }
        });
    }

    function deleteKacab(id_kacab) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak akan dapat mengembalikan ini!",
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
                    url: "{{ url('admin/deleteKacab') }}",
                    data: {
                        id_kacab: id_kacab,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Kantor Cabang berhasil dihapus.',
                            icon: 'success',
                        });
                        // Tambahan: Reload DataTable setelah menghapus
                        $('#KacabTable').DataTable().ajax.reload();
                    },
                    error: function (data) {
                        Swal.fire({
                            title: 'Gagal!',
                            text: 'Gagal menghapus Kantor Cabang.',
                            icon: 'error',
                        });
                    }
                });
            }
        });
    }
</script>

@endsection