<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class KantorCabang extends Model
{
    use HasFactory;
    public $table = 'kantor_cabangs';
    protected $primaryKey = 'id_kacab';
    protected $fillable = [
        'nama_kacab',
        'no_telp',
        'alamat',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        ];

    public function dataWilBin():HasOne
    {
        return $this->hasOne(WilayahBinaan::class);
    }

}