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
        'no_ktp',
        'nama_lengkap',
        'nama_panggilan',
        'tempat_lahir',
        'tanggal_lahir',
        'pekerjaan',
        'jumlah_tanggungan',
        'pendapatan',
        'data_keluarga_id'
    ];

    public function dataKeluarga():BelongsTo
    {
        return $this->belongsTo(DataKeluarga::class);
    }
}
