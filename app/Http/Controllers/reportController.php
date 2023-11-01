<?php

namespace App\Http\Controllers;

use App\Models\DataKeluarga;
use Illuminate\Http\Request;

class reportController extends Controller
{
    public function index()
    {
        $data_keluarga = DataKeluarga::select('kacab') // Pilih hanya kolom 'wilayah_binaan'
                        ->distinct() // Hanya ambil data unik
                        ->get();

        if(request()->ajax()){

            return response()->json($data_keluarga);
        }
        return view("report.index");
    }
    public function wilbin(Request $request)
    {
        $kacab = $request->kacab;
        $data_wilbin = DataKeluarga::where("kacab", $kacab)
                        ->select('wilayah_binaan') // Pilih hanya kolom 'wilayah_binaan'
                        ->distinct() // Hanya ambil data unik
                        ->get();

        if(request()->ajax()){

            return response()->json($data_wilbin);
        }
    }
    public function shelter(Request $request)
    {
        $wilbin = $request->wilayah_binaan;
        $data_shelter = DataKeluarga::where('wilayah_binaan', $wilbin)
                        ->select('shelter') // Pilih hanya kolom 'shelter'
                        ->distinct() // Hanya ambil data unik
                        ->get();

        if(request()->ajax()){

            return response()->json($data_shelter);
        }
    }
    public function table(Request $request)
{
    $kacab = $request->kacab;
    $wilbin = $request->wilayah_binaan;
    $shelter = $request->shelter;

    if(request()->ajax()){
        $data = DataKeluarga::latest();


                if(isset($kacab)) {
                    $data->orWhere('kacab', $kacab);
                    if(isset($wilbin)) {
                        $data->orWhere('wilayah_binaan', $wilbin);
                        if(isset($shelter)) {
                            $data->orWhere('shelter', $shelter);
                        }
                    }
                }



            $result = $data->get();

            return datatables($result)
            ->addIndexColumn()
            ->make(true);

    }
}

}
