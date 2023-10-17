<?php

namespace App\Http\Controllers;

use App\Models\Ayah;
use App\Models\calonAnakBinaan;
use App\Models\DataKeluarga;
use App\Models\Ibu;
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
                ->leftJoin('ayahs', 'data_keluargas.id', '=', 'ayahs.data_keluargas_id')
                ->leftJoin('ibu', 'data_keluargas.id', '=', 'ibu.data_keluargas_id')
                ->leftJoin('calon_anak_binaans', 'data_keluargas.id', '=', 'calon_anak_binaans.data_keluargas_id'); 

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

    public function showDetail(Request $request, $id):View
    {
        $dataKel = DataKeluarga::select('data_keluargas.*', 'ayahs.*', 'calon_anak_binaans.*')
                ->leftJoin('ayahs', 'data_keluargas.id', '=', 'ayahs.data_keluargas_id')
                ->leftJoin('ibu', 'data_keluargas.id', '=', 'ibu.data_keluargas_id')
                ->leftJoin('calon_anak_binaans', 'data_keluargas.id', '=', 'calon_anak_binaans.data_keluargas_id')->find($id)->first();

        return view('DataCalonAnakBinaan.CalonAnakBinaan-view', compact('dataKel'));
    }
    

}