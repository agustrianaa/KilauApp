<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Ajax CRUD - SantriKoding.com</title>
    <style>
        body {
            background-color: lightgray !important;
        }

        </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script> --}}

    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">LARAVEL CRUD AJAX - <a href="https://santrikoding.com">WWW.SANTRIKODING.COM</a></h4>
                <div class="card border-0 shadow-sm rounded-md mt-4">
                    <div class="card-body">

                        <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-post">TAMBAH</a>
                        <form>
                        <select id="fruit-select" id="fruit-select" name="fruit">
                            <option value=""></option>
                            <option value="Faried Yoga Prawira">Faried Yoga Prawira</option>
                            <option value="yoga">yoga</option>
                            <option value="jaya">jaya</option>
                            <option value="mhd">mhd</option>
                        </select>
                    </form>

                        <table class="table table-bordered table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>nama</th>
                                    <th>shelter</th>
                                    <th>no KK</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="table-posts">
                            {{-- @foreach($anak as $an)
                                <div class="halo">
                                    <td>{{ $an->nama }}</td>
                                    <td>{{ $an->shelter }}</td>
                                    <td>{{ $an->no_kk }}</td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" id="btn-edit-an" data-id="{{ $an->id }}" class="btn btn-primary btn-sm">EDIT</a>
                                        <a href="javascript:void(0)" id="btn-delete-an" data-id="{{ $an->id }}" class="btn btn-danger btn-sm">DELETE</a>
                                    </td>
                                </tr>
                            </div>
                            @endforeach --}}
                        </tbody>
                            {{-- <tbody id="content"></tbody> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('calonAnak.modalCreate')
    @include('calonAnak.modal-edit')
    {{-- @include('modalCreate') --}}
</body>
</html>
