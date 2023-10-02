<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ibu extends Model
{
    use HasFactory;

    protected $fillable = [
        "keluarga_id",
        "nik_ibu",
        "nama_ibu",
        "agama_ibu",
        "status_ibu",
        "penghasilan_ibu",
        "alamat_ibu",
    ];

    public function keluarga(): BelongsTo
    {
        return $this->belongsTo(Keluarga::class);
    }
}
