<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CalonAnakBinaan extends Model
{
    use HasFactory;

    public $tabel = 'calon_anak_binaans';

    protected $primaryKey = 'id_calon_anak_binaans';
    protected $fillable = [
        'nama_lengkap_calon_anak',
        'nama_panggilan_calon_anak',
        'tempat_lahir_calon_anak',
        'tanggal_lahir_calon_anak',
        'anak_ke',
        'nama_sekolah',
        'kelas_sekolah',
        'nama_madrasah',
        'kelas_madrasah',
        'hobby',
        'cita_cita',
        'status_binaan',
        'status_validasi',
        'data_keluarga_id'
    ];

    public function dataKeluarga():BelongsTo
    {
        return $this->belongsTo(DataKeluarga::class);
    }
}
