<?php

namespace App\Models;
use App\Models\DataKeluarga;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ayah extends Model
{
    use HasFactory;

    protected $fillable = [
        "nik_ayah",
        "nama_ayah",
        "agama_ayah",
        "status_ayah",
        "penghasilan_ayah",
        "alamat_ayah",
    ];
}
