<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        "pendidikan_kepala_keluarga",
        "jumlah_tanggungan",
        "pekerjaan_kepala_keluarga",
        "penghasilan",
        "kepemilikan_tabungan",
        "jumlah_makan",
        "kepemilikan_tanah",
        "kepemilikan_rumah",
        "kondisi_rumah_lantai",
        "kondisi_rumah_dinding",
        "kepemilikan_kendaraan",
        "kepemilikan_elektronik",
        "sumber_air_bersih",
        "jamban_limbah",
        "tempat_sampah",
        "perokok",
        "konsumen_miras",
        "persediaan_p3k",
        "makan_buah_sayur",
        "solat_lima_waktu",
        "membaca_alquran",
        "majelis_taklim",
        "membaca_koran",
        "pengurus_organisasi",
        "status_anak",
        "biaya_pendidikan_perbulan",
        "bantuan_lembaga_formal_lain",
        "kondisi_penerima_manfaat",
        "petugas_survey",
        "hasil_survey",
        "keterangan_hasil",
    ];
}
