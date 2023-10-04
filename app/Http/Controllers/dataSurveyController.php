<?php

namespace App\Http\Controllers;

use App\Models\Ayah;
use App\Models\Ibu;
use App\Models\Keluarga;
use App\Models\Survey;
use App\Models\Wali;
use Illuminate\Http\Request;

class dataSurveyController extends Controller
{
    public function index()
    {
        return view('survey.isiSurvey');
    }

    public function back()
    {
        return view('survey.index');
    }

    public function store(Request $request)
    {
        $Keluarga = Keluarga::create([
            'no_kk' => $request->no_kk,
            'kepala_keluarga' => $request->kepala_keluarga,
            'status_ortu' => $request->status_ortu,
            'no_rek' => $request->no_rek,
            'an_rek' => $request->an_rek,
            'no_tlp' => $request->no_tlp,
            'an_tlp' => $request->an_tlp,
        ]);

        $userID = $Keluarga->id;

        Survey::create([
            "keluarga_id" => $userID,
            "pendidikan_kepala_keluarga" =>$request->pendidikan_kepala_keluarga,
            "jumlah_tanggungan" =>$request->jumlah_tanggungan,
            "pekerjaan_kepala_keluarga" =>$request->pekerjaan_kepala_keluarga,
            "penghasilan" =>$request->penghasilan,
            "kepemilikan_tabungan" =>$request->kepemilikan_tabungan,
            "jumlah_makan" =>$request->jumlah_makan,
            "kepemilikan_tanah" =>$request->kepemilikan_tanah,
            "kepemilikan_rumah" =>$request->kepemilikan_rumah,
            "kondisi_rumah_lantai" =>$request->kondisi_rumah_lantai,
            "kondisi_rumah_dinding" =>$request->kondisi_rumah_dinding,
            "kepemilikan_kendaraan" =>$request->kepemilikan_kendaraan,
            "kepemilikan_elektronik" =>$request->kepemilikan_elektronik,
            "sumber_air_bersih" =>$request->sumber_air_bersih,
            "jamban_limbah" =>$request->jamban_limbah,
            "tempat_sampah" =>$request->tempat_sampah,
            "perokok" =>$request->perokok,
            "konsumen_miras" =>$request->konsumen_miras,
            "persediaan_p3k" =>$request->persediaan_p3k,
            "makan_buah_sayur" =>$request->makan_buah_sayur,
            "solat_lima_waktu" =>$request->solat_lima_waktu,
            "membaca_alquran" =>$request->membaca_alquran,
            "majelis_taklim" =>$request->majelis_taklim,
            "membaca_koran" =>$request->membaca_koran,
            "pengurus_organisasi" =>$request->pengurus_organisasi,
            "status_anak" =>$request->status_anak,
            "biaya_pendidikan_perbulan" =>$request->biaya_pendidikan_perbulan,
            "bantuan_lembaga_formal_lain" =>$request->bantuan_lembaga_formal_lain,
            "kondisi_penerima_manfaat" =>$request->kondisi_penerima_manfaat,
            "petugas_survey" =>$request->petugas_survey,
            "hasil_survey" =>$request->hasil_survey,
            "keterangan_hasil" =>$request->keterangan_hasil,
        ]);
        Ayah::create([
            "keluarga_id" => $userID,
            "nik_ayah" => $request->nik_ayah,
            "nama_ayah" => $request->nama_ayah,
            "agama_ayah" => $request->agama_ayah,
            "status_ayah" => $request->status_ayah,
            "penghasilan_ayah" => $request->penghasilan_ayah,
            "alamat_ayah" => $request->alamat_ayah,
        ]);
        Ibu::create([
            "keluarga_id" => $userID,
            "nik_ibu" => $request->nik_ibu,
            "nama_ibu" => $request->nama_ibu,
            "agama_ibu" => $request->agama_ibu,
            "status_ibu" => $request->status_ibu,
            "penghasilan_ibu" => $request->penghasilan_ibu,
            "alamat_ibu" => $request->alamat_ibu,
        ]);
        Wali::create([
            "keluarga_id" => $userID,
            "nik_wali" => $request->nik_wali,
            "nama_wali" => $request->nama_wali,
            "agama_wali" => $request->agama_wali,
            "hub_kerabat" => $request->hub_kerabat,
            "penghasilan_wali" => $request->penghasilan_wali,
            "alamat_wali" => $request->alamat_wali,
        ]);
    }
}
