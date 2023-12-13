<?php

namespace App\Http\Controllers;

use App\Models\KantorCabang;
use App\Models\Shelter;
use App\Models\WilayahBinaan;
use Illuminate\Http\Request;
use App\Models\Anak;
use App\Models\DataKeluarga;
use App\Models\Ayah;
use App\Models\Ibu;
use App\Models\Wali;
use Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Exports\DataKeluargaExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;

class AnakBinaanController extends Controller
{

    private $filteredData;
    public function index(Request $request)
    {
        $wilayah = KantorCabang::with('dataWilBin.dataShelter')->get();

        if (request()->ajax()) {
            $this->filteredData = $this->getFilteredData($request);

            return datatables($this->filteredData)
            ->addColumn('action', function ($data) {
                $btn = '<a href="' . url("/admin/calonAnakBinaanDetail/" . $data->id_kelu .'/'. $data->id_anaks) . '" data-toggle="tooltip" data-id="' . $data->id_kelu . '" title="Detail Anak & Keluarga" class="view btn btn-sm btn-info view text-white me-1"><i class="bi bi-file-richtext"></i> Detail</a>';
                $btn = $btn.'<a href="' . url("admin/surveyForm/" . $data->id_kelu) . '" data-toggle="tooltip" data-id="' . $data->id_kelu . '" title="Isi Survey Detail Keluarga" class="view btn btn-sm btn-success view text-white"><i class="bi bi-ui-checks"></i> Isi Survey</a>';
                $btn = $btn.'<a href="' . url("admin/AnakBinaandelete/" . $data->id_kelu) . '" data-toggle="tooltip" data-id="' . $data->id_kelu . '" title="Hapus Data" class="view btn btn-sm btn-danger view text-white ms-1"><i class="bi bi-trash-fill"></i> Delete</a>';
                return $btn;
            })
            ->addColumn('ttl', function ($data) {
                return $data->tempat_lahir_anak . ', ' . $data->tanggal_lahir_anak;
            })
            ->addColumn('survey_status', function ($data) {
                if (empty($data->id_survey_keluarga)) {
                    return '<span class="badge bg-danger">Belum Survey</span>';
                } else {
                    return '<span class="badge bg-success">Sudah Survey</span>';
                }
            })
            ->addColumn('DiBuat', function ($data) {
                return $data->DiBuat ? \Carbon\Carbon::parse($data->DiBuat)->isoFormat('D MMMM YYYY') : '-';
            })
            ->addColumn('DiUbah', function ($data) {
                return $data->DiUbah ? \Carbon\Carbon::parse($data->DiUbah)->isoFormat('D MMMM YYYY') : '-';
            })
            ->rawColumns(['action', 'ttl', 'survey_status'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('DataAnakBinaan.AnakBinaan', compact('wilayah'));
    }

    private function getFilteredData(Request $request)
    {
        $filteredData = DataKeluarga::select(
            'data_keluargas.*',
            'data_keluargas.id as id_kelu',
            'anaks.*',
            'anaks.nama_lengkap as nama_lengkap_anak',
            'anaks.nama_panggilan as nama_panggilan_anak',
            'anaks.tempat_lahir as tempat_lahir_anak',
            'anaks.tanggal_lahir as tanggal_lahir_anak',
            'anaks.agama as agamaAnak',
            'anaks.data_keluarga_id as ID_Keluarga',
            'anaks.created_at as DiBuat',
            'anaks.updated_at as DiUbah',
            'ayahs.*',
            'ayahs.nama as nama_ayah',
            'status_anaks.*',
            'survey_keluargas.*',
            'survey_keluargas.id as id_survey_keluarga'
        )
        ->leftJoin('ayahs', 'data_keluargas.id', '=', 'ayahs.data_keluarga_id')
        ->leftJoin('anaks', 'data_keluargas.id', '=', 'anaks.data_keluarga_id')
        ->leftJoin('survey_keluargas', 'data_keluargas.id', '=', 'survey_keluargas.keluarga_id')
        ->leftJoin('status_anaks', 'anaks.id_anaks', '=', 'status_anaks.anak_id')
        ->orderBy('anaks.created_at', 'desc')
        ->when($request->has('kacab'), function ($query) use ($request) {
            $kacab = $request->kacab;
            return $query->whereIn('anaks.kacab', $kacab);
        })
        ->when($request->has('wilbin'), function ($query) use ($request) {
            $wilbin = $request->wilbin;
            return $query->whereIn('anaks.wilayah_binaan', $wilbin);
        })
        ->when($request->has('shelters'), function ($query) use ($request) {
            $shelters = $request->shelters;
            return $query->whereIn('anaks.shelter', $shelters);
        })
        ->when($request->has('noKK'), function ($query) use ($request) {
            $noKK = $request->noKK;
            return $query->where('data_keluargas.no_kk', 'LIKE', "%$noKK%");
        })  
        ->where('status_anaks.status_binaan', 1)
        ->get();

        return $filteredData;
    }

    public function cariWilBin(Request $request)
    {
        try {
            $kacabId = $request->input('kantorId');

            $wilayahBinaan = WilayahBinaan::where('kacab_id', $kacabId)->get(['id_wilbin', 'nama_wilbin']);

            return response()->json([
                'status' => 'success',
                'data' => $wilayahBinaan,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function cariShel(Request $request)
    {
        try {
            $wilbinsID = $request->input('wilbinId');

            $shelters = Shelter::where('wilbin_id', $wilbinsID)->get(['id_shelter', 'nama_shelter']);

            return response()->json([
                'status' => 'success',
                'data' => $shelters,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
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

    public function updateStatusAktif(Request $request)
{
    try {
        // Validasi request
        $request->validate([
            'id_anaks' => 'required|numeric',
            'status_aktif' => 'required|boolean',
        ]);

        // Update status_aktif berdasarkan ID Anak
        $anak = Anak::find($request->id_anaks);

        if (!$anak) {
            throw new \Exception('Anak tidak ditemukan');
        }

        $anak->status_aktif = $request->status_aktif;
        $anak->save();

        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        // Tangkap dan tanggapi kesalahan
        return response()->json(['success' => false, 'message' => $e->getMessage()], 422);
    }
}

}
