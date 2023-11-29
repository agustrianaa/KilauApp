<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;


class WilayahBinaan extends Model
{
    use HasFactory;
    public $table = 'wilayah_binaans';
    protected $primaryKey = 'id_wilbin';
    protected $fillable = [
        'kacab_id',
        'nama_wilbin'
    ];

    public function dataKaCab(): BelongsTo
    {
        return $this->belongsTo(KantorCabang::class);
    }

    public function dataShelter(): HasOne
    {
        return $this->hasOne(Shelter::class, 'wilbin_id', 'id_wilbin');
    }
}
