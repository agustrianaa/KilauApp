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

        </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script> --}}

    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-7">
                <div class="card border-0 shadow-sm rounded-md mt-4">
                    <div class="card-body">
                        <h4>Data Survey</h4><hr>
                        <div class="row flex-row" id="pertama">
                            <div class="">
                                <div class="bg-white p-2" id="keluarga">keluarga</div>
                            </div>
                            <div class="">
                                <div class="bg-white p-2" id="ekonomi">ekonomi</div>
                            </div>
                            <div class="">
                                <div class="bg-white p-2" id="asset">asset</div>
                            </div>
                            <div class="">
                                <div class="bg-white p-2" id="kesehatan">kesehatan</div>
                            </div>
                            <div class="">
                                <div class="bg-white p-2" id="ibadah-sosial">ibadah & sosial</div>
                            </div>
                            <div class="">
                                <div class="bg-white p-2" id="lainnya">lainnya</div>
                            </div>
                            <div class="">
                                <div class="bg-white p-2" id="data-survey">data survey</div>
                            </div>
                        </div>
                        @include('survey.formSurvey')
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card border-0 shadow-sm rounded-md mt-4">
                    <div class="card-body">
                        <h4>Data Pengajuan</h4><hr>
                        <div class="row flex-row" id="kedua">
                            <div class="">
                                <div class="bg-white p-2" id="keluarga">keluarga</div>
                            </div>
                            <div class="">
                                <div class="bg-white p-2" id="ekonomi">ekonomi</div>
                            </div>
                            <div class="">
                                <div class="bg-white p-2" id="ayah">ayah</div>
                            </div>
                            <div class="">
                                <div class="bg-white p-2" id="ibu">ibu</div>
                            </div>
                            <div class="">
                                <div class="bg-white p-2" id="wali">wali</div>
                            </div>
                        </div>
                        @include('survey.formPengajuan')
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded-md mt-4">
                    <div class="card-body text-center">
                        <h4>Validasi Kelayakan</h4>

                        <div class="row ml-2 mt-2">
                            <label class="control-label mx-auto" for="kelayakan">Hasil Survey:</label>
                            <div class="col-sm-4 mx-auto">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kelayakan" id="layak" value="layak">
                                    <label class="form-check-label" for="layak">layak</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kelayakan" id="tidak_layak" value="tidak_layak">
                                    <label class="form-check-label" for="tidak_layak">tidak layak</label>
                                </div>
                            </div>
                        </div>
                        <div class="row ml-2 mt-2 mb-2">
                            <label class="control-label mx-auto" for="keterangan">Keterangan Hasil Survey:</label>
                            <div class="col-sm-4 mx-auto">
                                <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Validasi</button>
                        <button type="#" class="btn btn-danger">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script>
    function hideAllForms() {
        $(".form").hide();
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
        $('#pertama div').removeClass('border border-bottom-0');
        $(this).parent().addClass('border border-bottom-0');
        hideSurveyForms();
        console.log(nilai);
        $(`#survey #${nilai}`).show();
    });

    $('#kedua .bg-white').click(function () {
        let nilai = $(this).attr('id');
        $('#kedua div').removeClass('border border-bottom-0');
        $(this).parent().addClass('border border-bottom-0');
        hidePengajuanForms();
        console.log(nilai);
        $(`#pengajuan #${nilai}`).show();
    });


    });
</script>

</body>
</html>