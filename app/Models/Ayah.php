<?php

namespace App\Models;
use App\Models\DataKeluarga;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ayah extends Model
{
    use HasFactory;

    protected $table = 'ayah';
    protected $primaryKey = 'id_ayah';

    protected $fillable = [  'nik_ayah', 'nama_ayah', 'tempat_lahir', 'tanggal_lahir','agama', 'alamat', 'pekerjaan', 'data_keluargas_id'];

    public function dataKeluarga()
    {
        return $this->belongsTo('App\Models\DataKeluarga', 'data_keluargas_id');
    }
}
