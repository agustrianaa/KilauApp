@extends('layout.main')

@section('content')

<div class="container content-wrapper">
    <div class="row">
        <div class="col">
            <div class="m-3">
                <h1>Filter</h1>
                <hr><br>
            </div>
        </div>
    </div>

    {{-- Filter --}}
    <div class="row align-items-end" id="filter">
        <div class="col-lg-2 bg-white mx-2 mb-2">
            <label class="form-label select-label px-2">Tahun</label>
            <select class="form-select mb-2" name="tahun" id="tahun" aria-label="Default select example">
                <option value="" selected>-- Pilih --</option>
              </select>
        </div>
        <div class="col-lg-2 bg-white mx-2 mb-2">
            <label class="form-label select-label px-2">Kantor Cabang</label>
            <select class="form-select mb-2" name="kantor_cabang" id="kantor_cabang" aria-label="Default select example">
                <option value="" selected>-- Pilih --</option>
              </select>
        </div>
        <div class="col-lg-2 bg-white mx-2 mb-2">
            <label class="form-label select-label px-2">Wilayah Binaan</label>
            <select class="form-select mb-2" name="wilayah_binaan" id="wilayah_binaan" aria-label="Default select example">
                <option value="" selected>-- Pilih --</option>
              </select>
        </div>
        <div class="col-lg-2 bg-white mx-2 mb-2">
            <label class="form-label select-label px-2">Shelter</label>
            <select class="form-select mb-2" name="shelter" id="shelter" aria-label="Default select example">
                <option value="" selected>-- Pilih --</option>
              </select>
        </div>
        <div class="col-lg-2 mb-2 offset-md-1">
            <button type="button" id="filter" class="btn btn-primary">Filter</button>
        </div>
    </div>
    {{-- End Filter --}}

    {{-- Table --}}
    <div class="container bg-white rounded" id="table">
        <div class="row bg-white justify-content-center">
            {{-- <div class="container">
                <div class="row"> --}}
                    <div class="col-auto">
                        <table class="table table-bordered table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kantor Cabang</th>
                                    <th>Shelter</th>
                                    <th>Wilayah Binaan</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                {{-- </div>
            </div> --}}
        </div>
    </div>
    {{-- End Table --}}
</div>



<script>
    $(document).ready( function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#myTable').hide();

// function ajax
        async function fetchData(uri, type, callback, data) {
            try {
                const response = await $.ajax({
                    url: uri, // Sesuaikan URL permintaan sesuai dengan rute Anda
                    type: type,
                    data: data,
                    dataType: "json",
                });

                // Data JSON akan diterima dalam variabel 'response'

                // Iterasi melalui setiap objek dalam data JSON
                callback(response);
            } catch (error) {
                // Handle kesalahan jika terjadi
                if(data){
                    console.error("Gagal mengirim data JSON: " + error);
                } else {
                    console.error("Gagal mengambil data JSON: " + error);
                }
            }
        }


// function hapus option
function empty(url) {
            $(`select#${url}`).empty();
            $(`select#${url}`).append('<option value="" selected>-- Pilih --</option>');
        }

// get kepala cabang
        fetchData('/admin/report', 'get', function (response) {
            for (let i = 0; i < response.length; i++) {
                const item = response[i];
                // Lakukan sesuatu dengan setiap objek, misalnya, tampilkan di konsol
                // console.log("ID: " + item.id);
                // console.log("Kacab: " + item.kacab);
                // console.log("Shelter: " + item.shelter);
                // console.log("No KK: " + item.no_kk);
                $('select#kantor_cabang').append(`<option class="${item.kacab}" value="${item.kacab}">${item.kacab}</option>`)
                // Tambahkan logika bisnis Anda di sini
            }
        });


// wilayah binaan
    // saat kepala cabang berubah, dapatkan value nya
        $('select#kantor_cabang').on('change', function() {
            var kacab = $(this).val();
            $('select#kantor_cabang').on('change', function() {
                empty(`wilayah_binaan`)
            })

            fetchData('/admin/wilbin', 'get', function (response) {

                if(response.length >= 1){
                    empty(`wilayah_binaan`)
                    $.each(response, function(index, item) {
                        $('select#wilayah_binaan').append('<option value="' + item.wilayah_binaan + '">' + item.wilayah_binaan + '</option>');
                    });
                } else {
                    empty(`wilayah_binaan`)
                    // console.log('data tidak ada')
                }

            }, {
                'kacab': kacab
            });
        })


// shelter
        $('select#wilayah_binaan').on('change', function() {
            var wilayah_binaan = $(this).val();
            $('select#kantor_cabang').on('change', function() {
                empty(`shelter`)
            })

            fetchData('/admin/shelter', 'get', function (response) {
                // console.log(`value ${wilayah_binaan} di dapatkan`)
                if(response.length >= 1){
                    empty(`shelter`)
                    $.each(response, function(index, item) {
                        $('select#shelter').append('<option value="' + item.shelter + '">' + item.shelter + '</option>');
                    });
                } else {
                    empty(`shelter`)
                    // console.log('data shelter tidak ada')
                }

            }, {
                'wilayah_binaan': wilayah_binaan
            });

        })




        $('button#filter').on('click', function() {
            var kacab = $('select#kantor_cabang').val();
            var wilbin = $('select#wilayah_binaan').val();
            var shelter = $('select#shelter').val();

            // console.log(kacab)
            // console.log(wilbin)
            // console.log(shelter)
            // $('#myTable').hide('slow');
            $('#myTable').show('slow');

            // Destroy the existing DataTable instance
            var dataTable = $('#myTable').DataTable();
            if (dataTable) {
                dataTable.destroy();
            }


            $('#myTable').DataTable({
                searching: false,
                serverSide: true,
                // ajax: "{{ url('data') }}",
                ajax: {
                    url: '/admin/table',
                    type: 'GET',
                    data: {
                        'kacab': kacab,
                        'wilayah_binaan': wilbin,
                        'shelter': shelter
                    },
                },
                columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        {data: 'kacab', name: 'kacab'},
                        {data: 'shelter', name: 'shelter'},
                        {data: 'wilayah_binaan', name: 'wilayah_binaan'}
                    ],
                // order: [],
                    ordering: false,
                paging: true,
                pageLength: 10

            });
        })
    })

</script>
@endsection
