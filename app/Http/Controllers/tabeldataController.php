<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tabeldata;
use Datatables;
use Illuminate\Support\Facades\DB;

class tabeldataController extends Controller
{
    public function index(Request $request) {
        if(request()->ajax()) {
            $agama = $request->agama;
            $jenis_kelamin = $request->jenis_kelamin;
            $status_binaan = $request->status_binaan;
            
            $data = tabeldata::select('*')
                        ->where(function($q) use($agama) {
                            if($agama != ''){
                                $q->where('agama', $agama);
                            }
                        })
                        ->where(function($q) use($jenis_kelamin) {
                            if($jenis_kelamin != ''){
                                $q->where('jenis_kelamin', $jenis_kelamin);
                            }
                        })
                        ->where(function($q) use($status_binaan) {
                            if($status_binaan != ''){
                                $q->where('status_binaan', $status_binaan);
                            }
                        });
            return datatables($data)
            ->addColumn('action', 'tabel.tabeldata-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('tabel.tabeldata');
    }

    public function store(Request $request)  {
        $tabeldataId = $request->id;

        $tabeldata = tabeldata::updateOrCreate(
            [
                'id' => $tabeldataId
            ],
            [
                'name' => $request->name,
                'agama' => $request->agama,
                'teml' => $request->teml,
                'tgll' => $request->tgll,
                'jenis_kelamin' => $request->jenis_kelamin,
                'anak_ke' => $request->anak_ke,
                'kepala_keluarga' => $request->kepala_keluarga,
                'status_binaan' => $request->status_binaan,
            ]);

            return Response()->json($tabeldata);
    }

    public function edit(Request $request) {
        $where = array('id' => $request->id);
        $tabeldata = tabeldata::where($where)->first();

        return Response()->json($tabeldata);
    }

    public function destroy(Request $request) {
        $tabeldata = tabeldata::where('id', $request->id)->delete();

        return Response()->json($tabeldata);
    }
}
