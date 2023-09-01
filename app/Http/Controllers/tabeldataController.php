<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tabeldata;
use Datatables;

class tabeldataController extends Controller
{
    public function index() {
        if(request()->ajax()) {
            return datatables()->of(tabeldata::select('*'))
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
                'agama' => $request->email,
                'TTL' => $request->TTL,
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
