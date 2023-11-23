{{-- <a href="javascript:void(0);" id="delete-compnay" onClick="delete_datakeluarga({{ $id_kacab }})" data-toggle="tooltip" title="Hapus Data" class="delete btn btn-sm btn-danger shadow-sm">
    <i class="bi bi-trash3-fill"></i> Edit
<a href="javascript:void(0);" id="delete-compnay" onClick="delete_datakeluarga({{ $id_kacab }})" data-toggle="tooltip" title="Hapus Data" class="delete btn btn-sm btn-danger shadow-sm">
    <i class="bi bi-trash3-fill"></i> Delete
</a> --}}
<a href="javascript:void(0);" onclick="editKacab({{ $id_kacab }})" data-bs-toggle="modal" data-bs-target="#editModal" data-toggle="tooltip" title="Edit Kantor Cabang" class="edit btn btn-sm btn-info shadow-sm text-white">
    <i class="bi bi-pencil-square"></i> Edit
</a>
<a href="javascript:void(0);" onclick="deleteKacab({{ $id_kacab }})" id="delete-compnay" data-toggle="tooltip" title="Hapus Data" class="delete btn btn-sm btn-danger shadow-sm">
    <i class="bi bi-trash3-fill"></i> Delete
</a>