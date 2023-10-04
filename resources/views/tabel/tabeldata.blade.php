@extends('layout.main')
@section('content')

  <!-- Content Wrapper. Contains page content -->
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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right mb-2">
                        <a class="btn btn-primary" onClick="add()" href="javascript:void(0)">Tambah Data+</a>
                    </div>
                </div>
                <div class="col-lg-12 mt-4">
                  <h3>Filter</h3>
                </div>
                <div class="col-lg-12">
                  <div class="row align-items-end">
                    <div class="col-lg-2 mb-2">
                      <label class="form-label select-label">Agama</label>
                        <select class="form-select" id="fagama" multiple="multiple">
                          <option value="" disabled selected>-Pilih-</option>
                          <option value="Islam">Islam</option>
                          <option value="Kristen Protestan">Kristen Protestan</option>
                          <option value="Kristen Katolik">Kristen Katolik</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Buddha"> Buddha</option>
                          <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div class="col-lg-2 mb-2">
                      <label>Jenis Kelamin</label>
                        <select class="form-select" id="fjenis_kelamin" multiple>
                          <option value="" disabled selected>-Pilih-</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-lg-2 mb-2">
                      <label>Status Binaan</label>
                        <select class="form-select" id="fstatus_binaan" multiple>
                          <option value="" disabled selected>-Pilih-</option>
                          <option value="PB">PB</option>
                          <option value="NPB">NPB</option>
                          <option value="CPB">CPB</option>
                          <option value="BCPB">BCPB</option>
                        </select>
                    </div>
                    <div class="col-lg-1 mb-2">
                      <button type="button" class="btn btn-outline-info" id="filters">Filter</button>
                    </div>
                    <div class="col-lg mb-2">
                      <button type="button" class="btn btn-outline-danger" id="resetfilters">Reset</button>
                    </div>
                  </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
          <div class="card">
            <div class="card-body">
              <div class="table-responsive text-nowrap">
                <table class="table table-bordered" id="tabeldata">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Agama</th>
                            <th>TTL</th>
                            <th>Jenis Kelamin</th>
                            <th>Anak Ke</th>
                            <th>Kepala Keluarga</th>
                            <th>Status Binaan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
    
        <!-- Modal -->
        <div class="modal fade" id="tambah-modal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Anak Binaan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="javascript:void(0)" id="tabeldataForm" name="tabeldataForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Nama</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama..." maxlength="50" required="">
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="name" class="col-sm-2 control-label">Agama</label>
                              <div class="col-sm-12">
                                  <select class="form-select" id="agama" name="agama" required="">
                                    <option value="" disabled selected>-Pilih-</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha"> Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="name" class="col-sm-2 control-label text-nowrap">Tempat dan Tanggal Lahir</label>
                              <div class="col-sm-12">
                                <div class="row">
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" id="teml" name="teml" placeholder="Tempat Lahir..." required="">
                                  </div>
                                  <div class="col-md-6">
                                      <input type="date" class="form-control" id="tgll" name="tgll" required="">
                                  </div>
                                </div>
                              </div>
                            </div>                                                 
                            <div class="form-group">
                              <label for="name" class="col-sm-2 control-label">Jenis Kelamin</label>
                              <div class="col-sm-12">
                                  <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required="">
                                    <option value="" disabled selected>-Pilih-</option>
                                      <option value="Laki-Laki">Laki-Laki</option>
                                      <option value="Perempuan">Perempuan</option>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="name" class="col-sm-2 control-label">Anak Ke</label>
                              <div class="col-sm-12">
                                  <input type="number" class="form-control" id="anak_ke" name="anak_ke" placeholder="Anak Ke..." required="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="name" class="col-sm-2 control-label text-nowrap">Kepala Keluarga</label>
                              <div class="col-sm-12">
                                  <input type="text" class="form-control" id="kepala_keluarga" name="kepala_keluarga" placeholder="Kepala Keluarga..." required="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="name" class="col-sm-2 control-label">Status Binaan</label>
                              <div class="col-sm-12">
                                  <select class="form-select" id="status_binaan" name="status_binaan" required="">
                                    <option value="" disabled selected>-Pilih-</option>
                                    <option value="PB">PB</option>
                                    <option value="NPB">NPB</option>
                                    <option value="CPB">CPB</option>
                                    <option value="BCPB">BCPB</option>
                                  </select>
                              </div>
                            </div>                                                                                          
                            <div class="col-sm-offset-2 col-sm-10"><br/>
                                <button type="submit" class="btn btn-primary" id="btn-save">Save</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer"></div>
                </div>
            </div>
        </div><!-- End Modal -->
    </section><!-- End Main content -->
