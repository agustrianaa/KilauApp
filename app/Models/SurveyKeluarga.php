<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyKeluarga extends Model
{
    use HasFactory;
    protected $tabel = 'survey_keluargas';
    protected $primaryKey = 'id';

    protected $casts = [
        'kep_kendaraan' => 'array',
    ];


    protected $fillable = [
        'keluarga_id',
        // assett
        'kep_tanah',
        'kep_rumah',
        'lantai',
        'dinding',
        'kep_kendaraan',
        'kep_elektronik',

        // kesehatan
        'sumber_air',
        'jamban',
        'tempat_sampah',
        'perokok',
        'miras',
        'p3k',
        'makan_sayur',

        // ibadah dan sosial
        'sholat',
        'baca_quran',
        'majelis_taklim',
        'pengurus_organisasi',

        // lainnya
        'status_anak',
        'biaya_pendidikan',
        'bantuan_lembaga_formal',

        // data survey
        'resume',
        'petugas_survey',
        'hsurvey',
    ];
}
