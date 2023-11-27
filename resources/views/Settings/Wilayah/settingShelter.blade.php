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
                    <h1 class="m-0">Data Shelter</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Data Shelter</li>
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
                                <a href="{{ route('admin.tambahShelterView') }}" class="btn btn-md btn-info text-white fw-bold" id="btntmbhKaCab">Tambah Shelter +</a>
                            </div>
                            <div class="col-6"></div>
                        </div>
                    </div>
                    <hr class="text-black mb-4">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered text-center" id="ShelterTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Shelter</th>
                                    <th>Nama Koordinator</th>
                                    <th>No. HP</th>
                                    <th>Alamat Shelter</th>
                                    <th>Wilayah Binaan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- Modal Edit -->
        <div class="modal fade" id="editModalShelter" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Shelter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
    
                        <form action="javascript:void(0)" id="shelterform" method="PUT">
                        @csrf
                            <div class="col-12">
                                <div class="row">
                                    <input type="hidden" name="idforshelter" id="idforshelter">
                                    <div class="col-12 mb-3">
                                        <label for="editNamaShelter" class="form-label">Nama Shelter</label>
                                        <input type="text" class="form-control" id="editNamaShelter" name="nama_shelter">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="editNamaKoor" class="form-label">Nama Koordinator</label>
                                        <input type="text" class="form-control" id="editNamaKoor" name="nama_koordinator">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="editNoHP" class="form-label">No. HP</label>
                                        <input type="number" class="form-control" id="editNoHP" name="no_hp">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="editAlamatShelter" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" id="editAlamatShelter" name="alamat">
                                    </div>
                                    <div class="col-12">
                                        <div class="text-center">
                                            <button id="tutupModalbtn" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary" onclick="updateShelter()">Simpan Perubahan</button>
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

        $('#ShelterTable').DataTable({
            processing : true,
            // searching : false,
            serverSide : true,
            ajax : {
                url : "{{ url('admin/Settings/Data_Wilayah/Shelter') }}",
            },
            columns : [
                {
                    data: null,
                    name: 'id',
                    render: function(data, type, row, meta) {
                        return meta.row + 1; // Menggunakan nomor baris sebagai nomor urut
                    }
                },
                { data: 'nama_shelter', name: 'nama_shelter'},
                { data: 'nama_koordinator', name: 'nama_koordinator'},
                { data: 'no_hp', name: 'no_hp'},
                { data: 'alamat', name: 'alamat'},
                { data: 'nama_wilbin', name: 'nama_wilbin'},
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

    'id_shelter'
    'nama_shelter'
    'nama_koordinator'
    'no_hp'
    'alamat'

    function getShelterData(id_shelter) {
        $.ajax({
            url: "{{ route('admin.getShelter', '') }}/" + id_shelter,
            type: 'GET',
            success: function (data) {
                // Mengisi formulir modal dengan data yang diterima dari controller
                $('#idforshelter').val(data.id_shelter);
                $('#editNamaShelter').val(data.nama_shelter);
                $('#editNamaKoor').val(data.nama_koordinator);
                $('#editNoHP').val(data.no_hp);
                $('#editAlamatShelter').val(data.alamat);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    }

    function updateShelter() {
        // Ambil data dari formulir modal
        var formData = $('#shelterform').serialize();

        // Kirim permintaan Ajax untuk memperbarui data
        $.ajax({
            url: "{{ route('admin.updateShelter', '') }}/" + $('#idforshelter').val(),
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
                $('#editModalShelter').modal('hide');
                // Reload DataTable untuk menampilkan perubahan
                $('#ShelterTable').DataTable().ajax.reload();
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

    function deleteShelter(id_shelter) {
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
                    url: "{{ url('admin/deleteShelter') }}",
                    data: {
                        id_shelter: id_shelter,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        Swal.fire({
                            title: 'Berhasil dihapus!',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1200,
                        });
                        $('#ShelterTable').DataTable().ajax.reload();
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