<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKeluarga extends Model
{
    use HasFactory;

    public $table = 'data_keluargas';
    protected $primaryKey = 'id';
    protected $fillable = [
            'no_kk',
            'alamat_kk',
            'kepala_keluarga',
            'kacab',
            'wilbin',
            'shelter',
            'jarak_ke_shelter',
            'no_telp',
            'no_rek'
        ];

    public function dataAyah(){
        return $this->hasOne('App\Models\Ayahs');
    }

    public function dataIbu(){
        return $this->hasOne('App\Models\Ibu');
    }
    public function dataCalonAnakBinaan(){
        return $this->hasOne('App\Models\calonAnakBinaan');
    }
    public function dataWali(){
        return $this->hasOne('App\Models\Wali');
    }
}
