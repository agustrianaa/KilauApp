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

        .bg-white:hover{
            cursor: pointer;
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
    <div class="container">
        <div class="row mt-5">
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

            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm rounded-md mt-4">
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
        $('#pertama div').removeClass('border border-bottom-0');
        $(this).parent().addClass('border border-bottom-0');
        console.log(nilai);
        $(`#survey #${nilai}`).show();
    });

    $('#kedua .bg-white').click(function () {

        let nilai = $(this).attr('id');
        hidePengajuanForms();
        $('#kedua div').removeClass('border border-bottom-0');
        $(this).parent().addClass('border border-bottom-0');
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
                window.location.href = "{{ route('calon.index') }}";
            }
        })
    })
});
</script>

</body>
</html>
