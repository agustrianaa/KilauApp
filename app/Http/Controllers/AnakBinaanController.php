<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anak;
use App\Models\DataKeluarga;
use App\Models\Ayah;
use App\Models\Ibu;
use App\Models\Wali;
use Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AnakBinaanController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $data = DataKeluarga::select(
                'data_keluargas.*',
                'anaks.*',
                'anaks.id_anaks as id_anaks',
                'anaks.nama_lengkap as nama_lengkap_anak',
                'anaks.nama_panggilan as nama_panggilan_anak',
                'anaks.tempat_lahir as tempat_lahir_anak',
                'anaks.tanggal_lahir as tanggal_lahir_anak',
                'anaks.nama_sekolah as nama_sekolah_anak',
                'anaks.nama_madrasah as nama_madrasah_anak',
                'anaks.hobby as hobby_anak',
                'anaks.cita_cita as cita_cita_anak',
                'ayahs.*',
                'ibus.*',
                'walis.*',
                'status_anaks.*',
                )
            ->leftJoin('ayahs', 'data_keluargas.id', '=', 'ayahs.data_keluarga_id')
            ->leftJoin('ibus', 'data_keluargas.id', '=', 'ibus.data_keluarga_id')
            ->leftJoin('walis', 'data_keluargas.id', '=', 'walis.data_keluarga_id')
            ->leftJoin('anaks', 'data_keluargas.id', '=', 'anaks.data_keluarga_id')
            ->leftJoin('status_anaks', 'anaks.id_anaks', '=', 'status_anaks.anak_id')
            ->where('status_anaks.status_binaan', 1)
            ->get();

            return datatables($data)
                ->addColumn('action', 'DataAnakBinaan.dataanakbinaan-action')
                ->addColumn('ttl', function ($data) {
                    return $data->tempat_lahir_anak . ', ' . $data->tanggal_lahir_anak;
                })
                ->rawColumns(['action', 'ttl'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('DataAnakBinaan.dataanakbinaan');
    }

    public function store(Request $request)  {
        $anakId = $request->id;

        $anak = Anak::updateOrCreate(
            [
                'id' => $anakId
            ],
            [
                'nama_lengkap' => $request->nama_lengkap,
                'nama_panggilan' => $request->nama_panggilan,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'nama_sekolah' => $request->nama_sekolah,
                'nama_madrasah' => $request->nama_madrasah,
                'hobby' => $request->hobby,
                'cita_cita' => $request->cita_cita,
            ]);

            return Response()->json($anak);
    }

    public function showViewPage(Request $request, $id):View
    {
        $record = Anak::find($id);

        return view('DataAnakBinaan.dataanakbinaan-view', compact('record'));
    }

    public function edit(Request $request) {
        $where = array('id' => $request->id);
        $anak = Anak::where($where)->first();

        return Response()->json($anak);
    }

    public function destroy(Request $request) {
        $anak = Anak::where('id', $request->id)->delete();

        return Response()->json($anak);
    }
}
