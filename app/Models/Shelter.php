<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Shelter extends Model
{
    use HasFactory;

    public $table = 'shelters';
    protected $primaryKey = 'id_shelter';
    protected $fillable = [
        'wilbin_id',
        'nama_shelter',
        'nama_koordinator',
        'no_hp',
        'alamat'
    ];

    public function dataWilBin(): BelongsTo
    {
        return $this->belongsTo(WilayahBinaan::class);
    }
}
