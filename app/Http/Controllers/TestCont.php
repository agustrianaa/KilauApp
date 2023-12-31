<?php

namespace App\Http\Controllers;

use App\Models\DataKeluarga;
use App\Models\KantorCabang;
use Illuminate\Http\Request;

class TestCont extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexTest(Request $request)
    {
        $wilayah = KantorCabang::with('dataWilBin.dataShelter')->get();

        if(request()->ajax()){
            $data = DataKeluarga::select(
                'data_keluargas.*',
                'data_keluargas.id as id_kel',
                'anaks.*',
                'status_anaks.*',
                'anaks.id_anaks as id_anaks',
                'anaks.nama_lengkap as nama_lengkap_anak',
                'anaks.nama_panggilan as nama_panggilan_anak',
                'anaks.tempat_lahir as tempat_lahir_anak',
                'anaks.tanggal_lahir as tanggal_lahir_anak',
                'ayahs.*',
                'ayahs.nama as nama_ayah',
                'ibus.*',
                'walis.*',
                'survey_keluargas.*',
                )
            ->leftJoin('ayahs', 'data_keluargas.id', '=', 'ayahs.data_keluarga_id')
            ->leftJoin('ibus', 'data_keluargas.id', '=', 'ibus.data_keluarga_id')
            ->leftJoin('walis', 'data_keluargas.id', '=', 'walis.data_keluarga_id')
            ->leftJoin('anaks', 'data_keluargas.id', '=', 'anaks.data_keluarga_id')
            ->leftJoin('survey_keluargas', 'data_keluargas.id', '=', 'survey_keluargas.keluarga_id')
            ->leftJoin('status_anaks', 'anaks.id_anaks', '=', 'status_anaks.anak_id')
            ->where('status_anaks.status_binaan', 1)
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
            ->orderBy('data_keluargas.created_at', 'desc')
            ->get();

            return datatables($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {

                $btn = '<a href="' . url("/admin/calonAnakBinaanDetail/" . $data->id_kelu) . '" data-toggle="tooltip" data-id="' . $data->id_kelu . '" title="Detail Anak & Keluarga" class="view btn btn-sm btn-info view text-white me-1"><i class="bi bi-file-richtext"></i> Detail</a>';
                $btn = $btn.'<a href="' . url("admin/surveyForm/" . $data->id_kelu) . '" data-toggle="tooltip" data-id="' . $data->id_kelu . '" title="Isi Survey Detail Keluarga" class="view btn btn-sm btn-success view text-white"><i class="bi bi-ui-checks"></i> Isi Survey</a>';
                $btn = $btn.'<a href="' . url("admin/AnakBinaandelete/" . $data->id_kelu) . '" data-toggle="tooltip" data-id="' . $data->id_kelu . '" title="Hapus Data" class="view btn btn-sm btn-danger view text-white ms-1"><i class="bi bi-trash-fill"></i> Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('AnakBinaan', compact('wilayah'));
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
    public function show(TestCont $testCont)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TestCont $testCont)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TestCont $testCont)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TestCont $testCont)
    {
        //
    }
}
