<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Donatur;
use App\Models\KantorCabang;
use App\Models\Shelter;
use App\Models\StatusAnak;
use App\Models\SurveyKeluarga;
use App\Models\WilayahBinaan;
use Illuminate\Http\Request;

class PengajuanDonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $wilayah = KantorCabang::with('dataWilbin.dataShelter')
            ->get();

        if (request()->ajax()) {
            $key = 0;
            $fbeasiswa = $request->status_beasiswa;
            $data = Anak::select(
                'anaks.id_anaks as id',
                'anaks.donatur_id as donatur_id',
                'survey_keluargas.hsurvey as hsurvey',
                'donaturs.name as namadonatur',
                'donaturs.id as donatur_id',
                'status_anaks.status_beasiswa as status_beasiswa',
                'anaks.*',
                'status_anaks.*',
                'anaks.agama as agama',
            )
                ->join('data_keluargas', 'anaks.data_keluarga_id', '=', 'data_keluargas.id')
                ->join('survey_keluargas', 'data_keluargas.id', '=', 'survey_keluargas.keluarga_id')
                ->join('status_anaks', 'anaks.id_anaks', '=', 'status_anaks.anak_id')
                ->leftJoin('donaturs', 'anaks.donatur_id', '=', 'donaturs.id')
                ->where(function ($query)  {
                    $query->where('survey_keluargas.hsurvey', '=', 'layak')
                        ->orWhere('survey_keluargas.hsurvey', '=', 'cukup layak');
                })
                ->when($fbeasiswa, function ($query) use ($fbeasiswa) {
                    $query->where('status_anaks.status_beasiswa', $fbeasiswa);
                })
                ->when($request->has('kacab'), function ($query) use ($request) {
                    $kacab = $request->kacab;
                    return $query->whereIn('data_keluargas.kacab', $kacab);
                })
                ->when($request->has('wilbin'), function ($query) use ($request) {
                    $wilbin = $request->wilbin;
                    return $query->whereIn('anaks.wilayah_binaan', $wilbin);
                })
                ->when($request->has('shelter'), function ($query) use ($request) {
                    $shelter = $request->shelter;
                    return $query->whereIn('anaks.shelter', $shelter);
                })
                ->get();

                // if($fbeasiswa != ''){
                //     $data = $data->where('status_beasiswa', $fbeasiswa);
                // }

            return datatables($data)
                ->addColumn('no', function ($row) use (&$key) {
                    return ++$key;
                })
                ->addColumn('hsurvey', function ($row) {
                    $hsurvey = $row->hsurvey;

                    if ($hsurvey === 'layak') {
                        $hsurvey = '<a class="kelayakan btn btn-info btn-sm"><i class="fas fa-check-circle"></i> Layak</a>';
                    } elseif ($hsurvey === 'cukup layak') {
                        $hsurvey = '<a class="kelayakan btn btn-success btn-sm"><i class="fas fa-check-circle"></i> Cukup Layak</a>';
                    } else {
                        $hsurvey = '';
                    }

                    return $hsurvey;
                })
                ->addColumn('donatur', function ($row) {
                    $id = $row ->donatur_id;
                    if ($row->namadonatur) {
                        $donatur = '<a href="javascript:void(0)" onclick="donaturFunc(' . $id . ')" class="btn btn-success btn-sm"><i class="fas fa-user"></i>   ' . $row->namadonatur . ' </a>';
                    } else {
                        // Jika belum ada donatur
                        $donatur = '<div onClick="noDonatur()" class="btn btn-danger btn-sm">Belum Ada Donatur</div>';
                    }
                    return $donatur;
                })
                ->addColumn('action', function ($row) {
                    $id = $row->id;
                    // $donaturId = $row->donatur_id;
                    if ($row->donatur_id) {
                        $act = '<a href="javascript:void(0)" onClick="editDonatur(' . $id . ')" data-original-title="Edit Donatur" class="edit-donatur btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
                        $act .= '<a href="javascript:void(0)" onClick="hapusDonatur(' . $id . ')" data-original-title="Hapus Donatur" class="hapus-donatur btn btn-danger btn-sm ml-2"><i class="fas fa-trash"></i></a>';
                    } else {
                        $act = '<a href="javascript:void(0)" onClick="tambahDonatur(' . $id . ')" data-original-title="Tambahkan Donatur" class="tambahkan-donatur btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> Tambahkan Donatur</a>';
                    }
                    return $act;
                })

                ->rawColumns(['hsurvey', 'donatur', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('PengajuanDonatur.PengajuanDonatur-table', compact('wilayah'));
    }

    public function cariWilayahBinaan(Request $request)
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

    public function cariShelters(Request $request)
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
    
    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'donaturId' => 'required',
        ]);

        Anak::where('id_anaks', $request->anakId)
            ->update(['donatur_id' => $request->donaturId]);

        return response()->json(['message' => 'Data Donatur berhasil disimpan.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataAnak = Anak::find($id);
        // $donatur = Donatur::find($donaturId);

        return view('PengajuanDonatur.PengajuanDonatur', compact('id', 'dataAnak'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $data = Donatur::where('name', 'LIKE', '%' . $query . '%')->get();
        foreach ($data as $donatur) {
            $donatur->donatur_id = $donatur->id;
        }
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function profileDonatur(Request $request, $id)
    {
        $donatur = Donatur::find($id);

        return Response()->json($donatur);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $donaturId = $request->all();
        $anak = Anak::where('id_anaks', $id)->first();;
        // $donaturId->update(['donatur_id' => null]);
        $donaturId['donatur_id'] = null;
        $anakUpdate = $anak->update($donaturId);

        return response()->json([
            'id' => $id,
            'Donatur Id' => $donaturId,
        ]);
    }
}
