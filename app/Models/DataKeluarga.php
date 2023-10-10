<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKeluarga extends Model
{
    use HasFactory;

    public $tabel = 'data_keluargas';
    protected $primaryKey = 'id';
    protected $fillable = [ 'no_kk', 'kepala_keluarga','kacab', 'wilbin', 'shelter', 'no_telp', 'no_rek' ];

    public function dataAyah(){
        return $this->hasOne('App\Models\Ayahs');
    }

    public function dataIbu(){
        return $this->hasOne('App\Models\Ibu');
    }
    public function dataCalonAnakBinaan(){
        return $this->hasOne('App\Models\calonAnakBinaan');
    }
}
