<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ayah extends Model
{
    use HasFactory;

    protected $table = 'ayah';
    protected $fillable = [ 'nik', 'nama', 'tempat_lahir', 'tanggal_lahir','agama', 'alamat', 'pekerjaan', 'data_keluargas_id'];

    public function dataKeluarga()
    {
        return $this->hasMany(DataKeluarga::class, 'ayah_id');
    }
}
