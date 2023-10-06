<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class calonAnakBinaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tempat_lahir',
        'tanggal_lahir',
        'anak_ke',
        'status_binaan',
        'status_validasi',
    ];
}
