@extends('layout.main')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="row text-center">
                    <h1>INI HALAMAN PILIH DONATUR</h1>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="col-12" id="cariDonatur">
                            <div class="text-center mb-2">
                                <h3>Pilih Donatur</h3>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <div class="float-end">
                                        <b>Nama Donatur : </b>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control" id="namaDonatur" name="namaDonatur" placeholder="Cari Nama Donatur...">
                                    <div id="hasil"></div>
                                </div>
                            </div>
                        </div>                         
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    $(document).ready(function(){
    $('#namaDonatur').on('keyup', function(){
        var query = $(this).val();

        if (query === "") {
            // Jika bidang input kosong, hapus hasil pencarian
            $('#hasil').empty();
        } else {
            // Jika bidang input tidak kosong, lakukan pencarian dengan AJAX
            $.ajax({
                url : "{{ route('admin.cariDonatur')}}",
                type : 'GET',
                data: {query: query},
                dataType: 'json',
                success: function(data){
                    $('#hasil').empty();
                    $.each(data, function(key, value){
                        $('#hasil').append('<li>' + value.name + value.no_hp + '</li>');
                    });
                }
            });
        }
    });
});
</script>
@endsection