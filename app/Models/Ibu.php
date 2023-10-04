<?php

namespace App\Models;
use App\Models\DataKeluarga;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ibu extends Model
{
    use HasFactory;
    protected $table = 'ibu';
    protected $primaryKey = 'id_ibu';
}