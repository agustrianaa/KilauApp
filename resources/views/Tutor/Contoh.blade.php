<div class="col-md-6 mb-3">
    <label for="kecamatan_id-create" class="form-label"><strong>Kecamatan/lainnya:</strong></label><br />
    <select class="selectpicker" data-live-search="true" name="lokus_id" id="kecamatan-create{{$klarifikasis->id}}" required>
        <option value="">Pilih Kecamatan</option>
        @forelse ($lokus as $lokuss)
        <option value="{{ $lokuss->id }}">{{ $lokuss->nama_lokus }}</option>
        @empty
        <option value="NULL">Lokus belum diinput</option>
        @endforelse
    </select>
</div>

<div class="col-md-6 mb-3">
    <label for="desa_id-create" class="form-label"><strong>Desa/lainnya:</strong></label><br />
    <select class="selectpicker" data-live-search="true" name="sublokus_id" id="desa-create{{$klarifikasis->id}}" required>
        <option value="">Pilih Desa</option>
        @forelse ($loku as $data)
        <option value="{{ $data->id }}">{{ $data->nama_lokus }}</option>
        @empty
        <option value="NULL">Sub Lokus belum diinput</option>
        @endforelse
    </select>
</div>

<script>
    $(document).ready(function() {
        const klarifikasiData = @json($klarifikasi);
        const kecamatanData = @json($lokus);
        const desaData = @json($loku);

        klarifikasiData.forEach(klarifikasi => {
            const kecamatanSelect = $('#kecamatan-create' + klarifikasi.id);
            const desaSelect = $('#desa-create' + klarifikasi.id);

            // Mengisi dropdown kecamatan dengan opsi yang sesuai
            kecamatanSelect.empty();
            kecamatanSelect.append($('<option>').val('').text('Pilih Kecamatan'));
            kecamatanData.forEach(kecamatan => {
                kecamatanSelect.append($('<option>').val(kecamatan.id).text(kecamatan.nama_lokus));
            });

            // Menghubungkan event handler untuk perubahan kecamatan
            kecamatanSelect.on('change', function() {
                const selectedKecamatan = $(this).val();

                // Mengosongkan dropdown desa
                desaSelect.empty();
                desaSelect.append($('<option>').val('').text('Pilih Desa'));

                // Mengisi dropdown desa dengan opsi yang sesuai
                desaData.forEach(desa => {
                    if (desa.up_line == selectedKecamatan) {
                        desaSelect.append($('<option>').val(desa.id).text(desa.nama_lokus));
                    }
                });

                // Memperbarui tampilan Select2 untuk dropdown desa
                desaSelect.selectpicker('refresh');
            });

            // Inisialisasi Select2 untuk dropdown kecamatan dan desa
            kecamatanSelect.selectpicker();
            desaSelect.selectpicker();
        });
    });



    
    $('#wilbin').on('change', function(){
            $('#shelter').empty();
            $(this).find('option.selected').each(function(){
                var wilbinId = $(this).data('wilbin-id');
                console.log('Selected Wilbin ID : ', wilbinId);
                $.ajax({
                    type : 'GET',
                    url : '{{ route('admin.get-shelter', ['wilbinId' => ':wilbinId']) }}'.replace(':wilbinId', wilbinId),
                    data : {
                        wilbinId : wilbinId,
                    },
                    success : function (data) {
                        
                        $.each(data, function (key,value){
                            $('#shelter').append('<option value="' + value.id_shelter + '" data-wilbin-id= "' + value.id_shelter + '">' + value.nama_shelter + '</option>')
                        });

                        // ShelterId = data.length > 0 ? data[0].id_shelter : null;

                        // $('#shelter').val(ShelterId);
                    },
                    error : function (error){
                        console.log(error);
                    }
                })
            });
        });

        $('#shelter').on('change', function(){})
</script>