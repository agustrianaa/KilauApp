@extends('layout.main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
    .linkColor {
        text-decoration: none;
        color: black;
    }
    .linkColor:hover {
        text-decoration: none;
    }
    .col-12.bgColor:hover {
        background-color: rgb(205, 205, 205);
        color: rgb(0, 0, 0);
    }
    .col-12.sembunyikan{
        display: none;
    }
    .col-12.sembunyikanInputKK{
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
        transition: 0.1s;
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
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active">Ajukan Anak</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-title ml-4 mt-4">
                            <b>Pengajuan Tambah Anak</b>
                        </div>
                        <hr class="text-black-50">
                        <div class="card-body">
                            <div class="col-12" id="inputCariKK">
                                <div class="text-center mb-2">
                                    <h3>Pilih Keluarga</h3>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <div class="float-end">
                                            <b>Nomor Kartu Keluarga :</b>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" class="form-control" id="nomorKartuKeluarga" name="nomorKartuKeluarga">
                                        <div id="hasilPencarian"></div>
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                            </div>
                            <div class="col-12 sembunyikan" id="formAnak">
                                <button type="button" class="btn btn-warning" id="kembaliCariKK">Kembali Cari Nomor KK <i class="bi bi-search"></i></button>
                                <div class="text-center mb-2">
                                    <h3>Form Tambah Anak</h3>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4"><div class="float-end"><b>No. KK :</b></div></div>
                                            <div class="col-4"><input type="text" id="displayNoKk" class="form-control" disabled readonly></div>
                                            <div class="col-4"></div>
                                        </div>
                                    </div>
                                </div>
                                <form method="POST" action="{{ route('admin.anak.simpan') }}">
                                    @csrf
                                <input type="hidden" class="form-control" id="dataKeluargaId" name="idDataKeluarga" value="{{ $dataKeluargaId }}">
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <div class="float-end">
                                            <b>Nama Lengkap :</b>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" placeholder="Nama Lengkap..." class="form-control" id="namaLengkapAnak" name="namaLengkapAnak">
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <div class="float-end">
                                            <b>Nama Panggilan :</b>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" placeholder="Nama Panggilan..." class="form-control" id="namaPanggilanAnak" name="namaPanggilanAnak">
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <div class="float-end">
                                            <b>Agama :</b>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-select" name="agamaAnak" id="agamaAnak">
                                            <option value="" disabled selected>-Pilih-</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Konghucu">Konghucu</option>
                                        </select>
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <div class="float-end">
                                            <b>Anak Ke :</b>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <input type="number" placeholder="Anak Ke..." class="form-control" id="anakKe" name="anakKe">
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <div class="float-end">
                                            <b>Jenis Kelamin :</b>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-select" name="jenisKelaminAnak" id="jenisKelaminAnak">
                                            <option value="" disabled selected>Pilih...</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <div class="float-end">
                                            <b>Tempat Tanggal Lahir :</b>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" placeholder="Tempat Lahir(Kota)" class="form-control" id="tempatLahirAnak" name="tempatLahirAnak">
                                    </div>
                                    <div class="col-2">
                                        <input type="date" class="form-control" id="tanggalLahirAnak" name="tanggalLahirAnak">
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <div class="float-end">
                                            <b>Wilayah Binaan :</b>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-select" id="WilayahBinaanAnak" name="WilayahBinaanAnak">
                                            <option disabled selected>-Pilih-</option>
                                            @foreach($wilayahBinaans as $wilayahBinaan)
                                                <option value="{{ $wilayahBinaan->nama_wilbin }}">{{ $wilayahBinaan->nama_wilbin }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <div class="float-end">
                                            <b>Kantor Cabang :</b>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-select" id="KacabAnak" name="KacabAnak">
                                            <option disabled selected>-Pilih-</option>
                                            @foreach($kantorCabangs as $kantorCabang)
                                                <option value="{{ $kantorCabang->nama_kacab }}">{{ $kantorCabang->nama_kacab }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <div class="float-end">
                                            <b>Shelter :</b>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-select" id="ShelterAnak" name="ShelterAnak">
                                            <option disabled selected>-Pilih-</option>
                                            @foreach($shelters as $shelter)
                                                <option value="{{ $shelter->nama_shelter }}">{{ $shelter->nama_shelter }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <div class="float-end">
                                            <b>Jarak ke Shelter :</b>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="jarakShelterAnak" name="jarakShelterAnak" placeholder="">
                                            <span class="input-group-text">KM</span>
                                        </div>
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <div class="float-end">
                                            <b>Nama Sekolah & Kelas :</b>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" placeholder="Nama Sekolah..." class="form-control" id="namaSekolah" name="namaSekolah">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" placeholder="Kelas..." class="form-control" id="kelasSekolah" name="kelasSekolah">
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <div class="float-end">
                                            <b>Nama Madrasah & Kelas :</b>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" placeholder="Nama Madrasah..." class="form-control" id="namaMadrasah" name="namaMadrasah">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" placeholder="Kelas..." class="form-control" id="kelasMadrasah" name="kelasMadrasah">
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <div class="float-end">
                                            <b>Hobby :</b>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" placeholder="Hobby..." class="form-control" id="hobbyAnak" name="hobbyAnak">
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <div class="float-end">
                                            <b>Cita-cita :</b>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" placeholder="Cita-cita..." class="form-control" id="citaCitaAnak" name="citaCitaAnak">
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                                <input type="hidden" class="form-control" value="0" name="statusAnak">
                                <input type="hidden" class="form-control" value="BCPB" name="statusBeasiswa">
                                <div class="row mb-2">
                                    <div class="col-4">
                                    </div>
                                    <div class="col-4">
                                        <div class="text-center">
                                            <button type="reset" class="btn btn-danger">Reset</button>
                                            <button type="submit" class="btn btn-success">Tambah</button>
                                        </div>
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<aside class="control-sidebar control-sidebar-dark">

</aside>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.all.min.js"></script>

<script src="{{ asset('javascript/sharedFunctions.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var urlParams = new URLSearchParams(window.location.search);
        var dataKeluargaId = urlParams.get('dataKeluargaId');
        var noKk = urlParams.get('noKk');

        // Memeriksa apakah parameter ditemukan
        if (dataKeluargaId && noKk) {
            // Menjalankan fungsi sharedFunctions.js
            handleLinkColorClick(dataKeluargaId, noKk);
        }


        $('#nomorKartuKeluarga').on('keyup', function() {
            var query = $(this).val();
            console.log(query);
            $.ajax({
                url: "{{ url('admin/CariKK') }}",
                method: 'GET',
                data: { nomorKartuKeluarga: query },
                dataType: 'json',
                success: function(data) {
                    var results = '';
                    if (data.length > 0) {
                    $.each(data, function(index, item) {
                            results += '<a class="linkColor" href="javascript:void(0)" data-data-keluarga-id="' + item.id + '" data-no-kk="' + item.no_kk + '"> <div class="col-12 bgColor"> <div class="text-center">' + item.no_kk + '</div></div></a>';
                        });
                    } else {
                        // Tampilkan pesan jika tidak ada data yang cocok
                        results = '<div class="text-center">Tidak ada No.KK yang cocok...</div>';
                    }

                    $('#hasilPencarian').html('<div class="card"><div class="card-body">' + results + '</div></div>');

                    // Menambahkan event click pada tautan yang mengatur data-keluarga-id
                    $('.linkColor').on('click', function() {
                        var dataKeluargaId = $(this).data('data-keluarga-id');
                        var noKk = $(this).data('no-kk');

                        localStorage.setItem('dataKeluargaId', dataKeluargaId);
                        localStorage.setItem('noKk', noKk);

                        // Akses fungsi bersama
                        handleLinkColorClick(dataKeluargaId, noKk);

                    });
                }
            });
        });


    });

    $(document).ready(function () {
        var inputCariKK = $("#inputCariKK");
        var formAnak = $("#formAnak");

        // Tombol Kembali diklik
        $("#kembaliCariKK").click(function () {
            // Menghapus kembali class "sembunyikanInputKK"
            inputCariKK.removeClass("sembunyikanInputKK");
            // Menambahkan kembali class "sembunyikan"
            formAnak.addClass("sembunyikan");

            // Menghapus input
            $('#namaLengkapAnak').val('');
            $('#namaPanggilanAnak').val('');
            $('#jenisKelaminAnak').val('');
            $('#tempatLahirAnak').val('');
            $('#tanggalLahirAnak').val('');
            $('#WilayahBinaanAnak').val('');
            $('#ShelterAnak').val('');
            $('#jarakShelterAnak').val('');
            $('#namaSekolah').val('');
            $('#kelasSekolah').val('');
            $('#namaMadrasah').val('');
            $('#kelasMadrasah').val('');
            $('#hobbyAnak').val('');
            $('#citaCitaAnak').val('');
        });
    });

</script>

@endsection
