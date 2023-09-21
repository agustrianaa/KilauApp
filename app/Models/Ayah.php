<?php

namespace App\Models;
use App\Models\DataKeluarga;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ayah extends Model
{
    use HasFactory;

    protected $table = 'ayah';
    protected $fillable = [ 'data_keluargas_id', 'nik_ayah', 'nama_ayah', 'tempat_lahir', 'tanggal_lahir','agama', 'alamat', 'pekerjaan',];

    public function dataKeluarga()
    {
        return $this->belongsTo('App\Models\DataKeluarga', 'data_keluargas_id');
    }
}
