<?php

namespace App\Http\Controllers;

use App\Models\Ibu;
use Illuminate\Http\Request;

class IbuController extends Controller
{
    public function getDataById($id)
    {
        $ibu = Ibu::find($id);

        if (!$ibu) {
            return response()->json(['error' => 'Data ibu tidak ditemukan'], 404);
        }

        return response()->json($ibu);
    }

    public function update(Request $request, $id)
    {
        

        $dataIbu = Ibu::find($id);

        if (!$dataIbu) {
            return response()->json(['error' => 'Data ibu tidak ditemukan'], 404);
        }

        // $dataIbu->nik = $request->input('nik');
        $dataIbu->nama = $request->input('nama');
        $dataIbu->tempat_lahir = $request->input('tempat_lahir');
        $dataIbu->tanggal_lahir = $request->input('tanggal_lahir');
        $dataIbu->agama = $request->input('agama');
        $dataIbu->alamat = $request->input('alamat');

        $dataIbu->save();

        return response()->json(['success' => true]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
