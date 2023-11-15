<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Donatur;
use App\Models\StatusAnak;
use App\Models\SurveyKeluarga;
use Illuminate\Http\Request;

class PengajuanDonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $key = 0;
            $data = Anak::select(
                    'anaks.id_anaks as id',
                    'anaks.donatur_id as donatur_id',
                    'survey_keluargas.hsurvey as hsurvey',
                    'donaturs.name as namadonatur',
                    'anaks.*',
                    'status_anaks.*',
                    'anaks.agama as agama',
                )
                ->join('data_keluargas', 'anaks.data_keluarga_id', '=', 'data_keluargas.id')
                ->join('survey_keluargas', 'data_keluargas.id', '=', 'survey_keluargas.keluarga_id')
                ->join('status_anaks', 'anaks.id_anaks', '=', 'status_anaks.anak_id')
                ->leftJoin('donaturs', 'anaks.donatur_id', '=', 'donaturs.id')
                ->where(function ($query) {
                    $query->where('survey_keluargas.hsurvey', '=', 'layak')
                        ->orWhere('survey_keluargas.hsurvey', '=', 'cukup layak');
                })
                ->get();

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
                    $donatur = $row->namadonatur;
                    if ($row->namadonatur) {
                        $donatur = '<a onClick="DonaturFunc()" class="edit btn btn-success btn-sm"><i class="fas fa-user"></i>   ' . $row->namadonatur . '</a>';
                    } else {
                        // Jika belum ada donatur
                        $donatur = '<a onClick="DonaturFunc()" class="edit btn btn-danger btn-sm">Belum Ada Donatur</a>';
                    }
                    return $donatur;
                })
                ->addColumn('action', function ($row) {
                    $id = $row->id;
                    // $donaturId = $row->donatur_id;
                    if ($row->donatur_id) {
                        $act ='<a href="javascript:void(0)" onClick="editDonatur(' . $id . ')" data-original-title="Edit Donatur" class="edit-donatur btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
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
        return view('PengajuanDonatur.PengajuanDonatur-table');
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
    public function edit(string $id)
    {
        //
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
    public function destroy(string $id, Request $request)
    {
        $donaturId = $request->id;
        $donatur = Anak::where('donatur_id', $donaturId)->delete();
       
        return response()->json([
            'donaturId' => $donaturId,
            'donatur' => $donatur,
        ]);        
    }
}
