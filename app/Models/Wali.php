<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wali extends Model
{
    use HasFactory;

    protected $fillable = [
        "keluarga_id",
        "nik_wali",
        "nama_wali",
        "agama_wali",
        "hub_kerabat",
        "penghasilan_wali",
        "alamat_wali",
    ];

    public function keluarga(): BelongsTo
    {
        return $this->belongsTo(Keluarga::class);
    }
}
