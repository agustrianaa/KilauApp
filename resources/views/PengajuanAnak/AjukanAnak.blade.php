@extends('layout.main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
                <div class="col-12">
                    <div class="card">
                        <div class="card-title ml-4 mt-4">
                            <b>Pilih Keluarga</b>
                        </div>
                        <hr class="text-black-50">
                        <div class="card-body">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="float-end">
                                            <b>Nomor Kartu Keluarga :</b>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" class="form-control" id="nomorKartuKeluarga" name="nomorKartuKeluarga">
                                        <div id="hasilPencarian">

                                        </div>
                                    </div>
                                    <div class="col-4">
                                    </div>
                                </div>
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

<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        $('#nomorKartuKeluarga').on('keyup', function() {
                var query = $(this).val();
                console.log(query)
                $.ajax({
                    url: "{{ url('admin/CariKK') }}",
                    method: 'GET',
                    data: { nomorKartuKeluarga: query },
                    dataType: 'json',
                    success: function(data) {
                        var results = '';
                        $.each(data, function(index, item) {
                            results += '<a href="' + item.id + '">' + item.no_kk + '</a><br>';
                        });

                        $('#hasilPencarian').html('<ul>' + results + '</ul>');
                    }
                });
            });
    });

</script>

@endsection
