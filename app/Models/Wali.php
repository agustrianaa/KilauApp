<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wali extends Model
{
    use HasFactory;
    public $tabel = 'walis';
    protected $primaryKey = 'id_walis';
    protected $fillable = [
        'no_ktp_wali',
        'nama_lengkap_wali',
        'nama_panggilan_wali',
        'tempat_lahir_wali',
        'tanggal_lahir_wali',
        'pekerjaan_wali',
        'jumlah_tanggungan_wali',
        'pendapatan_wali',
        'data_keluarga_id'
    ];

    public function dataKeluarga():BelongsTo
    {
        return $this->belongsTo(DataKeluarga::class);
    }
}
