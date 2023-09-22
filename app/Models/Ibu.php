<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ibu extends Model
{
    use HasFactory;

    protected $fillable = [
        "nik_ibu",
        "nama_ibu",
        "agama_ibu",
        "status_ibu",
        "penghasilan_ibu",
        "alamat_ibu",
    ];
}
