<?php

namespace App\Http\Controllers;

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
            $data = DataKeluarga::select('data_keluargas.*', 'ayahs.*', 'calon_anak_binaans.*')
                ->leftJoin('ayahs', 'data_keluargas.id', '=', 'ayahs.data_keluarga_id')
                ->leftJoin('ibus', 'data_keluargas.id', '=', 'ibus.data_keluarga_id')
                ->leftJoin('calon_anak_binaans', 'data_keluargas.id', '=', 'calon_anak_binaans.data_keluarga_id'); 

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

        $dataCalonAnak = calonAnakBinaan::where('data_keluarga_id', $id)->first();
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

        $dataKel->update($request->all());

        return response()->json(['success' => true]);

    }

}