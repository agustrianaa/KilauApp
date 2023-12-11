@extends('layout.main')
@section('content')

<div class="content-wrapper background">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Tambah Data Tutor</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <div href="{{ route('admin.dashboard') }}" class="text-reset text-decoration-none">Home</div>
                        </li>
                        <!-- <li class="breadcrumb-item"><div href="{{ route('admin.tutor') }}" class="text-reset text-decoration-none">Data Tutor</div></li> -->
                        <li class="breadcrumb-item active">Tambah Data Tutor</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <button id="back" class="btn btn-info"><i class="fas fa-arrow-left"></i> Kembali</button>
                    <form action="javascript:void(0)" id="TutorForm" name="TutorForm" method="POST" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="id" id="idTutor">
                        <div class="row mb-2">
                            <div class="col-4 text-end">
                                <b>Kantor Cabang :</b>
                            </div>
                            <div class="col-4">
                                <select name="kacab" id="kacab" class="form-select">
                                    <option disabled selected>-Pilih Kacab-</option>
                                    @foreach($kacab as $kacab)
                                    <option value="{{$kacab->id_kacab}}" data-kacab-id="{{ $kacab->id_kacab }}">{{$kacab->nama_kacab}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 text-end">
                                <b>Wilayah Binaan :</b>
                            </div>
                            <div class="col-4">
                                <select name="wilbin" id="wilbin" class="form-select">
                                    <option disabled selected>-Pilih Wilayah Binaan-</option>
                                    <!-- <option value="A">Sumedang</option> -->
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 text-end">
                                <b>Shelter :</b>
                            </div>
                            <div class="col-4">
                                <select name="shelter" id="shelter" class="form-select">
                                    <option disabled selected>-Pilih Shelter-</option>
                                    <!-- <option value="A">Sumedang</option> -->
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 text-end">
                                <label>Nama Lengkap : </label>
                            </div>
                            <div class="col-4">
                                <input type="text" placeholder="Nama Lengkap..." class="form-control" name="namaTutor">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 text-end">
                                <b>Pendidikan : </b>
                            </div>
                            <div class="col-4">
                                <select name="pend" id="pend" class="form-select">
                                    <option disabled selected>-Pilih Pendidikan-</option>
                                    <option value="sd">SD</option>
                                    <option value="smp">SMP</option>
                                    <option value="sma">SMA</option>
                                    <option value="sarjana">Sarjana/Diploma</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 text-end">
                                <b>Email : </b>
                            </div>
                            <div class="col-4">
                                <input type="email" placeholder="example@example.com" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 text-end">
                                <b>No HP : </b>
                            </div>
                            <div class="col-4">
                                <input type="text" placeholder="No HP..." class="form-control" name="no_hp">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 text-end">
                                <b>Alamat : </b>
                            </div>
                            <div class="col-4">
                                <textarea type="text" placeholder="Alamat..." class="form-control" name="alamat"> </textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <div class="float-end text-end">
                                    <b>Mata Pelajaran : </b>
                                </div>
                            </div>
                            <div class="col-4">
                                <input type="text" placeholder="Mata Pelajaran..." class="form-control" name="mapel">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 text-end">
                                <b>Foto : </b>
                            </div>
                            <div class="col-4">
                                <input type="file" class="form-control" name="potoTutor">
                            </div>
                        </div> <br>
                        <div class="row mb-2 ">
                            <div class="col-4"></div>
                            <div class="col-4  text-center">
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <button type="submit" id="btn-save" class="btn btn-success">Tambah</button>
                            </div>
                        </div>
                    </form>
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
        });
        
        // var WilbinId;
        // console.log('wilbin selected', WilbinId);

        $('#kacab').on('change', function() {
            // $('#wilbin').empty();
            
            $(this).find('option:selected').each(function() {
                var kacabId = $(this).data('kacab-id');
                console.log('Selected Kacab ID:', kacabId);

                $.ajax({
                    type : 'GET',
                    url : "{{ route('admin.get-wilbin', ['kacabId' => ':kacabId']) }}".replace(':kacabId', kacabId),
                    // url : "/admin/get-wilbin" + kacabId
                    data : {
                        kacabId : kacabId,
                    },
                    success : function (data) {
                        console.log('Terjadi response:', data);
                        $.each(data, function (key, value){
                            $('#wilbin').append('<option value="' + value.id_wilbin + '" data-wilbin-id="' + value.id_wilbin + '">' + value.nama_wilbin + '</option>')
                            console.log('id wilbin', value.id_wilbin)
                        });
                        $('#wilbin').trigger('change');
                        WilbinId = data.length > 0 ? data[0].id_wilbin : null;
                        // $('#wilbin').val(WilbinId);
                        
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            });
        });

        $('#wilbin').on('change', function(){
            // $('#shelter').empty();
            // $(this).find('option.selected').each(function(){
                // var wilbinId = $(this).data('wilbin-id');
                var wilbinId = $(this).val();
                console.log('Selected Wilbin ID : ', wilbinId);

                $.ajax({
                    type : 'GET',
                    url : "{{ route('admin.get-shelter', ['wilbinId' => ':wilbinId']) }}".replace(':wilbinId', wilbinId),
                    data : {
                        wilbinId : wilbinId,
                    },
                    success : function (data) {
                        
                        $.each(data, function (key,value){
                            $('#shelter').append('<option value="' + value.id_shelter + '" data-wilbin-id= "' + value.id_shelter + '">' + value.nama_shelter + '</option>')
                            console.log('id shelter', value.id_shelter)
                        });

                        // ShelterId = data.length > 0 ? data[0].id_shelter : null;
                        // $('#shelter').val(ShelterId);
                        $('#shelter').trigger('change');
                    },
                    error : function (error){
                        console.log(error);
                    }
                })
            // });
        });

        $('#shelter').on('change', function(){})

    });

    $('#TutorForm').on('submit', function(e) {
        e.preventDefault();
        var formTutor = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "{{route('admin.save-tutor')}}", //jangan lupaa
            data: formTutor,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                console.log(data);
                $("#btn-save").html('Submit');
                $("#btn-save").attr("disabled", false);
                Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: 'Data Tutor berhasil tersimpan',
                    }).then(() => {
                        // Arahkan ke halaman '/pengajuan-donatur'
                        window.location.href = '{{ route("admin.tutor") }}';
                    });
            },
            error: function(data) {
                console.log(data);
            }
        });
    });

    
</script>


@endsection