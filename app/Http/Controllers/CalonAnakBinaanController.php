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
    
    public function updated(Request $request, $id)
    {
        $dataKel = DataKeluarga::find($id);

        $dataKel->update($request->all());

        return response()->json(['success' => true]);

    }

}