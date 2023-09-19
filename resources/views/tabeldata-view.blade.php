<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Isi Survey</title>
    <style>
        body {
            background-color: lightgray !important;
        }

        .tombol {
          color: rgb(255, 255, 255);
          background-color: rgb(45, 13, 255);
          transition: 0.1s;
        }
        
        /* Efek hover pada tombol dengan class "bg-white" */
        .tombol:hover {
          color: black;
          background-color: rgb(248, 251, 36); /* Ganti warna latar belakang sesuai keinginan Anda */
          cursor: pointer; /* Ganti cursor sesuai keinginan Anda */
          transform: scale(1.05);
          transition: 0.1s;
          /* Atur efek hover lainnya, misalnya border, warna teks, dsb. */
        }

    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="container d-flex justify-content-center" style="margin-top: 50px">
        <div class="card border-1 shadow-sm rounded-md mt-4 bg-info">
          <div class="card-body">
            <h4>Data Survey</h4><hr>
            <div class="row flex-row" id="pertama">
              <div class="">
                <div class="tombol p-2" id="keluarga">keluarga</div>
              </div>
              <div class="">
                <div class="tombol p-2" id="ekonomi">ekonomi</div>
              </div>
              <div class="">
                <div class="tombol p-2" id="asset">asset</div>
              </div>
              <div class="">
                <div class="tombol p-2" id="kesehatan">kesehatan</div>
              </div>
              <div class="">
                <div class="tombol p-2" id="ibadah-sosial">ibadah & sosial</div>
              </div>
              <div class="">
                <div class="tombol p-2" id="lainnya">lainnya</div>
              </div>
              <div class="">
                <div class="tombol p-2" id="data-survey">data survey</div>
              </div>
            </div>

            <!-- Include formSurvey -->
            <div class="container">
              <div id="survey">
                  <div id="keluarga" class="form">
                      <div class="form-group row ml-2 mt-2">
                          <label class="control-label" for="no_kk">No Kartu Keluarga:</label>
                          <div class="col-sm-7">
                              <input type="text" class="form-control" name="no_kk" id="no_kk">
                          </div>
                      </div>
                      <div class="form-group row ml-2 mt-2">
                          <label class="control-label" for="alamat">Pendidikan Terakhir Kepala keluarga:</label>
                          <div class="col-auto">
                              <input type="text" class="form-control" name="alamat" id="alamat">
                          </div>
                      </div>
                      <div class="form-group row ml-2 mt-2">
                          <label class="control-label" for="alamat">jumlah tanggungan keluarga:</label>
                          <div class="col-sm-3">
                              <input type="text" class="form-control" name="alamat" id="alamat">
                          </div>
                      </div>
                  </div>
                  <div id="ekonomi" class="form">
                      <div class="form-group row ml-2 mt-2">
                          <label class="control-label" for="nama">Pekerjaan kepala keluarga:</label>
                          <div class="col-auto">
                              <input type="text" class="form-control" name="nama" id="nama">
                          </div>
                      </div>
                      <div class="form-group row ml-2 mt-2">
                          <label class="control-label col-sm-4" for="alamat">Rata2 penghasilan kepala keluarga:</label>
                          <div class="col-sm-5">
                              <input type="text" class="form-control" name="alamat" id="alamat">
                          </div>
                      </div>
                      <div class="form-group row ml-2 mt-2">
                          <label class="control-label col-sm-4" for="alamat">kepemilikan tabungan:</label>
                          <div class="col-sm-5">
                              <input type="text" class="form-control" name="alamat" id="alamat">
                          </div>
                      </div>
                      <div class="form-group row ml-2 mt-2">
                          <label class="control-label col-sm-4" for="alamat">makan 2x atau lebih:</label>
                          <div class="col-sm-5">
                              <input type="text" class="form-control" name="alamat" id="alamat">
                          </div>
                      </div>
                  </div>
                  <div id="asset" class="form">
                      <div class="form-group row ml-2 mt-2">
                          <label class="control-label" for="nama">Nama Anda:</label>
                          <div class="col-sm-7">
                              <input type="text" class="form-control" name="nama" id="nama">
                          </div>
                      </div>
                      <div class="form-group row ml-2 mt-2">
                          <label class="control-label" for="alamat">Alamat anda:</label>
                          <div class="col-sm-7">
                              <input type="text" class="form-control" name="alamat" id="alamat">
                          </div>
                      </div>
                  </div>
                  <div id="kesehatan" class="form">
                      <div class="form-group row ml-2 mt-2">
                          <label class="control-label" for="nama">Nama Anda:</label>
                          <div class="col-sm-7">
                              <input type="text" class="form-control" name="nama" id="nama">
                          </div>
                      </div>
                      <div class="form-group row ml-2 mt-2">
                          <label class="control-label" for="alamat">Alamat anda:</label>
                          <div class="col-sm-7">
                              <input type="text" class="form-control" name="alamat" id="alamat">
                          </div>
                      </div>
                  </div>
                  <div id="ibadah-sosial" class="form">
                      <div class="form-group row ml-2 mt-2">
                          <label class="control-label" for="nama">Nama Anda:</label>
                          <div class="col-sm-7">
                              <input type="text" class="form-control" name="nama" id="nama">
                          </div>
                      </div>
                      <div class="form-group row ml-2 mt-2">
                          <label class="control-label" for="alamat">Alamat anda:</label>
                          <div class="col-sm-7">
                              <input type="text" class="form-control" name="alamat" id="alamat">
                          </div>
                      </div>
                  </div>
                  <div id="lainnya" class="form">
                      <div class="form-group row ml-2 mt-2">
                          <label class="control-label" for="nama">Nama Anda:</label>
                          <div class="col-sm-7">
                              <input type="text" class="form-control" name="nama" id="nama">
                          </div>
                      </div>
                      <div class="form-group row ml-2 mt-2">
                          <label class="control-label" for="alamat">Alamat anda:</label>
                          <div class="col-sm-7">
                              <input type="text" class="form-control" name="alamat" id="alamat">
                          </div>
                      </div>
                  </div>
                  <div id="data-survey" class="form">
                      <div class="form-group row ml-2 mt-2">
                          <label class="control-label" for="nama">Nama Anda:</label>
                          <div class="col-sm-7">
                              <input type="text" class="form-control" name="nama" id="nama">
                          </div>
                      </div>
                      <div class="form-group row ml-2 mt-2">
                          <label class="control-label" for="alamat">Alamat anda:</label>
                          <div class="col-sm-7">
                              <input type="text" class="form-control" name="alamat" id="alamat">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          </div>
        </div>
      </div>

      <div class="container pb-4" style="margin-top: 50px">
      </div>
    </div>
  </div>

  <script>
    function hideAllForms() {
      $(".form").hide();
    }

    // Sembunyikan semua formulir saat halaman dimuat
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

      // Tampilkan formulir dengan id "keluarga" saat halaman dimuat
      $("#survey #keluarga").show();
      
      // Tambahkan kelas "border border-1" pada elemen dengan id "keluarga"
      $('#keluarga').addClass('border');

      $('#pertama .tombol').click(function () {
        let nilai = $(this).attr('id');
        $('#pertama div').removeClass('text-light border');
        $(this).parent().addClass('text-light border');
        hideSurveyForms();
        console.log(nilai);
        $(`#survey #${nilai}`).show();
      });

    });
  </script>

</body>
</html>
