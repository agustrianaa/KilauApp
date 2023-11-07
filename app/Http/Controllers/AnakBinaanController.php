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
                'data_keluargas.id as id_kelu',
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
                'survey_keluargas.*',
                )
            ->leftJoin('ayahs', 'data_keluargas.id', '=', 'ayahs.data_keluarga_id')
            ->leftJoin('ibus', 'data_keluargas.id', '=', 'ibus.data_keluarga_id')
            ->leftJoin('walis', 'data_keluargas.id', '=', 'walis.data_keluarga_id')
            ->leftJoin('anaks', 'data_keluargas.id', '=', 'anaks.data_keluarga_id')
            ->leftJoin('survey_keluargas', 'data_keluargas.id', '=', 'survey_keluargas.keluarga_id')
            ->leftJoin('status_anaks', 'anaks.id_anaks', '=', 'status_anaks.anak_id')
            ->where('status_anaks.status_binaan', 1)
            ->whereNull('survey_keluargas.id')
            ->get();

            return datatables($data)
                // ->addColumn('action', 'DataAnakBinaan.dataanakbinaan-action')
                ->addColumn('action', function ($data) {
                    $btn = '<a href="' . url("/admin/calonAnakBinaanDetail/" . $data->id_kelu) . '" data-toggle="tooltip" data-id="' . $data->id_kelu . '" title="Detail Anak & Keluarga" class="view btn btn-sm btn-info view text-white me-1"><i class="bi bi-file-richtext"></i> Detail</a>';
                    $btn = $btn.'<a href="' . url("admin/surveyForm/" . $data->id_kelu) . '" data-toggle="tooltip" data-id="' . $data->id_kelu . '" title="Isi Survey Detail Keluarga" class="view btn btn-sm btn-success view text-white"><i class="bi bi-ui-checks"></i> Isi Survey</a>';
                    $btn = $btn.'<a href="' . url("admin/AnakBinaandelete/" . $data->id_kelu) . '" data-toggle="tooltip" data-id="' . $data->id_kelu . '" title="Hapus Data" class="view btn btn-sm btn-danger view text-white ms-1"><i class="bi bi-trash-fill"></i> Delete</a>';

                    return $btn;
                })
                ->addColumn('survey_status', function ($data) {
                    return $data->survey_keluargas ? 'Sudah Survey' : 'Belum Survey';
                })
                ->addColumn('ttl', function ($data) {
                    return $data->tempat_lahir_anak . ', ' . $data->tanggal_lahir_anak;
                })
                ->rawColumns(['action', 'ttl', 'survey_status'])
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

    public function destroy($id) {
        // $anak =
        DataKeluarga::where('id', $id)->delete();

        // return Response()->json($anak);
    }
}
