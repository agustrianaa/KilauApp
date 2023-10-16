<?php

namespace App\Models;
use App\Models\DataKeluarga;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ayah extends Model
{
    use HasFactory;

    public $table = 'ayahs';
    protected $primaryKey = 'id_ayahs';
    protected $fillable = [
        'nik_ayah',
        'nama_ayah',
        'tempat_lahir_ayah',
        'tanggal_lahir_ayah',
        'pekerjaan_ayah',
        'jumlah_tanggungan_ayah',
        'pendapatan_ayah',
        'agama',
        'alamat',
        'data_keluargas_id',
    ];

    public function dataKeluarga()
    {
        return $this->belongsTo('App\Models\DataKeluarga', 'data_keluargas_id');
    }
}
