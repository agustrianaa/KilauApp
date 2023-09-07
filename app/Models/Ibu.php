<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ibu extends Model
{
    use HasFactory;
    protected $table = 'ibu';


    protected $fillable = [ 'nik', 'nama', 'tempat_lahir', 'tanggal_lahir','agama', 'alamat', 'pekerjaan', 'data_keluargas_id'];

    // public function dataKeluarga()
    // {
    //     return $this->belongsTo(DataKeluarga::class, 'ibu_id');
    // }
}
