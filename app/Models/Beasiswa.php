<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;
    protected $table = 'beasiswa';
    protected $fillable = [
        'anak_id',
        'status_binaan'
    ];

    public function dataAnak()
    {
        return $this->hasOne('App\Models\Anak', 'anak_id', 'id');
    }
}
