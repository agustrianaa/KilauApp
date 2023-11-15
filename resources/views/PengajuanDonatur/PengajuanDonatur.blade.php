@extends('layout.main')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="row">
                    <h2>Tambah Donatur</h2>
                </div>

                <div class="card">
                    <div class="card-body">
                        <input type="hidden" value="{{ $id }}" id="anak_id">
                        <div class="col-12" id="cariDonatur">
                            <div class="text-center mb-2">
                                <h3>Pilih Donatur</h3>
                            </div><br>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <div class="float-end">
                                        <b>Nama Donatur : </b>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control" id="namaDonatur" name="donatur_id" placeholder="Cari Nama Donatur...">
                                    <div id="hasil"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h5 class="card-title" id="cardTitle"></h5>
                            <div class="col-12 " id="cardContent">
                                <!-- Isi lainnya berada di js -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })


        $('#namaDonatur').on('keyup', function() {
            var query = $(this).val();
            if (query != '') {
                $.ajax({
                    url: "{{ route('admin.cariDonatur')}}",
                    type: 'GET',
                    data: {
                        query: query
                    },
                    dataType: 'json',
                    success: function(data) {
                        /* SEARCH Cara yang PERTAMA */
                        $('#hasil').empty();
                        var pencarian = ' ';
                        $.each(data, function(key, value) {
                            var listDonatur = $('<div class="card" style="display:block; position:relative">' + value.name + ' ' + value.no_hp + '</div>');
                            listDonatur.click(function() {
                                showDonatur(value);

                            });
                            $('#hasil').append(listDonatur);

                        });

                    }
                });
            } else {
                // Jika query kosong, hapus elemen-elemen yang ada di dalam #hasil
                $('#hasil').empty();
            }
        });

        // cara yang pertama
        function showDonatur(data) {
            console.log('ini dataid', data.id)
            $('#donaturId').val(data.id);
            // var cardTitle = data.name;
            var cardContent = '<input type="hidden" id="donaturId" value="' + data.id + '" />';
            cardContent += '<button id="" class="btn btn-info"><i class="fas fa-arrow-left"></i> Kembali ke pencarian</button><div class="col-md-4 mx-auto"><div class="card card-info"><div class="card-header">Data Donatur</div>'
            cardContent += ' <table class="table"> <tr><td>Nama Donatur</td><td>' + data.name + '</td></tr>';
            cardContent += '<tr><td>Nomor HP</td><td>' + data.no_hp + '</td></tr>';
            cardContent += '<tr><td>Alamat</td><td>' + data.alamat + '</td></tr>';
            cardContent += '<tr><td>Bank</td><td>' + data.nama_bank + ', ' + data.no_rek + '</td></tr></table>';
            cardContent += '<div class="card-footer"><button id="simpanButton" class="btn btn-info float-right">Simpan</button></div>';
            cardContent += '</div></div>';


            // Isi card dengan data lengkap
            // $('#cardTitle').text(cardTitle);
            $('#cardContent').html(cardContent);

            //Sembunyikan pencarian
            $('#cariDonatur').hide();
        }

        // Ketika tombol "Simpan" diklik, lakukan aksi penyimpanan
        $(document).on("click", "#simpanButton", function() {
            var donaturId = $('#donaturId').val();
            var anakId = $('#anak_id').val();

            console.log("anak id:", anakId);
            $.ajax({
                url: "{{ route('admin.simpanDonatur')}}",
                method: "POST",
                data: {
                    donaturId: donaturId,
                    anakId: anakId,
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: 'Pilihan donatur berhasil tersimpan',
                    }).then(() => {
                        // Arahkan ke halaman '/pengajuan-donatur'
                        window.location.href = '{{ route("admin.aju-donatur") }}';
                    });
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>
@endsection