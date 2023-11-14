@extends('layout.main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<style>
  .content-wrapper.background {
    background-color: rgb(242, 242, 242);
  }
  .card.filters {
    display: none
  }
  .col-lg-12.bukaFilter {
    display: none;
  }
  .col-lg-12.tutupFilter {
    display: none;
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
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper background">
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
                <div class="col-lg-12" id="openFilter">
                  <button type="button" class="btn btn-success mx-1 mb-2" id="tombolbukafilter">Buka Filter <i class="bi bi-funnel-fill"></i></button>
                </div>
                <div class="col-lg-12 tutupFilter" id="closeFilter">
                  <button type="button" class="btn btn-danger mx-1 mb-2" id="tombolTutupFilter">Tutup Filter <i class="bi bi-funnel-fill"><i class="bi bi-x"></i></i></button>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

          <!-- Card Untuk Filter ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
          <div class="card filters" id="filterCard">
            <div class="card-header">
              <div class="card-title">
                <h4><b>Filter</b></h4>
              </div>
              <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                  <li class="nav-item">
                    <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                  </li>
                </ul>
              </div>
            </div>
            <form>
              <div class="card-body">
                <div class="col-12">
                  <div class="row">
                    <div class="col-lg-2">
                      <label class="form-label select-label">Shelter</label>
                      <select class="form-select" id="filterShelter" name="filterShelter" multiple="multiple">
                          <option value="" disabled selected>-Pilih-</option>
                          <option value="Indramayu">Indramayu</option>
                          <option value="Sumedang">Sumedang</option>
                          <option value="Bandung">Bandung</option>
                          <option value="Bogor">Bogor</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="text-center">
                    <button type="button" class="btn btn-outline-info">Filter</button>
                    <button type="reset" class="btn btn-outline-danger">Reset</button>
                </div>
              </div>
            </form>
          </div>
          <!-- End card filter~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

          <!-- Card Tabel Anak Binaan ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
          <div class="card">
            <div class="card-body">
              <div class="table-responsive text-nowrap">
                <table class="table table-bordered" id="AnakBinaan">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Lengkap</th>
                            <th>Nama Panggilan</th>
                            <th>TTL</th>
                            <th>Nama Sekolah</th>
                            <th>Nama Madrasah</th>
                            <th>Hobby</th>
                            <th>Status Beasiswa</th>
                            <th>Status Survey</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
              </div>
            </div>
          </div>
          <!-- End card Tabel Anak Binaan~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

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
                        <form action="javascript:void(0)" id="AnakBinaanForm" name="AnakBinaanForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Nama Lengkap</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama..." maxlength="50" required="">
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="name" class="col-sm-2 control-label">Nama Panggilan</label>
                              <div class="col-sm-12">
                                  <input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan" placeholder="Nama..." maxlength="50" required="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="name" class="col-sm-2 control-label text-nowrap">Tempat dan Tanggal Lahir</label>
                              <div class="col-sm-12">
                                <div class="row">
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir..." required="">
                                  </div>
                                  <div class="col-md-6">
                                      <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required="">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="name" class="col-sm-2 control-label">Nama Sekolah</label>
                              <div class="col-sm-12">
                                  <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" placeholder="Nama..." maxlength="50" required="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="name" class="col-sm-2 control-label">Nama Madrasah</label>
                              <div class="col-sm-12">
                                  <input type="text" class="form-control" id="nama_madrasah" name="nama_madrasah" placeholder="Anak Ke..." required="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="name" class="col-sm-2 control-label text-nowrap">Hobby</label>
                              <div class="col-sm-12">
                                  <input type="text" class="form-control" id="hobby" name="hobby" placeholder="Kepala Keluarga..." required="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="name" class="col-sm-2 control-label text-nowrap">Cita Cita</label>
                              <div class="col-sm-12">
                                  <input type="text" class="form-control" id="cita_cita" name="cita_cita" placeholder="Kepala Keluarga..." required="">
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

        var selectedShelter = [];

          $('#AnakBinaan').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url : "{{ url('admin/AnakBinaan') }}",
            },
            columns: [
                {
                    data: null,
                    name: 'id',
                    render: function(data, type, row, meta) {
                        return meta.row + 1; // Menggunakan nomor baris sebagai nomor urut
                    }
                },
                { data: 'nama_lengkap_anak', name: 'nama_lengkap_anak'},
                { data: 'nama_panggilan_anak', name: 'nama_panggilan_anak'},
                { data: 'ttl', name: 'ttl'},
                { data: 'nama_sekolah', name: 'nama_sekolah'},
                { data: 'nama_madrasah', name: 'nama_madrasah'},
                { data: 'hobby', name: 'hobby'},
                { data: 'status_beasiswa', name: 'status_beasiswa'},
                { data: 'survey_status', name: 'survey_status'},
                { data: 'action', name: 'action', orderable: false},
            ],
            order: [[0, 'desc']],
            paging: true,
            pageLength: 10, // Menyeting jumlah entri yang ditampilkan menjadi 10
            language: {
                "emptyTable": "Data Kosong..."
            }
        });
  });

    // Tombol Buka / Tutup Filter ~~~~~~~~
    var filterCard = $("#filterCard");
    var openFilter = $("#openFilter");
    var closeFilter = $("#closeFilter");

    $("#tombolbukafilter").click(function () {
      filterCard.removeClass("filters");
      openFilter.addClass("bukaFilter");
      closeFilter.removeClass("tutupFilter");
    });
    $("#tombolTutupFilter").click(function () {
      filterCard.addClass("filters");
      openFilter.removeClass("bukaFilter");
      closeFilter.addClass("tutupFilter");
    });


    function Survey(id) {
      // Navigate to the view page with the record's ID as a query parameter
      window.location.href = "{{ url('admin/surveyForm/') }}/" + id;
    }

    //menampilkan detail data keluarga
    function detailDatakeluarga(id, id_anaks){

    window.location.href = `{{ url('admin/calonAnakBinaanDetail') }}/${id}/${id_anaks}`;
    }

    function deleteFunc(id){
      if (confirm("Ingin Mengahapus Data?") == true) {
        var id = id;
        //ajax
        $.ajax({
          type: "POST",
          url: "{{ url('admin/AnakBinaandelete') }}",
          data: { id: id },
          dataType: 'json',
          success: function(res){
            Swal.fire(
              'Terhapus!',
              'Data berhasil dihapus.',
              'success'
            );
            var oTable = $('#AnakBinaan').dataTable();
            oTable.fnDraw(false);
          }
      });
    }
  }

    function deleteFunc(id){
        if (confirm("Ingin Mengahapus Data?") == true) {
            var id = id;
            //ajax
            $.ajax({
                type: "POST",
                url: "{{ url('admin/AnakBinaandelete') }}",
                data: { id: id },
                dataType: 'json',
                success: function(res){
                  Swal.fire(
                      'Terhapus!',
                      'Data berhasil dihapus.',
                      'success'
                  );

                    var oTable = $('#AnakBinaan').dataTable();
                    oTable.fnDraw(false);
                }
            });
        }
    }
</script>


@endsection
