@extends('layout.main')
@section('content')

<style>
    .float-end.mt-3 a {
        text-decoration: none;
        color: black;
    }

    .float-end.mt-3 a:hover {
        color: rgb(99, 64, 188);
    }

    *::selection {
        background: rgb(173, 141, 255);
        color: #fff;
    }

</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<div class="content-wrapper mr-1">
    <section class="content ml-1">
        <div class="container-fluid">
            <div class="row">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 mt-5">
                            <h1 class="float-start">Data Calon Anak Binaan</h1>
                        </div>
                        <div class="col-lg-6 mt-5">
                            <h5 class="float-end mt-3">
                                <a class="" href="{{ route('admin.dashboard') }}">Home</a>
                                    / 
                                <a href="">Data Calon Anak Binaan</a>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>TTL</th>
                                    <th>Shelter</th>
                                    <th>No KK</th>
                                    <th>Kepala Keluarga</th>
                                    <th>Anak Ke</th>
                                    <th>Status Binaan</th>
                                    <th>Status Validasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
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
     $(document).ready( function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        selectedAgama = getSelectedValues('#fagama');
        selectedJenisKelamin = getSelectedValues('#fjenis_kelamin');
        selectedStatusBinaan = getSelectedValues('#fstatus_binaan');

        load_data(selectedAgama, selectedJenisKelamin, selectedStatusBinaan);
      

        function load_data(){
          var fagama = $('#fagama').val();
          var fjenis_kelamin = $('#fjenis_kelamin').val();
          var fstatus_binaan = $('#fstatus_binaan').val();

          $('#tabeldata').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url : "{{ url('admin/tabeldata') }}",
              data: {
                agama : fagama,
                jenis_kelamin : fjenis_kelamin,
                status_binaan : fstatus_binaan,
              }
            },
            columns: [
                { data: 'id', name: 'id'},
                { data: 'name_ayah', name: 'name_ayah'},
                { data: 'agama', name: 'agama'},
                { data: 'ttl', name: 'ttl'},
                { data: 'jenis_kelamin', name: 'jenis_kelamin'},
                { data: 'anak_ke', name: 'anak_ke'},
                { data: 'kepala_keluarga', name: 'kepala_keluarga'},
                { data: 'status_binaan', name: 'status_binaan'},
                { data: 'action', name: 'action', orderable: false},
            ],
            order: [[0, 'asc']],
            paging: true,
            pageLength: 10 // Menyeting jumlah entri yang ditampilkan menjadi 10
        });
        }

        function getSelectedValues(selectId) {
          var selectedValues = [];
          $(selectId + ' option:selected').each(function () {
              selectedValues.push($(this).val());
          });
          return selectedValues;
        }
        
        // Tombol "Filter" ditekan
        $('#filters').click(function () {
            // Mengambil nilai-nilai select yang telah dipilih sebelumnya
            var fagama = selectedAgama;
            var fjenis_kelamin = selectedJenisKelamin;
            var fstatus_binaan = selectedStatusBinaan;
        
            // Mengambil nilai-nilai checkbox yang dicentang
            var checkedCheckboxes = $('.checkbox-filter:checked');
            var checkedValues = [];
        
            checkedCheckboxes.each(function () {
                checkedValues.push($(this).val());
            });
          
            // Menambahkan nilai-nilai checkbox yang dicentang ke dalam filter
            fagama = fagama.concat(checkedValues);
          
            // Meng-"destroy" tabel lama
            $('#tabeldata').DataTable().destroy();
          
            // Memuat data dengan filter
            load_data(fagama, fjenis_kelamin, fstatus_binaan);
        });


        $('#resetfilters').click(function() {
            // Mengatur nilai-nilai semua elemen select ke nilai kosong
            $('#fagama').val('');
            $('#fjenis_kelamin').val('');
            $('#fstatus_binaan').val('');

            // Memuat ulang data dengan filter kosong
            $('#tabeldata').DataTable().destroy();
            load_data();
        });
    });
</script>

@endsection