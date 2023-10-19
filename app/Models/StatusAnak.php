<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StatusAnak extends Model
{
    use HasFactory;

    public $tabel = 'status_anaks';

    protected $primaryKey = 'id_status_anaks';

    protected $fillable = [
        'anak_id',
        'status_binaan',
        'status_beasiswa'
    ];

    public function dataAnak():BelongsTo
    {
        return $this->belongsTo(Anak::class);
    }
}
