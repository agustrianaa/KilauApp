<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    public $table = 'tutor';

    protected $primaryKey = 'id_tutor';

    protected $fillable =[
        'nama',
        'pendidikan',
        'email',
        'no_hp',
        'alamat',
        'kacab_id',
        'wilbin_id',
        'shelter_id',
        'mapel',
        'foto',
        'status',
    ];

    public function shelter()
    {
        return $this->belongsTo(Shelter::class, 'shelter_id');
    }
    public function wilbin()
    {
        return $this->belongsTo(WilayahBinaan::class, 'wilbin_id');
    }

    public function kacab()
    {
        return $this->belongsTo(KantorCabang::class, 'kacab_id');
    }
}
