@extends('layout.main')
@section('content')

<link rel="stylesheet" href="{{ asset('css/calonAnakBinaan-view.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0">Detail Anak</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                      <li class="breadcrumb-item active">Detail Anak</li>
                  </ol>
              </div>
          </div><!-- End row -->
      </div><!-- End container-fluid -->
  </div>
  <!-- End content-header -->

  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
          <div class="card">
            <div class="card-body">
                <h5 class="card-title ml-2">Nama : {{ $dataKel ? $dataKel->nama_lengkap_anak : 'Kosong' }}</h5>
                <div class="float-right">
                  <a href="" class="btn btn-info mx-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge-fill" viewBox="0 0 16 16">
                      <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z"/>
                    </svg>
                    Tombol 1
                  </a>
                  <a href="" class="btn btn-warning mx-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hammer" viewBox="0 0 16 16">
                      <path d="M9.972 2.508a.5.5 0 0 0-.16-.556l-.178-.129a5.009 5.009 0 0 0-2.076-.783C6.215.862 4.504 1.229 2.84 3.133H1.786a.5.5 0 0 0-.354.147L.146 4.567a.5.5 0 0 0 0 .706l2.571 2.579a.5.5 0 0 0 .708 0l1.286-1.29a.5.5 0 0 0 .146-.353V5.57l8.387 8.873A.5.5 0 0 0 14 14.5l1.5-1.5a.5.5 0 0 0 .017-.689l-9.129-8.63c.747-.456 1.772-.839 3.112-.839a.5.5 0 0 0 .472-.334z"/>
                    </svg>
                    Tombol 2
                  </a>
                  <a href="" class="btn btn-success mx-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                      <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                      <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                      <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                    </svg>
                    Tombol 3
                  </a>
                </div>

              <hr class="ml-1 mr-1 mt-5">
              <div class="containera">
                <div class="left-boxa">

                  <div class="container-fluid">
                    <div class="top-lefta">
                      <div class="cardrounded">
                        <div class="card-body">
                          <div class="gambar">
                            <img src="{{ asset('images/LogoKilau2.png') }}" alt="">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="container-fluid">
                    <div class="bottom-lefta">
                      <div class="cardrounded">
                        <div class="card-body">
                          <div class="list-group">
                            <p class="list-group-item">{{ $dataKel ? $dataKel->nama_lengkap_anak : 'Kosong' }}</p>
                
                            <p class="list-group-item">
                              <i class="bi bi-person-badge-fill"></i>
                              SD</p>
                
                            <p class="list-group-item">
                              <i class="bi bi-hammer"></i>
                              SDN</p>
                
                            <p class="list-group-item">
                              <i class="bi bi-cash-coin"></i>
                              Kelas 5</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                
                <div class="right-boxa">
                  <div class="">
                      <div class="">
                          <div class="row">
                              <div class="col-md-2">
                                  <div class="tombol" data-target="#card-data-anak" id="data-anak" onclick="showTable('card-data-anak')">Data Anak</div>
                              </div>
                              <div class="col-md-2">
                                  <div class="tombol" id="data-pendidikan" onclick="showTable('card-data-pendidikan')">Data Pendidikan</div>
                              </div>
                              <div class="col-md-2">
                                  <div class="tombol" id="data-keluarga" onclick="showTable('card-data-keluarga')">Data Keluarga</div>
                              </div>
                          </div>

                          <div class="card tampilan" id="card-data-anak" style="display: none;">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="float-end">
                                    Nama
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="float-start">
                                    : {{ $dataKel ? $dataKel->nama_lengkap_anak : 'Kosong' }}
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="float-end">
                                    Nama Panggilan
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="float-start">
                                    : {{ $dataKel ? $dataKel->nama_panggilan_anak : 'Kosong' }}
                                  </div>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="float-end">
                                    Tempat tanggal lahir
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="float-start">
                                    : {{ $dataKel ? $dataKel->tempat_lahir_anak : 'Kosong' }}, {{ $dataKel ? $dataKel->tanggal_lahir_anak : 'Kosong' }}
                                  </div>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="float-end">
                                    Nama Sekolah :
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="float-start">
                                    {{ $dataKel ? $dataKel->nama_sekolah_anak : 'Kosong' }}
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="float-end">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_dataKeluarga" data-id="{{ $dataIbu ? $dataKel->id : '' }}"><i class="bi bi-pencil-square"></i>Edit</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="card tampilan" id="card-data-pendidikan" style="display: none;">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="float-end">
                                    Hobby :
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="float-start">
                                    {{ $dataKel ? $dataKel->hobby_anak : 'Kosong' }}
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="card tampilan" id="card-data-keluarga" style="display: none;">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="float-end">
                                    Test3 :
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="float-start">
                                    test3
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="container" style="display: flex; justify-content: center;">
                              <a href="{{ route('admin.AnakBinaan') }}" class="btn btn-primary">Kembali</a>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="modal fade" id="modal_dataKeluarga" tabindex="-1" role="dialog" aria-labelledby="LabelKeluarga">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="LabelKeluarga">Edit Data Keluarga</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Isi konten modal di sini -->
                            <form>
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" id="id" value="{{ $dataKel ? $dataKel->id : '' }}">
                                <div class="form-group">
                                    <label for="no_kk" class="control-label">No Kartu Keluarga</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="Masukkan No KK..." value="{{ $dataKel ? $dataKel->no_kk: 'Data Kosong' }}"  maxlength="50" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="control-label">Kantor Cabang</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="kacab" name="kacab" placeholder="" value="{{ $dataKel ? $dataKel->kacab : 'Data Kosong' }}" maxlength="50" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="control-label">Wilayah Binaan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="wilbin" name="wilbin" placeholder="" value="{{ $dataKel ? $dataKel->wilbin : 'Data Kosong' }}" maxlength="50" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Shelter</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="shelter" name="shelter" placeholder="" value="{{ $dataKel ? $dataKel->shelter : 'Data Kosong' }}" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">No Telepon</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="" value="{{ $dataKel ? $dataKel->no_telp : 'Data Kosong' }}" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">No Rekening</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="no_rek" name="no_rek" placeholder="" value="{{ $dataKel ? $dataKel->no_rek : 'Data Kosong' }}" required="">
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <button type="button" data-dismiss="modal" class="btn btn-primary" id="btn-simpan-keluarga">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>

              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

              <script>
                    $(document).ready(function(){
                      $.ajaxSetup({
                          headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                      });

                      // JS DATA KELUARGA
                      var idKeluarga;
                      $('#modal_dataKeluarga').on('show.bs.modal', function(event){
                          var button = $(event.relatedTarget);
                          idKeluarga = button.data('id');
                      });

                      function getDataKeluarga(){
                          var no_kk = $('#no_kk').val();
                          var kacab = $('#kacab').val();
                          var wilbin = $('#wilbin').val();
                          var shelter = $('#shelter').val();
                          var no_telp = $('#no_telp').val();
                          var no_rek = $('#no_rek').val();

                          $.ajax({
                              method : 'PUT',
                              url : "/admin/calonAnakBinaanUpdate/" + idKeluarga,
                              data: {
                                  no_kk : no_kk,
                                  kacab : kacab,
                                  wilbin : wilbin,
                                  shelter : shelter,
                                  no_telp : no_telp,
                                  no_rek : no_rek,
                              },
                              success: function (data){
                                  console.log(data);
                                  $('#modal_dataKeluarga').modal('hide'); 
                              },
                              error: function (error){
                                  console.log('Error', error)
                              }
                          })
                      }
                      $('#btn-simpan-keluarga').on('click', function(){
                          getDataKeluarga();
                      });
                      
                    });
              </script>

              <script>
                // Mengambil semua elemen dengan class "card tampilan"
                var cards = document.querySelectorAll('.card.tampilan');
              
                // Menyembunyikan semua elemen card tampilan
                function hideAllCards() {
                  cards.forEach(function(card) {
                    card.style.display = 'none';
                  });
                }
              
                // Menampilkan elemen card sesuai dengan ID yang di klik
                function showTable(cardId) {
                  hideAllCards(); // Terlebih dahulu sembunyikan semua card
                  var card = document.getElementById(cardId);
                  if (card) {
                    card.style.display = 'block';
                  }
                }
              
                // Menampilkan card pertama saat halaman dimuat
                var firstCard = cards[0];
                if (firstCard) {
                  firstCard.style.display = 'block';
                }
              </script>
              

              <script>
                $(document).ready(function () {
                  // Ambil URL saat ini
                  var currentUrl = window.location.href;
              
                  // Loop melalui setiap tautan di sidebar
                  $(".col-md-2 .tombol").each(function () {
                    // Jika URL saat ini cocok dengan tautan ini, tandai sebagai aktif
                    if (currentUrl === $(this).attr("data-target")) {
                      $(this).closest(".tombol").addClass("active");
                    }
                  });
              
                  // Tambahkan event handler saat tautan di sidebar diklik
                  $(".col-md-2 .tombol").on("click", function () {
                    // Hapus kelas "active" dari semua item
                    $(".col-md-2 .tombol").removeClass("active");
              
                    // Tambahkan kembali kelas "active" ke item yang sedang diklik
                    $(this).closest(".tombol").addClass("active");
                  });
                });
              </script>
              
              
            </div>
            </div>
          </div>
        </div>

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

@endsection