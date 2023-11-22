<a href="javascript:void(0)" data-toggle="tooltip" onClick="detailDatakeluarga({{ $id }}, '{{ $id_anaks }}')" title="Detail Anak & Keluarga" class="show btn btn-sm btn-info show text-white shadow-sm">
    <i class="bi bi-file-richtext"></i> Detail
</a>
<a href="javascript:void(0)" data-toggle="tooltip" onClick="validasiAnak({{ $id_anaks }})" title="Validasi Anak" class="show btn btn-sm btn-outline-warning show text-white shadow-sm">
    <i class="bi bi-check2"></i> Validasi
</a>
<a href="javascript:void(0);" id="delete-compnay" onClick="delete_datakeluarga({{ $id }})" data-toggle="tooltip" title="Hapus Data" class="delete btn btn-sm btn-danger shadow-sm">
    <i class="bi bi-trash3-fill"></i> Delete
</a>
