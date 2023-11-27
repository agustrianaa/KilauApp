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
                        <li class="breadcrumb-item active">Kantor Cabang</li>
                        <li class="breadcrumb-item active">Tambah Kantor Cabang</li>
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
                            <form action="{{ route('admin.simpanKaCabFunc') }}" method="POST">
                            @csrf
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <div class="float-end">
                                            Nama Kantor Cabang :
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <input name="namaKacab" id="idNamaKacab" type="text" class="form-control" placeholder="Nama Kantor Cabang...">
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
                                        <input name="nomortlp" id="idnotlp" type="number" class="form-control" placeholder="Nomor Telephone">
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
                                        <textarea name="alamatKacab" id="idAlamatKacab" class="form-control" placeholder="Masukan Alamat" id="floatingTextarea2" style="height: 70px"></textarea>
                                    </div>
                                    <div class="col-3"></div>
                                </div>

                                <!-- Bagian Provinsi -->
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <div class="float-end">
                                            Provinsi :
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <select class="form-control" name="tbhProvinsi" id="idProvinsi">
                                            <option value="" disabled selected>Pilih...</option>
                                            @foreach ($provinces['result'] as $province)
                                                <option value="{{ $province['id'] }}">{{ $province['text'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3"></div>
                                </div>

                                <!-- Bagian Kabupaten -->
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <div class="float-end">
                                            Kabupaten :
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <select class="form-control" name="tbhKabupaten" id="idKabupaten">
                                            <option value="" disabled selected>Pilih...</option>
                                        </select>
                                    </div>
                                    <div class="col-3"></div>
                                </div>

                                <!-- Bagian Kecamatan -->
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <div class="float-end">
                                            Kecamatan :
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <select class="form-control" name="tbhKecamatan" id="idKecamatan">
                                            <option value="" disabled selected>Pilih...</option>
                                        </select>
                                    </div>
                                    <div class="col-3"></div>
                                </div>

                                <!-- Bagian Kelurahan -->
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <div class="float-end">
                                            Kelurahan :
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <select class="form-control" name="tbhKelurahan" id="idKelurahan">
                                            <option value="" disabled selected>Pilih...</option>
                                        </select>
                                    </div>
                                    <div class="col-3"></div>
                                </div>

                                <div class="row">
                                    <div class="col-3"></div>
                                    <div class="col-6">
                                        <div class="text-center">
                                            <a href="{{ route('admin.KaCabView') }}" class="btn btn-warning">Kembali</a>
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        </div>
                                    </div>
                                    <div class="col-3"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    // Tambahkan event listener untuk perubahan pada dropdown Provinsi
    document.getElementById('idProvinsi').addEventListener('change', function () {
        // Dapatkan province_id yang dipilih
        var provinceId = this.value;

        // Reset dan nonaktifkan dropdown Kabupaten, Kecamatan, dan Kelurahan
        resetDropdown('idKabupaten');
        resetDropdown('idKecamatan');
        resetDropdown('idKelurahan');


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
                        // $('#idKabupaten').prop('disabled', false);
                        $('#idKabupaten').append(`<option value="${id}">${text}</option>`)
                    }
                }
            })
    });

    // Tambahkan event listener untuk perubahan pada select kabupaten
    document.getElementById('idKabupaten').addEventListener('change', function () {
        // Ambil regency_id yang dipilih
        const selectedRegencyId = this.value;

        // Reset dan nonaktifkan dropdown Kecamatan dan Kelurahan
        resetDropdown('idKecamatan');
        resetDropdown('idKelurahan');


        // dapatkan kecamatan
        $.ajax({
                url: `https://alamat.thecloudalert.com/api/kecamatan/get/?d_kabkota_id=${selectedRegencyId}`,
                type: 'get',
                dataType: 'json',
                success: function( response ) {

                    var resultArray = response.result;

                    // Cetak nilai 'result'
                    // console.log(resultArray);
                    $('#idKecamatan').prop('disabled', false);

                    // Iterasi melalui setiap elemen dalam 'resultArray'
                    for (var i = 0; i < resultArray.length; i++) {
                        var id = resultArray[i].id;
                        var text = resultArray[i].text;

                        // Lakukan sesuatu dengan id dan text, contohnya:
                        // console.log('ID:', id, 'Text:', text);
                        $('#idKecamatan').append(`<option value="${id}">${text}</option>`)
                    }
                }
            })
    });

    // // Tambahkan event listener untuk perubahan pada dropdown Kecamatan
    document.getElementById('idKecamatan').addEventListener('change', function () {
        // Dapatkan district_id yang dipilih
        var districtId = this.value;

        // Reset dan nonaktifkan dropdown Kelurahan
        resetDropdown('idKelurahan');

        // dapatkan kecamatan
        $.ajax({
                url: `https://alamat.thecloudalert.com/api/kelurahan/get/?d_kecamatan_id=${districtId}`,
                type: 'get',
                dataType: 'json',
                success: function( response ) {

                    var resultArray = response.result;

                    // Cetak nilai 'result'
                    // console.log(resultArray);
                    $('#idKelurahan').prop('disabled', false);

                    // Iterasi melalui setiap elemen dalam 'resultArray'
                    for (var i = 0; i < resultArray.length; i++) {
                        var id = resultArray[i].id;
                        var text = resultArray[i].text;

                        // Lakukan sesuatu dengan id dan text, contohnya:
                        // console.log('ID:', id, 'Text:', text);
                        $('#idKelurahan').append(`<option value="${id}">${text}</option>`)
                    }
                }
            })
    });

    function resetDropdown(dropdownId) {
    var dropdown = document.getElementById(dropdownId);
    dropdown.innerHTML = '<option value="" disabled selected>Pilih ' + capitalizeFirstLetter(dropdownId) + '</option>';
    dropdown.removeAttribute('disabled'); // Menghapus atribut 'disabled'
}


    // Fungsi untuk mengambil data dari API dan mengisi elemen select
    async function getDataAndPopulateSelect(url, selectElement) {
        try {
            // Mengambil data dari API
            const response = await fetch(url);
            const data = await response.json();

            // Mengisi elemen select dengan opsi yang sesuai
            selectElement.innerHTML = '<option value="" disabled selected>Pilih ' + selectElement.name.charAt(0).toUpperCase() + selectElement.name.slice(1) + '</option>';
            data.forEach(option => {
                selectElement.innerHTML += `<option value="${option.id}">${option.name}</option>`;
            });

            // Menghilangkan atribut 'disabled' pada elemen select setelah diisi
            selectElement.removeAttribute('disabled');
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    }

    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }
</script>
{{-- <script type="text/javascript">
    // SCRIPT
</script> --}}

@endsection
