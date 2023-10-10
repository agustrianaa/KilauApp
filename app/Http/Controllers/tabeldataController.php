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
            $data = tabeldata::select("*");
    
            // Mengecek apakah filter agama diberikan
            if ($request->has('agama')) {
                $agama = $request->agama;
                $data = $data->whereIn('agama', $agama);
            }
    
            // Mengecek apakah filter jenis_kelamin diberikan
            if ($request->has('jenis_kelamin')) {
                $jenis_kelamin = $request->jenis_kelamin;
                $data = $data->whereIn('jenis_kelamin', $jenis_kelamin);
            }
    
            // Mengecek apakah filter status_binaan diberikan
            if ($request->has('status_binaan')) {
                $status_binaan = $request->status_binaan;
                $data = $data->whereIn('status_binaan', $status_binaan);
            }
    
            return datatables($data)
                ->addColumn('action', 'DataAnakBinaan.dataanakbinaan-action')
                ->addColumn('ttl', function ($data) {
                    return $data->teml . ', ' . $data->tgll;
                })
                ->rawColumns(['action', 'ttl'])
                ->addIndexColumn()
                ->make(true);
        }
    
        return view('DataAnakBinaan.dataanakbinaan');
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

        return view('DataAnakBinaan.dataanakbinaan-view', compact('record'));
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

    public function b() {
        return view('b');
    }
}