</div><!-- End content-wrapper -->
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.all.min.js"></script>

<script type="text/javascript">
    $(document).ready( function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
         // Variabel untuk menyimpan nilai-nilai pilihan select
        var selectedAgama = [];
        var selectedJenisKelamin = [];
        var selectedStatusBinaan = [];

        load_data(agama, jenis_kelamin, status_binaan);
      

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
                { data: 'name', name: 'name'},
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

        
        // Tombol "Filter" ditekan
        $('#filters').click(function () {
          // Mengambil nilai-nilai select yang telah dipilih sebelumnya
          var fagama = selectedAgama;
          var fjenis_kelamin = selectedJenisKelamin;
          var fstatus_binaan = selectedStatusBinaan;
        
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
  
    function add(){
        $('#tabeldataForm').trigger("reset");
        $('#TambahModal').html("Tambah Data");
        $('#tambah-modal').modal('show');
        $('#id').val('');
        // Reset nilai-nilai input tambahan seperti Agama, TTL, Jenis Kelamin, Anak Ke, Kepala Keluarga, dan Status Binaan
        $('#agama').val('');
        $('#teml').val('');
        $('#tgll').val('');
        $('#jenis_kelamin').val('');
        $('#anak_ke').val('');
        $('#kepala_keluarga').val('');
        $('#status_binaan').val('');
    }

    function viewFunc(id) {
      // Navigate to the view page with the record's ID as a query parameter
      window.location.href = "{{ url('admin/tabeldataview/') }}/" + id;
    }
  
    function editFunc(id){
        $.ajax({
            type: "POST",
            url: "{{ url('admin/tabeldataedit') }}",
            data: { id: id},
            dataType: 'json',
            success: function(res){
                console.log(res);
                $('#TambahModal').html("Edit Data");
                $('#tambah-modal').modal('show');
                $('#id').val(res.id);
                $('#name').val(res.name);
                $('#address').val(res.address);
                $('#email').val(res.email);
                // Isi nilai-nilai input tambahan seperti Agama, TTL, Jenis Kelamin, Anak Ke, Kepala Keluarga, dan Status Binaan
                $('#agama').val(res.agama);
                $('#teml').val(res.teml);
                $('#tgll').val(res.tgll);
                $('#jenis_kelamin').val(res.jenis_kelamin);
                $('#anak_ke').val(res.anak_ke);
                $('#kepala_keluarga').val(res.kepala_keluarga);
                $('#status_binaan').val(res.status_binaan);
            }
        });
    }
  
    function deleteFunc(id){
        if (confirm("Ingin Mengahapus Data?") == true) {
            var id = id;
            //ajax
            $.ajax({
                type: "POST",
                url: "{{ url('admin/tabeldatadelete') }}",
                data: { id: id },
                dataType: 'json',
                success: function(res){
                    var oTable = $('#tabeldata').dataTable();
                    oTable.fnDraw(false);
                }
            });
        }
    }
  
    $('#tabeldataForm').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "{{ url('admin/tabeldatastore') }}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
              Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Data berhasil ditambahkan!',
                showConfirmButton: false,
                timer: 1500 // Durasi pesan SweetAlert ditampilkan dalam milidetik (ms)
              });
                $("#tambah-modal").modal('hide');
                var oTable = $('#tabeldata').dataTable();
                oTable.fnDraw(false);
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
  </script>

@endsection