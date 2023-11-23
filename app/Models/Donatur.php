<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    use HasFactory;

    public $tabel = 'donaturs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'name',
        'alamat',
        'no_hp',
        'no_rek',
        'nama_bank',
        'diperuntukkan',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function anak()
    {
        return $this->hasOne(Anak::class);
    }
}
