@extends('layout.main')
@section('content')

<link rel="stylesheet" href="{{ asset('css/tabel-data-view.css') }}">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0">Detail Anak</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                      <li class="breadcrumb-item active">Detail Anak</li>
                  </ol>
              </div>
          </div><!-- End row -->
      </div><!-- End container-fluid -->
  </div>
  <!-- End content-header -->

  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
          <div class="card">
            <div class="card-body">
                <h5 class="card-title ml-2">Nama : {{ $record->name }}</h5>
                <div class="float-right">
                  <a href="" class="btn btn-info mx-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge-fill" viewBox="0 0 16 16">
                      <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z"/>
                    </svg>
                    Tombol 1
                  </a>
                  <a href="" class="btn btn-warning mx-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hammer" viewBox="0 0 16 16">
                      <path d="M9.972 2.508a.5.5 0 0 0-.16-.556l-.178-.129a5.009 5.009 0 0 0-2.076-.783C6.215.862 4.504 1.229 2.84 3.133H1.786a.5.5 0 0 0-.354.147L.146 4.567a.5.5 0 0 0 0 .706l2.571 2.579a.5.5 0 0 0 .708 0l1.286-1.29a.5.5 0 0 0 .146-.353V5.57l8.387 8.873A.5.5 0 0 0 14 14.5l1.5-1.5a.5.5 0 0 0 .017-.689l-9.129-8.63c.747-.456 1.772-.839 3.112-.839a.5.5 0 0 0 .472-.334z"/>
                    </svg>
                    Tombol 2
                  </a>
                  <a href="" class="btn btn-success mx-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                      <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                      <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                      <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                    </svg>
                    Tombol 3
                  </a>
                </div>

              <hr class="ml-1 mr-1 mt-5">
              <div class="containera">
                <div class="left-boxa">

                  <div class="container-fluid">
                    <div class="top-lefta">
                      <div class="card rounded">
                        <div class="card-body">
                          <div class="gambar">
                            <img src="{{ asset('images/iahnf.jpg') }}" alt="">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="container-fluid">
                    <div class="bottom-lefta">
                      <div class="card rounded">
                        <div class="card-body">
                          <div class="list-group">
                            <p class="list-group-item">{{ $record->name }}</p>
                
                            <p class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                              <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
                            </svg>
                              SD</p>
                
                            <p class="list-group-item">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z"/>
                                <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V1Zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3V1Z"/>
                              </svg>
                              SDN</p>
                
                            <p class="list-group-item">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ol" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z"/>
                                <path d="M1.713 11.865v-.474H2c.217 0 .363-.137.363-.317 0-.185-.158-.31-.361-.31-.223 0-.367.152-.373.31h-.59c.016-.467.373-.787.986-.787.588-.002.954.291.957.703a.595.595 0 0 1-.492.594v.033a.615.615 0 0 1 .569.631c.003.533-.502.8-1.051.8-.656 0-1-.37-1.008-.794h.582c.008.178.186.306.422.309.254 0 .424-.145.422-.35-.002-.195-.155-.348-.414-.348h-.3zm-.004-4.699h-.604v-.035c0-.408.295-.844.958-.844.583 0 .96.326.96.756 0 .389-.257.617-.476.848l-.537.572v.03h1.054V9H1.143v-.395l.957-.99c.138-.142.293-.304.293-.508 0-.18-.147-.32-.342-.32a.33.33 0 0 0-.342.338v.041zM2.564 5h-.635V2.924h-.031l-.598.42v-.567l.629-.443h.635V5z"/>
                              </svg>
                              Kelas 5</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                
                <div class="right-boxa">
                  <div class="">
                      <div class="">
                          <div class="row">
                              <div class="col-md-2">
                                  <div class="tombol" id="data-anak" onclick="showTable('data-anak-table')">Data Anak</div>
                              </div>
                              <div class="col-md-2">
                                  <div class="tombol" id="data-pendidikan" onclick="showTable('data-pendidikan-table')">Data Pendidikan</div>
                              </div>
                              <div class="col-md-2">
                                  <div class="tombol" id="data-keluarga" onclick="showTable('data-keluarga-table')">Data Keluarga</div>
                              </div>
                          </div>
                          <table id="data-anak-table" class="table table-striped">
                              <tbody>
                                <tr>
                                  <td>Nama</td>
                                  <td>:</td>
                                  <td>{{ $record->name }}</td>
                                  <td></td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td>Jenis Kelamin</td>
                                  <td>:</td>
                                  <td>{{ $record->jenis_kelamin }}</td>
                                  <td></td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td>Agama</td>
                                  <td>:</td>
                                  <td>{{ $record->agama }}</td>
                                  <td></td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td>Kepala Keluarga</td>
                                  <td>:</td>
                                  <td>{{ $record->kepala_keluarga }}</td>
                                  <td></td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td>Anak ke</td>
                                  <td>:</td>
                                  <td>{{ $record->anak_ke }}</td>
                                  <td></td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td>Tempat Tanggal Lahir</td>
                                  <td>:</td>
                                  <td>{{ $record->teml }}, {{ $record->tgll }}</td>
                                  <td></td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td>Status Binaan</td>
                                  <td>:</td>
                                  <td>{{ $record->status_binaan }}</td>
                                  <td></td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td><a href="" class="btn btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                    Tombol Edit</a>
                                  </td>
                                </tr>
                                  <!-- Isi tabel Data Anak disini -->
                              </tbody>
                          </table>
                          <table id="data-pendidikan-table" class="table table-striped" style="display: none;">
                              <tbody>
                                  <tr>
                                      <td>Pendidikan 1</td>
                                      <td>:</td>
                                      <td>Nilai Pendidikan 1</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>Pendidikan 1</td>
                                      <td>:</td>
                                      <td>Nilai Pendidikan 1</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>Pendidikan 1</td>
                                      <td>:</td>
                                      <td>Nilai Pendidikan 1</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>Pendidikan 1</td>
                                      <td>:</td>
                                      <td>Nilai Pendidikan 1</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>Pendidikan 1</td>
                                      <td>:</td>
                                      <td>Nilai Pendidikan 1</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>Pendidikan 1</td>
                                      <td>:</td>
                                      <td>Nilai Pendidikan 1</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>Pendidikan 1</td>
                                      <td>:</td>
                                      <td>Nilai Pendidikan 1</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>Pendidikan 1</td>
                                      <td>:</td>
                                      <td>Nilai Pendidikan 1</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>Pendidikan 1</td>
                                      <td>:</td>
                                      <td>Nilai Pendidikan 1</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>Pendidikan 1</td>
                                      <td>:</td>
                                      <td>Nilai Pendidikan 1</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="" class="btn btn-success">Tombol Edit</a></td>
                                  </tr>
                                  <!-- Isi tabel Data Pendidikan disini -->
                              </tbody>
                          </table>
                          <table id="data-keluarga-table" class="table table-striped" style="display: none;">
                              <tbody>
                                  <tr>
                                      <td>Anggota Keluarga 1</td>
                                      <td>:</td>
                                      <td>Data Anggota Keluarga 1</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>Anggota Keluarga 1</td>
                                      <td>:</td>
                                      <td>Data Anggota Keluarga 1</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>Anggota Keluarga 1</td>
                                      <td>:</td>
                                      <td>Data Anggota Keluarga 1</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>Anggota Keluarga 1</td>
                                      <td>:</td>
                                      <td>Data Anggota Keluarga 1</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>Anggota Keluarga 1</td>
                                      <td>:</td>
                                      <td>Data Anggota Keluarga 1</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="" class="btn btn-success">Tombol Edit</a></td>
                                  </tr>
                                  <!-- Isi tabel Data Keluarga disini -->
                              </tbody>
                          </table>
                          <div class="container" style="display: flex; justify-content: center;">
                              <a href="{{ route('admin.ajax-crud-datatable') }}" class="btn btn-primary">Kembali</a>
                          </div>
                      </div>
                  </div>
              </div>

              <script>
                function showTable(tableId) {
                    // Menyembunyikan semua tabel terlebih dahulu
                    var tables = document.querySelectorAll('table');
                    tables.forEach(function(table) {
                        table.style.display = 'none';
                    });
            
                    // Menampilkan tabel yang sesuai berdasarkan ID
                    document.getElementById(tableId).style.display = 'table';
                }
              </script>
              
            </div>
            </div>
          </div>
        </div>

  </section><!-- End Main content -->
</div><!-- End content-wrapper -->
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@endsection