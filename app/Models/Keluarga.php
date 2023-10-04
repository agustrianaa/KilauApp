<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Keluarga extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_kk',
        'kepala_keluarga',
        'status_ortu',
        'no_rek',
        'an_rek',
        'no_tlp',
        'an_tlp',
    ];

    public function ayah(): HasOne
    {
        return $this->hasOne(Ayah::class);
    }
    public function ibu(): HasOne
    {
        return $this->hasOne(Ibu::class);
    }
    public function survey(): HasOne
    {
        return $this->hasOne(Survey::class);
    }
    public function wali(): HasOne
    {
        return $this->hasOne(Wali::class);
    }
}
