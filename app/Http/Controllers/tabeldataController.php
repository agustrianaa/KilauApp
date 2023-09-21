<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tabeldata;
use Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class tabeldataController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $fagama = $request->agama;
            $fjenis_kelamin = $request->jenis_kelamin;
            $fstatus_binaan = $request->status_binaan;

            $data = tabeldata::select("*");

            if ($fagama != '') {
                $data = $data->where('agama', $fagama);
            }

            if ($fjenis_kelamin != '') {
                $data = $data->where('jenis_kelamin', $fjenis_kelamin);
            }

            if ($fstatus_binaan != '') {
                $data = $data->where('status_binaan', $fstatus_binaan);
            }

            return datatables($data)
                ->addColumn('action', 'tabel.tabeldata-action')
                ->addColumn('ttl', function($data) {
                    return $data->teml.', '.$data->tgll;
                })
                ->rawColumns(['action', 'ttl'])
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

    public function showViewPage(Request $request, $id):View
    {
        $record = tabeldata::find($id);

        return view('tabeldata-view', compact('record'));
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
