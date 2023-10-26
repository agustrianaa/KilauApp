<?php

namespace App\Http\Controllers;

use App\Models\anak;
use App\Models\Ayah;
use App\Models\DataKeluarga;
use App\Models\Ibu;
use App\Models\StatusAnak;
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
                'anaks.nama_lengkap as nama_lengkap_calon_anak', 
                'anaks.tempat_lahir as tempat_lahir_calon_anak', 
                'anaks.tanggal_lahir as tanggal_lahir_calon_anak', 
                'ayahs.*',
                'ayahs.nama as nama_ayah', 
                'anaks.*',
                'ibus.*', 
                'walis.*',
                'status_anaks.*',
                )
                ->leftJoin('ayahs', 'data_keluargas.id', '=', 'ayahs.data_keluarga_id')
                ->leftJoin('ibus', 'data_keluargas.id', '=', 'ibus.data_keluarga_id')
                ->leftJoin('anaks', 'data_keluargas.id', '=', 'anaks.data_keluarga_id')
                ->leftJoin('walis', 'data_keluargas.id', '=', 'walis.data_keluarga_id')
                ->leftJoin('status_anaks', 'anaks.id_anaks', '=', 'status_anaks.anak_id')
                ->where('status_anaks.status_binaan', 0)
                ->get();

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

    public function update(Request $request, $anak_id)
    {
        $data = StatusAnak::find($anak_id);

        $data->status_binaan = 1;

        $data->save();
    }

    public function showDetail(string $id)
    {
        // ini untuk detail data keluarga
        // Ambil data keluarga berdasarkan $id dari database
        $dataKeluarga = DataKeluarga::find($id);
        $dataIbu = Ibu::where('data_keluarga_id', $id)->first();
        $dataAyah = Ayah::where('data_keluarga_id', $id)->first();
        $dataAnak = Anak::where('data_keluarga_id', $id)->first();
        $dataWali = Wali::where('data_keluarga_id', $id)->first();
        // Tampilkan halaman detail data keluarga (misalnya, menggunakan view 'detail_datakeluarga.blade.php')
        return view('DataCalonAnakBinaan.CalonAnakBinaan-view', [
            'dataKeluarga' => $dataKeluarga, 
            'dataIbu' => $dataIbu, 
            'dataAyah' => $dataAyah,
            'dataAnak' => $dataAnak, 
            'dataWali' => $dataWali,
        ]);
    }

    public function updated(Request $request, string $id)
    {
        // Cari data keluarga
        $dataKeluarga = DataKeluarga::find($id);    

        if (!$dataKeluarga) {
            return response()->json(['success' => false, 'message' => 'Data Keluarga tidak ditemukan'], 404);
        }   

        // Update data keluarga
        $dataKeluarga->update($request->all()); 

        // Update model Ayah jika ada data Ayah yang dikirimkan dalam request
        if ($request->has('ayah')) {
            $dataKeluarga->dataAyah->update($request->input('ayah'));
        }   

        // Update model Ibu jika ada data Ibu yang dikirimkan dalam request
        if ($request->has('ibu')) {
            $dataKeluarga->dataIbu->update($request->input('ibu'));
        }   

        // Update model Anak jika ada data Anak yang dikirimkan dalam request
        if ($request->has('anak')) {
            $dataKeluarga->dataAnak->update($request->input('anak'));
        }   

        // Update model Wali jika ada data Wali yang dikirimkan dalam request
        if ($request->has('wali')) {
            $dataKeluarga->dataWali->update($request->input('wali'));
        }   

        return response()->json(['success' => true, 'message' => 'Data diperbarui']);
    }

    // public function updatedAyah(Request $request, string $id_ayahs)
    // {
    //     $dataKeluarga = Ayah::find($id_ayahs);

    //     $dataKeluarga->update($request->all());

    //     return response()->json(['success' => true]);

    // }

    public function destroyd(Request $request)
    {
        $datakeluarga = DataKeluarga::where('id', $request->id)->delete();

        return Response()->json($datakeluarga);
    }
}
