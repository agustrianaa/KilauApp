<?php

namespace App\Http\Controllers;

use App\Models\Ayah;
use App\Models\DataKeluarga;
use App\Models\Ibu;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class DatakeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(DataKeluarga::select('*'))
            ->addColumn('action', 'layout.components.datakeluarga-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view ('page.datakeluarga');
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
        $keluargaId = $request->id;

        $datakeluarga = DataKeluarga::updateOrCreate(
                    [
                        'id' => $keluargaId
                    ],
                    [
                        'no_kk' => $request->no_kk,
                        'kepala_keluarga' => $request->kepala_keluarga,
                        'wilbin' => $request->wilbin,
                    ]);
        return Response()->json($datakeluarga);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // ini untuk detail data keluarga
        // Ambil data keluarga berdasarkan $id dari database
        $dataKeluarga = DataKeluarga::find($id);
        $dataIbu = Ibu::where('data_keluargas_id', $id)->first();
        $dataAyah = Ayah::where('data_keluargas_id', $id)->first();

        // $dataKeluarga = $dataIbu->dataKeluarga;

        // Tampilkan halaman detail data keluarga (misalnya, menggunakan view 'detail_datakeluarga.blade.php')
        return view('page.detail_datakeluarga', ['dataKeluarga' => $dataKeluarga, 'dataIbu' => $dataIbu, 'dataAyah' => $dataAyah]);

        //data ibu
        
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
    public function destroy(Request $request)
    {
        $datakeluarga = DataKeluarga::where('id', $request->id)->delete();

        return Response()->json($datakeluarga);
    }
}
