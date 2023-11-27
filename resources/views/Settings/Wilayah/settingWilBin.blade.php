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
    /* Atur lebar dan tinggi notifikasi */
    .swal2-popup {
        background-color: rgb(255, 255, 255);
        border-radius: 30px;
        width: 300px; /* Ganti dengan lebar yang diinginkan */
        height: auto; /* Sesuaikan dengan kebutuhan, atau biarkan otomatis */
    }

    /* Atur font size untuk judul */
    .swal2-title {
        font-size: 20px; /* Ganti dengan ukuran font yang diinginkan */
    }

    /* Atur font size untuk teks */
    .swal2-content {
        font-size: 16px; /* Ganti dengan ukuran font yang diinginkan */
    }
    .breadcrumb-item a {
    text-decoration: none;
    color: black;
    transition: 0.1s;
    }

    .breadcrumb-item a:hover {
        text-decoration: none;
        color: rgb(0, 136, 255);
        font-size: 18px;
        transition: 0.1s;
    }
</style>

<div class="content-wrapper background">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Wilayah Binaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Data Wilayah Binaan</li>
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
                                <a href="{{ route('admin.tambahWilBinView') }}" class="btn btn-md btn-info text-white fw-bold" id="btntmbhKaCab">Tambah Wilayah Binaan +</a>
                            </div>
                            <div class="col-6"></div>
                        </div>
                    </div>
                    <hr class="text-black mb-4">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered text-center" id="WilbinTable">
                            <thead>
                                <tr>
                                    <th style="width: 70px">No</th>
                                    <th>Nama Wilayah Binaan</th>
                                    <th>Kantor Cabang</th>
                                    <th style="width: 200px;">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Edit -->
    <div class="modal fade" id="editModalWilbin" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Wilayah Binaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="javascript:void(0)" id="wilbinform" method="PUT">
                    @csrf
                        <div class="col-12">
                            <div class="row">
                                <input type="hidden" name="idforwilbin" id="idforwilbin">
                                <div class="col-12 mb-3">
                                    <label for="editNamaWilbin" class="form-label">Nama Wilayah Binaan</label>
                                    <input type="text" class="form-control" id="editNamaWilbin" name="nama_wilbin">
                                </div>
                                <div class="col-12">
                                    <div class="text-center">
                                        <button id="tutupModalbtn" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary" onclick="updateWilbin()">Simpan Perubahan</button>
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

        $('#WilbinTable').DataTable({
            processing : true,
            // searching : false,
            serverSide : true,
            ajax : {
                url : "{{ url('admin/Settings/Data_Wilayah/WilBin') }}",
            },
            columns : [
                {
                    data: null,
                    name: 'id',
                    render: function(data, type, row, meta) {
                        return meta.row + 1; // Menggunakan nomor baris sebagai nomor urut
                    }
                },
                { data: 'nama_wilbin', name: 'nama_wilbin'},
                { data: 'nama_kacab', name: 'nama_kacab'},
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

    function getWilbinData(id_wilbin) {
        $.ajax({
            url: "{{ route('admin.getWilbin', '') }}/" + id_wilbin,
            type: 'GET',
            success: function (data) {
                // Mengisi formulir modal dengan data yang diterima dari controller
                $('#idforwilbin').val(data.id_wilbin);
                $('#editNamaWilbin').val(data.nama_wilbin);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    }

    function updateWilbin() {
        // Ambil data dari formulir modal
        var formData = $('#wilbinform').serialize();

        // Kirim permintaan Ajax untuk memperbarui data
        $.ajax({
            url: "{{ route('admin.updateWilbin', '') }}/" + $('#idforwilbin').val(),
            type: 'PUT',
            data: formData,
            success: function (data) {
                // Tampilkan pesan sukses atau error jika perlu
                Swal.fire({
                    title: 'Update!',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1200,
                });
                // Tutup modal setelah pembaruan berhasil
                $('#editModalWilbin').modal('hide');
                // Reload DataTable untuk menampilkan perubahan
                $('#WilbinTable').DataTable().ajax.reload();
            },
            error: function (data) {
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Gagal memperbarui Kantor Cabang. Periksa Konsol',
                    icon: 'error',
                });
                console.log('Error:', data);
            }
        });
    }

    function deleteWilbin(id_wilbin) {
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
                    url: "{{ url('admin/deleteWilbin') }}",
                    data: {
                        id_wilbin: id_wilbin,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        Swal.fire({
                            title: 'Berhasil dihapus!',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1200,
                        });
                        $('#WilbinTable').DataTable().ajax.reload();
                    },
                    error: function (data) {
                        Swal.fire({
                            title: 'Gagal!',
                            text: 'Gagal menghapus Wilayah Binaan. Periksa Konsol',
                            icon: 'error',
                        });
                        console.log('Error:', data);
                    }
                });
            }
        });
    }
</script>

@endsection