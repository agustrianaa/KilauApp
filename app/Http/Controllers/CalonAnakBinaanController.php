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

        $dataKel->update($request->all());

        return response()->json(['success' => true]);

    }

    public function update(Request $request, $data_keluarga_id)
    {
        $data = anak::find($data_keluarga_id);

        $data->status_binaan = 1;

        $data->save();
    }

}
