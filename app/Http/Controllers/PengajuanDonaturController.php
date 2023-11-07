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
        if(request()->ajax()){
            $key = 0 ;
            $data = Anak::
            select(
                'anaks.id_anaks as id',
                'anaks.*',
                'status_anaks.*',
                'anaks.agama as agama',
                )
                ->join('data_keluargas', 'anaks.data_keluarga_id','=', 'data_keluargas.id')
                ->join('survey_keluargas', 'data_keluargas.id', '=', 'survey_keluargas.keluarga_id')
                ->join('status_anaks', 'anaks.id_anaks', '=', 'status_anaks.anak_id')
                ->where(function ($query) {
                    $query->where('survey_keluargas.hsurvey', '=', 'layak')
                        ->orWhere('survey_keluargas.hsurvey', '=', 'cukup layak');
                })
                ->get();

                return datatables($data)
                ->addColumn('no', function($row) use(&$key){
                    return ++$key;
                })
                ->addColumn('hsurvey', function ($row) {
                    $id = $row->id;
                    $hsurvey = SurveyKeluarga::find($id);

                    if ($hsurvey === 'layak') {
                        $hsurvey = '<a class="kelayakan btn btn-info btn-sm"><i c  vlass="fas fa-check-circle"></i> Layak</a>';
                    } elseif ($hsurvey === 'cukup layak') {
                        $hsurvey = '<a class="kelayakan btn btn-success btn-sm"><i class="fas fa-check-circle"></i> Cukup Layak</a>';
                    } else {
                        $hsurvey = '';
                    }

                    return $hsurvey;
                })
                ->addColumn('donatur', function($row){
                    $id = $row->id;
                    $donatur = '<a href="javascript:void(0)" onClick="DonaturFunc(' . $id . ')" data-original-title="Edit" class="edit btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
                    return $donatur;
                })
                ->addColumn('action', function($row){
                    $id = $row->id;
                    $act = '<a href="javascript:void(0)" onClick="tambahDonatur('. $id .')" data-original-title="Tambahkan Donatur" class="tambahkan-donatur btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> Tambahkan Donatur</a>';
                    return $act;
                })
                
            ->rawColumns(['hsurvey','donatur','action'])
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataAnak = Anak::find($id);

        return view('PengajuanDonatur.PengajuanDonatur', compact('id', 'dataAnak'));
    }

    public function search(Request $request){
        $query = $request->input('query');

        $cari = Donatur::where('name','LIKE','%'. $query .'%')->get();

        return response()->json($cari);
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
    public function destroy(string $id)
    {
        //
    }
}
