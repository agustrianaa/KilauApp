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
            <select class="form-select" name="tahun" id="tahun" aria-label="Default select example">
                <option selected>-- Pilih --</option>
              </select>
        </div>
        <div class="col-lg-2 bg-white mx-2 mb-2">
            <label class="form-label select-label px-2">Kantor Cabang</label>
            <select class="form-select" name="kantor_cabang" id="kantor_cabang" aria-label="Default select example">
                <option selected>-- Pilih --</option>
              </select>
        </div>
        <div class="col-lg-2 bg-white mx-2 mb-2">
            <label class="form-label select-label px-2">Wilayah Binaan</label>
            <select class="form-select" name="wilayah_binaan" id="wilayah_binaan" aria-label="Default select example">
                <option selected>-- Pilih --</option>
              </select>
        </div>
        <div class="col-lg-2 bg-white mx-2 mb-2">
            <label class="form-label select-label px-2">Shelter</label>
            <select class="form-select" name="shelter" id="shelter" aria-label="Default select example">
                <option selected>-- Pilih --</option>
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
                                    <th>Id</th>
                                    <th>title</th>
                                    <th>content</th>
                                    <th>Action</th>
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


{{-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> --}}
<script>
    $(document).ready( function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
                url: "{{ route('admin.report') }}",
                type: 'get',
                dataType : "json",
                success: function( result ) {
                    // result
                    // $( "#weather-temp" ).html( "<strong>" + result + "</strong> degrees" );
                    for (var i = 0; i < result.length; i++) {
                        var item = result[i];
                        // Lakukan sesuatu dengan setiap objek, misalnya, tampilkan di konsol
                        // console.log("ID: " + item.id);
                        $('select#kantor_cabang').append(`<option value="${item.kacab}">${item.kacab}</option>`)
                        // console.log("No KK: " + item.no_kk);
                        // Tambahkan logika bisnis Anda di sini
                    }
                }
            })

        $('select#kantor_cabang').on('change', function() {
            var kantor_cabang = $(this).val();

            $.ajax({
                url: "/admin/report",
                type: 'get',
                data: {
                    'kacab': kantor_cabang
                },
                success: function( result ) {
                    // result
                    // $( "#weather-temp" ).html( "<strong>" + result + "</strong> degrees" );

                    $('select#cabang').append(`<option value="${result.kacab}">${result.kacab}</option>`)
                }
            })
        })


        $('button#filter').on('click')
    })
//     $(document).ready( function() {
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });

//         $('#navSurvey').children().first().addClass('bg-white');
//         $('div#formkel').children().hide();
//         $('div#asset').show("slow");

//     });

// // kesehatan
//     // disabled
//     $('select#lantai').on('change', function() {
//         $('input#lantaiinput').prop('disabled', false);
//         if($('select#lantai').val() === 'Three'){
//             $('input#lantaiinput').prop('disabled', true);
//             // console.log($('#dinding').val());
//         }
//     });
//     $('select#dinding').on('change', function() {
//         $('input#dindinginput').prop('disabled', false);
//         if($('select#dinding').val() === 'Three'){
//             $('input#dindinginput').prop('disabled', true);
//             // console.log($('#dinding').val());
//         }
//     });
// // kesehatan



//     // each form
//     $('.nav-link').on('click', function() {
//         $('.nav-item').removeClass('bg-white');
//         $('.nav-link').removeClass('text-dark');
//         $(this).parent().addClass('bg-white');
//         $(this).addClass('text-dark');

//         // tampilkan sesuai navlink nya
//         var id = $(this).attr('id');
//         $(`div#formkel`).children().hide();
//         if($(`div#${id}`).attr('id') === id) {
//             $(`div#${id}`).show();
//         }
//     })
</script>
@endsection
