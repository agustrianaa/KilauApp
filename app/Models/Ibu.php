<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ibu extends Model
{
    use HasFactory;
    protected $table = 'ibus';
    protected $primaryKey = 'id_ibus';

    protected $fillable = [
        'nik_ibu',
        'nama_ibu',
        'tempat_lahir_ibu',
        'tanggal_lahir_ibu',
        'pekerjaan_ibu',
        'pendapatan_ibu',
        'agama',
        'alamat',
        'data_keluarga_id'
    ];

    public function dataKeluarga():BelongsTo
    {
        return $this->belongsTo(DataKeluarga::class);
    }
}
