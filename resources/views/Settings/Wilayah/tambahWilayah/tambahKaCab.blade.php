@extends('layout.mainSettings')
@section('contentSettings')

<style>
    #titleCard {
        color: rgb(42, 42, 192);
        /* font-size: 25px; */
    }
    #kilauIn {
        color: black;
        /* font-size: 12px; */
        margin-left: 10px;
        display: inline;
    }
    #tmbh {
        display: inline;
    }
</style>

<div class="content-wrapper background">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Data Anak Binaan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-tittle m-2" id="titleCard">
                        <h4 id="tmbh">Tambah Kantor Cabang</h4><small id="kilauIn">Kilau Indonesia</small>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="col-12">
                            <div class="row mb-2">
                                <div class="col-3">
                                    <div class="float-end">
                                        Nama Kantor Cabang :
                                    </div>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="Nama Kantor Cabang...">
                                </div>
                                <div class="col-3"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <div class="float-end">
                                        No. Telp :
                                    </div>
                                </div>
                                <div class="col-6">
                                    <input type="number" class="form-control" placeholder="Nomor Telephone">
                                </div>
                                <div class="col-3"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <div class="float-end">
                                        Alamat :
                                    </div>
                                </div>
                                <div class="col-6">
                                    <textarea class="form-control" placeholder="Masukan Alamat" id="floatingTextarea2" style="height: 70px"></textarea>
                                </div>
                                <div class="col-3"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <div class="float-end">
                                        Provinsi :
                                    </div>
                                </div>
                                <div class="col-6">
                                    <select name="province" class="form-select" id="province" data-province-id>
                                        <option value="" disabled selected>Pilih Provinsi</option>
                                        @foreach ($provinces['result'] as $province)
                                            <option value="{{ $province['id'] }}">{{ $province['text'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-3"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <div class="float-end">
                                        Kabupaten :
                                    </div>
                                </div>
                                <div class="col-6">
                                    <select name="kabupaten" class="form-select" id="kabupaten" data-regency-id disabled>
                                        <option value="" disabled selected>Pilih Kabupaten</option>
                                        <!-- Opsi Kabupaten akan diisi secara dinamis melalui JavaScript -->
                                    </select>
                                </div>
                                <div class="col-3"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <div class="float-end">
                                        Kecamatan :
                                    </div>
                                </div>
                                <div class="col-6">
                                    <select name="kecamatan" class="form-select" id="kecamatan" data-district-id disabled>
                                        <option value="" disabled selected>Pilih Kecamatan</option>
                                        <!-- Opsi Kecamatan akan diisi secara dinamis melalui JavaScript -->
                                    </select>
                                </div>
                                <div class="col-3"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <div class="float-end">
                                        Kelurahan :
                                    </div>
                                </div>
                                <div class="col-6">
                                    <select name="kelurahan" class="form-select" id="kelurahan" data-village-id disabled>
                                        <option value="" disabled selected>Pilih Kelurahan</option>
                                        <!-- Opsi Kelurahan akan diisi secara dinamis melalui JavaScript -->
                                    </select>
                                </div>
                                <div class="col-3"></div>
                            </div>
                            <div class="row">
                                <div class="col-3"></div>
                                <div class="col-6">
                                    <div class="text-center">
                                        <button type="button" class="btn btn-warning">Kembali</button>
                                        <button type="button" class="btn btn-success">Simpan</button>
                                    </div>
                                </div>
                                <div class="col-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    // Tambahkan event listener untuk perubahan pada dropdown Provinsi
    document.getElementById('province').addEventListener('change', function () {
        // Dapatkan province_id yang dipilih
        var provinceId = this.value;

        // Reset dan nonaktifkan dropdown Kabupaten, Kecamatan, dan Kelurahan
        resetDropdown('kabupaten');
        resetDropdown('kecamatan');
        resetDropdown('kelurahan');


            // var kantor_cabang = $(this).val();

            // dapatkan kabupaten
            $.ajax({
                url: `https://alamat.thecloudalert.com/api/kabkota/get/?d_provinsi_id=${provinceId}`,
                type: 'get',
                dataType: 'json',
                success: function( response ) {
                    // result
                    // console.log(response);

                    // $('select#cabang').append(`<option value="${result.kacab}">${result.kacab}</option>`)

                    var resultArray = response.result;

                    // Cetak nilai 'result'
                    // console.log(resultArray);

                    // Iterasi melalui setiap elemen dalam 'resultArray'
                    for (var i = 0; i < resultArray.length; i++) {
                        var id = resultArray[i].id;
                        var text = resultArray[i].text;

                        // Lakukan sesuatu dengan id dan text, contohnya:
                        // console.log('ID:', id, 'Text:', text);
                        $('#kabupaten').prop('disabled', false);
                        $('#kabupaten').append(`<option value="${id}">${text}</option>`)
                    }
                }
            })
    });

    // Tambahkan event listener untuk perubahan pada dropdown Kabupaten
    document.getElementById('kabupaten').addEventListener('change', function () {
        // Dapatkan regency_id yang dipilih
        var regencyId = this.value;

        // Reset dan nonaktifkan dropdown Kecamatan dan Kelurahan
        resetDropdown('kecamatan');
        resetDropdown('kelurahan');


        // dapatkan kecamatan
        $.ajax({
                url: `https://alamat.thecloudalert.com/api/kecamatan/get/?d_kabkota_id=${regencyId}`,
                type: 'get',
                dataType: 'json',
                success: function( response ) {

                    var resultArray = response.result;

                    // Cetak nilai 'result'
                    // console.log(resultArray);

                    // Iterasi melalui setiap elemen dalam 'resultArray'
                    for (var i = 0; i < resultArray.length; i++) {
                        var id = resultArray[i].id;
                        var text = resultArray[i].text;

                        // Lakukan sesuatu dengan id dan text, contohnya:
                        // console.log('ID:', id, 'Text:', text);
                        $('#kecamatan').prop('disabled', false);
                        $('#kecamatan').append(`<option value="${id}">${text}</option>`)
                    }
                }
            })
    });

    // // Tambahkan event listener untuk perubahan pada dropdown Kecamatan
    document.getElementById('kecamatan').addEventListener('change', function () {
        // Dapatkan district_id yang dipilih
        var districtId = this.value;

        // Reset dan nonaktifkan dropdown Kelurahan
        resetDropdown('kelurahan');

        // dapatkan kecamatan
        $.ajax({
                url: `https://alamat.thecloudalert.com/api/kelurahan/get/?d_kecamatan_id=${districtId}`,
                type: 'get',
                dataType: 'json',
                success: function( response ) {

                    var resultArray = response.result;

                    // Cetak nilai 'result'
                    // console.log(resultArray);

                    // Iterasi melalui setiap elemen dalam 'resultArray'
                    for (var i = 0; i < resultArray.length; i++) {
                        var id = resultArray[i].id;
                        var text = resultArray[i].text;

                        // Lakukan sesuatu dengan id dan text, contohnya:
                        // console.log('ID:', id, 'Text:', text);
                        $('#kelurahan').prop('disabled', false);
                        $('#kelurahan').append(`<option value="${id}">${text}</option>`)
                    }
                }
            })
    });

    // Fungsi untuk mereset dan menonaktifkan dropdown
    function resetDropdown(dropdownId) {
        var dropdown = document.getElementById(dropdownId);
        dropdown.innerHTML = '<option value="" disabled selected>Pilih ' + capitalizeFirstLetter(dropdownId) + '</option>';
        dropdown.setAttribute('disabled', true);
    }

    // Fungsi untuk mendapatkan data dan mengisi dropdown
    function getDataAndPopulateDropdown(apiUrl, dropdownId, dataId) {
        // Menggunakan fetch API untuk mengambil data dari API
        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                // Mendapatkan dropdown yang akan diisi
                var dropdown = document.getElementById(dropdownId);

                // Mengisi dropdown dengan opsi berdasarkan data yang diterima
                data.forEach(item => {
                    var option = document.createElement('option');
                    option.value = item[dataId];
                    option.textContent = item.name;
                    dropdown.appendChild(option);
                });

                // Mengaktifkan dropdown setelah diisi
                dropdown.removeAttribute('disabled');
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    // Fungsi untuk mengubah huruf pertama menjadi huruf besar
    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }
</script>
{{-- <script type="text/javascript">
    // SCRIPT
</script> --}}

@endsection
