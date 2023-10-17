<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Ayah extends Model
{
    use HasFactory;

    public $tabel = 'ayahs';
    protected $primaryKey = 'id_ayahs';
    protected $fillable = [
        'data_keluarga_id',
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'pekerjaan',
        'jumlah_tanggungan',
        'pendapatan',
        'agama',
        'alamat'
    ];

<<<<<<< HEAD
    public function dataKeluarga()
=======
    public function dataKeluarga():BelongsTo
>>>>>>> main
    {
        return $this->belongsTo(DataKeluarga::class);
    }
}