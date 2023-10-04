<?php

namespace App\Models;
use App\Models\DataKeluarga;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ayah extends Model
{
    use HasFactory;

    protected $fillable = [
        "keluarga_id",
        "nik_ayah",
        "nama_ayah",
        "agama_ayah",
        "status_ayah",
        "penghasilan_ayah",
        "alamat_ayah",
    ];

    public function keluarga(): BelongsTo
    {
        return $this->belongsTo(Keluarga::class);
    }
}
