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

<<<<<<< HEAD
    protected $fillable = [
        "keluarga_id",
        "nik_ibu",
        "nama_ibu",
        "agama_ibu",
        "status_ibu",
        "penghasilan_ibu",
        "alamat_ibu",
    ];

    public function keluarga(): BelongsTo
    {
        return $this->belongsTo(Keluarga::class);
=======
    protected $fillable = [ 'nik_ibu', 'nama_ibu', 'tempat_lahir', 'tanggal_lahir','agama', 'alamat', 'pekerjaan', 'data_keluargas_id'];

    public function dataKeluarga()
    {
        return $this->belongsTo('App\Models\DataKeluarga', 'data_keluargas_id');
>>>>>>> c0085f78bf732bcfd7734df0b498145965e9614a
    }
}
