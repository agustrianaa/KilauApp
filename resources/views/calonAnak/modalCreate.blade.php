<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAMBAH POST</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="name" class="control-label">Nama</label>
                    <input type="text" class="form-control" id="nama">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama"></div>
                </div>


                <div class="form-group">
                    <label class="control-label">Shelter</label>
                    <textarea class="form-control" id="shelter" rows="4"></textarea>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-shelter"></div>
                </div>

                <div class="form-group">
                    <label class="control-label">No KK</label>
                    <textarea class="form-control" id="no_kk" rows="4"></textarea>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-no_kk"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary" id="store">SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<script>
    // $(document).ready( function () {
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });

    //     load_data();

    //     function load_data(){
    //       var fagama = $('#fruit-select').val();
    //     //   var fjenis_kelamin = $('#fjenis_kelamin').val();
    //     //   var fstatus_binaan = $('#fstatus_binaan').val();

    //       $('#table').DataTable({
    //         processing: true,
    //         serverSide: true,
    //         ajax: {
    //           url : "{{ url('calon') }}",
    //           data: {
    //             nama : fagama
    //             // jenis_kelamin : fjenis_kelamin,
    //             // status_binaan : fstatus_binaan,
    //           }
    //         },
    //         columns: [
    //             { data: 'nama', name: 'nama'},
    //             { data: 'shelter', name: 'shelter'},
    //             { data: 'no_kk', name: 'no_kk'},
    //             { data: 'action', name: 'action', orderable: false},
    //         ],
    //         order: [[0, 'asc']],
    //         paging: true,
    //         pageLength: 10 // Menyeting jumlah entri yang ditampilkan menjadi 10
    //     });
    //     }

    //     $('#fruit-select').on('change', function(){
    //         $('#table').dataTable().destroy()
    //         load_data()
    //     })
        // $('#fjenis_kelamin').on('change', function(){
        //     $('#ajax-crud-datatable').DataTable().destroy()
        //     load_data()
        // })
        // $('#fstatus_binaan').on('change', function(){
        //     $('#ajax-crud-datatable').DataTable().destroy()
        //     load_data()
        // })

        // $('#resetfilters').click(function() {
        //     // Mengatur nilai-nilai semua elemen select ke nilai kosong
        //     $('#fagama').val('');
        //     $('#fjenis_kelamin').val('');
        //     $('#fstatus_binaan').val('');

        //     // Memuat ulang data dengan filter kosong
        //     $('#ajax-crud-datatable').DataTable().destroy();
        //     load_data();
        // });
    // });

    $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Fungsi untuk menginisialisasi DataTable
    function initDataTable() {
        $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route(calon.index) }}', // Gunakan route() untuk memanggil URL
                data: {
                    nama: $('#fruit-select').val()
                }
            },
            columns: [
                { data: 'nama', name: 'nama' },
                { data: 'shelter', name: 'shelter' },
                { data: 'no_kk', name: 'no_kk' },
                { data: 'action', name: 'action', orderable: false },
            ],
            order: [[0, 'asc']],
            paging: true,
            pageLength: 10 // Menyeting jumlah entri yang ditampilkan menjadi 10
        });
    }

    // Memanggil fungsi initDataTable untuk menginisialisasi DataTable pada saat halaman dimuat
    initDataTable();

    // Event handler ketika elemen select dengan ID "fruit-select" berubah
    $('#fruit-select').on('change', function () {
        // Hancurkan DataTable yang ada dan inisialisasikan ulang
        $('#table').DataTable().destroy();
        initDataTable();
    });

    // Event handler untuk tombol "Create Post"
    $('body').on('click', '#btn-create-post', function () {
        // Buka modal
        $('#modal-create').modal('show');
    });

    // Event handler untuk tombol "Store"
    $('#store').click(function (e) {
        e.preventDefault();

        // Mengambil nilai dari input
        let nama = $('#nama').val();
        let shelter = $('#shelter').val();
        let no_kk = $('#no_kk').val();
        let token = $("meta[name='csrf-token']").attr("content");

        // Ajax request untuk menyimpan data
        $.ajax({
            url: "{{ route('calon.store') }}",
            type: "POST",
            cache: false,
            data: {
                "nama": nama,
                "shelter": shelter,
                "no_kk": no_kk,
                "_token": token
            },
            success: function (response) {
                // Menampilkan pesan sukses
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });

                // Membuat HTML untuk data baru
                let post = `
                    <tr id="index_${response.data.id}">
                        <td>${response.data.nama}</td>
                        <td>${response.data.shelter}</td>
                        <td>${response.data.no_kk}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-an" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-an" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;

                // Menambahkan data baru ke tabel
                $('#table-posts').prepend(post);

                // Mengosongkan form
                $('#nama').val('');
                $('#shelter').val('');
                $('#no_kk').val('');

                // Menutup modal
                $('#modal-create').modal('hide');
            },
            error: function (error) {
                // Menampilkan pesan kesalahan
                if (error.responseJSON.nama) {
                    $('#alert-nama').removeClass('d-none');
                    $('#alert-nama').addClass('d-block');
                    $('#alert-nama').html(error.responseJSON.nama[0]);
                } else {
                    $('#alert-nama').removeClass('d-block');
                    $('#alert-nama').addClass('d-none');
                }

                if (error.responseJSON.shelter) {
                    $('#alert-shelter').removeClass('d-none');
                    $('#alert-shelter').addClass('d-block');
                    $('#alert-shelter').html(error.responseJSON.shelter[0]);
                } else {
                    $('#alert-shelter').removeClass('d-block');
                    $('#alert-shelter').addClass('d-none');
                }

                if (error.responseJSON.no_kk) {
                    $('#alert-no_kk').removeClass('d-none');
                    $('#alert-no_kk').addClass('d-block');
                    $('#alert-no_kk').html(error.responseJSON.no_kk[0]);
                } else {
                    $('#alert-no_kk').removeClass('d-block');
                    $('#alert-no_kk').addClass('d-none');
                }
            }
        });
    });

    $(document).on('click', '#btn-delete-an', function() {
        let post_id = $(this).data('id');
        let token   = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "ingin menghapus data ini!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'TIDAK',
            confirmButtonText: 'YA, HAPUS!'
        }).then((result) => {
            if (result.isConfirmed) {

                console.log('test');

                //fetch to delete data
                $.ajax({

                    url: `/calon/${post_id}`,
                    type: "DELETE",
                    cache: false,
                    data: {
                        "_token": token
                    },
                    success:function(response){

                        //show success message
                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });

                        //remove post on table
                        $('#table').DataTable().draw();
                    }
                });


            }
        })
    })
});


    //button create post event

    // $('#fruit-select').on('change', function() {
    //     const ambil = $('#fruit-select').val();
    //     $.ajax({
    //         url: '/calon',
    //         type: 'GET', // Anda ingin mengirim data melalui POST request
    //         data: { 'ambil': ambil }, // Kirim data 'ambil' ke controller
    //         success: function(data) {
    //             // Tindakan yang akan dilakukan setelah permintaan berhasil
    //             console.log(data);
    //             $('body').empty();
    //             $('body').html(data);
    //         }
    //     });
    // });

</script>
