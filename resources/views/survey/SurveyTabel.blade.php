@extends('layout.main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <h4> Survey Tabel</h4>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered" id="tabelsurvey">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Lengkap</th>
                                        <th>TTL</th>
                                        <th>Nama Sekolah</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Contoh</td>
                                        <td>contoh...</td>
                                        <td>contoh...</td>
                                        <td>@include('survey.SurveyTabel-action')</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Contoh</td>
                                        <td>contoh...</td>
                                        <td>contoh...</td>
                                        <td>@include('survey.SurveyTabel-action')</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Contoh</td>
                                        <td>contoh...</td>
                                        <td>contoh...</td>
                                        <td>@include('survey.SurveyTabel-action')</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

@endsection