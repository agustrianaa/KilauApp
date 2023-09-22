<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
    use HasFactory;

    protected $fillable = [
        "nik_wali",
        "nama_wali",
        "agama_wali",
        "hub_kerabat",
        "penghasilan_wali",
        "alamat_wali",
    ];
}
