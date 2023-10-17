<?php

namespace App\Http\Controllers;

use App\Models\DataKeluarga;
use App\Models\Ayah;
use App\Models\Anak;
use App\Models\Ibu;
use App\Models\Wali;
use Illuminate\Http\Request;

class PengajuanAnakController extends Controller
{
    public function pengajuanForm(Request $request) {
        return view('PengajuanAnak.PengajuanAnak');
    }

    public function pengajuanFormStore(Request $request) {
        $dataKeluarga = DataKeluarga::create([
            "kacab" => $request->kacab,
            "no_kk" => $request->no_kk,
            "anak_ke" => $request->anak_ke,
            "alamat_kk" => $request->alamat_kk,
            "kepala_keluarga" => $request->kepala_keluarga,
            "wilayah_binaan" => $request->wilayah_binaan,
            "shelter" => $request->shelter,
            "jarak_ke_shelter" => $request->jarak_ke_shelter,
            "no_telp" => $request->no_telp,
            "no_rek" => $request->no_rek
        ]);

        $keluargaID = $dataKeluarga->id;

        Anak::create([
            "data_keluarga_id" => $keluargaID,
            "nama_lengkap" => $request->nama_lengkap_calon_anak,
            "nama_panggilan" => $request->nama_panggilan_calon_anak,
            "tempat_lahir" => $request->tempat_lahir_calon_anak,
            "tanggal_lahir" => $request->tanggal_lahir_calon_anak,
            "nama_sekolah" => $request->nama_sekolah,
            "kelas_sekolah" => $request->kelas_sekolah,
            "nama_madrasah" => $request->nama_madrasah,
            "kelas_madrasah" => $request->kelas_madrasah,
            "hobby" => $request->hobby,
            "cita_cita" => $request->cita_cita,
            "status_binaan" => $request->status_binaan,
            "status_validasi" => $request->status_validasi
        ]);
        Ayah::create([
            "data_keluarga_id" => $keluargaID,
            "nik" => $request->nik_ayah,
            "nama" => $request->nama_ayah,
            "tempat_lahir" => $request->tempat_lahir_ayah,
            "tanggal_lahir" => $request->tanggal_lahir_ayah,
            "pekerjaan" => $request->pekerjaan_ayah,
            "jumlah_tanggungan" => $request->jumlah_tanggungan_ayah,
            "pendapatan" => $request->pendapatan_ayah,
            "agama" => $request->agama,
            "alamat" => $request->alamat
        ]);
        Ibu::create([
            "data_keluarga_id" => $keluargaID,
            "nik" => $request->nik_ibu,
            "nama" => $request->nama_ibu,
            "tempat_lahir" => $request->tempat_lahir_ibu,
            "tanggal_lahir" => $request->tanggal_lahir_ibu,
            "pekerjaan" => $request->pekerjaan_ibu,
            "pendapatan" => $request->pendapatan_ibu,
            "agama" => $request->agama,
            "alamat" => $request->alamat
        ]);
        Wali::create([
            "data_keluarga_id" => $keluargaID,
            "no_ktp" => $request->no_ktp_wali,
            "nama_lengkap" => $request->nama_lengkap_wali,
            "nama_panggilan" => $request->nama_panggilan_wali,
            "tempat_lahir" => $request->tempat_lahir_wali,
            "tanggal_lahir" => $request->tanggal_lahir_wali,
            "pekerjaan" => $request->pekerjaan_wali,
            "jumlah_tanggungan" => $request->jumlah_tanggungan_wali,
            "pendapatan" => $request->pendapatan_wali
        ]);

        return redirect()->route('admin.dashboard');
    }
<<<<<<< HEAD

}
    // public function pengajuanFormStore(Request $request) {
    //     $dataKeluarga = DataKeluarga::create([
    //         'no_kk' => $request->no_kk,
    //         'alamat_kk' => $request->alamat_kk,
    //         'kepala_keluarga' => $request->kepala_keluarga,
    //         'kacab' => $request->kacab,
    //         'wilbin' => $request->wilbin,
    //         'shelter' => $request->shelter,
    //         'jarak_ke_shelter' => $request->jarak_ke_shelter,
    //         'no_telp' => $request->no_telp,
    //         'no_rek' => $request->no_rek,
    //     ]);

    //     $keluargaID = $dataKeluarga->id;

    //     calonAnakBinaan::create([
    //         "data_keluargas_id" => $keluargaID,
    //         "nama_lengkap_calon_anak" => $request->nama_lengkap_calon_anak,
    //         "nama_panggilan_calon_anak" => $request->nama_panggilan_calon_anak,
    //         "tempat_lahir_calon_anak" => $request->tempat_lahir_calon_anak,
    //         "tanggal_lahir_calon_anak" => $request->tanggal_lahir_calon_anak,
    //         "anak_ke" => $request->anak_ke,
    //         "nama_sekolah" => $request->nama_sekolah,
    //         "kelas_sekolah" => $request->kelas_sekolah,
    //         "nama_madrasah" => $request->nama_madrasah,
    //         "kelas_madrasah" => $request->kelas_madrasah,
    //         "hobby" => $request->hobby,
    //         "cita_cita" => $request->cita_cita,
    //         "status_binaan" => $request->status_binaan,
    //         "status_validasi" => $request->status_validasi,
    //     ]);
    //     Ayah::create([
    //         "data_keluargas_id" => $keluargaID,
    //         "nik_ayah" => $request->nik_ayah,
    //         "nama_ayah" => $request->nama_ayah,
    //         "tempat_lahir_ayah" => $request->tempat_lahir_ayah,
    //         "tanggal_lahir_ayah" => $request->tanggal_lahir_ayah,
    //         "pekerjaan_ayah" => $request->pekerjaan_ayah,
    //         "jumlah_tanggungan_ayah" => $request->jumlah_tanggungan_ayah,
    //         "pendapatan_ayah" => $request->pendapatan_ayah,
    //         "agama" => $request->agama,
    //         "alamat" => $request->alamat,
    //     ]);
    //     Ibu::create([
    //         "data_keluargas_id" => $keluargaID,
    //         "nik_ibu" => $request->nik_ibu,
    //         "nama_ibu" => $request->nama_ibu, 
    //         "tempat_lahir_ibu" => $request->tempat_lahir_ibu, 
    //         "tanggal_lahir_ibu" => $request->tanggal_lahir_ibu,
    //         "pekerjaan_ibu" => $request->pekerjaan_ibu, 
    //         "pendapatan_ibu" => $request->pendapatan_ibu, 
    //         "agama" => $request->agama, 
    //         "alamat" => $request->alamat,
    //     ]);
    //     Wali::create([
    //         "data_keluargas_id" => $keluargaID,
    //         "no_ktp_wali" => $request->no_ktp_wali,
    //         "nama_lengkap_wali" => $request->nama_lengkap_wali,
    //         "nama_panggilan_wali" => $request->nama_panggilan_wali,
    //         "tempat_lahir_wali" => $request->tempat_lahir_wali,
    //         "tanggal_lahir_wali" => $request->tanggal_lahir_wali,
    //         "pekerjaan_wali" => $request->pekerjaan_wali,
    //         "jumlah_tanggungan_wali" => $request->jumlah_tanggungan_wali,
    //         "pendapatan_wali" => $request->pendapatan_wali,
    //     ]);
    // }
}
=======
}
>>>>>>> main
