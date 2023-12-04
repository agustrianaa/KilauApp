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
                    <form action="#">
                        <input type="hidden" class="form-control" name="" id="idTutor">
                        <div class="row mb-2">
                            <div class="col-4 text-end">
                                <b>Kantor Cabang :</b>
                            </div>
                            <div class="col-4">
                                <select name="kacab" id="kacab" class="form-select">
                                    <option disabled selected>-Pilih Kacab-</option>
                                    <option value="A">Sumedang</option>
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
                                    <option value="A">Sumedang</option>
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
                                    <option value="A">Sumedang</option>
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
                                <button type="submit" class="btn btn-success">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    // SCRIPT
</script>

@endsection