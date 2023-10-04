<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class a extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'agama', 'teml', 'tgll', 'jenis_kelamin', 'anak_ke', 'kepala_keluarga', 'status_binaan'];
}
