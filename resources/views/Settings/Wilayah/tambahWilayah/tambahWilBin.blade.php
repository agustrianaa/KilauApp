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
    .selection {
        border-color: black;
    }
    .select2 .select2-container .select2-container--default .select2-container--below .select2-container--open {
        border-color: black;
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
                        <li class="breadcrumb-item active">Data Wilayah Binaan</li>
                        <li class="breadcrumb-item active">Tambah Wilayah Binaan</li>
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
                        <h4 id="tmbh">Tambah Wilayah Binaan</h4><small id="kilauIn">Kilau Indonesia</small>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="col-12">
                            <form action="{{ route('admin.simpanGetKacab') }}" method="POST">
                                @csrf
                                <input type="hidden" name="idUntukKacab">
                                <div class="row mb-4">
                                    <div class="col-3">
                                        <div class="float-end">
                                            Cari Kantor Cabang :
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <select class="form-select" name="searchKacab" id="cariKantorCabang" style="width: 300px; height:100px;">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    <div class="col-3"></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <div class="float-end">
                                            Nama Wilayah Binaan :
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <input name="namaWilbin" id="tbhnamawilbin" type="text" class="form-control" placeholder="Nama Wilayah Binaan...">
                                    </div>
                                    <div class="col-3"></div>
                                </div>
                                <div class="row">
                                    <div class="col-3"></div>
                                    <div class="col-6">
                                        <div class="text-center">
                                            <a href="{{ route('admin.WilBinView') }}" class="btn btn-warning">Kembali</a>
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
$('#cariKantorCabang').select2({
        placeholder: 'Pilih Kantor Cabang...',
        tokenSeparators: [',', ' '],
        width: '100%',
        allowClear: true,
        ajax: {
            url: '{{ route("admin.getnamakacab") }}',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });

$('#cariKantorCabang').on('select2:select', function (e) {
    var data = e.params.data;
    console.log('Selected Data:', data);
    $('input[name="idUntukKacab"]').val(data.id);
});




</script>
{{-- <script type="text/javascript">
    // SCRIPT
</script> --}}

@endsection