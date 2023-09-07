<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKeluarga extends Model
{
    use HasFactory;

    public $tabel = 'data_keluargas    ';
    protected $fillable = [ 'no_kk', 'kepala_keluarga', 'wilbin', 'shelter', 'no_telp', 'no_rek' ];

    public function dataAyah(){
        return $this->belongsTo('App\Models\Ayah', 'data_keluarga_id');
    }

    public function dataIbu(){
        return $this->belongsTo('App\Models\Ibu', 'data_keluarga_id');
    }
}
