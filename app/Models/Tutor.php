<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    public $table = 'tutor';

    protected $fillable =[
        'nama',
        'pendidikan',
        'email',
        'no_hp',
        'alamat',
        'kacab_id',
        'wilbin_id',
        'shelter_id',
        'mapel',
        'foto',
        'status',
    ];
}
