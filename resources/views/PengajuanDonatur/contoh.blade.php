<div class="col-lg-4">
    <!-- Dropdown dengan ID 'multiSelect' yang memungkinkan seleksi banyak opsi -->
    <select id="multiSelect" class="form-select" multiple="multiple" style="width: 300px; height:100px;">
        <option value="Indramayu">Indramayu</option>
        <option value="Bandung">Bandung</option>
        <option value="Bogor">Bogor</option>
        <option value="Sumedang">Sumedang</option>
    </select>
</div>

<div class="col-md-3">
    <select class="multiple-kacab form-select" name="kacab[]" multiple="multiple">
        @foreach ($data as $item)
        <option value="{{ $item->kacab }}">{{ $item->kacab }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-3">
    <select class="multiple-wilbin form-select" name="wilayah_binaan[]" multiple="multiple">
        {{-- @foreach ($data as $item)
                        <option value="{{ $item->wilayah_binaan }}" >{{ $item->wilayah_binaan }}</option>
        @endforeach --}}
    </select>
</div>
<div class="col-md-3">
    <select class="multiple-shelter form-select" name="shelter[]" multiple="multiple">
        {{-- @foreach ($data as $item)
                        <option value="{{ $item->shelter }}" >{{ $item->shelter }}</option>
        @endforeach --}}
    </select>
</div>
<div class="col-md-3">
    <button type="button" class="btn btn-primary 1">Simpan</button>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        load_data();

        function load_data() {
            var fagama = $('#fagama').val();
            var fjenis_kelamin = $('#fjenis_kelamin').val();
            var fstatus_binaan = $('#fstatus_binaan').val();

            $('#ajax-crud-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('admin/ajax-crud-datatable') }}",
                    data: {
                        agama: fagama,
                        jenis_kelamin: fjenis_kelamin,
                        status_binaan: fstatus_binaan,
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'agama',
                        name: 'agama'
                    },
                    {
                        data: 'ttl',
                        name: 'ttl'
                    },
                    {
                        data: 'jenis_kelamin',
                        name: 'jenis_kelamin'
                    },
                    {
                        data: 'anak_ke',
                        name: 'anak_ke'
                    },
                    {
                        data: 'kepala_keluarga',
                        name: 'kepala_keluarga'
                    },
                    {
                        data: 'status_binaan',
                        name: 'status_binaan'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                ],
                order: [
                    [0, 'asc']
                ],
                paging: true,
                pageLength: 10 // Menyeting jumlah entri yang ditampilkan menjadi 10
            });
        }

        $('#fagama').on('change', function() {
            $('#ajax-crud-datatable').DataTable().destroy()
            load_data()
        })
        $('#fjenis_kelamin').on('change', function() {
            $('#ajax-crud-datatable').DataTable().destroy()
            load_data()
        })
        $('#fstatus_binaan').on('change', function() {
            $('#ajax-crud-datatable').DataTable().destroy()
            load_data()
        })

        $('#resetfilters').click(function() {
            // Mengatur nilai-nilai semua elemen select ke nilai kosong
            $('#fagama').val('');
            $('#fjenis_kelamin').val('');
            $('#fstatus_binaan').val('');

            // Memuat ulang data dengan filter kosong
            $('#ajax-crud-datatable').DataTable().destroy();
            load_data();
        });
    });

    