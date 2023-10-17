<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Ayah extends Model
{
    use HasFactory;

    // protected $table = 'ayah';
    // protected $primaryKey = 'id_ayah';

    // protected $fillable = [  'nik_ayah', 'nama_ayah', 'tempat_lahir', 'tanggal_lahir','agama', 'alamat', 'pekerjaan', 'data_keluargas_id'];

    public $tabel = 'ayahs';
  
    protected $primaryKey = 'id';
  
    protected $fillable = [
        'data_keluarga_id',
        'nik_ayah',
        'nama_ayah',
        'tempat_lahir_ayah',
        'tanggal_lahir_ayah',
        'pekerjaan_ayah',
        'jumlah_tanggungan_ayah',
        'pendapatan_ayah',
        'agama',
        'alamat'
    ];

    public function dataKeluarga()
    {
        return $this->belongsTo(DataKeluarga::class);
    }
}