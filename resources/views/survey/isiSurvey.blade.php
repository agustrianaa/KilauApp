@extends('layout.main')
@section('content')


<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<link rel="stylesheet" href="{{ asset('css/isiSurvey.css') }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0">Survey Anak</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                      <li class="breadcrumb-item active">Survey Anak</li>
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
                <div class="card-title">Survey</div>
                <hr class="mt-5">
                <div class="containera">
                    <div class="containera">
                        <div class="kotak-atas">
                          <div class="kotak-kiri">
                            <div class="card bg-light border-0 shadow-none rounded-lg">
                              <div class="card-body">
                                  <h4>Data Survey</h4>
                                  <div class="container">
                                  <div class="row" id="pertama">
                                      <div class="col-sm">
                                          <div class="bg-white p-2" id="keluarga">Keluarga</div>
                                      </div>
                                      <div class="col-sm">
                                          <div class="bg-white p-2" id="ekonomi">Ekonomi</div>
                                      </div>
                                      <div class="col-sm">
                                          <div class="bg-white p-2" id="asset">Asset</div>
                                      </div>
                                      <div class="col-sm">
                                          <div class="bg-white p-2" id="kesehatan">Kesehatan</div>
                                      </div>
                                      <div class="col-sm">
                                          <div class="bg-white p-2 text-nowrap" id="ibadah-sosial">Ibadah & Sosial</div>
                                      </div>
                                      <div class="col-sm">
                                          <div class="bg-white p-2" id="lainnya">Lainnya</div>
                                      </div>
                                      <div class="col-sm">
                                          <div class="bg-white p-2 text-nowrap" id="data-survey">Data Survey</div>
                                      </div>
                                  </div>
                                </div>
                                  @include('survey.formSurvey')
                              </div>
                          </div>
                        </div>
                        <div class="kotak-kanan">
                          <div class="card bg-light border-0 shadow-none rounded-lg">
                            <div class="card-body">
                                <h4>Data Pengajuan</h4>
                                <div class="container">
                                <div class="row" id="kedua">
                                    <div class="col">
                                        <div class="bg-white p-2" id="keluarga">keluarga</div>
                                    </div>
                                    <div class="col">
                                        <div class="bg-white p-2" id="ekonomi">ekonomi</div>
                                    </div>
                                    <div class="col">
                                        <div class="bg-white p-2" id="ayah">ayah</div>
                                    </div>
                                    <div class="col">
                                        <div class="bg-white p-2" id="ibu">ibu</div>
                                    </div>
                                    <div class="col">
                                        <div class="bg-white p-2" id="wali">wali</div>
                                    </div>
                                </div>
                              </div>
                                @include('survey.formPengajuan')
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
                    <div class="containera">
                      <div class="kotak-bawah">
                        <div class="card bg-light border-0 shadow-none rounded-lg">
                          <div class="card-body text-center">
                              <h4>Validasi Kelayakan</h4>

                              <div class="row ml-2 mt-2">
                                  <label class="control-label mx-auto" for="hasil_survey">Hasil Survey:</label>
                                  <div class="col-sm-4 mx-auto">
                                      <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="hasil_survey" id="hasil_survey" value="layak">
                                          <label class="form-check-label" for="layak">layak</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="hasil_survey" id="hasil_survey" value="tidak layak">
                                          <label class="form-check-label" for="tidak_layak">tidak layak</label>
                                      </div>
                                  </div>
                              </div>
                              <div class="row ml-2 mt-2 mb-2">
                                  <label class="control-label mx-auto" for="keterangan_hasil">Keterangan Hasil Survey:</label>
                                  <div class="col-sm-4 mx-auto">
                                      <textarea name="keterangan_hasil" id="keterangan_hasil" class="form-control"></textarea>
                                  </div>
                              </div>
                              <button type="submit" class="btn btn-primary" id="store">Validasi</button>
                              <a href="{{ route('admin.dashboard') }}" class="btn btn-danger">Kembali</a>
                          </div>
                      </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
      function hideAllForms() {
          $(".form").hide();
          $("#pengajuan #keluarga").show();
          $("#survey #keluarga").show();
          $('#pertama #keluarga').addClass('border border-bottom-0');
          $('#kedua #keluarga').addClass('border border-bottom-0');
      }
      hideAllForms();


      $(document).ready(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      function hideSurveyForms() {
          $("#survey .form").hide();
      }
      function hidePengajuanForms() {
          $("#pengajuan .form").hide();
      }

      $('#pertama .bg-white').click(function () {
          let nilai = $(this).attr('id');
          hideSurveyForms();
          $('#pertama div').removeClass('border');
          $(this).parent().addClass('border');
          console.log(nilai);
          $(`#survey #${nilai}`).show();
      });

      $('#kedua .bg-white').click(function () {

          let nilai = $(this).attr('id');
          hidePengajuanForms();
          $('#kedua div').removeClass('border');
          $(this).parent().addClass('border');
          console.log(nilai);
          $(`#pengajuan #${nilai}`).show();
      });



      $('#store').click(function(e) {
          // survey keluarga
          let pendidikan_kepala_keluarga = $('#pendidikan_kepala_keluarga').val();
          let jumlah_tanggungan = $('#jumlah_tanggungan').val();
          // survey ekonomi
          let pekerjaan_kepala_keluarga = $('#pekerjaan_kepala_keluarga').val();
          let penghasilan = $('#penghasilan').val();
          let kepemilikan_tabungan = $('#kepemilikan_tabungan').val();
          let jumlah_makan = $('#jumlah_makan').val();

          // survey asset
          let kepemilikan_tanah = $('#kepemilikan_tanah').val();
          let kepemilikan_rumah = $('#kepemilikan_rumah').val();
          let kondisi_rumah_lantai = $('#kondisi_rumah_lantai').val();
          let kondisi_rumah_dinding = $('#kondisi_rumah_dinding').val();
          let kepemilikan_kendaraan = $('#kepemilikan_kendaraan').val();
          let kepemilikan_elektronik = $('#kepemilikan_elektronik').val();

          // survey kesehatan
          let sumber_air_bersih = $('#sumber_air_bersih').val();
          let jamban_limbah = $('#jamban_limbah').val();
          let tempat_sampah = $('#tempat_sampah').val();
          let perokok = $('#perokok').val();
          let konsumen_miras = $('#konsumen_miras').val();
          let persediaan_p3k = $('#persediaan_p3k').val();
          let makan_buah_sayur = $('#makan_buah_sayur').val();

          // survey ibadah sosial
          let solat_lima_waktu = $('#solat_lima_waktu').val();
          let membaca_alquran = $('#membaca_alquran').val();
          let majelis_taklim = $('#majelis_taklim').val();
          let membaca_koran = $('#membaca_koran').val();
          let pengurus_organisasi = $('#pengurus_organisasi').val();

          // survey lainnya
          let status_anak = $('#status_anak').val();
          let biaya_pendidikan_perbulan = $('#biaya_pendidikan_perbulan').val();
          let bantuan_lembaga_formal_lain = $('#bantuan_lembaga_formal_lain').val();

          // survey data
          let kondisi_penerima_manfaat = $('#kondisi_penerima_manfaat').val();
          let petugas_survey = $('#petugas_survey').val();

          // validasi survey
          let hasil_survey = $('#hasil_survey').val();
          let keterangan_hasil = $('#keterangan_hasil').val();


          // pengajuan keluarga
          let no_kk = $('#no_kk').val();
          let kepala_keluarga = $('#kepala_keluarga').val();
          let status_ortu = $('#status_ortu').val();

          // survey ekonomi
          let no_rek = $('#no_rek').val();
          let an_rek = $('#an_rek').val();
          let no_tlp = $('#no_tlp').val();
          let an_tlp = $('#an_tlp').val();

          // pengajuan ayah
          let nik_ayah = $('#nik_ayah').val();
          let nama_ayah = $('#nama_ayah').val();
          let agama_ayah = $('#agama_ayah').val();
          let status_ayah = $('#status_ayah').val();
          let penghasilan_ayah = $('#penghasilan_ayah').val();
          let alamat_ayah = $('#alamat_ayah').val();

          // pengajuan ibu
          let nik_ibu = $('#nik_ibu').val();
          let nama_ibu = $('#nama_ibu').val();
          let agama_ibu = $('#agama_ibu').val();
          let status_ibu = $('#status_ibu').val();
          let penghasilan_ibu = $('#penghasilan_ibu').val();
          let alamat_ibu = $('#alamat_ibu').val();

          // pengajuan wali
          let nik_wali = $('#nik_wali').val();
          let nama_wali = $('#nama_wali').val();
          let agama_wali = $('#agama_wali').val();
          let hub_kerabat = $('#hub_kerabat').val();
          let penghasilan_wali = $('#penghasilan_wali').val();
          let alamat_wali = $('#alamat_wali').val();

          $.ajax({
              url: "{{ route('datasurvey.store') }}",
              type: 'POST',
              // cache: false,
              data: {
                  "pendidikan_kepala_keluarga": pendidikan_kepala_keluarga,
                  "jumlah_tanggungan": jumlah_tanggungan,
                  // survey ekonomi
                  "pekerjaan_kepala_keluarga": pekerjaan_kepala_keluarga,
                  "penghasilan": penghasilan,
                  "kepemilikan_tabungan": kepemilikan_tabungan,
                  "jumlah_makan": jumlah_makan,

                  // survey asset
                  "kepemilikan_tanah": kepemilikan_tanah,
                  "kepemilikan_rumah": kepemilikan_rumah,
                  "kondisi_rumah_lantai": kondisi_rumah_lantai,
                  "kondisi_rumah_dinding": kondisi_rumah_dinding,
                  "kepemilikan_kendaraan": kepemilikan_kendaraan,
                  "kepemilikan_elektronik": kepemilikan_elektronik,

                  // survey kesehatan
                  "sumber_air_bersih": sumber_air_bersih,
                  "jamban_limbah": jamban_limbah,
                  "tempat_sampah": tempat_sampah,
                  "perokok": perokok,
                  "konsumen_miras": konsumen_miras,
                  "persediaan_p3k": persediaan_p3k,
                  "makan_buah_sayur": makan_buah_sayur,

                  // survey ibadah sosial
                  "solat_lima_waktu": solat_lima_waktu,
                  "membaca_alquran": membaca_alquran,
                  "majelis_taklim": majelis_taklim,
                  "membaca_koran": membaca_koran,
                  "pengurus_organisasi": pengurus_organisasi,

                  // survey lainnya
                  "status_anak": status_anak,
                  "biaya_pendidikan_perbulan": biaya_pendidikan_perbulan,
                  "bantuan_lembaga_formal_lain": bantuan_lembaga_formal_lain,

                  // survey data
                  "kondisi_penerima_manfaat": kondisi_penerima_manfaat,
                  "petugas_survey": petugas_survey,

                  // validasi survey
                  "hasil_survey": hasil_survey,
                  "keterangan_hasil": keterangan_hasil,


                  // pengajuan keluarga
                  "no_kk": no_kk,
                  "kepala_keluarga": kepala_keluarga,
                  "status_ortu": status_ortu,

                  // survey ekonomi
                  "no_rek": no_rek,
                  "an_rek": an_rek,
                  "no_tlp": no_tlp,
                  "an_tlp": an_tlp,

                  // pengajuan ayah
                  "nik_ayah": nik_ayah,
                  "nama_ayah": nama_ayah,
                  "agama_ayah": agama_ayah,
                  "status_ayah": status_ayah,
                  "penghasilan_ayah": penghasilan_ayah,
                  "alamat_ayah": alamat_ayah,

                  // pengajuan ibu
                  "nik_ibu": nik_ibu,
                  "nama_ibu": nama_ibu,
                  "agama_ibu": agama_ibu,
                  "status_ibu": status_ibu,
                  "penghasilan_ibu": penghasilan_ibu,
                  "alamat_ibu": alamat_ibu,

                  // pengajuan wali
                  "nik_wali": nik_wali,
                  "nama_wali": nama_wali,
                  "agama_wali": agama_wali,
                  "hub_kerabat": hub_kerabat,
                  "penghasilan_wali": penghasilan_wali,
                  "alamat_wali": alamat_wali,
              },
              success: function() {
                  window.location.href = "{{ url('kembali') }}";
              }
          })
      })
  });
  </script>
</section>
<!-- End Main content -->
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
