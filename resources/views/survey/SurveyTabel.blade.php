@extends('layout.main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
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
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Validasi Survey</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item">Validasi Survey</li>
                    </ol>
                </div>
                <div class="col-md-3">
                    <select class="multiple-kacab form-select" name="kacab[]" multiple="multiple">
                        @foreach ($data as $item)
                        <option value="{{ $item->id_kacab }}" >{{ $item->nama_kacab }}</option>
                        @endforeach
                      </select>
                </div>
                <div class="col-md-3">
                    <select class="multiple-wilbin form-select" name="wilayah_binaan[]" multiple="multiple">
                        {{-- @foreach ($data as $item)
                        <option value="{{ $item->wilayah_binaan }}" >{{ $item->wilayah_binaan }}</option>
                        @endforeach --}}
                      </select>
                </div>
                <div class="col-md-3">
                    <select class="multiple-shelter form-select" name="shelter[]" multiple="multiple">
                        {{-- @foreach ($data as $item)
                        <option value="{{ $item->shelter }}" >{{ $item->shelter }}</option>
                        @endforeach --}}
                      </select>
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-primary 1">Simpan</button>
                </div>
            </div><!-- End row -->
        </div><!-- End container-fluid -->
    </div>
    <!-- End content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered" id="tabelsurvey">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No. KK</th>
                                        <th>Kepala Keluarga</th>
                                        <th>KaCab</th>
                                        <th>WilBin</th>
                                        <th>Shelter</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready( function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#tabelsurvey').DataTable({
                searching: true,
                serverSide: true,
                ajax: {
                    url: 'surveyAnak',
                    type: 'GET',
                },
                columns: [
                        {
                            data: null,
                            name: 'id',
                            render: function(data, type, row, meta) {
                                return meta.row + 1; // Menggunakan nomor baris sebagai nomor urut
                            }
                        },
                        {data: 'no_kk', name: 'no_kk'},
                        {data: 'kepala_keluarga', name: 'kepala_keluarga'},
                        {data: 'kacab', name: 'kacab'},
                        {data: 'wilayah_binaan', name: 'wilayah_binaan'},
                        {data: 'shelter', name: 'kacab'},
                        {data: 'action', name: 'action'}
                    ],
                order: [[0, 'desc']],
                paging: true,
                pageLength: 10,
                language: {
                    "emptyTable": "Data Kosong..."
                }
            });

            $('.multiple-kacab').select2({
                placeholder: 'select kacab'
            });
            $('.multiple-wilbin').select2({
                placeholder: 'select wilbin'
            });
            $('.multiple-shelter').select2({
                placeholder: 'select shelter'
            });

            $('.multiple-kacab').on('change', function() {
                var selectedKacab = $(this).val();
                $('.multiple-shelter').empty();
                $('.multiple-wilbin').empty();

                // var kacab = [];
                //     for (var i = 0; i < selectedKacab.length; i++) {
                //         kacab.push(selectedKacab[i].text);
                //     }

                    console.log(selectedKacab)

                $.ajax({
                    url: "/admin/wilbinSurvey",
                    type: 'get',
                    data: {
                        kacab: selectedKacab
                    },
                    success: function( result ) {
                        console.log(result)

                        for (var i = 0; i < result.length; i++) {
                            var rowData = result[i];
                        $('.multiple-wilbin').append(`<option value="${rowData.id_wilbin}">${rowData.nama_wilbin}</option>`)
                        }
                    }
                })
            })
            $('.multiple-wilbin').on('change', function() {
                var selectedwilbin = $(this).val();
                $('.multiple-shelter').empty();


                console.log(selectedwilbin);
                // var wilbin = [];
                //     for (var i = 0; i < selectedwilbin.length; i++) {
                //         wilbin.push(selectedwilbin[i].text);
                //     }

                $.ajax({
                    url: "/admin/shelterSurvey",
                    type: 'get',
                    data: {
                        wilayah_binaan: selectedwilbin
                    },
                    success: function( result ) {
                        console.log(result)

                        for (var i = 0; i < result.length; i++) {
                            var rowData = result[i];
                        $('.multiple-shelter').append(`<option value="${rowData.id_shelter}">${rowData.nama_shelter}</option>`)
                        }
                    }
                })
            })

            $('.btn').on('click', function() {
                var selectedKacab = $('.multiple-kacab').select2('data');
                var selectedwilbin = $('.multiple-wilbin').select2('data');
                var selectedshelter = $('.multiple-shelter').select2('data');

                // Membuat array untuk menyimpan nilai text dari setiap elemen yang dipilih
                var kacab = [];
                for (var i = 0; i < selectedKacab.length; i++) {
                    kacab.push(selectedKacab[i].text);

                    console.log(kacab);
                }
                var wilbin = [];
                for (var i = 0; i < selectedwilbin.length; i++) {
                    wilbin.push(selectedwilbin[i].text);
                }
                var shelter = [];
                for (var i = 0; i < selectedshelter.length; i++) {
                    shelter.push(selectedshelter[i].text);
                }



                // Mengirim data ke controller Laravel melalui AJAX
                $.ajax({
                    type: 'GET',
                    url: 'surveyAnak', // Ganti dengan URL controller Laravel Anda
                    data: { kacab: kacab, wilayah_binaan: wilbin, shelter: shelter },
                    success: function(response) {
                        console.log('Ajax berhasil:', response.data); // Handle response dari controller jika diperlukan

                        var table = $('#tabelsurvey').DataTable();
                        var tbody = $('#tabelsurvey tbody');
                        tbody.empty();

                        // Populate the table with the updated data
                        for (var i = 0; i < response.data.length; i++) {
                            var rowData = response.data[i];
                            var rowHtml = '<tr>' +
                                '<td>' + (i + 1) + '</td>' +
                                '<td>' + rowData.no_kk + '</td>' +
                                '<td>' + rowData.kepala_keluarga + '</td>' +
                                '<td>' + rowData.kacab + '</td>' +
                                '<td>' + rowData.wilayah_binaan + '</td>' +
                                '<td>' + rowData.shelter + '</td>' +
                                '<td>' + rowData.action + '</td>' +
                                '</tr>';
                            tbody.append(rowHtml);
                        }
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            })



        });
</script>

@endsection
