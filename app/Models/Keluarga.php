<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
