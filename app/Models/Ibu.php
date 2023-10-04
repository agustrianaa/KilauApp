<?php

namespace App\Models;
use App\Models\DataKeluarga;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ibu extends Model
{
    use HasFactory;
    protected $table = 'ibu';
    protected $primaryKey = 'id_ibu';


    protected $fillable = [ 'nik_ibu', 'nama_ibu', 'tempat_lahir', 'tanggal_lahir','agama', 'alamat', 'pekerjaan', 'data_keluargas_id'];

    public function dataKeluarga()
    {
        return $this->belongsTo('App\Models\DataKeluarga', 'data_keluargas_id');

    }
}
