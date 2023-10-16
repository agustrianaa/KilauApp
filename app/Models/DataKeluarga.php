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
        'no_kk',
        'alamat_kk',
        'kepala_keluarga',
        'wilbin',
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
    public function dataCalonAnakBinaan():HasOne
    {
        return $this->hasOne(CalonAnakBinaan::class);
    }
    public function dataWali():HasOne
    {
        return $this->hasOne(Wali::class);
    }
}
