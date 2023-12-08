@extends('layout.main')
@section('content')

<div class="content-wrapper background">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
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
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
        <a class="btn btn-success mb-2" onClick="add()" href="javascript:void(0)"><i class="bi bi-plus"></i> Tambah data</a>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover" id="tutor">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Pendidikan</th>
                                    <th>Email</th>
                                    <th>No HP</th>
                                    <th>Mata Pelajaran</th>
                                    <!-- <th>Detail</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
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
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.all.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#tutor').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.tutor')}}",

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
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'no_hp',
                    name: 'no_hp'
                },
                {
                    data: 'mapel',
                    name: 'mapel'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false, searchable: false
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

        $('#tutor').on('click', '.delete', function () {
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Delete Record?',
                    text: 'Are you sure you want to delete this record?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Ajax untuk menghapus tutor
                        $.ajax({
                            type: "POST",
                            url: "{{ route('admin.delete-tutor') }}",
                            data: { id: id },
                            dataType: 'json',
                            success: function (res) {
                                // Perbarui tabel setelah penghapusan berhasil
                                table.ajax.reload();
                                // Tampilkan pesan sukses (opsional)
                                Swal.fire('Deleted!', 'The record has been deleted.', 'success');
                            },
                            error: function (xhr, status, error) {
                                // Tampilkan pesan kesalahan (opsional)
                                Swal.fire('Error!', 'Failed to delete the record.', 'error');
                            }
                        });
                    }
                });
            });
    });

    function add(){
        window.location.href = "{{ route('admin.add-tutor') }}"
    }

    function viewTutor(id){
        console.log('ID', id);
        var url = '/admin/viewTutor/' + id;

        $.ajax({
            url: url,
            type : 'GET',
            dataType : 'json',
            success : function(response){
                console.log(response);
                var tutorData = response.tutor;

                $('#tutorDetail').html('<table class="table"> <tr> <td> Nama Tutor </td> <td>' + ': ' + tutorData.nama + '</td> </tr> <tr> <td>' +
                'No HP </td> <td>' + ': ' + tutorData.no_hp + '</td> </tr> <tr> <td>' +
                'Email </td> <td>' + ': ' + tutorData.email + '</td> </tr> <tr> <td>' +
                'Alamat  </td> <td>' + ': ' + tutorData.alamat + '</td> </tr> <tr> <td>' +
                'Status </td> <td' + ':' + tutorData.status + '</td> </tr> <tr> <td>' +
                '</table>')
                $('#tutorModal').modal('show');
            }
        })
        
    }

    function editTutor(id){
        console.log('ID:', id);
    }

    function hapusTutor(id){
        console.log('ID:', id);
        // Ganti konfirmasi dengan SweetAlert
        if (confirm("Delete Record?") == true) {
                // var id = id;
                // Ajax
            $.ajax({
                type: "POST",
                url: "{{ route('admin.delete-tutor') }}",
                data: { id: id },
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