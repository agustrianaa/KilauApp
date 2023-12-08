var dataKeluargaId = $(this).data('data-keluarga-id');
var noKk = $(this).data('no-kk');
function handleLinkColorClick(dataKeluargaId, noKk) {
    $('#dataKeluargaId').val(dataKeluargaId);
    $('#displayNoKk').val(noKk);
    $('#nomorKartuKeluarga').val('');

    var formAnak = $("#formAnak");
    var inputCariKK = $("#inputCariKK");

    inputCariKK.addClass("sembunyikanInputKK");
    formAnak.removeClass("sembunyikan");
}