<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Anak extends Model
{

    use HasFactory;
    public $tabel = 'anaks';

    protected $primaryKey = 'id_anaks';

    protected $fillable = [
        'data_keluarga_id',
        'donatur_id',
        'nama_lengkap',
        'nama_panggilan',
        'agama',
        'anak_ke',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'kacab',
        'wilayah_binaan',
        'shelter',
        'jarak_ke_shelter',
        'nama_sekolah',
        'kelas_sekolah',
        'nama_madrasah',
        'kelas_madrasah',
        'hobby',
        'cita_cita',
        'status_aktif',
    ];

    protected $hidden = [
        'id_anaks',
        'data_keluarga_id',
        'donatur_id',
        'nama_panggilan',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'jarak_ke_shelter',
        'nama_sekolah',
        'kelas_sekolah',
        'nama_madrasah',
        'kelas_madrasah',
        'hobby',
        'cita_cita',
        'beasiswa_id',
    ];
    

    public function dataKeluarga(): BelongsTo
    {
        return $this->belongsTo(DataKeluarga::class);
    }
    public function dataStatusAnak(): HasOne
    {
        return $this->hasOne(StatusAnak::class);
    }

    public function beasiswa(): BelongsTo
    {
        return $this->belongsTo('App\Models\Beasiswa', 'id');
    }

    public function donatur()
    {
        return $this->belongsTo(Donatur::class, 'donatur_id');
    }
}
