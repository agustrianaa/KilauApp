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
                                            <option value="Jawa Barat">Jawa Barat</option>
                                            <option value="Jawa Tengah">Jawa Tengah</option>
                                            <option value="Jawa Timur">Jawa Timur</option>
                                        </select>
                                        {{-- <select name="province" class="form-select" id="province">
                                            <option value="" disabled selected>Pilih Provinsi</option>
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province['id'] }}">{{ $province['name'] }}</option>
                                            @endforeach
                                        </select> --}}
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
                                            <option value="Indramayu">Indramayu</option>
                                            <option value="Bekasi">Bekasi</option>
                                            <option value="Jakarta">Jakarta</option>
                                        </select>
                                        {{-- <select name="regency" class="form-select" id="regency" disabled>
                                            <option value="" disabled selected>Pilih Kabupaten</option>
                                        </select> --}}
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
                                            <option value="Karpel">Karpel</option>
                                            <option value="Junti">Junti</option>
                                            <option value="Koramil">Koramil</option>
                                        </select>
                                        {{-- <select name="district" class="form-select" id="district" disabled>
                                            <option value="" disabled selected>Pilih Kecamatan</option>
                                        </select> --}}
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
                                            <option value="Kelur Satu">Kelur Satu</option>
                                            <option value="Kelur Dua">Kelur Dua</option>
                                            <option value="Kelur Tiga">Kelur Tiga</option>
                                        </select>
                                        {{-- <select name="village" class="form-select" id="village" disabled>
                                            <option value="" disabled selected>Pilih Kelurahan</option>
                                        </select> --}}
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

{{-- <script>
    // Ambil elemen-elemen select
    const provinceSelect = document.getElementById('province');
    const regencySelect = document.getElementById('regency');
    const districtSelect = document.getElementById('district');
    const villageSelect = document.getElementById('village');

    // Tambahkan event listener untuk perubahan pada select provinsi
    provinceSelect.addEventListener('change', function () {
        // Ambil province_id yang dipilih
        const selectedProvinceId = this.value;

        // Mengambil data kabupaten berdasarkan province_id
        const url = `https://emsifa.github.io/api-wilayah-indonesia/api/regencies/${selectedProvinceId}.json`;
        getDataAndPopulateSelect(url, regencySelect);
    });

    // Tambahkan event listener untuk perubahan pada select kabupaten
    regencySelect.addEventListener('change', function () {
        // Ambil regency_id yang dipilih
        const selectedRegencyId = this.value;

        // Mengambil data kecamatan berdasarkan regency_id
        const url = `https://emsifa.github.io/api-wilayah-indonesia/api/districts/${selectedRegencyId}.json`;
        getDataAndPopulateSelect(url, districtSelect);
    });

    // Tambahkan event listener untuk perubahan pada select kecamatan
    districtSelect.addEventListener('change', function () {
        // Ambil district_id yang dipilih
        const selectedDistrictId = this.value;

        // Mengambil data kelurahan berdasarkan district_id
        const url = `https://emsifa.github.io/api-wilayah-indonesia/api/villages/${selectedDistrictId}.json`;
        getDataAndPopulateSelect(url, villageSelect);
    });

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
</script> --}}
{{-- <script type="text/javascript">
    // SCRIPT
</script> --}}

@endsection