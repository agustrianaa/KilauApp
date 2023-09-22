<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDIT POST</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <input type="hidden" id="post_id">

                <div class="form-group">
                    <label for="name" class="control-label">nama</label>
                    <input type="text" class="form-control" id="nama-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-edit"></div>
                </div>


                <div class="form-group">
                    <label class="control-label">shelter</label>
                    <textarea class="form-control" id="shelter-edit" rows="4"></textarea>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-shelter-edit"></div>
                </div>

                <div class="form-group">
                    <label class="control-label">no kk</label>
                    <textarea class="form-control" id="no_kk-edit" rows="4"></textarea>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-no_kk-edit"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary" id="update">UPDATE</button>
            </div>
        </div>
    </div>
</div>

<script>
    //button create post event
    $('body').on('click', '#btn-edit-an', function () {

        let post_id = $(this).data('id');

        //fetch detail post with ajax
        $.ajax({
            url: `/calon/${post_id}`,
            type: "GET",
            cache: false,
            success:function(response){

                //fill data to form
                $('#post_id').val(response.data.id);
                $('#nama-edit').val(response.data.nama);
                $('#shelter-edit').val(response.data.shelter);
                $('#no_kk-edit').val(response.data.no_kk);

                //open modal
                $('#modal-edit').modal('show');
            }
        });
    });

    //action update post
    $('#update').click(function(e) {
        e.preventDefault();

        //define variable
        let post_id = $('#post_id').val();
        let nama   = $('#nama-edit').val();
        let shelter = $('#shelter-edit').val();
        let no_kk = $('#no_kk-edit').val();
        let token   = $("meta[name='csrf-token']").attr("content");

        //ajax
        $.ajax({

            url: `/calon/${post_id}`,
            type: "PUT",
            cache: false,
            data: {
                "nama": nama,
                "shelter": shelter,
                "no_kk": no_kk,
                "_token": token
            },
            success:function(response){

                //show success message
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });

                //data post
                let post = `
                    <tr id="index_${response.data.id}">
                        <td>${response.data.nama}</td>
                        <td>${response.data.shelter}</td>
                        <td>${response.data.no_kk}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-an" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-an" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;

                //append to post data
                $(`#index_${response.data.id}`).replaceWith(post);
                $('#table').DataTable().draw();


                //close modal
                $('#modal-edit').modal('hide');


            },
            error:function(error){

                if(error.responseJSON.nama[0]) {

                    //show alert
                    $('#alert-nama-edit').removeClass('d-none');
                    $('#alert-nama-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-nama-edit').html(error.responseJSON.nama[0]);
                }

                if(error.responseJSON.shelter[0]) {

                    //show alert
                    $('#alert-shelter-edit').removeClass('d-none');
                    $('#alert-shelter-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-shelter-edit').html(error.responseJSON.shelter[0]);
                }
                if(error.responseJSON.no_kk[0]) {

                    //show alert
                    $('#alert-no_kk-edit').removeClass('d-none');
                    $('#alert-no_kk-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-no_kk-edit').html(error.responseJSON.no_kk[0]);
                }

            }

        });

    });

</script>
