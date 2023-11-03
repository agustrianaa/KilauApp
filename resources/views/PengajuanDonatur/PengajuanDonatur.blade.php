@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="row text-center">
                    <h1>INI HALAMAN PENGAJUAN DONATUR</h1>
                </div>

                <div class="card">
                    <div class="card-header">
                        Pengajuan Donatur
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Agama</th>
                                        <th>Status Beasiswa</th>
                                        <th>Hasil Survey</th>
                                        <th>Donatur</th>
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

@endsection