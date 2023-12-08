<?php

namespace App\Http\Controllers;

use App\Models\Shelter;
use App\Models\WilayahBinaan;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function getWilbin(Request $request){

        $idKacab = $request->input('kacabId');
        $wilbin = WilayahBinaan::where('kacab_id', $idKacab)->get(['id_wilbin', 'nama_wilbin']);
        return response()->json($wilbin);
    }

    public function getShelter(Request $request){
        $idShelter = $request->input('wilbinId');
        $shelter = Shelter::where('wilbin_id', $idShelter)->get(['id_shelter', 'nama_shelter']);
        return response()->json($shelter);
    }
}
