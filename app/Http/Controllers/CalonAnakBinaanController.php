<?php

namespace App\Http\Controllers;

use App\Models\Ayah;
use App\Models\Anak;
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
            $data = DataKeluarga::select(
                'data_keluargas.*',
                'anaks.id_anaks as id_anaks',
                'anaks.nama_lengkap as nama_lengkap_anak',
                'anaks.nama_panggilan as nama_panggilan_anak',
                'anaks.tempat_lahir as tempat_lahir_anak',
                'anaks.tanggal_lahir as tanggal_lahir_anak',
                'anaks.nama_sekolah as nama_sekolah_anak',
                'anaks.nama_madrasah as nama_madrasah_anak',
                'anaks.hobby as hobby_anak',
                'anaks.cita_cita as cita_cita_anak',
                'ayahs.*',
                'ibus.*',
                'walis.*',
                )
            ->leftJoin('ayahs', 'data_keluargas.id', '=', 'ayahs.data_keluarga_id')
            ->leftJoin('ibus', 'data_keluargas.id', '=', 'ibus.data_keluarga_id')
            ->leftJoin('walis', 'data_keluargas.id', '=', 'walis.data_keluarga_id')
            ->leftJoin('anaks', 'data_keluargas.id', '=', 'anaks.data_keluarga_id');

            return datatables($data)
                ->addColumn('ttla', function ($data) {
                    return $data->tempat_lahir_anak . ', ' . $data->tanggal_lahir_anak;
                })
                ->addColumn('action', 'DataCalonAnakBinaan.CalonAnakBinaan-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }   

        return view('DataCalonAnakBinaan.CalonAnakBinaan');
    }

    public function showDetail(string $id):View
    {
        $dataKel = DataKeluarga::select(
            'data_keluargas.*',
            'anaks.*',
            'anaks.id_anaks as id_anaks',
            'anaks.nama_lengkap as nama_lengkap_anak',
            'anaks.nama_panggilan as nama_panggilan_anak',
            'anaks.tempat_lahir as tempat_lahir_anak',
            'anaks.tanggal_lahir as tanggal_lahir_anak',
            'anaks.nama_sekolah as nama_sekolah_anak',
            'anaks.nama_madrasah as nama_madrasah_anak',
            'anaks.hobby as hobby_anak',
            'anaks.cita_cita as cita_cita_anak',
            'ayahs.*',
            'ibus.*',
            'walis.*',
            )
        ->leftJoin('ayahs', 'data_keluargas.id', '=', 'ayahs.data_keluarga_id')
        ->leftJoin('ibus', 'data_keluargas.id', '=', 'ibus.data_keluarga_id')
        ->leftJoin('walis', 'data_keluargas.id', '=', 'walis.data_keluarga_id')
        ->leftJoin('anaks', 'data_keluargas.id', '=', 'anaks.data_keluarga_id')->find($id);

        $dataAnak = Anak::where('data_keluarga_id', $id)->first();
        $dataIbu = Ibu::where('data_keluarga_id', $id)->first();
        $dataAyah = Ayah::where('data_keluarga_id', $id)->first();
        $dataWali = Wali::where('data_keluarga_id', $id)->first();

        return view('DataCalonAnakBinaan.CalonAnakBinaan-view',
                    compact(
                        'dataKel',
                        'dataIbu',
                        'dataAyah',
                        'dataAnak',
                        'dataWali'
                        )
                    );
    }

    // public function updated(Request $request, $id) {
    //     $dataKeluarga = DataKeluarga::find($id);

    //     $dataKeluarga->update($request->all());

    //     return response()->json(['success' => true]);
    // }

    public function edited(Request $request) {
        $where = array('id' => $request->id);
        $tabelKel = DataKeluarga::where($where)->first();
        $tabeldata = Anak::where('data_keluarga_id', $where)->first();

        return Response()->json($tabelKel, $tabeldata);
    }
    
    public function updated(Request $request) {
        $dataKeluarga = DataKeluarga::updateOrCreate([
            // "kacab" => $request->kacab,
            // "no_kk" => $request->no_kk,
            // "anak_ke" => $request->anak_ke,
            // "alamat_kk" => $request->alamat_kk,
            // "kepala_keluarga" => $request->kepala_keluarga,
            // "wilayah_binaan" => $request->wilayah_binaan,
            // "shelter" => $request->shelter,
            // "jarak_ke_shelter" => $request->jarak_ke_shelter,
            // "no_telp" => $request->no_telp,
            // "no_rek" => $request->no_rek
        ]);

        $keluargaID = $dataKeluarga->id;

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

}