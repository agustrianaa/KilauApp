<?php

namespace App\Http\Controllers;

use App\Models\anak;
use App\Models\DataKeluarga;
use App\Models\SurveyKeluarga;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ValidasiSurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $data = DataKeluarga:: 
            select(
                'survey_keluargas.id as id',
                'data_keluargas.no_kk as no_kk',
                'data_keluargas.kepala_keluarga as kepala_keluarga',
                'survey_keluargas.petugas_survey as petugas_survey',
                'survey_keluargas.created_at as created_at',
                'survey_keluargas.*',
            )
            ->leftJoin('survey_keluargas', 'data_keluargas.id', '=', 'survey_keluargas.keluarga_id')
            ->get();

            return datatables($data) 
            ->addColumn('action', function($row){
                $id = $row->id; // Ambil ID dari baris data
                $validAct = ' <a href="javascript:void(0)" onClick="editFunc(' . $id . ')" data-original-title="Edit" class="edit btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
                $validAct .= ' <a href="javascript:void(0)" onClick="deleteFunc(' . $id . ')" data-original-title="Delete" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>';
                return $validAct;
            })
            ->addColumn('kelayakan', function($row){
                $id = $row->id; // Ambil ID dari baris data
                if ($row->kelayakan_diisi) {
                    $kelayakanAct = '<a href="javascript:void(0)" onClick="kelayakanFunc(' . $id . ')" data-original-title="View Kelayakan" class="kelayakan btn btn-info btn-sm"><i class="fas fa-check-circle"></i> Lihat Kelayakan</a>';
                } else {
                    $kelayakanAct = '<a href="javascript:void(0)" onClick="tambahKelayakan(' . $id . ')" data-original-title="Tambahkan Kelayakan" class="tambahkan-kelayakan btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> Tambahkan Kelayakan</a>';
                }
                return $kelayakanAct;
            })
            ->rawColumns(['action', 'kelayakan'])
            ->addIndexColumn()
            ->make(true);
            
        }
        return view('validasiSurvey.validasi-table');
    }

    public function validation(Request $request, $id)
    {
        $validasi = SurveyKeluarga::find($id);

        return view('validasiSurvey.validasi-survey', compact('id', 'validasi-survey'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
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
