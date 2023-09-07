@extends('layout.main')
@section('content')


<div class="content-wrapper">
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="row">
                <h1>Data Keluarga ya Woik</h1>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Bordered Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="overflow-x:auto;">
                    <table class="table table-bordered"  id="data-keluarga">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>No KK</th>
                            <th>Kepala Keluarga</th>
                            <th>Wilayah Binaan</th>
                            <th style="width: 150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    </table>
                </div>

                <div class="pull-right mb-2">
                    <a class="btn btn-primary" onClick="add_datakeluarga()" href="javascript:void(0)"> Tambahkan Data Keluarga</a>
                </div>
                <!-- Modal Data Keluarga -->
                <div class="modal fade" id="modal-datakeluarga" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Data User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="javascript:void(0)" id="formdataKeluarga" name="formdataKeluarga" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="id">
                                    <div class="form-group">
                                        <label for="no_kk" class="col-sm-2 control-label">No KK</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="No Kartu Keluarga..." maxlength="50" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">KepalaKeluarga</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="kepala_keluarga" name="kepala_keluarga" placeholder="Kepala Keluarga..." maxlength="50" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Wilayah Binaan</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="wilbin" name="wilbin" placeholder="Wilayah Binaan..." required="">
                                        </div>
                                    </div>
                                    <div class="col-sm-offset-2 col-sm-10"><br/>
                                        <button type="submit" class="btn btn-primary" id="btn-save">Save</button>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer"></div>
                        </div>
                    </div>
                </div><!-- End Modal -->

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
        }),
        $('#data-keluarga').DataTable({
            processing : true,
            serverSide : true,
            ajax : "{{ url('admin/datakeluarga') }}",
            columns : [
                { data: 'id', name: 'id'},
                { data: 'no_kk', name: 'no_kk'},
                { data: 'kepala_keluarga', name: 'kepala_keluarga'},
                { data: 'wilbin', name: 'wilbin'},
                { data: 'action', name: 'action', orderable: false},
            ],
            order: [[0, 'desc']],
        });
    });

    //Menambahkan data keluarga
    function add_datakeluarga(){
        $('#formdataKeluarga').trigger("reset");
        $('#modalKeluarga').html("Tambahkan Data Keluarga");
        $('#modal-datakeluarga').modal('show');
        $('#id').val('');
    }

    //Menghapus data keluarga
    function delete_datakeluarga(id){
        if (confirm("Are you sure you want to delete")==true) {
            var id = id;
            $.ajax({
                type:"POST",
                url: "{{ url('admin/delete-datakeluarga') }}",
                data: {id:id},
                dataType: 'json',
                success: function(res) {
                    var oTable = $('#data-keluarga').DataTable();
                    oTable.ajax.reload(false); //agar tidak perlu refresh halaman
                }
            });
        }
    }

    //menampilkan detail data keluarga
    function detailDatakeluarga(id){
        // $.get('admin/detail-keluarga/'+ id, function(data){
        //     $('#detail-container').html(data);
        // });
        // Mendapatkan URL dengan menggunakan route() function dari Laravel
        var url = "{{ route('admin.detail-datakeluarga', ':id') }}";
        url = url.replace(':id', id);
        
        // Redirect ke halaman baru
        window.location.href = url;
    }

    $('#formdataKeluarga').submit(function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "{{ url('admin/save-datakeluarga') }}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#modal-datakeluarga").modal('hide');
                var oTable = $('#data-keluarga').DataTable();
                oTable.ajax.reload(false);
                $("#btn-save").html('Submit');
                $("#btn-save").attr("disabled", false);
            },
            error: function(data){
                console.log(data);
            }
        })
    });
</script>
@endsection