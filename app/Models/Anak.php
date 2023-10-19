<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class anak extends Model
{

    use HasFactory;
    public $tabel = 'anaks';

    protected $primaryKey = 'id_anaks';

    protected $fillable = [
        'data_keluarga_id',
        'nama_lengkap',
        'nama_panggilan',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'nama_sekolah',
        'kelas_sekolah',
        'nama_madrasah',
        'kelas_madrasah',
        'hobby',
        'cita_cita',
    ];

    public function dataKeluarga():BelongsTo
    {
        return $this->belongsTo(DataKeluarga::class);
    }

    public function dataStatusAnak():HasOne
    {
        return $this->hasOne(StatusAnak::class);
    }
}
