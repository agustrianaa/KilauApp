<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DataKeluarga extends Model
{
    use HasFactory;

    public $tabel = 'data_keluargas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kacab',
        'no_kk', // Nomor Kartu Keluarga
        'alamat_kk',
        'kepala_keluarga',
        'wilayah_binaan',
        'shelter',
        'jarak_ke_shelter',
        'no_telp',
        'no_rek'
        ];

    public function dataAyah():HasOne
    {
        return $this->hasOne(Ayah::class);
    }

    public function dataIbu():HasOne
    {
        return $this->hasOne(Ibu::class);
    }
    public function dataAnak():HasOne
    {
        return $this->hasOne(Anak::class);
    }
    public function dataWali():HasOne
    {
        return $this->hasOne(Wali::class);
    }
}
