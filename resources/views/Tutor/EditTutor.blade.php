@extends('layout.main')
@section('content')

<div class="content-wrapper background">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Edit Data Tutor</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}" class="text-reset text-decoration-none">Home</a>
                        </li>
                        <!-- <li class="breadcrumb-item"><div href="{{ route('admin.tutor') }}" class="text-reset text-decoration-none">Data Tutor</div></li> -->
                        <li class="breadcrumb-item active">Edit Data Tutor</li>
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
                        <input type="hidden" class="form-control" name="id" id="idTutor" value="{{ $tutor->id_tutor }}">
                        <div class="row mb-2">
                            <div class="col-4 text-end">
                                <b>Kantor Cabang :</b>
                            </div>
                            <div class="col-4">
                                <select name="kacab" id="kacab" class="form-select">
                                    <option disabled selected>-Pilih Kacab-</option>
                                    @foreach($kacab as $kacab)
                                    <option value="{{$kacab->id_kacab}}" data-kacab-id="{{ $kacab->id_kacab }}" {{ (isset($tutor) && $tutor->kacab_id == $kacab->id_kacab) ? 'selected' : '' }}>{{$kacab->nama_kacab}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 text-end">
                                <b>Wilayah Binaan :</b>
                            </div>
                            <div class="col-4">
                                <select name="wilbin" id="wilbin" class="form-select" required>
                                    <option disabled selected>-Pilih Wilayah Binaan-</option>
                                    @foreach($wilbin as $wilbin)
                                    <option value="{{$wilbin->id_wilbin}}" data-kacab-id="{{ $wilbin->id_wilbin }}" {{ (isset($tutor) && $tutor->wilbin_id == $wilbin->id_wilbin) ? 'selected' : '' }}>{{$wilbin->nama_wilbin}}</option>
                                    @endforeach
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
                                    @foreach($shelter as $shelter)
                                    <option value="{{$shelter->id_shelter}}" data-kacab-id="{{ $shelter->id_shelter }}" {{ (isset($tutor) && $tutor->shelter_id == $shelter->id_shelter) ? 'selected' : '' }}>{{$shelter->nama_shelter}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 text-end">
                                <label>Nama Lengkap : </label>
                            </div>
                            <div class="col-4">
                                <input type="text" placeholder="Nama Lengkap..." class="form-control" name="namaTutor" id="editNama" value="{{$tutor->nama ?? 'Tidak Ada Data'}}">
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
                                <input type="email" placeholder="example@example.com" class="form-control" name="email" value="{{$tutor->email ?? 'Tidak Ada Data'}}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 text-end">
                                <b>No HP : </b>
                            </div>
                            <div class="col-4">
                                <input type="text" placeholder="No HP..." class="form-control" name="no_hp" value="{{$tutor->no_hp?? 'Tidak Ada Data'}}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 text-end">
                                <b>Alamat : </b>
                            </div>
                            <div class="col-4">
                                <textarea type="text" placeholder="Alamat..." class="form-control" name="alamat" id="editAlamat"> value="{{$tutor->alamat ?? 'Tidak Ada Data'}}" </textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <div class="float-end text-end">
                                    <b>Mata Pelajaran : </b>
                                </div>
                            </div>
                            <div class="col-4">
                                <input type="text" placeholder="Mata Pelajaran..." class="form-control" name="mapel" value="{{$tutor->mapel ?? 'Tidak Ada Data'}}">
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
                                <button type="submit" id="btn-save" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var nilaiPendidikan = "{{ optional($tutor)->pendidikan ?? '' }}";
        document.getElementById('pend').value = nilaiPendidikan;
    });

    document.getElementById('back').addEventListener('click', function() {
        window.location.href = "{{ route('admin.tutor') }}";
    });

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
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
                    text: 'Data Tutor berhasil diperbarui',
                }).then(() => {
                    // Arahkan ke halaman '/pengajuan-donatur'
                    window.location.href = '{{ route("admin.tutor") }}';
                });
            },
            error: function(data) {
                console.log(data);
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Ada Kesalahan Memperbarui data',
                });
            }
        });
    });
</script>


@endsection