<?php

namespace App\Http\Controllers;

use App\Models\anak;
use App\Models\Ayah;
use App\Models\calonAnakBinaan;
use App\Models\DataKeluarga;
use App\Models\Ibu;
use App\Models\Wali;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class CalonAnakBinaanController extends Controller
{
    public function calonanakbinaanIndex(Request $request)
    {
        if (request()->ajax()) {
            $data = DataKeluarga::select('data_keluargas.*','anaks.tempat_lahir as tempat_lahir_calon_anak', 'anaks.tanggal_lahir as tanggal_lahir_calon_anak', 'ayahs.*', 'anaks.*')
                ->leftJoin('ayahs', 'data_keluargas.id', '=', 'ayahs.data_keluarga_id')
                ->leftJoin('ibus', 'data_keluargas.id', '=', 'ibus.data_keluarga_id')
                ->leftJoin('anaks', 'data_keluargas.id', '=', 'anaks.data_keluarga_id')
                ->where('anaks.status_binaan', 0)
                ->get();;

            return datatables($data)
                ->addColumn('TTL', function ($data) {
                    return $data->tempat_lahir_calon_anak . ', ' . $data->tanggal_lahir_calon_anak;
                })
                ->addColumn('action', 'DataCalonAnakBinaan.CalonAnakBinaan-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('DataCalonAnakBinaan.CalonAnakBinaan');
    }

    public function showDetail(string $id)
    {

        $dataKel = DataKeluarga::find($id);

        $dataCalonAnak = anak::where('data_keluarga_id', $id)->first();

        $dataIbu = Ibu::where('data_keluarga_id', $id)->first();
        $dataAyah = Ayah::where('data_keluarga_id', $id)->first();
        $dataWali = Wali::where('data_keluarga_id', $id)->first();

        return view('DataCalonAnakBinaan.CalonAnakBinaan-view',
        [
            'dataKeluarga' => $dataKel,
            'dataIbu' => $dataIbu,
            'dataAyah' => $dataAyah,
            'dataCalonAnakBinaan' => $dataCalonAnak,
            'dataWali' => $dataWali
        ]);
    }


    public function updated(Request $request, $id)
    {
        $dataKel = DataKeluarga::find($id);

        Anak::updateOrCreate([
            "data_keluarga_id" => $keluargaID,
            "nama_lengkap" => $request->nama_lengkap_anak,
            "nama_panggilan" => $request->nama_panggilan_anak,
            // "tempat_lahir" => $request->tempat_lahir_calon_anak,
            // "tanggal_lahir" => $request->tanggal_lahir_calon_anak,
            // "nama_sekolah" => $request->nama_sekolah,
            // "kelas_sekolah" => $request->kelas_sekolah,
            // "nama_madrasah" => $request->nama_madrasah,
            // "kelas_madrasah" => $request->kelas_madrasah,
            // "hobby" => $request->hobby,
            // "cita_cita" => $request->cita_cita,
            // "status_binaan" => $request->status_binaan,
            // "status_validasi" => $request->status_validasi
        ]);
        // Ayah::updateOrCreate([
        //     "data_keluarga_id" => $keluargaID,
        //     "nik" => $request->nik_ayah,
        //     "nama" => $request->nama_ayah,
        //     "tempat_lahir" => $request->tempat_lahir_ayah,
        //     "tanggal_lahir" => $request->tanggal_lahir_ayah,
        //     "pekerjaan" => $request->pekerjaan_ayah,
        //     "jumlah_tanggungan" => $request->jumlah_tanggungan_ayah,
        //     "pendapatan" => $request->pendapatan_ayah,
        //     "agama" => $request->agama,
        //     "alamat" => $request->alamat
        // ]);
        // Ibu::updateOrCreate([
        //     "data_keluarga_id" => $keluargaID,
        //     "nik" => $request->nik_ibu,
        //     "nama" => $request->nama_ibu,
        //     "tempat_lahir" => $request->tempat_lahir_ibu,
        //     "tanggal_lahir" => $request->tanggal_lahir_ibu,
        //     "pekerjaan" => $request->pekerjaan_ibu,
        //     "pendapatan" => $request->pendapatan_ibu,
        //     "agama" => $request->agama,
        //     "alamat" => $request->alamat
        // ]);
        // Wali::updateOrCreate([
        //     "data_keluarga_id" => $keluargaID,
        //     "no_ktp" => $request->no_ktp_wali,
        //     "nama_lengkap" => $request->nama_lengkap_wali,
        //     "nama_panggilan" => $request->nama_panggilan_wali,
        //     "tempat_lahir" => $request->tempat_lahir_wali,
        //     "tanggal_lahir" => $request->tanggal_lahir_wali,
        //     "pekerjaan" => $request->pekerjaan_wali,
        //     "jumlah_tanggungan" => $request->jumlah_tanggungan_wali,
        //     "pendapatan" => $request->pendapatan_wali
        // ]);

        // Tambahkan kode SweetAlert2 sebelum redirect
        $alert = [
            'title' => 'Sukses!',
            'text' => 'Data anak berhasil disimpan.',
            'icon' => 'success',
        ];

        return redirect()->route('admin.calonanakbinaanIndex')->with('alert', $alert);
    }

    public function update(Request $request, $data_keluarga_id)
    {
        $data = anak::find($data_keluarga_id);

        $data->status_binaan = 1;

        $data->save();
    }

}
